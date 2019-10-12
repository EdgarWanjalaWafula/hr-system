<?php 
    if(isset($_POST['signup_button'])):

        // Include database connection 
        include('connection/connection.php'); 

        // Initialize variables
        $ufname = $uemail = $upassword = ""; 
    
        $ufname     = $_POST['user_fullname'];
        $uemail     = $_POST['user_email'];
        $upassword  = $_POST['user_password'];

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
             else:
                echo "error '".$mysqli->connect_error."'";
             endif; 
        endif; 
    endif;