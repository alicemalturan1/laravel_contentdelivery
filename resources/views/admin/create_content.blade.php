<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>İçerik Oluştur | Panel</title>
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

            @include('admin.section.page_header',['title'=>'İçerik Oluştur'])
                <form class="outer-repeater create_content-form" method="post">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card bg-transparent rounded-pill">
                            <div class="card-body bg-transparent pt-0 ">

                                <div class="row justify-content-center ">


                                        <input type="file" class="form-control d-none"  name="content_photo" accept="image/png,image/jpeg" >

                                            <a class="col-lg-11    custom-file-input-dashed" data-name="content_photo" href="#">
                                                <div class="col-lg-12 card justify-content-center position-relative d-flex align-items-center" style="border-radius:14px;height: 440px;border:1px solid #eff2f7">


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
                                <div class="row justify-content-center mt-2">


                                    <input type="file" class="form-control d-none" name="content_file" >

                                    <a class="col-lg-11  custom-file-input-dashed" data-name="content_file" href="#">
                                        <div class="col-lg-12 card justify-content-center d-flex align-items-center" style="border-radius:14px;height: 440px;border:1px solid #eff2f7">


                                            <div class="col-lg-10 p-1 text-center">
                                                <i class="mdi mdi-folder-settings text-muted" style="font-size:3.5rem;"></i>
                                                <br>
                                                <span class="text-dark font-family " style="font-size:1.2rem;">İçerik dosyası</span>
                                                <br><br>
                                                <span  style="font-size:0.83rem;">Form alanından sunucu seçeneğini işaretlemezseniz ve bu alanda dosya varsa aşağıda bulunan dosya sıfırla butonuna tıklayınız.</span>
                                            </div>


                                            <div class="col-lg-12 text-center content_fileinput_valuetext position-absolute p-4 " style="bottom:0;">
                                                Dosya seçilmedi
                                            </div>

                                        </div>
                                    </a>




                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 p-1">
                                        <button type="button" style="width:100%;" class="btn btn-icon btn-danger content_file_reset-btn">
                                            <i class="fab fa-rev"></i>
                                            Dosyayı Sıfırla
                                        </button>
                                    </div>
                                    <div class="col-lg-5 p-1" >
                                        <button type="button" style="width:100%;" class="btn btn-icon btn-danger content_photo_reset-btn">
                                            <i class="fab fa-rev"></i>
                                            Fotoğrafı Sıfırla
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                              <div class="row justify-content-between">

                                  <div class="row  justify-content-end pb-3">
                                     <div class="col-xl-2 col-lg-4 col-md-5 col-sm-12">
                                         <button  class="w-100 m-1 btn  btn-success waves-effect waves-light">
                                             <i class="fas fa-angle-double-right font-size-16 align-middle me-2"></i>
                                             Kaydet
                                         </button>
                                     </div>

                                  </div>
                              </div>

                                    <div data-repeater-list="outer-group" class="outer">
                                        <div data-repeater-item class="outer">
                                            <div class="form-group row mb-4">

                                                <div class="col-lg-12">
                                                    <input id="taskname" name="title" type="text"
                                                           class="form-control" placeholder="Başlık giriniz...">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">

                                                <div class="col-lg-12">
                                                    <textarea id="maxh-editor" name="description"></textarea>

                                                </div>


                                            </div>
                                           <div class="row">
                                               <div class=" pt-1 pb-5">
                                                   <div  class="row  justify-content-end">
                                                       <div   class="col-lg-12">
                                                           <div class="alert alert-info text-center alert-dismissible fade pr-0 show mb-0" role="alert">
                                                               <i class="mdi mdi-alert-circle-outline me-2"></i>  İçeriğin detayında hazır bloklar kullanabilirsin. BBCODE altyapısı ile hazırlanan bu blokları görmek için
                                                               <a href="{{route('content_blocksinfo')}}" class="text-info" target="_blank"> buraya</a> tıklayabilirsin

                                                           </div>
                                                       </div>
                                                   </div>

                                               </div>
                                           </div>

                                            <div class="row justify-content-between  pb-2">

                                                <div class="col-lg-6">
                                                    <div class="form-check text-center alert alert-primary mb-2">
                                                        <input class="form-check-input cnt_dcinput" style="margin-left: 0;" type="radio" name="download_channel" id="d_channel-radio[0]"  value="0" >
                                                        <label class="form-check-label"  style="width: 85%;" for="d_channel-radio[0]">
                                                            İçeriği sunucuya yükle
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check text-center alert alert-secondary mb-2">
                                                        <input class="form-check-input cnt_dcinput" style="margin-left: 0;" type="radio" name="download_channel" id="d_channel-radio[1]"  value="1" >
                                                        <label class="form-check-label" style="width: 85%;" for="d_channel-radio[1]">
                                                            İçeriğin linkini ekle
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">

                                                <div class="col-lg-12">
                                                    <input id="taskbudget" name="link" type="text"
                                                           placeholder="Link Giriniz" class="form-control" >


                                                </div>

                                            </div>
                                            <div  class="row ">
                                                <div  class="col-lg-12">
                                                    <div class="alert text-center alert-info alert-dismissible fade pr-0 show mb-0" role="alert">
                                                        <i class="mdi mdi-alert-circle-outline me-2"></i>  İndirme kanalı sunucu değil ise burayı doldurun yok ise değeri boş bırakın.

                                                    </div>
                                                </div>
                                            </div>
                                    </div>



                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                </form>
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
