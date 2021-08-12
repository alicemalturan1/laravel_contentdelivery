
<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Search Results | Uipaper</title>
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
@include('section.search_block')
<div class="container page">
    <div class="container-wrap">
     @include('section.header')
        <div class="page-wrap archive-page search-results-page">
            <div class="breadcrumbs">
                <div class="wrap wrap-center">
                    <div class="wrap_float">
                        <a href="/">Anasayfa</a> / <a href="#">Diğer</a> / <span class="current">Arama</span>
                    </div>
                </div>
            </div>
            <div class="archive-header">
                <div class="wrap wrap-center">
                    <div class="wrap_float">
                        <div class="title-wrap">
                            <h1 class="page-title">Arama Sonuçları</h1>
                            <div class="posts-count">
                                {{$key}} araması ile ilgili sonuçlar
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="archive-body">
                <div class="wrap">
                    <div class="page-wrap-content">
                        <div class="post-items-list posts-three-columns">
                            @foreach($results as $item)

                                <a href="{{route('content_view',['self'=>\App\Http\Controllers\ContentController::encodelink($item->title),'id'=>$item->id])}}" class="post-item @if(!$item->photo_requirement) without-bg @endif ">
                                    @if($item->photo_requirement)
                                    <img src="/assets/img/post-2-img.jpg" alt="" class="post-bg-img">
                                    @endif
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium tempore fugit asperiores, voluptates expedita. Officia, libero!
                                    </h3>
                                    <div class="post-info">
                                        <div class="post-author post-info-author">
                                            <div class="author-image">
                                                <img src="/assets/img/author.jpg" alt="" class="image-cover">
                                            </div>
                                            <span>Maya Delia</span>
                                        </div>
                                        <div class="post-date post-info-date">
                                            18 May 2021
                                        </div>
                                        <div class="post-views post-info-views">
                                            3457
                                        </div>
                                    </div>
                                </a>
                            @endforeach


                        </div>
                        <div class="show-more search_showmore" data-key="{{$key}}">
                            <div class="show-more-btn ">
                                <span>Show more</span>
                            </div>
                            <div class="loader">
                                <svg class="circular" viewBox="25 25 50 50">
                                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                                </svg>
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
