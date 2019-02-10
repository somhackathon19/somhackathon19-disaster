<?php
// Include db connection file
require_once "../../dbConn.php";
 
// Define variables and initialize with empty values
$dni = $password = $username = $email = $name = $confirm_password = $dni_err = $username_err = $email_err = $name_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate dni
    if(empty(trim($_POST["dni"]))){
        $dni_err = "Please enter a DNI.";
    } else{
        // Prepare a select statement
        $sql = "SELECT dni FROM users WHERE dni = ?";
        
        if($stmt = mysqli_prepare($dbConn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_dni);
            
            // Set parameters
            $param_dni = trim($_POST["dni"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $dni_err = "This DNI is already taken.";
                } else{
                    $dni = trim($_POST["dni"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";     
    } else{
        $username = trim($_POST["username"]);
    }

    //Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";     
    } else{
        $name = trim($_POST["name"]);
    }

    //Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a valid email.";     
    } else{
        $email = trim($_POST["email"]);
    }

    // Check input errors before inserting in database
    if(empty($dni_err) && empty($username_err) && empty($email_err) && empty($name_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (dni, username, email, password, name) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($dbConn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_dni, $param_username, $param_email, $param_password, $param_name);
            
            // Set parameters
            $param_dni = $dni;
            $param_username = $username;
            $param_email = $email;
            $param_password = hash('sha512', $password);
            $param_name = $name;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../login/index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="../css/login_register.css" />
    <link rel="icon" href="images/icono/favicon.ico" type="image/x-icon" />
</head>

<body>
    <div id=uno>
        <div class="wrapper">
            <h2>Registro</h2>
            <p>Rellena el siguiente formulario para poder regitrarte.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                    <label>Nombre</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                    <span class="help-block"><?php echo $name_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Usuario:</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Contraseña:</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirmar contraseña:</label>
                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($dni_err)) ? 'has-error' : ''; ?>">
                    <label>DNI/NIE/Identificación:</label>
                    <input type="text" name="dni" class="form-control" value="<?php echo $dni; ?>">
                    <span class="help-block"><?php echo $dni_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <label>Correo:</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
                <p>Ir a la Página Principal <a href="../../index.php">Mou-te amb Mataro</a>.</p>
            </form>
        </div>
    </div>
</body>

</html>
