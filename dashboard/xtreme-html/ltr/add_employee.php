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
            <div class="col-md-6">
                <h4 class="page-title">New</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Employee</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-md-6">
                <?php 
                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;
                    
                    require '../../../vendor/phpmailer/phpmailer/src/Exception.php';
                    require '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
                    require '../../../vendor/phpmailer/phpmailer/src/SMTP.php';
                    
                    // Load Composer's autoloader
                    require '../../../vendor/autoload.php';
                
                    // Include database connection 
                    include_once('../../../connection/connection.php');
                
                    if(isset($_POST['add_user_button'])): 
                
                        // Initialize variables
                        $profilepicture=$ufname = $uemail = $upassword = $role=$phoneno=""; 

                        $ufname         = $_POST['user_fullname'];
                        $uemail         = $_POST['user_email'];
                        $uphone         = $_POST['user_phone'];
                        $urole          = $_POST['user_role'];
                        $upassword      = md5($_POST['user_password']);
                
                        // Check if email exists 
                        $check  = "SELECT * FROM users WHERE email = '$uemail' LIMIT 1"; 
                        $result = $mysqli->query($check); 
                        $email  = mysqli_fetch_assoc($result); 
                        $email  = $email["email"]; 
                        
                        if($email):
                            ?> 
                                <!-- Show error message  -->
                                <div class="alert alert-danger m-0 alert-dismissible fade show rounded-0 border-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    Hi, this email <?php echo $uemail; ?> already exists.
                                </div>
                            <?php           
                         else: 
                            
                        // Insert into database query 
                        $register   = "INSERT INTO users (fullnames, email, phone_number, role, password, created_at) VALUES ('". $ufname."', '". $uemail."', '". $uphone."', '". $urole."', '". $upassword."', now())";
                        
                        if($mysqli->query($register) === true): 
                            $firstname = ""; 
                            $firstname = explode(" ", $ufname);
                            $firstname[0]; 

                            echo  $profilepicture; 
                            ?> 
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Congratulations <?php echo $firstname[0]; ?>, you have successfully registered
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php       
            
                                // Instantiation and passing `true` enables exceptions
                                $mail = new PHPMailer();
            
                                try {
                                    //Server settings
                                    $mail->SMTPDebug    = 0;     
                                    $mail->Debugoutput  = 'html';                 // Enable verbose debug output
                                    $mail->isSMTP();                                            // Send using SMTP
                                    $mail->Host         = 'smtp.gmail.com'; 
                                    $mail->SMTPSecure   = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                                    $mail->Port         = 25;                     // Set the SMTP server to send through
                                    $mail->SMTPAuth     = true;                                   // Enable SMTP authentication
                                    $mail->Username     = 'wafulawanjalaedgar@gmail.com';                     // SMTP username
                                    $mail->Password     = 'Makaveli61549';                                      // SMTP password                                  // TCP port to connect to
            
                                    //Recipients
                                    $mail->setFrom('registration@318studios.com', '318 Studios');
                                    $mail->addAddress($uemail , $ufname);     // Add a recipient              // Name is optional
                                    $mail->addReplyTo('dancankimani70@gmail.com', 'Information');
                                    // $mail->addCC('cc@example.com');
                                    // $mail->addBCC('bcc@example.com');
            
                                    // Content
                                    $mail->isHTML(true);                                  // Set email format to HTML
                                    $mail->Subject = 'New User Registration';
                                    $mail->Body    = 'Hi, '. $firstname[0].', <br><br> You have successfully created your account with us. <br><br>Thank you.';
                                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                                    $mail->send();
                                    
                                    // echo 'Message has been sent';
                                } catch (Exception $e) {
                                    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                }
                        else:
                            echo $mysqli->connect_error;
                        endif; 
                    endif; 
                    endif; 
                ?>
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
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-30 text-center"> <img src="../../assets/images/users/5.jpg" class="rounded-circle" width="150" />
                            <div class="form-group text-center">
                              <input type="file" class="form-control-file" name="profile_img" id="" placeholder="" aria-describedby="fileHelpId">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="add_employee.php" method="post">
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text"  name="user_fullname" placeholder="Johnathan Doe" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email"  name="user_email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="user_password"  value="password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="number"  name="user_phone" placeholder="123 456 7890" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Role</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="user_role">
                                        <option value="employee">Employee</option>
                                        <option value="intern">Intern</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" name="add_user_button">Add User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <?php include 'partials/footer.php'; ?>