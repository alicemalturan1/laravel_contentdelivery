<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profilim</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicons/android-chrome-512x512.png">
    <link rel="icon" type="image/png" href="/assets/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicons/favicon.ico">
</head>

<body class="transition-none">
<div class="search-section">
    <div class="wrap">
        <div class="wrap_float">
            <div class="search-form">
                <input type="text" class="search-input" placeholder="Search…">
                <button class="search-submit"></button>
            </div>
            <div class="search-close" id="search-close"></div>
        </div>
    </div>
</div>
<div class="container page">
    <div class="container-wrap">


        <div class="page-wrap profile-page">
            <div class="page-wrap-content">

                    <h3 class="page-title" style="text-align: center;">Erişim Şifresi Gerekli</h3>
                    <form action="/accessdemo" method="post">
                        @csrf
                        @if($errors->any())
                            <h5 style="text-align: center;color:#f8685d;">{{$errors->first()}}</h5>
                            @endif
                        <div class="profile-settings-data">

                            <div class="fields" style="padding: 10%;">
                                <div class="input-wrap white-label name-field fullwidth" >
                                    <input type="text" name="password" class="input" placeholder="Şifre*" >
                                </div>

                            </div>

                        </div>
                        <div style="width: 100%;display: flex;justify-content: center;">
                            <button class="btn" type="submit">
                                <span>Erişim</span>
                            </button>
                        </div>

                    </form>


            </div>
        </div>

        <div class="overlay" id="overlay"></div>
    </div>
</div>


<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/checkmode.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/jquery.arcticmodal.min.js"></script>
<script src="/assets/js/lightgallery.js"></script>
<script src="/assets/js/jquery.mousewheel.min.js"></script>
<script src="/assets/js/device.min.js"></script>
<script src="/assets/js/jquery.placeholder.label.js"></script>
<script src="/assets/js/jquery-ui.min.js"></script>
<script src="/assets/js/scripts.js"></script>
</body>

</html>
