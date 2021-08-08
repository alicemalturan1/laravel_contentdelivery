<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile Page | Uipaper</title>
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
      @include('section.header')

        <div class="page-wrap profile-page">
            <div class="page-wrap-content">
                <div class="breadcrumbs">
                    <div class="wrap wrap-center">
                        <div class="wrap_float">
                            <a href="/">Anasayfa</a> / <a href="#">Diğer</a> / <span class="current">Profil</span>
                        </div>
                    </div>
                </div>
                <div class="profile-section">
                    <div class="wrap wrap-center">
                        <div class="wrap_float">
                            <h1 class="page-title">Profilim</h1>
                            <div class="profile-settings">
                                <div class="profile-settings-userpic">
                                    <div class="author-image">
                                        <img src="/assets/img/author.jpg" alt="" class="image-cover">
                                    </div>
                                    <div class="select-file">
                                        <input type="file" class="input-file" id="profile-userpic">
                                        <label for="profile-userpic" class="file-label"><span>Avatarımı Değiştir</span></label>
                                    </div>
                                </div>
                                <div class="profile-settings-data">
                                    <div class="fields">
                                        <div class="input-wrap white-label name-field">
                                            <input type="text" name="name" class="input" placeholder="Adım*" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                        </div>
                                        <div class="input-wrap white-label name-field">
                                            <input type="text" name="surname" class="input" placeholder="Soyadım*" value="{{\Illuminate\Support\Facades\Auth::user()->surname}}">
                                        </div>
                                        <div class="input-wrap white-label name-field">
                                            <input type="text"  class="input" placeholder="Api Key" disabled value="{{\Illuminate\Support\Facades\Auth::user()->api_key}}">
                                        </div>
                                        <div class="input-wrap white-label name-field">
                                            <input type="text" class="input" placeholder="Api Secret" disabled value="{{\Illuminate\Support\Facades\Auth::user()->api_secret}}">
                                        </div>
                                        <div class="input-wrap white-label email-field fullwidth">
                                            <input type="email"  name="email" class="input" placeholder="Email*" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                        </div>
                                        <div class="input-wrap white-label name-field">
                                            <input type="text" class="input" name="twitter" placeholder="Twitter Link"  value="{{\Illuminate\Support\Facades\Auth::user()->twitter_link}}">
                                        </div>
                                        <div class="input-wrap white-label name-field">
                                            <input type="text"  name="facebook"  class="input" placeholder="Facebook Link"  value="{{\Illuminate\Support\Facades\Auth::user()->facebook_link}}">
                                        </div>
                                        <div class="input-wrap white-label name-field fullwidth">
                                            <input type="text" class="input" name="instagram" placeholder="İnstagram Lİnk"  value="{{\Illuminate\Support\Facades\Auth::user()->instagram_link}}">
                                        </div>
                                        <div class="input-wrap white-label email-field fullwidth">
                                            <textarea name="about" class="input" placeholder="Hakkımda" style="padding-top:10px;resize: none;height: auto;"   cols="30" rows="10">{{\Illuminate\Support\Facades\Auth::user()->about}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn ">
                                    <span>Profilimi Kaydet</span>
                                </button>
                                <form class="change_pw-form">
                                    <div class="profile-settings-data" style="margin-top:130px;">
                                        <h2 class="page-title">Parolamı Değiştir</h2>
                                        <div class="fields" >
                                            <div class="input-wrap white-label password-field fullwidth">
                                                <input type="password" name="current_pw" class="input password-input" placeholder="Mevcut Parola">
                                                <button class="show-password-btn"></button>
                                            </div>
                                            <div class="input-wrap white-label password-field">
                                                <input type="password" name="new_pw" class="input password-input" placeholder="Yeni şifre">
                                                <button class="show-password-btn"></button>
                                            </div>
                                            <div class="input-wrap white-label password-field">
                                                <input type="password" name="new_pw_r" class="input password-input" placeholder="Yeni Şifre Tekrar">
                                                <button class="show-password-btn"></button>
                                            </div>

                                        </div>

                                    </div>
                                    <button class="btn" type="submit">
                                        Şiremi Değiştir
                                    </button>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="wrap">
                <div class="wrap_float">
                    <div class="footer-content">
                        <div class="logo">uipaper</div>
                        <div class="wrap-center">
                            <div class="socials">
                                <a class="soc-link">
                                    <img src="/assets/img/facebook-icon.svg" class="img-svg" alt="">
                                </a>
                                <a class="soc-link">
                                    <img src="/assets/img/twitter-soc-icon.svg" class="img-svg" alt="">
                                </a>
                                <a class="soc-link">
                                    <img src="/assets/img/behance-icon.svg" class="img-svg" alt="">
                                </a>
                            </div>
                            <div class="menu">
                                <ul>
                                    <li><a href="contact-form.html">Contact Form</a></li>
                                    <li><a href="archive-grid.html">Archives</a></li>
                                    <li><a href="https://hellodigi.ru/support/uipaper/" target="_blank">Documentation</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-right">
                            <a href="#" class="login-link">Your button</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay" id="overlay"></div>
    </div>
</div>
@include('section.modals')

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
