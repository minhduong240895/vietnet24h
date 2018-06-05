<?php $__env->startSection('pageTitle', 'Bình luận'); ?>
<?php $__env->startSection('content'); ?>
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>Quản lý bình luận</h1>
                        <?php echo e(Breadcrumbs::render('comments')); ?>

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
                            <h2 class="card-title">Danh sách bình luận</h2>
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
                                <table id="memberTable" class="mdl-data-table customer-table m-t-30 sweet_alerts_card" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>Địa chỉ IP</th>
                                        <th>Bài viết</th>
                                        <th>Ngày gửi</th>
                                        <th>Trạng thái</th>
                                        <th data-orderable="false">
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(function () {
            $('#memberTable').DataTable({
                stateSave: true,
                serverSide: true,
                ajax: '<?php echo route('comments.data'); ?>',
                processing:     "Loading...",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'ip', name: 'ip'},
                    {data: function (data) {
                            var str = data.news;
                            return str.substring(0,60) + '...'
                        }, 'searchable': true, orderable: false, name: 'news'},

                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', targets: 'no-sort', 'searchable': false, orderable: false, render: function (data, type, row) {
                            var status = 'Private';
                            var classCss = 'label-warning';
                            switch (Number(data)){
                                case 1: status = 'Chờ duyệt'; classCss = 'label-warning'; break;
                                case 2: status = 'Hiển thị'; classCss = 'label-success'; break;
                                case 3: status = 'Ẩn'; classCss = 'label-danger'; break;
                            }
                            return '<span class="label '+classCss+'">'+status+'</span>';
                        }},
                    {data: 'actions', name: '', targets: 'no-sort', 'searchable': false, orderable: false, className: 'text-right', width: '214px'}
                ]
            })
            function filterData() {
                $('#memberTable').DataTable().search(
                    $('#global_filter').val()
                ).draw();
            }
            $('input#global_filter').bind('input', function () {
                filterData();
            } );
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>