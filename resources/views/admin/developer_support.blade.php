<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Geliştiriciye Ulaş | Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/admin-assets/assets/images/favicon.ico">

    <!-- datepicker css -->
    <link href="/admin-assets/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">



    <!-- Icons Css -->
    <link href="/admin-assets/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    @include('admin.section.panelstyle')

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

                @include('admin.section.page_header',['title'=>'Geliştiriciye mesaj gönder'])

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-lg-4">
                                        <h4 class="card-title mb-4">Geliştirici destek formu</h4>
                                    </div>
                                    <div class="col-lg-8 d-flex justify-content-end pb-3">
                                        <button class="m-1 btn developersprtformsubmitbtn btn-outline-success waves-effect waves-light">
                                            <i class="mdi mdi-send-clock "></i>
                                            Gönder
                                        </button>

                                    </div>
                                </div>
                                <div class="row pt-3 justify-content-end pb-2 align-items-center ">
                                    <div class="col-lg-10 sprtdev-mbx">
                                        <div class="alert alert-success d-none">
                                            Destek talebiniz başarıyla gönderildi.
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="alert alert-danger d-none">
                                            Bir hata oluştu tekrar deneyin.
                                        </div>
                                    </div>
                                </div>
                                <form class=" createdevelopersupport-form" method="post">
                                    <div data-repeater-list="outer-group" class="outer">
                                        <div data-repeater-item class="outer">
                                            <div class="form-group row mb-4">
                                                <label for="taskname" class="col-form-label col-lg-2">Başlık</label>
                                                <div class="col-lg-10">
                                                    <input id="taskname" name="title" type="text"
                                                           class="form-control" placeholder="Başlık giriniz..." required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="taskname" class="col-form-label col-lg-2">Konu</label>
                                                <div class="col-lg-10">
                                                    <input id="taskname" name="subject" type="text"
                                                           class="form-control" placeholder="Konu giriniz..." required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label col-lg-2">İçerik </label>
                                                <div class="col-lg-10">
                                                    <textarea rows="20"   class="form-control" style="resize: none;" name="content"></textarea>

                                                </div>
                                                <div class="pt-2 pb-2">
                                                <div style="padding-right: 0;" class="row  justify-content-end">
                                                    <div  style="padding-right: 0;" class="col-lg-10">
                                                        <div class="alert alert-info text-center alert-dismissible fade pr-0 show mb-0" role="alert">
                                                            <i class="mdi mdi-alert-circle-outline me-2"></i> HTML tag kullanmamaya dikkat ediniz, Sadece metin olarak yazdırılır.

                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="pt-2 pb-2">
                                                    <div style="padding-right: 0;" class="row  justify-content-end">
                                                        <div  style="padding-right: 0;" class="col-lg-10">
                                                            <div class="alert alert-danger text-center alert-dismissible fade pr-0 show mb-0" role="alert">
                                                                <i class="mdi mdi-alert-circle-outline me-2"></i> Fotoğraf veya dosya paylaşımı için açıklama bölümüne link bırakmanız yeterlidir.

                                                            </div>
                                                        </div>
                                                    </div>
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
            @include('admin.section.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->

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
