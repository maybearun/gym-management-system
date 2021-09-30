<?php
 require'../includes/functions.php';
  include 'includes/header.php';
  include 'includes/navbar.php';
  $memberId=$_SESSION['member_id'];
  $condition= "where member_id= $memberId";
  $check=fetchData('*','member_subscription',$condition);
  if (!empty($check)){
    $planName=$check[0]['plan_name'];
    $validity=$check[0]['plan_end_date'];
  }
  else{
    $planName="no plans active";
    $validity="no plans active";
  }


  ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= $_SESSION['profile']?>"
                     
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']?> </h3>
                
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Contact</b> <a class="float-right"><?php echo $_SESSION['contact']?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $_SESSION['email']?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right"><?php echo $_SESSION['gender']?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <div class="col-md-4">
         
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <p>Plan name</p>
                <h3><?= $planName?></h3>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          
            <!-- /.card -->
          </div>
          <div class="col-md-4">
         
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <p>Plan Valid till</p>
                <h3><?= $validity?></h3>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
  <?php
  include 'includes/footer.php';
  ?>