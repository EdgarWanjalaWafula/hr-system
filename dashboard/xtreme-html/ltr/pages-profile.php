<?php include 'partials/header.php'; ?>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include 'partials/admin-sidebar.php'; ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Profile Page</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-5 col-xlg-3 col-md-5">
                <div class="card">
                    <?php
                        include_once "../../../connection/connection.php"; 
                        $profile = "SELECT * from users WHERE user_id='".$_SESSION['auth_id']."'"; 
                        $result = $mysqli->query($profile); 
                        $row = $result->fetch_assoc(); 

                    ?>
                    <div class="card-body">
                        <center class="m-t-30"> <img src="../../assets/images/users/5.jpg" class="rounded-circle" width="150" />
                            <h4 class="card-title m-t-10"><?php echo $row['fullnames']; ?></h4>
                            <h6 class="card-subtitle text-uppercase"><?php echo $row['role']; ?></h6>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                            </div>
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6><?php echo $row['email']; ?></h6> <small class="text-muted p-t-30 db">Phone</small>
                        <h6>0<?php echo $row['phone_number']; ?></h6> <small class="text-muted p-t-30 db">Address</small>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-7 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <?php 
                            if(isset($_POST['update_profile'])):
                                $fullnames=$email=$password=$role=$phone=""; 
                                
                                $fullnames  = $_POST['fullname']; 
                                $password   = md5($_POST['password']); 
                                $phone      = $_POST['phone_no']; 

                                $update = "UPDATE users SET fullnames='".$_POST['fullname']."', password='".$_POST['password']."', phone_number='".$_POST['phone_no']."' WHERE user_id='".$_SESSION['auth_id']."' "; 

                                $result = $mysqli->query($update); 

                                if($result): 
                                    echo "Data updated successfully"; 
                                else: 
                                    echo "Error updating record". mysqli_error($mysqli);
                                endif; 
                            endif; 
                        ?>
                        <form class="form-horizontal form-material" action="pages-profile.php" method="post">
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="fullname" placeholder="Your full names" class="form-control form-control-line" value="<?php echo $row['fullnames']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="" class="form-control form-control-line" name="email" value="<?php echo $row['email']; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="text" name="phone_no" placeholder="+254" class="form-control form-control-line" value="<?php echo $row['phone_number']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" name="update_profile">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <?php include 'partials/footer.php'; ?>