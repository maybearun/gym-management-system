<?php
require "../includes/functions.php";
include "includes/header.php";
include "includes/navbar.php";

if (isset($_POST['submit'])) {

  // location for image uploads
  $loctionDir = "/code/upload/employee/";
  $uploadProfile = $_FILES['uploadProfile'];
  $fileDestination = uploadFile($loctionDir, $uploadProfile);

  //data from the form
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
  $designation = $_POST['designation'];
  $joinDate = $_POST['joinDate'];
  $retireDate = $_POST['retireDate'];
  $pan = $_POST['pan'];
  $aadhar = $_POST['aadhar'];

  $hash = password_hash($password, PASSWORD_DEFAULT);


  //table details
  $table = 'employees';
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
      pincode,
      designation,
      joining_date,
      retirement_date,
      pan_card,
      aadhar_card
      )';
  $values = array(
    // collect data from form

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
    $city,
    $state,
    $country,
    $zip,
    $designation,
    $joinDate,
    $retireDate,
    $pan,
    $aadhar
  );
  $check = insertData($columns, $table, $values);
  if (isset($check)) {
    echo "<div class='alert alert-success' role='alert'>
    data $check inserted successfully  </div>";
  } else {
    if (isset($_SESSION['errors'])) {
      echo "<div class='alert alert-danger' role='alert'>
    data not inserted try again" . print_r($_SESSION['errors']) . "</div>";;
      unset($_SESSION['errors']);
    }
  }
}

?>
<!-- Content Wrapper. Contains page content --> -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Employee Registration</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <form id="employeeRegistration" method="POST"  action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">

        <div class="row">
          <!-- first name and last name -->
          <div class="firstName-group col-md-6">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First name">
          </div>
          <div class="lastName-group col-md-6">
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last name">
          </div>
        </div> <br>
        <!-- contact no. -->
        <div class="contact-group col-md-6">
          <label for="contact">Contact</label>
          <input type="number" class="form-control" name="contact" id="inputContact" placeholder="Contact no.">
        </div>
        <div class="altContact-group col-md-6">
          <label for="altContact">Alternate contact</label>
          <input type="number" class="form-control" name="altContact" id="inputAltContact" placeholder="Alternate Contact no.">
        </div><br>
        <!-- email -->
        <div class="email-group col-md-6">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <!-- Password -->
        <div class="password-group col-md-6">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="rePassword-group col-md-6">
          <label for="rePassword">Re-Enter Password</label>
          <input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="Re-Enter Password">
        </div>

        <br>
        <!-- gender -->
        <fieldset class="gender-group">
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
        <div class="uploadProflie-group">
          <Label for="uploadProflie">Upload Profile</Label><br>
          <input type="file" class="form-control-file" name="uploadProfile" id="uploadProfile">
        </div><br>
        <!-- date of birth -->
        <div class="dob-group">
          <label for="dob">Date of birth</label>
          <input type="date" class="form-control" name="dob" id="dob">
        </div><br>
        <!-- address -->
        <div class="address1-group">
          <label for="address1">Adress line 1</label>
          <input type="text" class="form-control" name="address1" id="address1">
        </div>
        <div class="address2-group">
          <label for="address2">Address line 2</label>
          <input type="text" class="form-control" name="address2" id="address2">
        </div>
        <div class="form-row">
          <div class="city-group col-md-4">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city">
          </div>
          <div class="state-group col-md-4">
            <label for="state">State</label>
            <input type="text" class="form-control" name="state" id="state">

          </div>
          <div class="country-group col-md-4">
            <label for="country">Country</label>
            <input type="text" class="form-control" name="country" id="country">
          </div>
        </div>
        <div class="zip-group col-md-4">
          <label for="zip">Zip</label>
          <input type="number" class="form-control" name="zip" id="zip">
        </div>
        <br>
        <!-- designation -->
        <div class="designation-group col-md-4">
          <label for="designation">Designation</label>
          <input type="text" class="form-control" name="designation" id="designation">
        </div><br>
        <!-- joining date  -->
        <div class="joinDate-group">
          <label for="joinDate">Joining date</label>
          <input type="date" class="form-control" name="joinDate" id="joinDate">
        </div>
        <!-- retire date  -->
        <div class="retireDate-group">
          <label for="retireDate">Retire date</label>
          <input type="date" class="form-control" name="retireDate" id="retireDate">
        </div><br>
        <!--  pan -->
        <div class="pan-group">
          <Label for="pan">PAN Card no.</Label><br>
          <input type="text" class="form-control-file" name="pan" id="pan">
        </div><br>
        <!--  aadhar -->
        <div class="aadhar-group">
          <Label for="aadhar">Aadhar Card no.</Label><br>
          <input type="number" class="form-control-file" name="aadhar" id="aadhar">
        </div><br>
        <!-- submit button -->
        <div class="col-sm-10">
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  $(document).ready(function() {
    $('#employeeRegistration').validate({
      rules: {
        firstName: 'required',
        lastName: 'required',
        contact: {
          required: true,
          minlength: 10,
          maxlength: 10
        },
        altContact: {
          required: true,
          minlength: 10,
          maxlength: 10
        },
        email: 'required',
        password: {
          required: true,
          minlength: 8
        },
        rePassword: {
          required: true,
          minlength: 8,
          equalTo: '#password'
        },
        gender: 'required',
        uploadProflie: 'required',
        dob: 'required',
        address1: 'required',
        address2: 'required',
        city: 'required',
        state: 'required',
        country: 'required',
        zip: 'required',
        designation: 'required',
        joinDate: 'required',
        retireDate: 'required',
        pan: 'required',
        aadhar: 'required'
      },
      messages: {
        firstName: 'This field is required',
        lastName: 'This field is required',
        contact: {
          required: 'This field is required',
          minlength: 'Contact no. should be 10 digits',
          maxlength: 'Contact no. should be 10 digits'
        },
        altContact: {
          required: 'This field is required',
          minlength: 'Contact no. should be 10 digits',
          maxlength: 'Contact no. should be 10 digits'
        },
        email: 'This field is required',
        password: {
          required: 'This field is required',
          minlength: 'password should be atleast 8 characters'
        },
        rePassword: {
          required: 'This field is required',
          minlength: 'password should be atleast 8 characters',
          equalTo: 'Passwords do not match'
        },
        gender: 'This field is required',
        uploadProflie: 'This field is required',
        dob: 'This field is required',
        address1: 'This field is required',
        address2: 'This field is required',
        city: 'This field is required',
        state: 'This field is required',
        country: 'This field is required',
        zip: 'This field is required',
        designation: 'This field is required',
        joinDate: 'This field is required',
        retireDate: 'This field is required',
        pan: 'This field is required',
        aadhar: 'This field is required'
      },
      submitHandler: function(form) {
        
          form.submit();
      }
    });
   
  });
</script>

<?php include "includes/footer.php" ?>




