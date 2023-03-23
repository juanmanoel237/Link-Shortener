<?php
include "config.php";
//let's get the value which are sending from js ajax
$full_url = mysqli_real_escape_string($connex, $_POST['full-url']);

//SI full url box n'est pas vide et l'utilisateur a rentré un url valid
if (!empty($full_url) && filter_var($full_url, FILTER_VALIDATE_URL)) {

    $ran_url = substr(md5(microtime()), rand(0, 26), 5); //génère un URL au hasard avec 5 caratères

    //Vérifier si un random url existe déja dans la base de données
    $sql = mysqli_query($connex, "SELECT shorten_url FROM url WHERE shorten_url = {$ran_url}");
    if (mysqli_num_rows($sql) > 0) {
        echo "Something went wrong. Please regenerate url again!";
    } else {
        //On insere l'url de l'utilisateur dans notre table short url
        $sql2 = mysqli_query($connex, "INSERT INTO url (shorten_url, full_url, clicks)
        VALUES ('{$ran_url}', '{$full_url}', '0')");
        //Si les données ont été insérées Correctement
        if ($sql2) {

            //On selectionne le lien court recemment inséré
            $sql3 = mysqli_query($connex, "SELECT shorten_url FROM url WHERE shorten_url = {$ran_url}");
            if (mysqli_num_rows($sql) > 0) {
                $shorten_url = mysqli_fetch_assoc($sql3);
                echo $shorten_url['shorten_url'];
            }
        } else {
            echo "Something wrong, please try again.";
        }
    }
} else {
    echo "$full_url - This is not a valid URL!";
}
