<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
ob_start();
date_default_timezone_set("Asia/Kolkata");
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "gym management system";

//Set dsn (data source name)
$dsn = "mysql:host=$servername;dbname=$database";

	//create a PDO instance
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



function fetchData($columns, $table, $condition = '', $params = []/*, $mode = 'default'*/)
{
	global $pdo;
	try {
		$stmt = $pdo->prepare("SELECT $columns FROM $table $condition");
		$stmt->execute($params);
		// if ($mode == "default")
		// 	return $stmt->fetchAll(PDO::FETCH_NUM);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (Exception $e) {
		$_SESSION['errors'][] = "Data cannot be fetched. Error Message:" . $e->getMessage();
		return null;
	}
}

function updateData($columns, $table, $condition = '', $params = [])
{
	global $pdo;
	try {
		$stmt = $pdo->prepare("UPDATE $table SET $columns $condition");
		$stmt->execute($params);
		return true;
	} catch (Exception $e) {
		$_SESSION['errors'][] = "Data cannot be updated. Error Message:" . $e->getMessage();
		return null;
	}
}

function insertData($columns, $table, $values)
{
	global $pdo;
	try {

		$params = '(?';
		for ($i = 1; $i < count($values); $i++){
			$params = $params . ',?';
		}
		$params = $params . ')';

		$stmt = $pdo->prepare("INSERT INTO $table $columns VALUES $params;");
		$stmt->execute($values);
		$last_id = $pdo->lastInsertId();
		return $last_id;
	} catch (PDOException $e) {
		$_SESSION['errors'][] = "Data cannot be uploaded. Error Message:" . $e->getMessage();
		return null;
	}
}

function deleteData($table, $condition, $params)
{
	global $pdo;
	try {
		$stmt = $pdo->prepare("DELETE FROM $table WHERE $condition");
		$stmt->execute($params);
		return true;
	} catch (Exception $e) {
		$_SESSION['errors'][] = "Data cannot be deleted. Error Message:" . $e->getMessage();
		return false;
	}
}

function uploadFile($location, $id)
{
	$fileName=$id['name'];
    $fileType=$id['type'];
    $fileSize=$id['size'];
    $fileSize=$id['size'];
    $fileError=$id['error'];
    $fileTmpDir=$id['tmp_name'];

	$fileExt=explode('.', $fileName);
	
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array('jpg', 'jpeg', 'png');

	if(in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if($fileSize < 40000000){
                $fileNewName= $fileName.uniqid('',true).".".$fileActualExt;
                $fileDestination= $_SERVER['DOCUMENT_ROOT'].$location.$fileNewName;
				// echo $fileTmpDir."<br>". $fileDestination;
                if (move_uploaded_file($fileTmpDir,$fileDestination)){
					return $fileDestination;
				}
				else{
					echo "there was an error";
				}
            }
            else{
                echo "Your file is to big";
            }
        }
        else{
            echo "There was an error uploading the file. Please Try again";
        }
    }
    else{
        echo "You are not allowed to upload images of this format.";
    }
    
// 	$target = $location . time() . basename($id['name']);
// 	if (move_uploaded_file($id['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/" . $target)) {
// 		return $target;
// 	} else {
// 		return null;
// 	}


}
function loginMember($email, $password){
	if (isset($_SESSION['id'])){
		session_unset();
	}
	global $pdo;
	
		$stmt = $pdo->prepare("SELECT * FROM members where email_id = ?");
		$stmt->execute([$email]);
		$check= $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (password_verify($password,$check[0]['password'])){
			
			// session_start();
			$_SESSION['member_id']=$check[0]['member_id'];
			$_SESSION['role']='member';
			$_SESSION['email']=$check[0]['email_id'];
			$_SESSION['profile']=$check[0]['profile_picture'];
			$_SESSION['firstName']=$check[0]['first_name'];
			$_SESSION['lastName']=$check[0]['last_name'];
			$_SESSION['contact']=$check[0]['contact_number'];
			$_SESSION['gender']=$check[0]['gender'];
			$_SESSION['dob']=$check[0]['date_of_birth'];
			return true;
		}
		else{
			
			return false;
		}
}

function loginStaff($email, $password){
	if (isset($_SESSION['id'])){
		session_unset();
	}
	try{
		global $pdo;
	
		$stmt = $pdo->prepare("SELECT * FROM employees where email_id = ?");
		$stmt->execute([$email]);
		$check= $stmt->fetchAll(PDO::FETCH_ASSOC);
		// echo $check;
		if (password_verify($password,$check[0]['password'])){
			
			// session_start();
			$_SESSION['id']=$check[0]['employee_id'];
			$_SESSION['role']=$check[0]['designation'];
			$_SESSION['email']=$check[0]['email_id'];
			$_SESSION['profile']=$check[0]['profile_picture'];
			$_SESSION['firstName']=$check[0]['first_name'];
			$_SESSION['lastName']=$check[0]['last_name'];
			$_SESSION['contact']=$check[0]['contact_number'];
			$_SESSION['gender']=$check[0]['gender'];
			$_SESSION['dob']=$check[0]['date_of_birth'];
			return true;
		}
		else{
			// echo "invalid";
			return false;
		}
	}
	catch (Exception $e){
		$_SESSION['errors'][] = "cannot login. Error Message:" . $e->getMessage();
		return false;
	}
	
}

