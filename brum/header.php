<?php 
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    echo '<li class="fr">
            <a class="menu" href="http://localhost/brum/config/config.php">Configuración</a>
            <a href="http://localhost/brum/logout.php">Cerrar sesión</a>
    </li>
    <li class="fr">
            <p id="name-user">'; echo $_SESSION["username"]; echo '</p>
    </li>';
}
else {
    echo '<li class="fr"><a class="menu" href="http://localhost/brum/register-login/login/index.php">Iniciar Sesión</a> </li>
    <li class="fr"><a class="menu" href="http://localhost/brum/register-login/register/index.php">Registro</a> </li>
    <li class="fr">
        <p id="name-user">Usuario Invitado</p>
    </li>';
}
?>