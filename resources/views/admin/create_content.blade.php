<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>İçerik Oluştur | Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/admin-assets/assets/images/favicon.ico">

    <!-- datepicker css -->
    <link href="/admin-assets/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="/admin-assets/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/admin-assets/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/admin-assets/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-layout="detached" data-topbar="colored">



<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.section.top_menu')
        @include('admin.section.left_menu')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

            @include('admin.section.page_header',['title'=>'İçerik Oluştur'])

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                              <div class="row justify-content-between">
                                  <div class="col-lg-4">
                                      <h4 class="card-title mb-4">İçerik oluşturma formu</h4>
                                  </div>
                                  <div class="col-lg-8 d-flex justify-content-end pb-3">
                                      <button class="m-1 btn  btn-outline-success waves-effect waves-light">
                                          <i class="bx bx-check-double font-size-16 align-middle me-2"></i>
                                          Kaydet
                                      </button>

                                  </div>
                              </div>
                                <form class="outer-repeater create_content-form" method="post">
                                    <div data-repeater-list="outer-group" class="outer">
                                        <div data-repeater-item class="outer">
                                            <div class="form-group row mb-4">
                                                <label for="taskname" class="col-form-label col-lg-2">İçerik Başlığı</label>
                                                <div class="col-lg-10">
                                                    <input id="taskname" name="title" type="text"
                                                           class="form-control" placeholder="Başlık giriniz...">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label col-lg-2">İçerik Detayı</label>
                                                <div class="col-lg-10">
                                                    <textarea id="taskdesc-editor" name="description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label col-lg-2">Fotoğraf</label>
                                                <div class="col-lg-10">
                                                    <div class="input-group ">
                                                        <input type="file" class="form-control" name="photo" id="inputGroupFile02">
                                                        <label class="input-group-text" for="inputGroupFile02">Yükle</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center pt-3 pb-2">
                                                <label class=" col-lg-2">İndirme Kanalı</label>
                                                <div class="col-lg-5">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio" name="download_channel" id="d_channel-radio[0]"  value="0" >
                                                        <label class="form-check-label" for="d_channel-radio[0]">
                                                            İçeriği sunucuya yükle
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio" name="download_channel" id="d_channel-radio[1]"  value="1" >
                                                        <label class="form-check-label" for="d_channel-radio[1]">
                                                            İçeriğin linkini ekle
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="taskbudget" class="col-form-label col-lg-2">İçeriğin Linki</label>
                                                <div class="col-lg-10">
                                                    <input id="taskbudget" name="link" type="text"
                                                           placeholder="Enter Task Budget..." class="form-control" value="0">
                                                    <p class="text-muted text-center p-2">İndirme kanalı sunucu değil ise burayı doldurun yok ise değere 0 girin.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-lg-2 col-form-label">İçerik dosyası</label>
                                                <div class="col-lg-10">
                                                    <div class="input-group ">
                                                        <input type="file" class="form-control" name="photo" id="inputGroupFile03">
                                                        <label class="input-group-text" for="inputGroupFile03">Yükle</label>
                                                    </div>
                                                    <p class="text-muted text-center p-2">İndirme kanalı sunucu dışı ise dosyayı yükleyin, sıfırlamak için
                                                        <a href="#" class="text-info reset-file-content">buraya</a> tıklayabilirsiniz.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Qovex.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-end">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="/admin-assets/assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
            </div>

            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="/admin-assets/assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
            </div>



            <div class="mb-2">
                <img src="/admin-assets/assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-5">
                <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                       data-appStyle="/admin-assets/assets/css/app-rtl.min.css" />
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

        </div>

    </div>
    <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<!-- JAVASCRIPT -->
<script src="/admin-assets/assets/libs/jquery/jquery.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin-assets/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/admin-assets/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/admin-assets/assets/libs/node-waves/waves.min.js"></script>
<script src="/admin-assets/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- bootstrap datepicker -->
<script src="/admin-assets/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!--tinymce js-->
<script src="/admin-assets/assets/libs/tinymce/tinymce.min.js"></script>

<!-- form repeater js -->
<script src="/admin-assets/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>

<script src="/admin-assets/assets/js/pages/task-create.init.js"></script>

<!-- App js -->
<script src="/admin-assets/assets/js/app.js"></script>

</body>

</html>
