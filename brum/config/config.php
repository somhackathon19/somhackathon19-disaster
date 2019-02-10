<!DOCTYPE html>
<html>

<head>
    <title>Configuración</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../style/style.css" />
    <link rel="icon" href="../images/icono/favicon.ico" type="image/x-icon" />
    <script src="../javascript/jquery.min.js"></script>
    <script src="../javascript/script.js"></script>
</head>

<body>
<?php
        session_start();
        if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){exit;}
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                require_once "../dbConn.php";
                switch($_POST["petition"]) {
                    case "updateUsername":
                        $sql = "UPDATE users SET username = '".$_POST["username"]."' WHERE dni = '".$_SESSION["dni"]."'";
                        mysqli_query($dbConn, $sql);
                        break;
                    case "updatePasswd":
                        if(($_POST["aPassword"] == $_SESSION["pasword"]) && ($_POST["nPassword"] == $_POST["rPassword"])) {
                            $sql = "UPDATE users SET password = '".hash('sha512', $_POST["nPassword"])."' WHERE dni = '".$_SESSION["dni"]."'";
                            mysqli_query($dbConn, $sql);
                        }
                        break;
                    case "updateName":
                        $sql = "UPDATE users SET name = '".$_POST["name"]."' WHERE dni = '".$_SESSION["dni"]."'";
                        mysqli_query($dbConn, $sql);
                        break; 
                    case "updateEmail":
                        $sql = "UPDATE users SET email = '".$_POST["email"]."' WHERE dni = '".$_SESSION["dni"]."'";
                        mysqli_query($dbConn, $sql);
                        break;
                }
            }     
        }
    ?>
    <div id="contain">
        <header class="w100">
            <div class="container">
                <div id="logo" class="fl">
                    <a href="../index.php"><img src="../images/logo-MouteAmbMataro.png" alt="Logo Mou-te amb Mataro" title="Logo Mou-te amb Mataro" />
                    </a>
                </div>
                <nav class="fl w80">
                    <ul>
                        <li><a class="menu" href="../act/act.php">Actividades</a> </li>
                        <li><a class="menu" href="../propuesta/propuesta.php">Propuestas</a> </li>
                        <?php
                            require_once "../header.php";
                        ?>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="sub">
            <section class="m0a w100 oa">
                <div class="conf">
                    <h2>Configuración</h2>
                    <table>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Antigua Contraseña</label>
                                        <input type="password" name="username" class="form-control" value="" required autofocus>
                                        <span class="help-block"></span>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Nueva Contraseña</label>
                                        <input type="password" name="password" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                    </div>
                                </form>
                            </td>
                        </tr>>
                        <tr>
                        </tr>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Confirmar contraseña</label>
                                        <input type="password" name="confirm_password" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                        <input type="hidden" name="petition" value="updatePasswd" />
                                        <input type="submit" value="Actualizar">
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Nombre Usuario</label>
                                        <input type="text" name="name" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                        <input type="hidden" name="petition" value="updateName" />
                                        <input type="submit" value="Actualizar">
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Nuevo Nombre de Usuario</label>
                                        <input type="text" name="username" class="form-control" value="" required autofocus>
                                        <span class="help-block"></span>
                                        <input type="hidden" name="petition" value="updateUsername" />
                                        <input type="submit" value="Actualizar">
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Nuevo Correo</label>
                                        <input type="text" name="email" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                        <input type="hidden" name="petition" value="updateEmail" />
                                        <input type="submit" value="Actualizar">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
            <aside id="banner">
                <?php
                    require_once "../bannerModule.php";
                ?>
            </aside>
        </main>
        <footer>
            <div class="container">
                <div id="logo2" class="fl">
                    <a href="../index.php"><img src="../images/logo-MouteAmbMataro.png" alt="Logo Mou-te amb Mataro" title="Logo Mou-te amb Mataro" />
                    </a>
                </div>
                <div class="footer fr r">
                    <h4>OpenSource 2019</h4>
                    <ul>
                        <li>Mou-te amb Mataro</li>
                        <li>Mataro, Barcelona.</li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

</body>
