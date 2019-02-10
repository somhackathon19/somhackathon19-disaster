<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Actividades</title>
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
                        <li><a class="menu" href="./act.php">Actividades</a> </li>
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
                <div class="act">
                    <h3>Actividades</h3>
                </div>
                <div class="container">
                    <div id="act1" class="w100 oa">
                        <table>
                            <tr>
                                <td>Nombre</td>
                                <td>Paseo Perros</td>
                            </tr>
                        </table>
                        
                        

                    </div>
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
