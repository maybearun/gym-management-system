<?php
require "includes/functions.php";

$showError = false;
$showAlert = false;
$errors=[];
if (isset($_POST['submit'])) {

  $loctionDir = "/code/upload/members/";
  $uploadProfile = $_FILES['uploadProfile'];
  $fileDestination = uploadFile($loctionDir, $uploadProfile);

  $password = $_POST['password'];
  $rePassword = $_POST['rePassword'];

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $fileDestination;
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $contact = $_POST['contact'];
  $altContact = $_POST['altContact'];
  $email = $_POST['email'];
  $hash;
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];
  $zip = $_POST['zip'];

  if ($password != $rePassword) {
    $showError = true;
    // $errors= "passwords do not match!!";
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
    // data collected  from form
    $firstName,
    $lastName,
    $fileDestination,
    $gender,
    $dob,
    $contact,
    $altContact,
    $email,
    $hash,
    $address1,
    $address2,
    $city ,
    $state,
    $country,
    $zip
  );
    // print_r($values);
  insertData($columns, $table, $values);
  
  if(isset($_SESSION['errors'])){
    print_r($_SESSION['errors']); 
    unset($_SESSION['errors']);
  }
  // if(isset($_POST['zip'])){
  //   die('registered');
  // }
 
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
  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- jquery-validate -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

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
  <?php
  // if(isset($_POST['submit'])){
  //   if (!empty($errors)){
  //     echo '<div class="alert alert-danger" role="alert">'.
  //           print_r($errors).
  //           '</div>';
  //   }
  //   else{
  //     echo '<div class="alert alert-success" role="alert">
  //           Registration successfull!
  //           </div>';
  //   }
  // }
 
  

?>
  <form id="memberRegistration" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">

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

  <script>
    $(document).ready(function(){
      $('#memberRegistration').submit(function(e){
       
       $('#memberRegistration').validate({
        rules:{
          firstName: 'required',
          lastName: 'required',
          contact: {required: true, minlength:10, maxlength:10},
          altContact: {required: true, minlength:10, maxlength:10},
          email: 'required',
          password: {required: true, minlength:8},
          rePassword: {required: true, minlength:8, equalTo: '#password'},
          gender:'required',
          uploadProflie: 'required',
          dob: 'required',
          address1: 'required',
          address2: 'required',
          city: 'required',
          state: 'required',
          country: 'required',
          zip: 'required'
        },
        messages:{
          firstName: 'This field is required',
          lastName: 'This field is required',
          contact: {
            required: 'This field is required', 
            minlength:'Contact no. should be 10 digits', 
            maxlength:'Contact no. should be 10 digits'
          },
          altContact: {
            required: 'This field is required', 
            minlength:'Contact no. should be 10 digits', 
            maxlength:'Contact no. should be 10 digits'
          },
          email: 'This field is required',
          password: {
            required: 'This field is required', 
            minlength:'password should be atleast 8 characters'
          },
          rePassword: {
            required: 'This field is required', 
            minlength:'password should be atleast 8 characters', 
            equalTo: 'Passwords do not match'
          },
          gender:'This field is required',
          uploadProflie: 'This field is required',
          dob: 'This field is required',
          address1: 'This field is required',
          address2: 'This field is required',
          city: 'This field is required',
          state: 'This field is required',
          country: 'This field is required',
          zip: 'This field is required'
        }
       });
       var formData=$("#memberRegistration").serialize();
       console.log(formData);
      //  $.ajax({
        //  url:'',
      //    type:'POST',
      //    data: formData,
      //   //  dataType: 'json',
      //   //  encode: true,
      //  }).done(function(data){
       
      //  })
      $.post('<?php echo $_SERVER['PHP_SELF']?>',function (formData)).fail(function (formData) {
        $("#memberRegistration").html(
          '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
        );
      });
       e.preventDefault();
      });
    });
      
   
  </script>
</body>

</html>