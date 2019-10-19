<?php 
session_start();  
// Load header
include 'header.php'; 
?>
    <section class="landing-form">
        <div class="container">
            <div class="row w-100 h-100">
        
                <!-- Add notification for user  -->
                <div class="user-notification">
                    <?php 
                        // Include database connection 
                        include('connection/connection.php');
                        // Initialize variables
                        $ufname = $uemail = $upassword = ""; 
                        // Check if login form is submitted
                        if(isset($_POST['login_button'])):
                            $uemail     = $_POST['user_email'];
                            $upassword  = md5($_POST['user_password']);
                            // Select all users first with the provided condition
                            $query = "SELECT * FROM users WHERE email = '".$uemail."' AND password = '".$upassword."'"; 

                            $result = $mysqli->query($query); 

                            if($result->num_rows > 0){
                                session_start(); 
                                $row = $result->fetch_assoc();
                                $_SESSION['auth']= true; 
                                $_SESSION['auth_id']= $row['user_id']; 
                                header("Location: dashboard/xtreme-html/ltr/pages-profile.php");
                            } else 
                            // $result = mysqli_query($mysqli,$query) or die(mysql_error());
                            // $rows = mysqli_num_rows($result);
                            // var_dump($rows); 
                            // if($rows==1){
                            //     session_start(); 
                            //     $_SESSION['auth']= true; 
                            //     $_SESSION['username'] = $uemail; 
                            //     header("Location: dashboard/xtreme-html/ltr/pages-profile.php");
                            // } else {
                            //     echo "username wrong"; 
                                                                 
                            // }
                            $mysqli->close(); 
                        endif; 
                    ?>
                </div>

                <!-- Start row with form and background image -->
                <div class="row no-gutters w-100 h-100">
                    <div class="col-md-8 p-0 bg-column"></div>

                    <div class="col-md-4 d-flex align-items-center">
                        <div class="frm">
                            
                        <div class="landing-form-form w-100">
                            <h4 class="text-right">Login Portal</h4>
                          
                            <form method="post" action="index.php" autocomplete="off">
                                <input autocomplete="false" name="hidden" type="text" style="display:none;">
                                <div class="form-group">
                                    <input autocomplete="off" type="email" name="user_email" id="" class="form-control" placeholder="email@example.com" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="user_password" id="" class="form-control" placeholder="Password" aria-describedby="helpId">
                                </div>
                                <div class="form-group m-0">
                                    <button type="submit" name="login_button" class="btn">Login <i class="icon ion-ios-arrow-round-forward"></i></button>
                                </div>
&nbsp; 
                                <div class="form-check d-flex align-items-center small">
                                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                    Lorem Ipsum is simply dummy text
                                </div>
                            </form>
                        </div>
&nbsp; 
                        <p class="small m-0 text-white">Lorem Ipsum is simply dummy text of thery's standard dummy text ever since the 1500s</p>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </section>
<?php 
// Load Footer 
require_once('footer.php'); 