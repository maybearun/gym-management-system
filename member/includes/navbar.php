<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
     </li>
     <li class="nav-item d-none d-sm-inline-block">
       <a href="../member/index.php" class="nav-link">Home</a>
     </li>

   </ul>


 </nav>
 <!-- /.navbar -->

 <aside class="main-sidebar sidebar-dark-primary elevation-4">


   <!-- Sidebar -->
   <div class="sidebar">
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <!-- <img src="../../code/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
       </div>
       <div class="info">
         <a href="#" class="d-block"><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']?> </a>
       </div>
     </div>
     

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

         <li class="nav-item">
           <a href="measurements.php" class="nav-link">
             <i class="nav-icon fas fa-copy"></i>
             <p>
               Update Body Measurements
             </p>
           </a>
           
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-copy"></i>
             <p>
             Subscription Plans
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="plans.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>View Subscription Plans</p>
               </a>
             </li>
             <!-- <li class="nav-item">
               <a href="#" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Renew Subscription</p>
               </a>
             </li> -->

           </ul>
         </li>
         <!-- <li class="nav-item">
           <a href="" class="nav-link">
             <i class="nav-icon fas fa-copy"></i>
             <p>
               Update personal details
             </p>
           </a>
         </li> -->
         <li class="nav-item">
           <a href="../../code/logout.php" class="nav-link">
             <i class="nav-icon fas fa-edit"></i>
             <p>
               logout
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>