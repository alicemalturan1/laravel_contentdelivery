<!doctype html>
<html lang="tr">

<head>

    <meta charset="utf-8" />
    <title>Erişim Engellendi !</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/admin-assets/assets/images/favicon.ico">
    @include("admin.section.panelstyle")
    <!-- Icons Css -->
    <link href="/admin-assets/assets/css/icons.min.css" rel="stylesheet" type="text/css" />


</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">

                    <div class="card-body">

                        <div class="text-center p-3">

                            <div class="img">
                                <img src="/admin-assets/assets/images/error-img.png" class="img-fluid" alt="">
                            </div>

                            <h4 class="mb-4 mt-5">Erişim Engellendi!</h4>
                            <p class="mb-4 w-75 mx-auto">Üzgünüm, bu sayfaya erişim kısıtlı daha iyi sayfalar görmek istersen butona tıklayabilirsin.</p>
                           <div class="row justify-content-center">
                              @if(!$parity)
                               <div class="col-lg-6 pt-1">
                                   <a class="btn btn-dark mb-4 waves-effect waves-light w-100" href="{{$back_url}}"><i
                                           class="fas fa-angle-double-left"></i> Geri dön</a>
                               </div>
                               @endif
                               <div class="col-lg-6 pt-1">
                                   <a class="btn btn-primary mb-4 waves-effect waves-light w-100" href="/"><i
                                           class="mdi mdi-home"></i> Anasayfaya dön</a>
                               </div>
                           </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<!-- JAVASCRIPT -->
<script src="/admin-assets/assets/libs/jquery/jquery.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin-assets/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/admin-assets/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/admin-assets/assets/libs/node-waves/waves.min.js"></script>
<script src="/admin-assets/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

<script src="/admin-assets/assets/js/app.js"></script>

</body>

</html>
