<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Tour Page Right Sidebar | Uipaper</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="/assets/image/png" sizes="32x32" href="/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="/assets/image/png" sizes="16x16" href="/assets/img/favicons/favicon-16x16.png">
    <link rel="icon" type="/assets/image/png" sizes="16x16" href="/assets/img/favicons/android-chrome-192x192.png">
    <link rel="icon" type="/assets/image/png" sizes="16x16" href="/assets/img/favicons/android-chrome-512x512.png">
    <link rel="icon" type="/assets/image/png" href="/assets/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="/assets/image/png" sizes="16x16" href="/assets/img/favicons/favicon.ico">
</head>

<body class="transition-none no-padding">
@include('section.search_block')
<div class="container page">
    <div class="container-wrap">
        @include('section.header')
        <div class="single-header header-wide image-header with-wide-wrap">
            <div class="image-wrap">
                <img src="{{$content->big_photo}}" alt="" class="image-cover bg-img">
            </div>
            <div class="wrap wrap-center">
                <div class="wrap_float">
                    <div class="breadcrumbs white-color">
                        <a href="/">Anasayfa</a> / <a href="#">İçerik</a> / <span class="current">{{$content->title}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrap with-sidebar">

            <div class="page-wrap-content">
                <div class="post-single-wrap sticky-parent">
                    <div class="share-block">
                        <div class="share-block-main js-share-block-main">
                            <div class="socials">
                                <a class="soc-link toggle_like" @if(\Illuminate\Support\Facades\Cookie::get('like_content-'.$content->id)) data-title="Beğendin" @else data-title="Beğen" @endif  data-id="{{$content->id}}">
                                       <span class="soc-icon like_icon"  @if(\Illuminate\Support\Facades\Cookie::get('like_content-'.$content->id)) style="display: none;" @endif >
                                           <svg xmlns="http://www.w3.org/2000/svg" class="img-svg replaced-svg"><path d="M14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1h3.482a1 1 0 0 0 .817-.423L11.752.85a.5.5 0 0 1 .632-.159l1.814.907a2.5 2.5 0 0 1 1.305 2.853L14.6 8zM7 10.588V19h11.16L21 12.104V10h-6.4a2 2 0 0 1-1.938-2.493l.903-3.548a.5.5 0 0 0-.261-.571l-.661-.33-4.71 6.672c-.25.354-.57.644-.933.858zM5 11H3v8h2v-8z"></path></svg>
                                        </span>
                                        <span class="soc-icon like_icon-fill" @if(!\Illuminate\Support\Facades\Cookie::get('like_content-'.$content->id)) style="display: none;" @endif>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="img-svg replaced-svg"><path d="M2 9h3v12H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1zm5.293-1.293l6.4-6.4a.5.5 0 0 1 .654-.047l.853.64a1.5 1.5 0 0 1 .553 1.57L14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H8a1 1 0 0 1-1-1V8.414a1 1 0 0 1 .293-.707z"/></svg>
                                        </span>

                                </a>
                                <a class="soc-link toggle_disslike" @if(\Illuminate\Support\Facades\Cookie::get('disslike_content-'.$content->id)) data-title="Beğenmedin" @else data-title="Beğenme" @endif data-id="{{$content->id}}">
                                       <span class="soc-icon disslike_icon" @if(\Illuminate\Support\Facades\Cookie::get('disslike_content-'.$content->id)) style="display: none;" @endif >
                                           <svg xmlns="http://www.w3.org/2000/svg" class="img-svg replaced-svg" ><path d="M9.4 16H3a2 2 0 0 1-2-2v-2.104a2 2 0 0 1 .15-.762L4.246 3.62A1 1 0 0 1 5.17 3H22a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-3.482a1 1 0 0 0-.817.423l-5.453 7.726a.5.5 0 0 1-.632.159L9.802 22.4a2.5 2.5 0 0 1-1.305-2.853L9.4 16zm7.6-2.588V5H5.84L3 11.896V14h6.4a2 2 0 0 1 1.938 2.493l-.903 3.548a.5.5 0 0 0 .261.571l.661.33 4.71-6.672c.25-.354.57-.644.933-.858zM19 13h2V5h-2v8z"/></svg>
                                        </span>
                                    <span class="soc-icon disslike_icon-fill" @if(!\Illuminate\Support\Facades\Cookie::get('disslike_content-'.$content->id)) style="display: none;" @endif>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="img-svg replaced-svg"><path d="M22 15h-3V3h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zm-5.293 1.293l-6.4 6.4a.5.5 0 0 1-.654.047L8.8 22.1a1.5 1.5 0 0 1-.553-1.57L9.4 16H3a2 2 0 0 1-2-2v-2.104a2 2 0 0 1 .15-.762L4.246 3.62A1 1 0 0 1 5.17 3H16a1 1 0 0 1 1 1v11.586a1 1 0 0 1-.293.707z"/></svg>
                                    </span>

                                </a>
                                <a class="soc-link clipboard-content" data-title="Linki Kopyala">

                                    <input type="text" style="display: none;" class="current_url"  value="{{url()->current()}}">
                                        <span class="soc-icon">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="img-svg replaced-svg" ><path d="M14.828 7.757l-5.656 5.657a1 1 0 1 0 1.414 1.414l5.657-5.656A3 3 0 1 0 12 4.929l-5.657 5.657a5 5 0 1 0 7.071 7.07L19.071 12l1.414 1.414-5.657 5.657a7 7 0 1 1-9.9-9.9l5.658-5.656a5 5 0 0 1 7.07 7.07L12 16.244A3 3 0 1 1 7.757 12l5.657-5.657 1.414 1.414z"/></svg>
                                        </span>

                                </a>

                                <div class="soc-link show-more-socials" style="display: none;"></div>
                            </div>
                            <div class="share-block-item js-anchor link-to-comments" data-href="#comments-section">
                                <div class="comments-count">
                                    <span>{{count(\App\Models\Rate::where('content_id',$content->id)->get())}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="share-block-item mobile-item js-mobile-share-show mobile-share-show-btn">
                            <div class="show-mobile-icon"></div>
                        </div>
                        <div class="share-block-item add-to-favorites">
                            <div class="favorites-tag @auth @if(\App\Models\Favorite::where('content_id',$content->id)->where('user_id',\Illuminate\Support\Facades\Auth::id())->first()) added @endif @endauth js-add-to-fav" data-id="{{$content->id}}">
                                <i class="is-added bouncy"></i>
                                <i class="not-added bouncy"></i>
                                <span class="fav-overlay"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-content wp-content">
                        <div class="wrap wrap-center">
                            <div class="wrap_float">

                                <h1 class="page-title large-title">
                                   {{$content->title}}
                                </h1>

                                {!!  $content->description !!}

                                <div class="rating-results">
                                    <div class="rating-results-list">
                                        <div class="rating-results-item">
                                            <div class="rating-results-item-info">
                                                <div class="_title">İndirme Hızı</div>
                                                <div class="_value">50%</div>
                                            </div>
                                            <div class="rating-results-item-progress">
                                                <div class="line" style="width: 50%"></div>
                                            </div>
                                        </div>
                                        <div class="rating-results-item">
                                            <div class="rating-results-item-info">
                                                <div class="_title">Link Güvenliği</div>
                                                <div class="_value">90%</div>
                                            </div>
                                            <div class="rating-results-item-progress">
                                                <div class="line" style="width: 90%"></div>
                                            </div>
                                        </div>
                                        <div class="rating-results-item">
                                            <div class="rating-results-item-info">
                                                <div class="_title">Link Erişimi</div>
                                                <div class="_value">70%</div>
                                            </div>
                                            <div class="rating-results-item-progress">
                                                <div class="line" style="width: 70%"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="rating-results-total">
                                        <div class="total-value">4.8</div>
                                        <div class="subtitle">
                                            Ortalama
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comments-section" id="comments-section">
                    <div class="wrap wrap-center">
                        <div class="wrap_float">
                            <h2 class="title">Değerlendirmeler <span class="comments-count">{{count(\App\Models\Rate::where('content_id',$content->id)->get())}}</span></h2>
                            <div class="subtitle">Lütfen demeyimini bizimle paylaş</div>
                            <div class="set-rating-block">
                                <div class="set-rating-item">
                                    <div class="_title">İndirme Hızı</div>
                                    <div class="rating-stars  js-rating-stars" data-rate="ds">
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                    </div>
                                    <div class="rating-value">4.5</div>
                                </div>
                                <div class="set-rating-item">
                                    <div class="_title">Link Güvenliği</div>
                                    <div class="rating-stars  js-rating-stars" data-rate="ls">
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                    </div>
                                    <div class="rating-value">4.5</div>
                                </div>
                                <div class="set-rating-item">
                                    <div class="_title">Link Erişimi</div>
                                    <div class="rating-stars js-rating-stars" data-rate="ab">
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                        <div class="star"></div>
                                    </div>
                                    <div class="rating-value">4.5</div>
                                </div>

                            </div>
                            <form class="comment-form">
                                <input type="hidden" name="id" value="{{$content->id}}">
                                <div class="comments-form">
                                    <div class="input-wrap textarea-wrap white-label comment-field">
                                        <textarea name="comment" class="input textarea" placeholder="Yorumunuz" required></textarea>
                                    </div>
                                    @guest
                                        <div class="input-wrap white-label name-field">
                                            <input type="text" class="input" placeholder="Adınız*">
                                        </div>
                                        <div class="input-wrap white-label email-field">
                                            <input type="email" class="input" placeholder="Email*" @if(\Illuminate\Support\Facades\Cookie::get('comment_email')) @endif>
                                        </div>

                                        <div class="agreement">
                                            <input type="checkbox" name="remember" class="agreement-checkbox" id="agreeement-2">
                                            <label for="agreeement-2" class="agreement-label">
                                            <span>
                                                Tekrar yorum yaptığımda adımı ve email'imi hatırla
                                            </span>

                                            </label>
                                        </div>
                                    @endguest
                                    <button class="btn submit ">
                                        <span>Değerlendir</span>
                                    </button>
                                </div>
                            </form>
                            <div class="comments-list">
                                @foreach(\App\Models\Rate::where('content_id',$content->id)->where('user_id',\Illuminate\Support\Facades\Auth::id())->get() as $item)
                                    @php
                                        $rated_user=\App\Http\Controllers\UserController::get_by_id(\Illuminate\Support\Facades\Auth::id());

                                    @endphp
                                    <div class="comments-list-item with-border" style="border:1px solid #747B88;">
                                        <div class="comment-item">
                                            <div class="comment-item-userpic">
                                                <img src="@if(!$item->is_guest) {{$rated_user->avatar}} @else {{'/assets/images/default/avatar.png'}} @endif" alt="" class="image-cover">
                                            </div>
                                            <div class="comment-item-name">{{$rated_user->name.' '.$rated_user->surname}}</div>

                                            <div class="comment-item-date">{{\App\Http\Controllers\ContentController::encode_date($item->created_at)}}</div>
                                            <div class="comment-item-user-ratings">
                                                <span class="user-rating-result">İndirme Hız: <span class="val">{{$item->rate_ds}}</span></span>
                                                <span class="user-rating-result">Link Güvenliği: <span class="val">{{$item->rate_ls}}</span></span>
                                                <span class="user-rating-result">Link Erişimi: <span class="val">{{$item->rate_ab}}</span></span>

                                            </div>
                                            <div class="comment-item-text">
                                                {{$item->message}}
                                            </div>
                                            <div class="reply-link" data-id="{{$item->id}}">Yanıtla</div>
                                        </div>

                                        @foreach(\App\Models\RateAnswer::where('rate_id',$item->id)->get() as $answer)
                                            @php $a_user=\App\Http\Controllers\UserController::get_by_id($answer->user_id); @endphp
                                            <div class="comment-item reply">
                                                <div class="comment-item-userpic">
                                                    <img src="{{$a_user->avatar}}" alt="" class="image-cover">
                                                </div>
                                                <div class="comment-item-name">{{$a_user->name." ".$a_user->surname}}</div>
                                                <div class="comment-item-date">{{\App\Http\Controllers\ContentController::encode_date($answer->created_at)}}</div>
                                                <div class="comment-item-reply-for">Değerlendirmeyi yanıtladı</div>
                                                <div class="comment-item-text">
                                                    {{$answer->text}}
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                                @foreach(\App\Models\Rate::where('content_id',$content->id)->where('user_id','!=',\Illuminate\Support\Facades\Auth::id())->get() as $item)
                                    @php
                                        $rated_user=\App\Http\Controllers\UserController::get_by_id($item->user_id);

                                        @endphp
                                <div class="comments-list-item with-border">
                                        <div class="comment-item">
                                            <div class="comment-item-userpic">
                                                <img src="@if(!$item->is_guest) {{$rated_user->avatar}} @else {{'/assets/images/default/avatar.png'}} @endif" alt="" class="image-cover">
                                            </div>
                                            <div class="comment-item-name">{{$rated_user->name.' '.$rated_user->surname}}</div>

                                            <div class="comment-item-date">{{\App\Http\Controllers\ContentController::encode_date($item->created_at)}}</div>
                                            <div class="comment-item-user-ratings">
                                                <span class="user-rating-result">İndirme Hız: <span class="val">{{$item->rate_ds}}</span></span>
                                                <span class="user-rating-result">Link Güvenliği: <span class="val">{{$item->rate_ls}}</span></span>
                                                <span class="user-rating-result">Link Erişimi: <span class="val">{{$item->rate_ab}}</span></span>

                                            </div>
                                            <div class="comment-item-text">
                                                    {{$item->message}}
                                            </div>
                                            <div class="reply-link" data-id="{{$item->id}}">Yanıtla</div>
                                        </div>

                                    @foreach(\App\Models\RateAnswer::where('rate_id',$item->id)->get() as $answer)
                                        @php $a_user=\App\Http\Controllers\UserController::get_by_id($answer->user_id); @endphp
                                    <div class="comment-item reply">
                                        <div class="comment-item-userpic">
                                            <img src="{{$a_user->avatar}}" alt="" class="image-cover">
                                        </div>
                                        <div class="comment-item-name">{{$a_user->name." ".$a_user->surname}}</div>
                                        <div class="comment-item-date">{{\App\Http\Controllers\ContentController::encode_date($answer->created_at)}}</div>
                                        <div class="comment-item-reply-for">Değerlendirmeyi yanıtladı</div>
                                        <div class="comment-item-text">
                                           {{$answer->text}}
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="page-wrap-sidebar">
                <div class="sidebar">
                    <div class="sidebar-item widget_tour">
                        <h4 class="_title">İçerik</h4>
                        <div class="text">
                           Bir problem olduğunu mu düşünüyorsun ?
                        </div>
                        <button class="btn getModal" data-href="#modal-report-content">
                            <span>Raporla</span>
                        </button>
                        <div class="get-in-touch">

                            <a href="download/{{$content->id}}" class="btn transparent-btn download_button" data-channel="{{$content->download_channel}}" data-id="{{$content->id}}">
                                <span>Hemen indir</span>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-item widget_instagram">
                        <div class="sidebar-item-title">Instagram Sidebar</div>
                        <div class="inst-block">
                            <div class="inst-block-head">
                                <div class="inst-block-head-userpic">

                                </div>
                                <div class="inst-block-head-username">helloDigi</div>
                                <div class="inst-block-head-followers">24 Followers</div>
                            </div>
                            <div class="inst-block-posts">
                                <a class="inst-block-posts-item">
                                    <img src="/assets/img/gallery-1.jpg" alt="">
                                </a>
                                <a class="inst-block-posts-item">
                                    <img src="/assets/img/post-preview.jpg" alt="">
                                </a>
                                <a class="inst-block-posts-item">
                                    <img src="/assets/img/gallery-1.jpg" alt="">
                                </a>
                                <a class="inst-block-posts-item">
                                    <img src="/assets/img/post-preview.jpg" alt="">
                                </a>
                                <a class="inst-block-posts-item">
                                    <img src="/assets/img/gallery-1.jpg" alt="">
                                </a>
                            </div>
                            <a class="btn inst-block-btn">
                                <span>Follow</span>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-item widget_twitter">
                        <div class="sidebar-item-title">Recent Tweets</div>
                        <div class="twitter-block">
                            <div class="twitter-block-posts">
                                <div class="twitter-block-posts-item">
                                    <p class="twitter-content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque nobis quisquam, vitae officiis! Cupiditate quaerat aliquam perferendis perspiciatis consectetur reiciendis earum, harum tempore, adipisci itaque hic rerum, similique ea amet... <a href="#">https://twitter.com/</a>
                                    </p>
                                    <div class="twitter-time">
                                        244 days ago
                                    </div>
                                </div>
                                <div class="twitter-block-posts-item">
                                    <p class="twitter-content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam aut distinctio tempora, beatae quo autem, veniam quia, dolorum excepturi voluptates tenetur! <a href="#">https://twitter.com/</a>
                                    </p>
                                    <div class="twitter-time">
                                        244 days ago
                                    </div>
                                </div>
                                <div class="twitter-block-posts-item">
                                    <p class="twitter-content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint porro dolores, hic inventore, debitis eum quae, libero maiores non adipisci a. Nihil, dignissimos. <a href="#">https://twitter.com/</a>
                                    </p>
                                    <div class="twitter-time">
                                        244 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="packages-section section center-title-section js-slider-block">
            <div class="wrap">
                <div class="wrap_float">
                    <div class="section-head">
                        <h2 class="title">You may like it</h2>
                        <div class="arrows">
                            <div class="arrow prev"></div>
                            <div class="arrow next"></div>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="packages-slider fullwidth">
                            <a href="tour-page-sidebar-right.html" class="packages-item">
                                <div class="shadow js-shadow"></div>
                                <div class="bg-img" style="background-image: url(/assets/img/tour-1.jpg)"></div>
                                <div class="packages-item-head">
                                    <div class="packages-cost"><span class="days">5 days</span> from <span class="cost-val">$2,212</span> / pp</div>
                                    <div class="favorites-tag added js-add-to-fav">
                                        <i class="is-added bouncy"></i>
                                        <i class="not-added bouncy"></i>
                                        <span class="fav-overlay"></span>
                                    </div>
                                </div>
                                <div class="packages-item-foot">
                                    <h3 class="packages-title">Magic Forests of Sweden</h3>
                                    <div class="location">United States, San Francisco</div>
                                </div>
                            </a>
                            <a href="tour-page-sidebar-right.html" class="packages-item">
                                <div class="shadow js-shadow"></div>
                                <div class="bg-img" style="background-image: url(/assets/img/tour-7.jpg)"></div>
                                <div class="packages-item-head">
                                    <div class="packages-cost"><span class="days">5 days</span> from <span class="cost-val">$2,212</span> / pp</div>
                                    <div class="favorites-tag js-add-to-fav">
                                        <i class="is-added bouncy"></i>
                                        <i class="not-added bouncy"></i>
                                        <span class="fav-overlay"></span>
                                    </div>
                                </div>
                                <div class="packages-item-foot">
                                    <h3 class="packages-title">Magic Forests of Sweden</h3>
                                    <div class="location">United States, San Francisco</div>
                                </div>
                            </a>
                            <a href="tour-page-sidebar-right.html" class="packages-item">
                                <div class="shadow js-shadow"></div>
                                <div class="bg-img" style="background-image: url(/assets/img/tour-3.jpg)"></div>
                                <div class="packages-item-head">
                                    <div class="packages-cost"><span class="days">5 days</span> from <span class="cost-val">$2,212</span> / pp</div>
                                    <div class="favorites-tag js-add-to-fav">
                                        <i class="is-added bouncy"></i>
                                        <i class="not-added bouncy"></i>
                                        <span class="fav-overlay"></span>
                                    </div>
                                </div>
                                <div class="packages-item-foot">
                                    <h3 class="packages-title">Magic Forests of Sweden</h3>
                                    <div class="location">United States, San Francisco</div>
                                </div>
                            </a>
                            <a href="tour-page-sidebar-right.html" class="packages-item">
                                <div class="shadow js-shadow"></div>
                                <div class="bg-img" style="background-image: url(/assets/img/tour-2.jpg)"></div>
                                <div class="packages-item-head">
                                    <div class="packages-cost"><span class="days">5 days</span> from <span class="cost-val">$2,212</span> / pp</div>
                                    <div class="favorites-tag js-add-to-fav">
                                        <i class="is-added bouncy"></i>
                                        <i class="not-added bouncy"></i>
                                        <span class="fav-overlay"></span>
                                    </div>
                                </div>
                                <div class="packages-item-foot">
                                    <h3 class="packages-title">Magic Forests of Sweden</h3>
                                    <div class="location">United States, San Francisco</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="see-also-section section">
            <div class="wrap">
                <div class="wrap_float">
                    <h2 class="title">
                        Related Posts
                    </h2>
                    <div class="section-content">
                        <div class="see-also-items">
                            <a href="tour-page-sidebar-right.html" class="packages-item">
                                <div class="shadow js-shadow"></div>
                                <div class="bg-img" style="background-image: url(/assets/img/tour-1.jpg)"></div>
                                <div class="packages-item-head">
                                    <div class="packages-cost"><span class="days">5 days</span> from <span class="cost-val">$2,212</span> / pp</div>
                                    <div class="favorites-tag added js-add-to-fav">
                                        <i class="is-added bouncy"></i>
                                        <i class="not-added bouncy"></i>
                                        <span class="fav-overlay"></span>
                                    </div>
                                </div>
                                <div class="packages-item-foot">
                                    <h3 class="packages-title">Magic Forests of Sweden</h3>
                                    <div class="location">United States, San Francisco</div>
                                </div>
                            </a>
                            <a href="tour-page-sidebar-right.html" class="packages-item">
                                <div class="shadow js-shadow"></div>
                                <div class="bg-img" style="background-image: url(/assets/img/tour-7.jpg)"></div>
                                <div class="packages-item-head">
                                    <div class="packages-cost"><span class="days">5 days</span> from <span class="cost-val">$2,212</span> / pp</div>
                                    <div class="favorites-tag js-add-to-fav">
                                        <i class="is-added bouncy"></i>
                                        <i class="not-added bouncy"></i>
                                        <span class="fav-overlay"></span>
                                    </div>
                                </div>
                                <div class="packages-item-foot">
                                    <h3 class="packages-title">Magic Forests of Sweden</h3>
                                    <div class="location">United States, San Francisco</div>
                                </div>
                            </a>
                            <a href="tour-page-sidebar-right.html" class="packages-item">
                                <div class="shadow js-shadow"></div>
                                <div class="bg-img" style="background-image: url(/assets/img/tour-3.jpg)"></div>
                                <div class="packages-item-head">
                                    <div class="packages-cost"><span class="days">5 days</span> from <span class="cost-val">$2,212</span> / pp</div>
                                    <div class="favorites-tag js-add-to-fav">
                                        <i class="is-added bouncy"></i>
                                        <i class="not-added bouncy"></i>
                                        <span class="fav-overlay"></span>
                                    </div>
                                </div>
                                <div class="packages-item-foot">
                                    <h3 class="packages-title">Magic Forests of Sweden</h3>
                                    <div class="location">United States, San Francisco</div>
                                </div>
                            </a>
                            <a href="tour-page-sidebar-right.html" class="packages-item">
                                <div class="shadow js-shadow"></div>
                                <div class="bg-img" style="background-image: url(/assets/img/tour-2.jpg)"></div>
                                <div class="packages-item-head">
                                    <div class="packages-cost"><span class="days">5 days</span> from <span class="cost-val">$2,212</span> / pp</div>
                                    <div class="favorites-tag js-add-to-fav">
                                        <i class="is-added bouncy"></i>
                                        <i class="not-added bouncy"></i>
                                        <span class="fav-overlay"></span>
                                    </div>
                                </div>
                                <div class="packages-item-foot">
                                    <h3 class="packages-title">Magic Forests of Sweden</h3>
                                    <div class="location">United States, San Francisco</div>
                                </div>
                            </a>
                            <a href="tour-page-sidebar-right.html" class="packages-item">
                                <div class="shadow js-shadow"></div>
                                <div class="bg-img" style="background-image: url(/assets/img/tour-7.jpg)"></div>
                                <div class="packages-item-head">
                                    <div class="packages-cost"><span class="days">5 days</span> from <span class="cost-val">$2,212</span> / pp</div>
                                    <div class="favorites-tag js-add-to-fav">
                                        <i class="is-added bouncy"></i>
                                        <i class="not-added bouncy"></i>
                                        <span class="fav-overlay"></span>
                                    </div>
                                </div>
                                <div class="packages-item-foot">
                                    <h3 class="packages-title">Magic Forests of Sweden</h3>
                                    <div class="location">United States, San Francisco</div>
                                </div>
                            </a>
                            <a href="tour-page-sidebar-right.html" class="packages-item">
                                <div class="shadow js-shadow"></div>
                                <div class="bg-img" style="background-image: url(/assets/img/tour-3.jpg)"></div>
                                <div class="packages-item-head">
                                    <div class="packages-cost"><span class="days">5 days</span> from <span class="cost-val">$2,212</span> / pp</div>
                                    <div class="favorites-tag js-add-to-fav">
                                        <i class="is-added bouncy"></i>
                                        <i class="not-added bouncy"></i>
                                        <span class="fav-overlay"></span>
                                    </div>
                                </div>
                                <div class="packages-item-foot">
                                    <h3 class="packages-title">Magic Forests of Sweden</h3>
                                    <div class="location">United States, San Francisco</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="instagram-section section">
            <div class="wrap">
                <div class="wrap_float instagram-posts-list standart" id="instagram-posts">
                    <a href="#" class="instagram-post-item">
                        <img src="/assets/img/inst-1.jpg" alt="">
                    </a>
                    <a href="#" class="instagram-post-item">
                        <img src="/assets/img/inst-2.jpg" alt="">
                    </a>
                    <a href="#" class="instagram-post-item">
                        <img src="/assets/img/inst-3.jpg" alt="">
                    </a>
                    <a href="#" class="instagram-post-item">
                        <img src="/assets/img/inst-4.jpg" alt="">
                    </a>
                    <a href="#" class="instagram-post-item">
                        <img src="/assets/img/inst-5.jpg" alt="">
                    </a>
                    <a href="#" class="instagram-post-item">
                        <img src="/assets/img/inst-6.jpg" alt="">
                    </a>
                    <a href="#" class="instagram-post-item">
                        <img src="/assets/img/inst-7.jpg" alt="">
                    </a>
                    <a href="#" class="instagram-post-item">
                        <img src="/assets/img/inst-8.jpg" alt="">
                    </a>
                    <a href="#" class="instagram-post-item">
                        <img src="/assets/img/inst-9.jpg" alt="">
                    </a>
                    <a href="#" class="instagram-post-item">
                        <img src="/assets/img/inst-10.jpg" alt="">
                    </a>
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

<div style="display: none;">
    <div class="modal modal_default modal_order" id="modal-report-content">
        <div class="modal_wrap">
            <h2 class="title">İçeriği Raporla</h2>
            <div class="subtitle">
                Bir problemle karşılaştığınızda veya hoşunuza gitmeyen bir şey olduğunda bu formu kullanabilirsiniz.
            </div>
            <form class="report_content-form">
                <div class="modal-form">

                    <div class="input-wrap white-label ">
                        <div class="filter-item" style="width: 100%!important;">
                            <div class="filter-item-field">

                                <div class="filter-item-value">
                                    <span class="selected-text">Konu</span>
                                    <div class="filter-arrow"></div>
                                </div>
                            </div>
                            <div class="filter-item-options" >
                                <div class="options-list radio-list" style="overflow-x: hidden;">
                                    <input type="radio" id="duration-1" name="reason" value="İçeriğe ulaşamıyorum">
                                    <label for="duration-1">İçeriğe ulaşamıyorum</label>

                                    <input type="radio" id="duration-2" name="reason" value="Farklı bir içerik ile karşılaşıyorum">
                                    <label for="duration-2">Farklı bir içerik ile karşılaşıyorum</label>

                                    <input type="radio" id="duration-3" name="reason" value="Virüs ile karşılaştım">
                                    <label for="duration-3">Virüs ile karşılaştım</label>

                                    <input type="radio" id="duration-4" name="reason" value="Reklamlar rahatsız etti">
                                    <label for="duration-4">Reklamlar rahatsız etti</label>

                                    <input type="radio" id="duration-5" name="reason" value="İndiremiyorum">
                                    <label for="duration-5">İndiremiyorum</label>
                                </div>
                                <div class="filter-btn-wrap">
                                    <div class="filter-btn apply-btn">Uygula</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="input-wrap white-label">
                        <input type="hidden" name="content" value="{{\Illuminate\Support\Facades\Crypt::encryptString($content->id)}}">
                        <input type="text" class="input"  placeholder="{{$content->title}}" disabled>
                    </div>
                    <div class="input-wrap white-label fullwidth">
                        <input type="email" name="email" class="input js-tel" @auth placeholder=" {{\Illuminate\Support\Facades\Auth::user()->email}}" disabled @endauth @guest  placeholder="Email adresiniz" @endguest>
                    </div>

                    <div class="input-wrap white-label fullwidth">
                        <textarea name="description" class="input textarea" placeholder="Açıklama"></textarea>
                    </div>

                    <button class="btn rc_submit-btn" type="submit">
                        <span>Raporla</span>
                    </button>
                </div>
            </form>
            <div class="modal-info">
                <p>Geri bildirimleriniz için teşekkür ederiz.</p>
            </div>
        </div>
        <div class="modal_close"></div>
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
