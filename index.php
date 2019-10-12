<?php 

session_start(); 

// Load header
require_once('header.php'); 
?>
    <section class="landing-form">
        <div class="container-fluid p-0">
            <div class="row no-gutters w-100 h-100">
            
                <!-- Add notification for user  -->
                <div class="user-notification">
                  
                </div>

                <!-- Start row with form and background image -->
                <div class="row no-gutters w-100 h-100">
                    <div class="col-md-7 p-0 bg-column">
                    <?php require('queries/register-login.php'); ?>
                        <!-- <img src="imgs/backgrounds/login-background.jpg" alt="" class="login-background"> -->
                    </div>

                    <div class="col-md-3 offset-1 d-flex align-items-center">
                        <div class="landing-form-form w-100">
                            <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a></li>
                                <li class="nav-item"><a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false">Sign Up</a></li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                    <form action="" autocomplete="off" >
                                    <input autocomplete="false" name="hidden" type="text" style="display:none;">
                                        <div class="form-group">
                                          <input autocomplete="off" type="email" name="user_email" id="" class="form-control" placeholder="email@example.com" aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                          <input type="password" name="user_password" id="" class="form-control" placeholder="Password" aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="login_button" class="btn">Login <i class="icon ion-ios-arrow-round-forward"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
                                    <form method="post" action="index.php" autocomplete="off" >
                                    <input autocomplete="false" name="hidden" type="text" style="display:none;">
                                        <div class="form-group">
                                          <input type="text" name="user_fullname" id="" class="form-control" placeholder="Full Names " aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                          <input type="email" name="user_email" id="" class="form-control" placeholder="email@example.com" aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                          <input type="password" name="user_password" id="" class="form-control" placeholder="Password" aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="signup_button" class="btn">Register <i class="icon ion-ios-unlock"></i> </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php 
// Load Footer 
require_once('footer.php'); 