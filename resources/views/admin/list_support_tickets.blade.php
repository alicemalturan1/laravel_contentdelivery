<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Destek Biletleri | Panel</title>
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

                @include('admin.section.page_header',['title'=>'Destek Biletleri'])


                <div class="row ">


                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">

                                <!-- end dropdown -->

                                <h4 class="card-title mb-4">Yeni</h4>
                                <div id="new" class="p-1 pb-3 pt-2 task-list">
                                    <div class="col-lg-12 not_found-text text-center font-size-12 @if(count(\App\Models\SupportTicket::where('presence','0')->whereNull('reply_id')->orderBy('id','desc')->get())>0) d-none @endif text-muted">
                                        Şu anda yeni bilet bulunmuyor, güncelle diyerek yeni bilet varsa görebilirsin.
                                    </div>
                                    @foreach(\App\Models\SupportTicket::where('presence','0')->whereNull('reply_id')->orderBy('id','desc')->get() as $item)
                                        <div class="card task-box" data-id="{{$item->id}}">
                                            <div class="card-body">
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                       aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <button class="dropdown-item show_ticket_modalbtn"  data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#show_ticket_modal">Görüntüle</button>
                                                        <button class="dropdown-item reply_supportticket_btn" data-id="{{$item->id}}"  >Yanıtla</button>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h5 class="font-size-15"><a href="javascript: void(0);"
                                                                                class="text-dark">{{$item->title}}</a></h5>
                                                    <p class="text-muted">{{\App\Http\Controllers\ContentController::encode_date($item->created_at)}}</p>
                                                </div>



                                                <div class="team float-start">
                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            {{\App\Http\Controllers\UserController::get_by_id($item->user_id)->name[0]}}
                                                        </span>
                                                        </div>
                                                    </a>

                                                </div>

                                                <div class="text-end">
                                                    <h5 class="font-size-15 mb-1">{{count(\App\Models\SupportTicket::where('reply_id',$item->id)->get())}}</h5>
                                                    <p class="mb-0 text-muted">Mesaj</p>
                                                </div>
                                                <div class=" pt-2 ">
                                                <span
                                                    class="badge rounded-pill badge-soft-primary font-size-12">{{$item->reason}}</span>
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

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title mb-4">Açık</h4>
                                <div id="in_progress" class="p-1 pb-3 pt-2 task-list">
                                    <div class="col-lg-12 not_found-text text-center font-size-12 @if(count(\App\Models\SupportTicket::where('presence','1')->whereNull('reply_id')->orderBy('id','desc')->get())>0) d-none @endif text-muted">
                                        Şu anda yeni bilet bulunmuyor, güncelle diyerek yeni bilet varsa görebilirsin.
                                    </div>
                                    @foreach(\App\Models\SupportTicket::where('presence','1')->whereNull('reply_id')->orderBy('id','desc')->get() as $item)
                                        <div class="card task-box" data-id="{{$item->id}}">
                                            <div class="card-body">
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                       aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <button class="dropdown-item show_ticket_modalbtn" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#show_ticket_modal" href="#">Görüntüle</button>
                                                        <button class="dropdown-item reply_supportticket_btn" data-id="{{$item->id}}" href="#">Yanıtla</button>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h5 class="font-size-15"><a href="javascript: void(0);"
                                                                                class="text-dark">{{$item->title}}</a></h5>
                                                    <p class="text-muted">{{\App\Http\Controllers\ContentController::encode_date($item->created_at)}}</p>
                                                </div>



                                                <div class="team float-start">
                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            {{\App\Http\Controllers\UserController::get_by_id($item->user_id)->name[0]}}
                                                        </span>
                                                        </div>
                                                    </a>

                                                </div>

                                                <div class="text-end">
                                                    <h5 class="font-size-15 mb-1">{{count(\App\Models\SupportTicket::where('reply_id',$item->id)->get())}}</h5>
                                                    <p class="mb-0 text-muted">Mesaj</p>
                                                </div>
                                                <div class=" pt-2 ">
                                                <span
                                                    class="badge rounded-pill badge-soft-primary font-size-12">{{$item->reason}}</span>
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

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">


                                <h4 class="card-title mb-4">Kilitlendi</h4>

                                <div id="locked" class="p-1 pb-3 pt-2 task-list">
                                    <div class="col-lg-12 not_found-text text-center font-size-12 @if(count(\App\Models\SupportTicket::where('presence','2')->whereNull('reply_id')->orderBy('id','desc')->get())>0) d-none @endif text-muted">
                                        Şu anda kilitli bilet bulunmuyor, güncelle diyerek yeni bilet varsa görebilirsin.
                                    </div>
                                    @foreach(\App\Models\SupportTicket::where('presence','2')->whereNull('reply_id')->orderBy('id','desc')->get() as $item)
                                        <div class="card task-box" data-id="{{$item->id}}">
                                            <div class="card-body">
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                       aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <button class="dropdown-item show_ticket_modalbtn" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#show_ticket_modal" href="#">Görüntüle</button>
                                                        <button class="dropdown-item reply_supportticket_btn" data-id="{{$item->id}}" disabled >Yanıtla</button>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h5 class="font-size-15"><a href="javascript: void(0);"
                                                                                class="text-dark">{{$item->title}}</a></h5>
                                                    <p class="text-muted">{{\App\Http\Controllers\ContentController::encode_date($item->created_at)}}</p>
                                                </div>



                                                <div class="team float-start">
                                                    <a href="javascript: void(0);" class="team-member d-inline-block">
                                                        <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            {{\App\Http\Controllers\UserController::get_by_id($item->user_id)->name[0]}}
                                                        </span>
                                                        </div>
                                                    </a>

                                                </div>

                                                <div class="text-end">
                                                    <h5 class="font-size-15 mb-1">{{count(\App\Models\SupportTicket::where('reply_id',$item->id)->get())}}</h5>
                                                    <p class="mb-0 text-muted">Mesaj</p>
                                                </div>
                                                <div class=" pt-2 ">
                                                <span
                                                    class="badge rounded-pill badge-soft-primary font-size-12">{{$item->reason}}</span>
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
<div class="modal   fade" id="show_ticket_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered" >
        <div class="modal-content">


                <div class="modal-body position-relative metismenu " >
                    <div class="row p-3 pt-2 justify-content-end">

                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="row list_support_ticketfromaxios">


                    </div>




                </div>

        </div>
    </div>
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

<script src="/admin-assets/assets/js/pages/form-advanced.init.js"></script>
<!-- App js -->
<script src="/admin-assets/assets/js/app.js"></script>
<script>
    var drake = dragula([document.getElementById("new"),document.getElementById("in_progress"),document.getElementById("locked")],{
        accepts:function(el, target, source, sibling){
            var current_id =$(el).parent().attr("id"),new_id=$(target).attr("id");
            if( ( !(current_id =="in_progress" && new_id == "new" ) || (current_id =="locked" && new_id == "new" ) ) ){
                return true;
            }
        }
    });
    drake.on('drop',function(el, target, source, sibling){
        var progress_list = {"new":0,'locked':2,'in_progress':1};
        var dropped =progress_list[$(target).attr("id")];
        var id = $(el).data('id');
        if ($(target).attr("id") == "locked"){
          $(".reply_supportticket_btn[data-id="+id+"]").attr("disabled",true);
        }else{
            $(".reply_supportticket_btn[data-id="+id+"]").attr("disabled",false);
        }
        axios.post('/admin/support_ticket/update_presence',{"id":id,'presence':dropped});
    });
</script>
</body>

</html>
