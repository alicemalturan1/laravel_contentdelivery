<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page | Uipaper</title>
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
        <section class="slider-section js-fix-height" id="js-slider-section">
            <div class="slide">
                <div class="slide__wrap">
                    <div class="slide__img">
                        <img src="http://cdn.webtekno.com/custom/images/10_gtavpc_03272015.jpg" alt="">
                    </div>
                    <div class="wrap">
                        <div class="wrap_float js-fix-height">
                            <div class="slide-content">
                                <div class="location">Nordegg, Canada</div>
                                <h2 class="slide-title">Canada</h2>
                                <p class="slide-description">
                                    Canoeing in Canada from $500
                                </p>
                                <div class="buttons">
                                    <a href="#" class="btn getModal" data-href="#book-now"><span>Book Now</span></a>
                                    <a href="tour-list-fullwidth.html" class="btn border-btn"><span>Choose tour</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide__wrap">
                    <div class="slide__img">
                        <img src="https://wallpaperaccess.com/full/1910328.png" alt="">
                    </div>
                    <div class="wrap">
                        <div class="wrap_float js-fix-height">
                            <div class="slide-content">
                                <div class="location">Annapurna region, Nepal</div>
                                <h2 class="slide-title">Himalaya range</h2>
                                <p class="slide-description">
                                    Canoeing in Himalaya from $500
                                </p>
                                <div class="buttons">
                                    <a href="#" class="btn getModal" data-href="#book-now"><span>Book Now</span></a>
                                    <a href="tour-list-fullwidth.html" class="btn border-btn"><span>Choose tour</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide__wrap">
                    <div class="slide__img">
                        <img src="https://wallpaperaccess.com/full/2492373.jpg" alt="">
                    </div>
                    <div class="wrap">
                        <div class="wrap_float js-fix-height">
                            <div class="slide-content">
                                <div class="location">Italia, Val Venegia, San Martino di Castrozza</div>
                                <h2 class="slide-title">Italia</h2>
                                <p class="slide-description">
                                    Canoeing in Italia from $500
                                </p>
                                <div class="buttons">
                                    <a href="#" class="btn getModal" data-href="#book-now"><span>Book Now</span></a>
                                    <a href="tour-list-fullwidth.html" class="btn border-btn"><span>Choose tour</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide__wrap">
                    <div class="slide__img">
                        <div class="video-bg js-video-bg image-cover" data-video="video/video-3.mp4"></div>
                    </div>
                    <div class="wrap">
                        <div class="wrap_float js-fix-height">
                            <div class="slide-content">
                                <div class="location">Harbor Springs, United States</div>
                                <h2 class="slide-title">United States</h2>
                                <p class="slide-description">
                                    Canoeing in United States from $500
                                </p>
                                <div class="buttons">
                                    <a href="#" class="btn getModal" data-href="#book-now"><span>Book Now</span></a>
                                    <a href="tour-list-fullwidth.html" class="btn border-btn"><span>Choose tour</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="slide__wrap">
                    <div class="slide__img">
                        <img src="/assets/img/travel-4.jpg" alt="">
                    </div>
                    <div class="wrap">
                        <div class="wrap_float js-fix-height">
                            <div class="slide-content">
                                <div class="location">Irland, Letterfrack, County Galway</div>
                                <h2 class="slide-title">Irland</h2>
                                <p class="slide-description">
                                    Canoeing in Irland from $500
                                </p>
                                <div class="buttons">
                                    <a href="#" class="btn getModal" data-href="#book-now"><span>Book Now</span></a>
                                    <a href="tour-list-fullwidth.html" class="btn border-btn"><span>Choose tour</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="main-page-posts" style="padding-top:30px;">

            <div class="wrap">
                <div class="wrap_float">
                    <div class="section-head" >

                        <div class="arrows">
                            <div class="arrow prev home_content_indexer_prev"></div>
                            <div class="arrow next home_content_indexer_next"></div>
                        </div>
                    </div>
                    <div class="panels_homepage">
                        <div class="item" >
                            <h2 class="title">Son Eklenenler</h2>
                            <div class="post-items-list posts-grid" style="padding-top:15px;">



                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-1-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, modi.
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
                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-2-img.jpg" alt="" class="post-bg-img">
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
                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-3-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, libero, modi.
                                    </h3>
                                    <div class="post-info">
                                        <div class="post-author post-info-author">
                                            <div class="author-image">
                                                <img src="/assets/img/author.jpg" alt="" class="image-cover">
                                            </div>
                                            <span>Victor Shibut</span>
                                        </div>
                                        <div class="post-date post-info-date">
                                            18 May 2021
                                        </div>
                                        <div class="post-views post-info-views">
                                            3457
                                        </div>
                                    </div>
                                </a>
                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-4-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque!
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
                                <a href="single.html" class="post-item without-bg">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis ad, ullam!
                                    </h3>
                                    <div class="post-excerption">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid omnis, tenetur repellat amet voluptate velit eligendi ratione nobis est corrupti.
                                    </div>
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
                                <a href="single.html" class="post-item post-favourites-item sticky">
                                    <div class="sticky-post-tag">
                                        <div class="sticky-icon"></div>
                                        <div class="sticky-text">Pinned</div>
                                    </div>
                                    <img src="/assets/img/post-1-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, magnam.
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
                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-6-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, non.
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
                                <a href="single.html" class="post-item post-with-video">
                                    <div class="video-bg js-video-bg" data-video="video/video.mp4"></div>
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut.
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
                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-9-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero error nostrum minus!
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


                            </div>
                            <div class="show-more">
                                <div class="show-more-btn">
                                    <span>Show more</span>
                                </div>
                                <div class="loader">
                                    <svg class="circular" viewBox="25 25 50 50">
                                        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="item" >
                            <h2 class="title">En Popüler</h2>
                            <div class="post-items-list posts-grid" style="padding-top:15px;">



                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-1-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, modi.
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
                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-2-img.jpg" alt="" class="post-bg-img">
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
                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-3-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, libero, modi.
                                    </h3>
                                    <div class="post-info">
                                        <div class="post-author post-info-author">
                                            <div class="author-image">
                                                <img src="/assets/img/author.jpg" alt="" class="image-cover">
                                            </div>
                                            <span>Victor Shibut</span>
                                        </div>
                                        <div class="post-date post-info-date">
                                            18 May 2021
                                        </div>
                                        <div class="post-views post-info-views">
                                            3457
                                        </div>
                                    </div>
                                </a>
                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-4-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque!
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
                                <a href="single.html" class="post-item without-bg">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis ad, ullam!
                                    </h3>
                                    <div class="post-excerption">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid omnis, tenetur repellat amet voluptate velit eligendi ratione nobis est corrupti.
                                    </div>
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
                                <a href="single.html" class="post-item post-favourites-item sticky">
                                    <div class="sticky-post-tag">
                                        <div class="sticky-icon"></div>
                                        <div class="sticky-text">Pinned</div>
                                    </div>
                                    <img src="/assets/img/post-1-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, magnam.
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
                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-6-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, non.
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
                                <a href="single.html" class="post-item post-with-video">
                                    <div class="video-bg js-video-bg" data-video="video/video.mp4"></div>
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut.
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
                                <a href="single.html" class="post-item">
                                    <img src="/assets/img/post-9-img.jpg" alt="" class="post-bg-img">
                                    <div class="post-tags">
                                        <div class="tag">Mobile</div>
                                        <div class="tag">APP</div>
                                    </div>
                                    <h3 class="post-title">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero error nostrum minus!
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


                            </div>
                            <div class="show-more">
                                <div class="show-more-btn">
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
        </div>
        <div class="newsletter-section section">
            <div class="wrap">
                <div class="wrap_float">
                    <div class="wrap wrap-center">
                        <div class="subscribe-form-block">
                            <h2 class="title">
                                Newsletter
                            </h2>
                            <div class="subtitle">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </div>
                            <div class="form">
                                <div class="form-fields">
                                    <div class="input-wrap">
                                        <input type="text" class="input" placeholder="Name*">
                                    </div>
                                    <div class="input-wrap">
                                        <input type="email" class="input" placeholder="Email*">
                                    </div>
                                    <button class="btn submit-btn">
                                        <span>Subscribe</span>
                                    </button>
                                </div>
                                <div class="agreement">
                                    <input type="checkbox" class="agreement-checkbox" id="agreeement-1">
                                    <label for="agreeement-1" class="agreement-label">
                                            <span>
                                                By checking this box, you confirm that you have read and are agreeing to our terms of use regarding the storage of the data submitted through this form.
                                            </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="instagram-section section">
            <div class="wrap">
                <div class="wrap_float instagram-posts-list grid" id="instagram-posts">
                    <div class="instagram-post-item">
                        <img src="/assets/img/inst-1.jpg" alt="">
                    </div>
                    <div class="instagram-post-item">
                        <img src="/assets/img/inst-2.jpg" alt="">
                    </div>
                    <div class="instagram-post-item">
                        <img src="/assets/img/inst-3.jpg" alt="">
                    </div>
                    <div class="instagram-post-item">
                        <img src="/assets/img/inst-4.jpg" alt="">
                    </div>
                    <div class="instagram-post-item">
                        <img src="/assets/img/inst-5.jpg" alt="">
                    </div>
                    <div class="instagram-post-item">
                        <img src="/assets/img/inst-6.jpg" alt="">
                    </div>
                    <div class="instagram-post-item">
                        <img src="/assets/img/inst-7.jpg" alt="">
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
