<?php
require "includes/functions.php";

$showError = false;
$showAlert = false;

if (isset($_POST['submit'])) {

  $loctionDir = "/code/upload/members/";
  $uploadProfile = $_FILES['uploadProfile'];
  $fileDestination = uploadFile($loctionDir, $uploadProfile);

  $password = $_POST['password'];
  $rePassword = $_POST['rePassword'];

  if ($password != $rePassword) {
    $showError = true;
  } else {
    $hash = password_hash($password, PASSWORD_DEFAULT);
  }

  //table details
  $table = 'members';
  $columns = '(
      first_name, 
      last_name, 
      profile_picture, 
      gender, 
      date_of_birth, 
      contact_number, 
      alternate_contact_number, 
      email_id, 
      password, 
      address_line_1, 
      address_line_2, 
      city, 
      state, 
      country, 
      pincode
      )';
  $values = array(
    // collect data from form

    $firstName = $_POST['firstName'],
  $lastName = $_POST['lastName'],
  $fileDestination,
  $gender = $_POST['gender'],
  $dob = $_POST['dob'],
  $contact = $_POST['contact'],
  $altContact = $_POST['altContact'],
  $email = $_POST['email'],
  $hash,
  $address1 = $_POST['address1'],
  $address2 = $_POST['address2'],
  $city = $_POST['city'],
  $state = $_POST['state'],
  $country = $_POST['country'],
  $zip = $_POST['zip'],
  );
    
  echo (insertData($columns, $table, $values));
  
  if(isset($_SESSION['errors'])){
    print_r($_SESSION['errors']);
    unset($_SESSION['errors']);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <title>Member Registration</title>
</head>

<body>
  <style>
    body {
      margin: 10px;
    }
  </style>
  <center>
    <h2>Member Registration</h2>
  </center><br>
  <form method="POST" action="#" enctype="multipart/form-data">

    <div class="row">
      <!-- first name and last name -->
      <div class="form-group col-md-6">
        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First name">
      </div>
      <div class="form-group col-md-6">
        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last name">
      </div>
    </div> <br>
    <!-- contact no. -->
    <div class="form-group col-md-6">
      <label for="contact">Contact</label>
      <input type="number" class="form-control" name="contact" id="inputContact" placeholder="Contact no.">
    </div>
    <div class="form-group col-md-6">
      <label for="altContact">Alternate contact</label>
      <input type="number" class="form-control" name="altContact" id="inputAltContact" placeholder="Alternate Contact no.">
    </div><br>
    <!-- email -->
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
    <!-- Password -->
    <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
    <div class="form-group col-md-6">
      <label for="rePassword">Re-Enter Password</label>
      <input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="Re-Enter Password">
    </div>
    </div><br>
    <!-- gender -->
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male">
            <label class="form-check-label" for="genderMale">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female">
            <label class="form-check-label" for="genderFemale">
              Female
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="genderTransgender" value="Transgender">
            <label class="form-check-label" for="genderTransgender">
              Transgender
            </label>
          </div>
        </div>
      </div>
    </fieldset><br>
    <!-- add profile pic -->
    <div class="form-group">
      <Label for="uploadProflie">Upload Profile</Label><br>
      <input type="file" class="form-control-file" name="uploadProfile" id="uploadProfile">
    </div><br>
    <!-- date of birth -->
    <div class="form-group">
      <label for="dob">Date of birth</label>
      <input type="date" class="form-control" name="dob" id="dob">
    </div><br>
    <!-- address -->
    <div class="form-group">
      <label for="address1">Adress line 1</label>
      <input type="text" class="form-control" name="address1" id="address1">
    </div>
    <div class="form-group">
      <label for="address2">Address line 2</label>
      <input type="text" class="form-control" name="address2" id="address2">
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="city">City</label>
        <input type="text" class="form-control" name="city" id="city">
      </div>
      <div class="form-group col-md-4">
        <label for="state">State</label>
        <input type="text" class="form-control" name="state" id="state">

      </div>
      <div class="form-group col-md-4">
        <label for="country">Country</label>
        <input type="text" class="form-control" name="country" id="country">
      </div>
    </div>
    <div class="form-group col-md-4">
      <label for="zip">Zip</label>
      <input type="text" class="form-control" name="zip" id="zip">
    </div>
    </div><br>
    <!-- submit button -->
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="submit" id="submit">Register</button>
    </div>
  </form>
</body>

</html>