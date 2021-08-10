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
                            <div class="categories-panel">
                                <div class="arrows">
                                    <div class="arrow-area arrow-area-prev">
                                        <div class="arrow prev"></div>
                                    </div>
                                    <div class="arrow-area arrow-area-next">
                                        <div class="arrow next"></div>
                                    </div>
                                </div>
                                <div class="category-slider" id="category-slider_profilepage">
                                    <a href="#" class="category-slider-item selected" data-tab_name="edit_profile">
                                        <div class="_title">Profilimi Düzenle</div>
                                        <div class="_subtitle">Kişisel Bilgiler</div>
                                    </a>
                                    <a href="#" class="category-slider-item " data-tab_name="favourite">
                                        <div class="_title">Favorilerim</div>
                                        <div class="_subtitle">{{count(\App\Models\Favorite::where('user_id',\Illuminate\Support\Facades\Auth::id())->get())}} Favori İçerik</div>
                                    </a>
                                    <a href="#" class="category-slider-item" data-tab_name="reports">
                                        <div class="_title">Raporlarım</div>
                                        <div class="_subtitle">{{count(\App\Models\Report::where('user_id',\Illuminate\Support\Facades\Auth::id())->get())}} Rapor</div>
                                    </a>
                                    <a href="#" class="category-slider-item" data-tab_name="rates">
                                        <div class="_title">Değerlendirmelerim</div>
                                        <div class="_subtitle">{{count(\App\Models\Rate::where('user_id',\Illuminate\Support\Facades\Auth::id())->get())}} Değerlendirme</div>
                                    </a>
                                    <a href="#" class="category-slider-item">
                                        <div class="_title">Değerlendirmelerim</div>
                                        <div class="_subtitle">{{count(\App\Models\Rate::where('user_id',\Illuminate\Support\Facades\Auth::id())->get())}} Değerlendirme</div>
                                    </a>  <a href="#" class="category-slider-item">
                                        <div class="_title">Değerlendirmelerim</div>
                                        <div class="_subtitle">{{count(\App\Models\Rate::where('user_id',\Illuminate\Support\Facades\Auth::id())->get())}} Değerlendirme</div>
                                    </a>  <a href="#" class="category-slider-item">
                                        <div class="_title">Değerlendirmelerim</div>
                                        <div class="_subtitle">{{count(\App\Models\Rate::where('user_id',\Illuminate\Support\Facades\Auth::id())->get())}} Değerlendirme</div>
                                    </a>  <a href="#" class="category-slider-item">
                                        <div class="_title">Değerlendirmelerim</div>
                                        <div class="_subtitle">{{count(\App\Models\Rate::where('user_id',\Illuminate\Support\Facades\Auth::id())->get())}} Değerlendirme</div>
                                    </a>
                                </div>
                            </div>
                            <div class="profile-tabs">
                               <div class="tab-item active" data-tab_name="edit_profile">
                                   <h1 class="page-title">Profilim</h1>
                                   <div class="profile-settings">
                                       <div class="profile-settings-userpic">
                                           <div class="author-image">
                                               <img src="{{\Illuminate\Support\Facades\Auth::user()->avatar}}" alt="" class="image-cover">
                                           </div>
                                           <div class="select-file">
                                               <form id="c_avatar-form">
                                                   <input type="file" name="avatar" class="input-file" id="change_profile-userpic">
                                                   <label for="change_profile-userpic" class="file-label"><span>Avatarımı Değiştir </span></label>
                                                   <label style="color:#8E8E8E;font-size: 15px;position:relative;top:8px;">JPEG veya PNG formatı kabul edilir</label>
                                               </form>

                                           </div>
                                       </div>
                                       <form class="update_profile_form">
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
                                           <button class="btn" type="submit">
                                               <span>Profilimi Kaydet</span>
                                           </button>
                                       </form>

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
                                <div class="tab-item " data-tab_name="favourite">
                                    <div class="packages-archive profile_page_favourites">
                                        @foreach(\App\Models\Favorite::where('user_id',\Illuminate\Support\Facades\Auth::id())->get() as $item)
                                            @php $fav=\App\Models\Content::Where('id',$item->content_id)->first(); @endphp
                                            <a href="{{route('content_view',['self'=>$fav->title,'id'=>$item->content_id])}}" class="packages-item">
                                                <div class="shadow js-shadow"></div>
                                                <div class="bg-img" style="background-image: url({{$fav->big_photo}})"></div>
                                                <div class="packages-item-head">

                                                    <div class="favorites-tag js_delete-favorite " data-id="{{$item->content_id}}">
                                                        <span class="trash-icon"></span>
                                                    </div>
                                                </div>
                                                <div class="packages-item-foot">
                                                    <h3 class="packages-title">{{$fav->title}}</h3>
                                                    <div class="location pp-favs_date">{{\App\Http\Controllers\ContentController::encode_date($item->created_at)}} Tarihinde Eklendi</div>
                                                </div>
                                            </a>
                                        @endforeach


                                    </div>
                                </div>
                                <div class="tab-item" data-tab_name="reports" style="padding-top:20%;">
                                    <div class="accordion-block">

                                        @foreach(\App\Models\Report::where('user_id',\Illuminate\Support\Facades\Auth::id())->get() as $item)
                                            @php
                                                $reported_item=\App\Models\Content::where('id',$item->content_id)->first();
                                                @endphp
                                            <div class="accordion-item">
                                                <div class="accordion-item-title" style="display: flex;justify-content: space-between;">
                                                <span>
                                                    {{$reported_item->title}} İçeriğini Raporladınız
                                                </span>
                                                </div>
                                                <div class="accordion-item-content wp-content">
                                                    <p>
                                                    <ul class="checklist-ul">

                                                        <li>
                                                           Raporlama  Nedeni : {{$item->reason}}
                                                        </li>
                                                        <li class="disable-li">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut.
                                                        </li>
                                                        <li class="plus-li">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing.
                                                        </li>
                                                    </ul>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                                <div class="tab-item" data-tab_name="rates">
                                    <div class="author-list">
                                        @foreach(\App\Models\Rate::where('user_id',\Illuminate\Support\Facades\Auth::id())->get() as $item)
                                            @php
                                                $rated_item=\App\Models\Content::where('id',$item->content_id)->first();
                                                $score=floor(($item->rate_ds+$item->rate_ls+$item->rate_ab)/3);

                                                @endphp
                                            <a class="author-list-item ">
                                                <div class="author-image">
                                                    <img src="{{$rated_item->preview_photo}}" alt="" class="image-cover">
                                                </div>
                                                <p class="author-name">
                                                   {{$rated_item->title}}
                                                </p>
                                                <div class="author-posts">
                                                    Puanlamanız {{$score}}

                                                </div>
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
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
