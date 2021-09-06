<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Üst Menü Linki Oluştur | Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/admin-assets/assets/images/favicon.ico">

    <!-- datepicker css -->
    <link href="/admin-assets/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/admin-assets/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
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

                @include('admin.section.page_header',['title'=>'Üst Menü Linki Oluştur'])

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-lg-4">
                                        <h4 class="card-title mb-4">Üst Menü Linki Oluşturma formu</h4>
                                    </div>
                                    <div class="col-lg-8 d-flex justify-content-end pb-3">
                                        <button class="m-1 btn  btn-outline-success waves-effect waves-light">
                                            <i class="bx bx-check-double font-size-16 align-middle me-2"></i>
                                            Oluştur
                                        </button>

                                    </div>
                                </div>
                                <form class="outer-repeater create_content-form" method="post">
                                    <div data-repeater-list="outer-group" class="outer">
                                        <div data-repeater-item class="outer">
                                            <div class="form-group row mb-4">
                                                <label for="taskname" class="col-form-label col-lg-2">Link</label>
                                                <div class="col-lg-10">
                                                    <input id="taskname" name="link" type="text"
                                                           class="form-control" placeholder="Link giriniz...">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="taskname" class="col-form-label col-lg-2">Link Metni</label>
                                                <div class="col-lg-10">
                                                    <input id="taskname" name="link" type="text"
                                                           class="form-control" placeholder="Metin giriniz...">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4 row">
                                                <label class="col-lg-2">Üst Link</label>
                                               <div class="col-lg-10">
                                                   <select class="form-select" name="parent">
                                                        @foreach(\App\Models\TopMenuItems::whereNull('parent_id')->get() as $item)
                                                           <option value="{{$item->id}}">{{$item->text}}</option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-lg-2">Sıra</label>
                                                <div class="mb-3 col-lg-10">
                                                    <input data-toggle="touchspin" type="text" value="{{count(\App\Models\TopMenuItems::all())}}">
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="pt-1 pb-1">
                                                    <div style="padding-right: 0;" class="row  justify-content-end">
                                                        <div  style="padding-right: 0;" class="col-lg-10">
                                                            <div class="alert alert-warning text-center alert-dismissible fade pr-0 show mb-0" role="alert">
                                                                <i class="mdi mdi-alert-circle-outline me-2"></i>  Toplamda <b>{{count(\App\Models\TopMenuItems::all())}}</b> adet link bulunmaktadır.

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="pt-1 pb-1">
                                                    <div style="padding-right: 0;" class="row  justify-content-end">
                                                        <div  style="padding-right: 0;" class="col-lg-10">
                                                            <div class="alert alert-danger text-center alert-dismissible fade pr-0 show mb-0" role="alert">
                                                                <i class="mdi mdi-alert-circle-outline me-2"></i>  Üst menü maksimum 2 seviyelidir; bir ana link ve onun altında linkler olabilir.

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="pt-1 pb-1">
                                                    <div style="padding-right: 0;" class="row  justify-content-end">
                                                        <div  style="padding-right: 0;" class="col-lg-10">
                                                            <div class="alert alert-info text-center alert-dismissible fade pr-0 show mb-0" role="alert">
                                                                <i class="mdi mdi-alert-circle-outline me-2"></i>  Sıralama küçükten büyüğe doğru yapılmaktadır; aynı sıraya sahip birden fazla menü elemanı ekleyebilirsiniz fakat
                                                                aralarındaki sıralama düzgün olmayabilir. Aynı sıraya sahip eleman eklemekten kaçınmanızı tavsiye ederiz.

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

<!-- form repeater js -->
<script src="/admin-assets/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>

<script src="/admin-assets/assets/js/pages/task-create.init.js"></script>
<script src="/admin-assets/assets/js/pages/form-advanced.init.js"></script>
<!-- App js -->
<script src="/admin-assets/assets/js/app.js"></script>

</body>

</html>
