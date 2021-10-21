<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Üst Menü  | Panel</title>
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

                @include('admin.section.page_header',['title'=>'Üst Menü'])

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card border" style="border-radius:1.2rem;">
                            <div class="card-body">
                                <div class="outer-repeater" method="post">
                                    <div class="row">
                                        <div class="row justify-content-end pb-3">
                                            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#new_link_modal" style="width: 100%;" class="m-1 btn  btn-outline-success waves-effect waves-light">
                                                    <i class="fas fa-angle-double-right font-size-16 align-middle me-1"></i>
                                                    Ana Link Oluştur
                                                </button>

                                            </div>

                                        </div>
                                        <div class="col-lg-9">
                                            <div class="modal fade" id="new_link_modal" tabindex="-1" role="dialog"
                                                 aria-labelledby="composemodalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="composemodalTitle"> Link Oluştur</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <form class="new_toplinkform">
                                                        <div class="modal-body">

                                                                <div>


                                                                    <div class="mb-3">
                                                                        <input type="text" class="form-control" name="text" placeholder="Metin">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text" class="form-control" name="link" placeholder="Bağlantı">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text" class="form-control" name="queqe" data-toggle="touchspin" placeholder="Sıra">
                                                                    </div>

                                                                </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                                                            <button type="submit" class="btn btn-primary">Oluştur <i
                                                                    class="fab fa-telegram-plane ms-1"></i></button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="new_child_modal" tabindex="-1" role="dialog"
                                                 aria-labelledby="composemodalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="composemodalTitle">Alt Link Oluştur</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <form class="new_topmenuchild-form">
                                                            <div class="modal-body">
                                                                <div>
                                                                    <input type="hidden" name="parent_id">

                                                                    <div class="mb-3">
                                                                        <input type="text" class="form-control" name="text" placeholder="Metin">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text" class="form-control" name="link" placeholder="Bağlantı">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text" data-toggle="touchspin" placeholder="Sıra" name="queqe">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                                                                <button type="submit" class="btn btn-primary">Oluştur <i
                                                                        class="fab fa-telegram-plane ms-1"></i></button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="remove_link_modal" tabindex="-1" role="dialog"
                                                 aria-labelledby="composemodalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="composemodalTitle">  Linki silmek istediğine emin misin ?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Link ile beraber şunlar da silinecek;
                                                            </p>

                                                            <div class="plan-features p-4 text-muted mt-2">
                                                                <p><i class="mdi mdi-check-bold text-primary me-4"></i>Linkin altında bulunan linkler</p>
                                                                <p><i class="mdi mdi-check-bold text-primary me-4"></i>Kayıt tutuluyorsa işlem kayıtları</p>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success removelink_confirm-btn" >Sil</button>
                                                            <button type="button" class="btn btn-danger close_removelinkmodal-btn" data-bs-dismiss="modal">İptal </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alerts_block row">

                                            </div>
                                            @if (count(\App\Models\TopMenuItems::whereNull('parent_id')->orderBy('queqe','asc')->get())<1)
                                                <div class="col-lg-12 text-center font-size-14">
                                                    Link bulunamadı, hemen ana link oluştur butonuna tıklayarak link oluşturabilirsiniz.
                                                </div>
                                            @endif
                                            <div class="accordion" id="accordionExample">
                                                @foreach(\App\Models\TopMenuItems::whereNull('parent_id')->orderBy('queqe','asc')->get() as $item)

                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading{{$item->id}}">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="false" aria-controls="collapse{{$item->id}}">
                                                                {{$item->text}}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$item->id}}" data-bs-parent="#accordionExample" style="">
                                                            <div class="accordion-body">
                                                                <div class="p-1 ">
                                                                    <div class="p-1" >
                                                                        <div class="row justify-content-end">
                                                                            <div class="col-xl-3 col-lg-6 pt-1">
                                                                                <button data-bs-toggle="modal" style="width:100%;" data-bs-target="#new_child_modal" type="button" data-id="{{$item->id}}"  style="width:100%;" class="btn btn-primary new_topmchild-btn"><i class="fas fa-link"></i> Alt Link Oluştur</button>

                                                                            </div>

                                                                                <div class="col-xl-3 col-lg-6 pt-1">
                                                                                    <button type="button"  style="width: 100%;" class="btn btn-danger remove_linkbtn" data-bs-toggle="modal" data-bs-target="#remove_link_modal" data-id="{{$item->id}}"> <i class="fas fa-ban"></i> Kaldır</button>
                                                                                </div>

                                                                        </div>
                                                                        <form class="update_topmenuitem-form">
                                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                                            <div class="row p-1 mb-1">
                                                                               <div class="col-lg-12">
                                                                                   <label> Bağlantı</label>
                                                                                   <input type="text" name="link" class="form-control" value="{{$item->link}}">
                                                                               </div>
                                                                            </div>
                                                                            <div class="row p-1 mb-1">
                                                                                <div class="col-lg-12">
                                                                                    <label> Metin</label>
                                                                                    <input type="text" name="text" class="form-control" value="{{$item->text}}">
                                                                                </div>

                                                                            </div>
                                                                            <div class="row p-1 mb-1">
                                                                                <div class="col-lg-12">
                                                                                    <label >Sıra</label>
                                                                                    <input data-toggle="touchspin"  name="queqe" type="text" value="{{$item->queqe}}">
                                                                                </div>

                                                                            </div>
                                                                           <div class="row justify-content-center pt-1">
                                                                               <div class="col-lg-3 pt-1">
                                                                                   <button type="submit"  style="width: 100%;" class="btn btn-success"> <i class="fab fa-rev"></i> Güncelle</button>
                                                                               </div>

                                                                           </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion" id="accordion_in{{$item->id}}">
                                                                @foreach(\App\Models\TopMenuItems::where('parent_id',$item->id)->orderBy('queqe','asc')->get() as $child)
                                                                    <div class="row ">

                                                                        <div class="col-lg-12">
                                                                            <div class="accordion-item">
                                                                                <h2 class="accordion-header" id="heading{{$child->id}}">
                                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$child->id}}" aria-expanded="false" aria-controls="collapse{{$child->id}}">
                                                                                        {{$child->text}}
                                                                                    </button>
                                                                                </h2>
                                                                                <div id="collapse{{$child->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$child->id}}" data-bs-parent="accordion_in{{$item->id}}" style="">
                                                                                    <div class="accordion-body">
                                                                                        <div class="p-1">
                                                                                            <div class="p-1">
                                                                                                <form class="update_topmenuitem-form">
                                                                                                    <input type="hidden" name="id" value="{{$child->id}}">
                                                                                                    <div class="row p-1">
                                                                                                       <div class="col-lg-12">
                                                                                                           <label> Bağlantı</label>
                                                                                                           <input type="text" name="link" class="form-control" value="{{$child->link}}">
                                                                                                       </div>
                                                                                                    </div>
                                                                                                    <div class="row p-1">
                                                                                                        <div class="col-lg-12">
                                                                                                            <label> Metin</label>
                                                                                                            <input type="text" name="text" class="form-control" value="{{$child->text}}">
                                                                                                        </div>

                                                                                                    </div>

                                                                                                    <div class="row p-1">
                                                                                                        <div class="col-lg-12">
                                                                                                            <label> Sıra</label>
                                                                                                            <input type="text" name="queqe" data-toggle="touchspin" value="{{$child->queqe}}">
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="row justify-content-center pt-1">
                                                                                                        <div class="col-lg-3 pt-1">
                                                                                                            <button  style="width: 100%;" class="btn btn-success"> <i class="fab fa-rev"></i> Güncelle</button>
                                                                                                        </div>
                                                                                                        <div class="col-lg-3 pt-1">
                                                                                                            <button type="button" style="width: 100%;" class="btn remove_linkbtn btn-danger" data-bs-toggle="modal" data-bs-target="#remove_link_modal" data-id="{{$child->id}}"> <i class="fas fa-ban"></i> Kaldır</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>

                                        </div>


                                    </div>
                                </div>




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
<script src="/admin-assets/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="/admin-assets/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<script src="/admin-assets/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- form repeater js -->
<script src="/admin-assets/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>

<script src="/admin-assets/assets/js/pages/task-create.init.js"></script>
<script src="/admin-assets/assets/js/pages/form-advanced.init.js"></script>
<!-- App js -->
<script src="/admin-assets/assets/js/app.js"></script>

</body>

</html>
