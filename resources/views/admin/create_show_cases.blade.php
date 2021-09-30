<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Vitrin Oluştur | Panel</title>
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

                @include('admin.section.page_header',['title'=>'Vitrin Oluştur'])

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form class="outer-repeater create_content-form" method="post">
                                    <div class="row justify-content-between">
                                        <div class="col-lg-4">
                                            <h4 class="card-title mb-4">Vitrin Oluşturma formu</h4>
                                        </div>
                                        <div class="col-lg-8 d-flex justify-content-end pb-3">
                                            <button class="m-1 btn  btn-outline-success waves-effect waves-light" >
                                                <i class="bx bx-check-double font-size-16 align-middle me-2"></i>
                                                Oluştur
                                            </button>

                                        </div>
                                    </div>
                                    <div data-repeater-list="outer-group" class="outer">
                                        <div data-repeater-item class="outer">
                                            <div class="form-group row mb-4">
                                                <label for="taskname" class="col-form-label col-lg-2">Başlık</label>
                                                <div class="col-lg-10">
                                                    <input id="taskname" name="title" type="text"
                                                           class="form-control" placeholder="Başlık giriniz...">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="taskname" class="col-form-label col-lg-2">Açıklama</label>
                                                <div class="col-lg-10">
                                                    <textarea name="description" id="maxh-editor" class="form-control" rows="10"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row ">
                                                <label class="col-lg-2">Sıra</label>
                                                <div class="mb-3 col-lg-10">
                                                    <input data-toggle="touchspin" name="queqe" type="text" value="{{count(\App\Models\TopMenuItems::all())}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-lg-2">İçerikler</label>
                                                <div class="col-lg-10 justify-content-between d-flex">
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <style>
                                                                .contentkanbanbody{
                                                                    max-height: 600px;overflow-y: scroll;
                                                                }
                                                                .contentkanbanbody::-webkit-scrollbar{
                                                                    width: 10px;
                                                                    background: transparent;
                                                                    border-radius: 5px;

                                                                }
                                                                .contentkanbanbody::-webkit-scrollbar-thumb {
                                                                    background: #3b5de7;
                                                                    background-image: var(--bs-gradient)!important;
                                                                    border-radius: 6px;

                                                                }

                                                            </style>
                                                            <div class="card-body contentkanbanbody" >


                                                                <h4 class="card-title mb-4">Bütün İçerikler</h4>
                                                                <div id="inprogress-task" class="pb-1 task-list">
                                                                   @foreach(\App\Models\Content::where('is_active',1)->get() as $item)
                                                                    <div class="card task-box" data-id="{{$item->id}}">

                                                                        <div class="card-body " >

                                                                            <div>
                                                                                <h5 class="font-size-15"><a href="javascript: void(0);"
                                                                                                            class="text-dark">{{$item->title}}</a></h5>
                                                                                <p class="text-muted">{{\App\Http\Controllers\ContentController::encode_date($item->created_at)}}</p>
                                                                            </div>





                                                                        </div>

                                                                    </div>
                                                                    <!-- end task card -->
                                                                    @endforeach


                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->

                                                    <div class="col-lg-5">
                                                        <div class="card border border-success">
                                                            <div class="card-body">

                                                                <!-- end dropdown -->

                                                                <h4 class="card-title mb-4">Vitrindeki İçerikler</h4>
                                                                <div id="complete-task" class="pb-3 pt-3 task-list">


                                                                </div>

                                                                <div class="text-center">
                                                                  Görünmesini istediğiniz içeriği bu alana sürükleyiniz.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>

                                            </div>
                                            <!-- end row -->
                                            <div class="row ">

                                                <div class="pt-1 pb-1">
                                                    <div style="padding-right: 0;" class="row  justify-content-end">
                                                        <div  style="padding-right: 0;" class="col-lg-10">
                                                            <div class="alert alert-danger text-center alert-dismissible fade pr-0 show mb-0" role="alert">
                                                                <i class="mdi mdi-alert-circle-outline me-2"></i>  Vitrinde gözükmesini istediğiniz içerikleri <u><b>bütün içerikler</b></u> adlı alandan <u><b>vitrindeki içerikler</b></u> alanına sürüklemeniz yeterlidir.

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="pt-1 pb-1">
                                                    <div style="padding-right: 0;" class="row  justify-content-end">
                                                        <div  style="padding-right: 0;" class="col-lg-10">
                                                            <div class="alert alert-info text-center alert-dismissible fade pr-0 show mb-0" role="alert">
                                                                <i class="mdi mdi-alert-circle-outline me-2"></i>  Sıralama küçükten büyüğe doğru yapılmaktadır; aynı sıraya sahip birden fazla vitrin ekleyebilirsiniz fakat
                                                                aralarındaki sıralama düzgün olmayabilir. Aynı sıraya sahip vitrin eklemekten kaçınmanızı tavsiye ederiz.

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
