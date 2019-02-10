<?php
    // Initialize the session
    session_start();
    //If user is not logged in redirect to login page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
       //Process form data when is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            //Start database connection
            require_once "../dbConn.php";
            // Set parameters
            $param_asunto = $_POST["asunto"];    
            $param_coord = $_POST["coord"];
            $param_description = $_POST["descripcion"];
            $param_schedule = $_POST["date"];
            $param_time = $_POST["time"];
            $param_minPersons = $_POST["min-persons"];
            $param_maxPersos = $_POST["max-persons"];
            $param_status = "propuesta";
            //Define SQL query
            $sql = "INSERT INTO activities(name,coord,description,schedule,time,min_persons,max_persons,status) VALUES ('".$param_asunto."','".$param_coord."','".$param_description."','".$param_schedule."','".$param_time."',".$param_minPersons.",".$param_maxPersos.",'".$param_status."')";
            // Attempt to execute the prepared statement
              /*  if(*/mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));/*){   
                echo '<script language="javascript">';
                echo 'alert("Propuesta creade")';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("Error al crear la propuesta")';
                echo '</script>';
            }*/
        }
    } else {header('Location: http://localhost/brum/index.php'); exit();}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Propuestas</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../style/style.css" />
    <link rel="icon" href="../images/icono/favicon.ico" type="image/x-icon" />
    <script src="../javascript/jquery.min.js"></script>
    <script src="../javascript/script.js"></script>
</head>

<body>
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
                        <li><a class="menu" href="./propuesta.php">Propuestas</a> </li>
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
                    <h2>Propuesta</h2>
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Asunto</label>
                                        <input type="text" name="asunto" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Localización en coordenadas</label>
                                        <input type="text" name="coord" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                    </div>
                                </td>
                            </tr>>
                            <tr>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea name="descripcion" rows="8" cols="60">Una breve descripción de la propuesta de la actividad que se quiere hacer.</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group w30">
                                        <label>Fecha</label>
                                        <input type="date" name="date" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Horario</label>
                                        <input type="time" name="time" class="form-control" value="" required autofocus>
                                        <span class="help-block"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Minimo de personas</label>
                                        <input type="text" name="min-persons" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Máximo de personas</label>
                                        <input type="text" name="max-persons" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="submit" name="enviar" class="form-control" value="Enviar" required>
                                        <span class="help-block"></span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
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
</html>