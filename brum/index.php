<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mou-te amb Mataro</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="icon" href="images/icono/favicon.ico" type="image/x-icon" />
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/script.js"></script>
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
                    <a href="index.php"><img src="images/logo-MouteAmbMataro.png" alt="Logo Mou-te amb Mataro" title="Logo Mou-te amb Mataro" />
                    </a>
                </div>
                <nav class="fl w80">
                    <ul>
                        <li><a class="menu" href="act/act.php">Actividades</a> </li>
                        <li><a class="menu" href="propuesta/propuesta.php">Propuestas</a> </li>
                        <?php
                            require_once "header.php";
                        ?>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <section class="m0a w100 oa">
                <div id="mapid"></div>
                <script>
                    //Create map
                    var mymap = L.map('mapid').setView([41.5409, 2.4333], 14);
                    //Create tile layer
                    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox.streets',
                        accessToken: 'pk.eyJ1IjoianVpc2RlIiwiYSI6ImNqcnd1cnNieTBmNjA0NG4xNXNwMzc3bW4ifQ.urxjLoCN_fuZ_JeKwV8W2A'
                    }).addTo(mymap);
                    //Inizializate popup
                    var popup = L.popup();
                    //Onclick event on map
                    mymap.on('click', function onMapClick(e) {
                        popup
                            //Popup with coords 
                            .setLatLng(e.latlng)
                            .setContent("Copia las siguientes cordenadas y entra en este <a href='activity/activity.php'>Enlace</a> " + e.latlng.toString().substring(7, e.latlng.toString().length - 1))
                            .openOn(mymap);
                        // Allow to knows coordenates.
                        console.log(e.latlng.toString().substring(7, e.latlng.toString().length - 1));
                    });
                    //Set market
                    var marker = L.marker([41.53955, 2.443256]).addTo(mymap);
                    //Bind popup to marker
                    marker.bindPopup("Paseo con mascotas clica en el sigiente <a href='act/act.php'>Enlace</a> para accedr a los eventos");

                </script>
            </section>
            <section>
                <table>
                    <tr>
                        <td>Explorar:
                            <input type="text" id="search" name="search" placeholder="" />
                        </td>
                        <!--
                        <td>
                            <form action="/action_page.php">
                                <select id="activities" name="Activities">
                                <option value="ocio">Ocio</option>
                                <option value="salud">Salud</option>
                                <option value="cultural">Cultural</option>
                                <option value="formacion">Formación</option>
                                <option value="mejora-urbana">Mejoras Urbanas</option>
                                <option value="salud">Salud</option>
                            </select>
                            </form>
                        </td>-->
                    </tr>
                </table>
            </section>
            <section id="activities">
                <h2></h2>
                <p></p>
            </section>
            <aside id="banner">
                <?php
                    require_once "bannerModule.php";
                ?>
            </aside>
        </main>
        <footer>
            <div class="container">
                <div id="logo2" class="fl">
                    <a href="index.php"><img src="images/logo-MouteAmbMataro.png" alt="Logo Mou-te amb Mataro" title="Logo Mou-te amb Mataro" />
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
