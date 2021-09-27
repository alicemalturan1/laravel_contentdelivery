<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>İçerikler | Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/admin-assets/assets/images/favicon.ico">
    <!-- DataTables -->
    <link href="/admin-assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin-assets/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
          type="text/css" />
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

                @include('admin.section.page_header',['title'=>'İçerikler'])

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-lg-4">
                                        <h4 class="card-title mb-4">İçerikleri listele</h4>
                                    </div>

                                </div>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Başlık</th>
                                        <th>Dosya Boyutu</th>
                                        <th>Kategori</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>Son Güncellenme</th>
                                        <th>Aktiflik</th>
                                        <th>İşlem</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach(\App\Models\Content::all() as $item)
                                        <tr>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->size}}</td>
                                            <td>{{"Kat"}}</td>
                                            <td>{{\App\Http\Controllers\ContentController::encode_date($item->created_at)}}</td>
                                            <td>{{\App\Http\Controllers\ContentController::encode_date($item->updated_at)}}</td>
                                            <td class="d-flex align-items-center p-3 justify-content-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input toggle_contentactive" data-id="{{$item->id}}" type="checkbox"  checked>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group mt-4 mt-md-0" role="group" aria-label="Grup">
                                                    <a href="{{route('edit_content',['id'=>$item->id])}}" class="btn btn-success  btn-sm" >
                                                        <i class="bx bx-edit font-size-16 "></i>
                                                    </a>
                                                    <button class="btn btn-danger delete-content_btn btn-sm" data-id="{{$item->id}}">
                                                        <i class="bx bx-trash font-size-16 "></i>
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

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
<!-- Required datatable js -->
<script src="/admin-assets/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/admin-assets/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin-assets/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin-assets/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/admin-assets/assets/libs/jszip/jszip.min.js"></script>
<script src="/admin-assets/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="/admin-assets/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="/admin-assets/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/admin-assets/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/admin-assets/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- App js -->
<script src="/admin-assets/assets/js/app.js"></script>
<!-- Responsive examples -->
<script src="/admin-assets/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin-assets/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Datatable init js -->
<script src="/admin-assets/assets/js/pages/datatables.init.js"></script>
<script src="/admin-assets/assets/js/proccesses.js"></script>
</body>

</html>
