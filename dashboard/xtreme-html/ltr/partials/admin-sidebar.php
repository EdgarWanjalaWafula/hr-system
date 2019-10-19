<?php 

?>                
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic"><img src="../../assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu m-l-10">
                            <?php 
                                include_once "../../../connection/connection.php"; 

                                // Query 
                                $fetchdetails = "SELECT * FROM users WHERE  user_id='".$_SESSION['auth_id']."'"; 

                                $result = $mysqli->query($fetchdetails); 

                                $row = $result->fetch_assoc(); 
                                    ?>
                                        <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php 
                                            $name = ""; 
                                            $name = $row['fullnames']; 
                                            $firstname = explode(" ", $name); 
                                        ?>
                                        <h5 class="m-b-0 user-name font-medium"><?php echo $firstname[0]; ?> <i class="fa fa-angle-down float-right"></i></h5>
                                            <span class="op-5 user-email"><?php echo $row['email']; ?></span>
                                        </a>
                                <?php                                 
                                // $mysqli->close(); 
                            ?>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                              
                                              <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                      
                              
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <?php 
                    $user_role = ""; 
                    $user_role = $row['role'];

                    // echo $user_role; 

                    if($user_role == "employee"): 
                        ?>
                            <li class="p-15 m-t-10"><a href="add_employee.php" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Create New</span> </a></li>
                            <!-- User Profile-->
                            <li class="sidebar-item"> <a href="pages-profile.php" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-profile.php" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Profile</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="table-basic.html" aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu">Table</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="icon-material.html" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Icon</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="starter-kit.html" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Blank</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="error-404.html" aria-expanded="false"><i class="mdi mdi-alert-outline"></i><span class="hide-menu">404</span></a></li>
                        <?php 
                    endif; 
                ?>
            </ul>
            
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>