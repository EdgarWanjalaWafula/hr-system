<?php 

// Load header
require_once('header.php'); 
?>
    <section class="landing-form">
        <div class="container-fluid p-0">
            <div class="row no-gutters w-100 h-100">
                <div class="row no-gutters w-100 h-100">
                    <div class="col-md-6 p-0">
                        <img src="imgs/backgrounds/login-background.jpg" alt="" class="login-background">
                    </div>
                    <div class="col-md-5 d-flex align-items-center">
                        <div class="landing-form-form w-100">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a></li>
                                <li class="nav-item"><a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false">Sign Up</a></li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                    <form action="">
                                        <div class="form-group">
                                          <input type="email" name="user_email" id="" class="form-control" placeholder="email@example.com" aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                          <input type="password" name="user_password" id="" class="form-control" placeholder="Password" aria-describedby="helpId">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="login_button" class="btn">Login <ion-icon name="arrow-round-forward"></ion-icon> </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">...</div>
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