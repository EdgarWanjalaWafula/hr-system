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
                ?> 
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Congratulations <?php echo $ufname; ?>, you have successfully registered
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php       

                    // Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug    = 4;     
                        $mail->Debugoutput  = 'html';                 // Enable verbose debug output
                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host         = 'smtp.gmail.com'; 
                        $mail->SMTPSecure   = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                        $mail->Port         = 587;                     // Set the SMTP server to send through
                        $mail->SMTPAuth     = true;                                   // Enable SMTP authentication
                        $mail->Username     = 'wafulawanjalaedgar@gmail.com';                     // SMTP username
                        $mail->Password     = 'Makaveli61549';                               // SMTP password                                  // TCP port to connect to

                        //Recipients
                        $mail->setFrom('from@example.com', 'Mailer');
                        $mail->addAddress('wafulawanjalaedgar@gmail.com', '');     // Add a recipient              // Name is optional
                        $mail->addReplyTo('info@example.com', 'Information');
                        $mail->addCC('cc@example.com');
                        $mail->addBCC('bcc@example.com');

                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Here is the subject';
                        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
            else:
                echo "error '".$mysqli->connect_error."'";
            endif; 
        endif; 
    endif;