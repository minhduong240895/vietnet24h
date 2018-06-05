@extends('layouts.app')
@section('pageTitle', 'News')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>News management</h1>
                        {{ Breadcrumbs::render('news') }}
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
                            <h2 class="card-title">List News</h2>
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
                                        <th>Ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Nguồn</th>
                                        <th>Loại bài viết</th>
                                        <th>Danh mục con</th>
                                        <th>Nhuận bút</th>
                                        <th>Tác giả</th>
                                        <th>Chỉnh sửa lần cuối</th>
                                        <th>Trạng thái</th>
                                        <th data-orderable="false">
                                            <a href="{{route('news.create')}}">
                                                {{Form::button('<i class="zmdi zmdi-plus"></i>', ['type' => 'button', 'class' => 'btn btn-primary btn-fab  animate-fab'])}}
                                            </a>
                                        </th>
                                    </tr>
                                    </thead>
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
                ajax: '{!! route('news.data') !!}',
                processing:     "Loading...",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: function (data) {
                            return '<div class="text-center"><span class="image"><img src="'+data.image+'" alt="" class="img-circle max-w-40"></span>'
                        }, targets: 'no-sort', 'searchable': true, orderable: false, name: 'image'},
                    {data: function (data) {
                            var str = data.title;
                            return str.substring(0,60) + '...'
                        }, 'searchable': true, orderable: false, name: 'title'},
                    {data: 'source', name: 'source'},
                    {data: 'type', name: 'type'},
                    {data: 'topic', name: 'topic'},
                    {data: 'price', name: 'price'},
                    {data: 'author', name: 'author'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'status', targets: 'no-sort', 'searchable': false, orderable: false, render: function (data, type, row) {
                            var status = 'Private';
                            var classCss = 'label-warning';
                            switch (Number(data)){
                                case 1: status = 'Bài nháp'; classCss = 'label-default'; break;
                                case 2: status = 'Chờ biên tập'; classCss = 'label-warning'; break;
                                case 3: status = 'Cần chỉnh sửa'; classCss = 'label-danger'; break;
                                case 4: status = 'Chờ xuất bản'; classCss = 'label-info'; break;
                                case 5: status = 'Đã xuất bản'; classCss = 'label-success'; break;
                            }
                            return '<span class="label '+classCss+'">'+status+'</span>';
                        }},
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