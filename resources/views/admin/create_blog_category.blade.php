<!doctype html>
<html lang="tr">

<head>

    <meta charset="utf-8" />
    <title>Blog Kategorisi Oluştur | Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/admin-assets/assets/images/favicon.ico">

    <!-- datepicker css -->
    <link href="/admin-assets/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/admin-assets/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- dragula css -->
    <link href="/admin-assets/assets/libs/dragula/dragula.min.css" rel="stylesheet" type="text/css" />
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

                @include('admin.section.page_header',['title'=>'Blog Kategorisi Oluştur'])

                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="card  border border-gray" style="border-radius: 1.2rem;">
                            <div class="card-body">

                                <form class="outer-repeater create_content-form" method="post">
                                    <div class="row justify-content-end pb-3">
                                        <div class="col-xl-2 col-lg-4 col-md-5 col-sm-12">
                                            <button style="width: 100%;" class="m-1 btn  btn-outline-success waves-effect waves-light">
                                                <i class="fas fa-angle-double-right font-size-16 align-middle me-2"></i>
                                                Oluştur
                                            </button>

                                        </div>

                                    </div>
                                    <div data-repeater-list="outer-group" class="outer">
                                        <div data-repeater-item class="outer">
                                            <div class="form-group row mb-4">

                                                <div class="col-lg-12">
                                                    <input id="taskname" name="title" type="text"
                                                           class="form-control" placeholder="Kategori adı giriniz...">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">

                                                <div class="col-lg-12">
                                                    <textarea name="description" style="resize:none;border-radius: 0.5rem;" class="form-control" rows="20" placeholder="Açıklama giriniz..."></textarea>
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

<script src="/admin-assets/assets/libs/select2/js/select2.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<!-- dragula plugins -->
<script src="/admin-assets/assets/libs/dragula/dragula.min.js"></script>

<script src="/admin-assets/assets/js/pages/task-kanban.init.js"></script>
<!-- form repeater js -->
<script src="/admin-assets/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>

<script src="/admin-assets/assets/js/pages/task-create.init.js"></script>
<script src="/admin-assets/assets/js/pages/form-advanced.init.js"></script>
<!-- App js -->
<script src="/admin-assets/assets/js/app.js"></script>

</body>

</html>
