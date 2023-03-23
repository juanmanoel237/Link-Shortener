<!-- Redirigeons l'utilisateur vers le lien original en utilisant le lien raccourci -->
<?php
include "php/config.php";
if (isset($_GET['u'])) {
    $u = mysqli_real_escape_string($connex, $_GET['u']);

    //Récupérer l'URL complete de l'URL courte que nous obtenons de l'URL
    $sql = mysqli_query($connex, "SELECT full_url FROM url WHERE shorten_url = '{$u}'");
    if (mysqli_num_rows($sql) > 0) {
        //Redirigeons l'utilisateur
        $full_url = mysqli_fetch_assoc($sql);
        header("Location:" . $full_url['full_url']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Raccourcisseur de lien</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" />
</head>

<body>
    <div class="wrapper">
        <form action="#">
            <i class="url-icon uil uil-link"></i>
            <input type="text" name="full-url" placeholder="Enter or paste a long URL" required />
            <button>Shorten</button>
        </form>
        <?php
        $sql2 = mysqli_query($connex, "SELECT * FROM url ORDER BY id DESC");
        if (mysqli_num_rows($sql2) > 0) {
        ?>
        <div class="count">
            <span>Total Links: <span>10</span> & Total Clicks: <span>140</span></span>
            <a href="#">Clear All</a>
        </div>
        <div class="urls-area">

            <div class="title">
                <li>Shorten URL</li>
                <li>Original URL</li>
                <li>Clicks</li>
                <li>Action</li>
            </div>
            <?php
            while ($row = mysqli_fetch_assoc($sql2)) {
            ?>
            <div class="data">
                <li><a href="#"><?php echo $row['shorten_url'] ?></a></li>
                <li><?php echo $row['full_url'] ?></li>
                <li><?php echo $row['clicks'] ?></li>
                <li><a href="#">Delete</a></li>
            </div>
            <?php
            }
        }
        ?>
        </div>



    </div>


    <div class="blur-effect"></div>
    <div class="popup-box">
        <div class="info-box">
            Your short link is ready. You can also edit your short link now but
            can't edit once saved.
            <form action="#">
                <label>Edit your shorten link</label>
                <input type="text" spellcheck="false" value="example.com/xyz75" />
                <i class="copy-icon uil uil-copy-alt"></i>
                <button>Save</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>