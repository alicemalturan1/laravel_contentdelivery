<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Blog Yazısı Oluştur | Panel</title>
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

                @include('admin.section.page_header',['title'=>'Blog Yazısı Oluştur'])

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card border" style="border-radius:1.2rem;">
                            <div class="card-body">
                                <form class="outer-repeater create_blogpost-form" method="post">
                                   <div class="row">
                                       <div class="row justify-content-end pb-3">
                                           <div class="col-xl-2 col-lg-4 col-md-5 col-sm-12">
                                               <button style="width: 100%;" class="m-1 btn  btn-outline-success waves-effect waves-light">
                                                   <i class="fas fa-angle-double-right font-size-16 align-middle me-2"></i>
                                                    Oluştur
                                               </button>

                                           </div>

                                       </div>
                                       <div class="col-lg-9">
                                           <div data-repeater-list="outer-group" class="outer">
                                               <div data-repeater-item class="outer">

                                                   <div class="form-group row mb-4">

                                                       <div class="col-lg-12">
                                                           <input id="taskname" name="name" type="text"
                                                                  class="form-control" placeholder="Başlık giriniz...">
                                                       </div>
                                                   </div>
                                                   <div class="row mb-3">
                                                       <div class="col-lg-12">
                                                           <select class="form-control" name="category">
                                                               <option value="default" selected>Kategori Seçiniz</option>
                                                           </select>
                                                       </div>
                                                   </div>
                                                   <div class="form-group row mb-4">

                                                       <div class="col-lg-12">
                                                           <textarea rows="30" id="maxh-editor"  class="form-control" style="resize: none;" name="description"></textarea>

                                                       </div>



                                                   </div>
                                                   <div class="row">
                                                       <div  class="col-lg-12">
                                                           <div class="alert alert-info text-center alert-dismissible fade pr-0 show mb-0" role="alert">
                                                               <i class="mdi mdi-alert-circle-outline me-2"></i>  İçeriğin detayında hazır bloklar kullanabilirsin. BBCODE altyapısı ile hazırlanan bu blokları görmek için
                                                               <a href="{{route('content_blocksinfo')}}" class="text-info" target="_blank"> buraya</a> tıklayabilirsin

                                                           </div>
                                                       </div>
                                                   </div>


                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-lg-3 pt-3">
                                           <div class="card bg-transparent  rounded-pill" >
                                               <div class="card-body bg-transparent pt-0 ">

                                                   <div class="row justify-content-center ">


                                                       <input type="file" class="form-control d-none"  name="content_photo" accept="image/png,image/jpeg">

                                                       <a class="col-lg-11    custom-file-input-dashed" data-name="content_photo" href="#">
                                                           <div class="col-lg-12 card justify-content-center d-flex align-items-center" style="border-radius:14px;height: 440px;border:1px solid #eff2f7">


                                                               <div class="col-lg-10 p-1 text-center">
                                                                   <i class="dripicons-plus text-info" style="font-size:3.5rem;"></i>

                                                                   <br>
                                                                   <span class="text-dark font-family " style="font-size:1.2rem;">İçeriğin fotoğrafı</span>
                                                                   <br><br>
                                                                   <span  style="font-size:0.88rem;">İçeriği açıklayacak bir fotoğrafı buraya yükleyiniz, sadece jpg ve png formatı kabul edilir.</span>
                                                               </div>
                                                               <div class="col-lg-12 text-center content_photoinput_valuetext position-absolute p-4 " style="bottom:0;">
                                                                   Dosya seçilmedi
                                                               </div>


                                                           </div>
                                                       </a>




                                                   </div>

                                                   <div class="row justify-content-center">

                                                       <div class="col-lg-10 p-1" >
                                                           <button type="button" style="width:100%;" class="btn btn-icon btn-danger content_photo_reset-btn">
                                                               <i class="fab fa-rev"></i>
                                                               Fotoğrafı Sıfırla
                                                           </button>
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
