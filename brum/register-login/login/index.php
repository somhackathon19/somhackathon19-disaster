<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../../index.php");
    exit;
}
 
// Include database connection file
require_once "../../dbConn.php";
 
// Define variables and initialize with empty values
$dni = $password = $dni_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if dni is empty
    if(empty(trim($_POST["dni"]))){
        $dni_err = "Please enter your DNI.";
    } else{
        $dni = trim($_POST["dni"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($dni_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT dni, username, email, password, name, points, access_level FROM users WHERE dni = ?";
        
        if($stmt = mysqli_prepare($dbConn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_dni);
            
            // Set parameters
            $param_dni = $dni;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $dni, $username, $email, $hashed_password, $name, $points, $access);
                    if(mysqli_stmt_fetch($stmt)){
                        if(hash('sha512', $password) == $hashed_password){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["dni"] = $dni;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;
                            $_SESSION["pasword"] = $password;
                            $_SESSION["name"] = $name;                       
                            $_SESSION["points"] = $points;
                            $_SESSION["access"] = $access;

                            // Redirect user to welcome page
                            header("location: ../../index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $dni = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
    }
    
    // Close connection
    mysqli_close($dbConn);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="../css/login_register.css" />
    <link rel="icon" href="images/icono/favicon.ico" type="image/x-icon" />
</head>

<body>
    <div id=dos>
        <div class="wrapper">
            <h2>Iniciar sesión</h2>
            <p>Rellena el siguiente formulario para poder iniciar sesión.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($dni_err)) ? 'has-error' : ''; ?>">
                    <label>DNI</label>
                    <input type="text" name="dni" class="form-control" value="<?php echo $dni; ?>">
                    <span class="help-block"><?php echo $dni_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="reset" class="btn btn-default" value="Reset">
                </div>
                <p>¿No tienes cuenta? <a href="../register/index.php">Registrate aquí</a>.</p>
            </form>
        </div>    
    </div>
</body>

</html>
