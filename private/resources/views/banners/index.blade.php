@extends('layouts.app')
@section('pageTitle', 'Ảnh quảng cáo')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>Quản lý ảnh quảng cáo</h1>
                        {{ Breadcrumbs::render('banners') }}
                    </header>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="container-fluid">
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="card card-data-tables customer-table-wrapper">
                        <header class="card-heading">
                            <h2 class="card-title">Danh sách ảnh quảng cáo</h2>
                            <small class="dataTables_info"></small>
                            <div class="card-search">
                                <div id="productsTable_wrapper" class="form-group label-floating is-empty">
                                    <i class="zmdi zmdi-search search-icon-left"></i>
                                    <input type="text" class="form-control filter-input" placeholder="Filter Products..." autocomplete="off">
                                    <a href="javascript:void(0)" class="close-search" data-card-search="close" data-toggle="tooltip" data-placement="top" title="Close"><i class="zmdi zmdi-close"></i></a>
                                </div>
                            </div>
                        </header>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="roomTable" class="mdl-data-table customer-table m-t-30 sweet_alerts_card" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Ảnh</th>
                                        <th>Link</th>
                                        <th>Vị trí hiển thị</th>
                                        <th>Lượt click</th>
                                        <th data-orderable="false">
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function () {
            $('#roomTable').DataTable({
                stateSave: true,
                serverSide: true,
                ajax: '{!! route('banners.data') !!}',
                processing:     "Loading...",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: function (data) {
                            return '<div><span class="image"><img src="'+data.image+'" alt="" class="img-circle max-w-40"></span>'
                        }, targets: 'no-sort', 'searchable': true, orderable: false, name: 'image'},
                    {data: 'link', name: 'link'},
                    {data: 'position', name: 'position'},
                    {data: 'click', name: 'click'},

                    {data: 'actions', name: 'actions', targets: 'no-sort', 'searchable': false, orderable: false, className: 'text-right', width: '214px'}
                ]
            })
            function filterData() {
                $('#roomTable').DataTable().search(
                    $('#global_filter').val()
                ).draw();
            }
            $('input#global_filter').bind('input', function () {
                filterData();
            } );
        });
    </script>

@endpush