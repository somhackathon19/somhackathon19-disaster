<?php
    require_once "dbConn.php";
    if(isset($_POST["id"])) {
        mysqli_query($dbConn, "UPDATE advertising SET click_count = click_count + 1 WHERE id = ".$_POST["id"]);
    }
    else {
        $sql = "SELECT image,id,url FROM advertising ORDER BY view_count ASC, click_count ASC, id ASC LIMIT 1";
        if ($result = mysqli_query($dbConn, $sql)) {
            $banner = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $sql = 'UPDATE advertising SET view_count = view_count + 1 WHERE id = '.$banner["id"];
            mysqli_query($dbConn, $sql);
            echo '<img id="img'.$banner["id"].'" lurl="'.$banner["url"].'" src="'.$banner["image"].'"/>';
        }
    }
    mysqli_close($dbConn);
?>