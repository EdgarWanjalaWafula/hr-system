<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    
    // Load Composer's autoloader
    require 'vendor/autoload.php';

    if(isset($_POST['signup_button'])):

        // Include database connection 
        include('connection/connection.php'); 

        // Initialize variables
        $ufname = $uemail = $upassword = ""; 
    
        $ufname     = $_POST['user_fullname'];
        $uemail     = $_POST['user_email'];
        $upassword  = md5($_POST['user_password']);

        // Check if email exists 
        $check  = "SELECT * FROM users WHERE email = '$uemail' LIMIT 1"; 
        $result = $mysqli->query($check); 
        $email  = mysqli_fetch_assoc($result); 
        $email  = $email["email"]; 
        
        if($email):
            ?> 
                <!-- Show error message  -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <?php echo $uemail; ?> already exists.
                </div>
            <?php           
         else: 
            
            // Insert into database query 
            $register   = "INSERT INTO users (fullnames, email, password, created_at) VALUES ('". $ufname."', '". $uemail."', '". $upassword."', now())";
            
            if($mysqli->query($register) === true): 
                $firstname = ""; 
                $firstname = explode(" ", $ufname);
                $firstname[0]; 
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
                        $mail->setFrom('dancankimani70@gmail.com', 'Mailer');
                        $mail->addAddress('wafulawanjalaedgar@gmail.com', '');     // Add a recipient              // Name is optional
                        $mail->addReplyTo('dancankimani70@gmail.com', 'Information');
                        // $mail->addCC('cc@example.com');
                        // $mail->addBCC('bcc@example.com');

                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Here is the subject';
                        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        
                        // echo 'Message has been sent';
                    } catch (Exception $e) {
                        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
            else:
                echo "error '".$mysqli->connect_error."'";
            endif; 
        endif; 

        // $result->free(); 

    elseif(isset($_POST['login_button'])):

        // Include database connection 
        include('connection/connection.php');

        // Initialize variables
        $ufname = $uemail = $upassword = ""; 
        
        // Prevent SQL Injection 
        $uemail = stripslashes($uemail); 
        $upassword = stripslashes($upassword ); 

        $uemail     = $_POST['user_email'];
        $upassword  = md5($_POST['user_password']);
        
        // Select all users first with the provided condition
        $query = "SELECT * FROM users WHERE email = '".$uemail."' AND password = '".$upassword."' "; 
        $result = $mysqli->query($query); 
        $mysqli->close(); 
    endif; 