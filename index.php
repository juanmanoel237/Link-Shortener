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
            <div class="data">
                <li><a href="#">example.com/xyz123</a></li>
                <li>www.google.com</li>
                <li>15</li>
                <li><a href="#">Delete</a></li>
            </div>
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