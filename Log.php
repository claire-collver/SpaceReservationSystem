

<?php
    // Initialize the session
    session_start();
    
    error_reporting(E_ERROR | E_PARSE);
    // Include config file
    require_once "Configur.php";
    
    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }
        
        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // Validate credentials
        if(empty($username_err) && empty($password_err)){
            
            // Prepare a select statement
            $sql = "SELECT email, password FROM Logins WHERE email = ? AND password= ?";
            
            if($stmt = mysqli_prepare($con, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $username,$password);
                
                // Set parameters
                $param_username = $username;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        echo "Hi";
                        // Bind result variables
                        
                        // Password is correct, so start a new session
                        session_start();
                        
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["username"] = $username;
                        
                        // Redirect user to welcome page
                        header("location: index.php");
                    }else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        
        // Close connection
        mysqli_close($con);
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
body{ font: 14px sans-serif; }
.wrapper{ width: 100%; padding: 20px; }
img {
position: absolute;
top: 80%;
left: 50%;
width:100%;
transform: translateX(-50%) translateY(-50%);
    max-width: 100%;
    max-height: 100%;
}
</style>
</head>
<?php
    $username = $password = "";
    $username_err = $password_err = "";
    ?>
<body>
<div class="wrapper">
<h2>Login</h2>
<p>Please fill in your credentials to login.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
<label>Username</label>
<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
<span class="help-block"><?php echo $username_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
<label>Password</label>
<input type="password" name="password" class="form-control">
<span class="help-block"><?php echo $password_err; ?></span>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Login">
</div>

</form>
</div>
<div>
<img src="davidson.jpg">
</div>
</body>
</html>

