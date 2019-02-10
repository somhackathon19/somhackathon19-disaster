<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mou'te amb Mataro</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../style/style.css" />
    <link rel="icon" href="../images/icono/favicon.ico" type="image/x-icon" />
    <script src="../javascript/jquery.min.js"></script>
    <script src="../javascript/script.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
    <style>
        #mapid {
            height: 400px;
        }

    </style>
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
                        <li><a class="menu" href="../activities/activities.php">Actividades</a> </li>
                        <li><a class="menu" href="../propuesta/propuesta.php">Propuestas</a> </li>
                        <?php
                            require_once "../header.php";
                        ?>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <section class="m0a w100 oa">
                <div class="conf">
                    <h2>Creacion Evento</h2>
                    <table>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Asunto</label>
                                        <input type="text" name="asunto" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Localización en coordenadas</label>
                                        <input type="text" name="coord" class="form-control" value="" required>
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
                                        <label>Descripción</label>
                                        <textarea rows="8" cols="60">Una breve descripción de la propuesta de la actividad que se quiere hacer.</textarea>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="form-group w30">
                                        <label>Fecha</label>
                                        <input type="date" name="date" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Horario</label>
                                        <input type="time" name="time" class="form-control" value="" required autofocus>
                                        <span class="help-block"></span>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Minimo de personas</label>
                                        <input type="text" name="email" class="form-control" value="" required>
                                        <span class="help-block"></span>
                                        <input type="submit">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
            <section>
                <?php
                    require_once "../bannerModule.php";
                ?>
            </section>
        </main>
        <footer>
            <div class="container">
                <div id="logo2" class="fl">
                    <a href="../index.php"><img src="../images/logo-MouteAmbMataro.png" alt="Logo Mou-te amb Mataro" title="Logo Mou-te amb Mataro" />
                    </a>
                </div>
                <div class="footer fr r">
                    <h4>© 2019 Inc. All Rights Reserved.</h4>
                    <ul>
                        <li>Mou-te amb Mataro</li>
                        <li>Mataro, Barcelona.</li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

</body>