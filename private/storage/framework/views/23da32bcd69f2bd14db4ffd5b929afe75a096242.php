<?php $__env->startSection('pageTitle', 'Thống kê'); ?>
<?php $__env->startSection('content'); ?>
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>Thống kê nhuận bút</h1>
                        <?php echo e(Breadcrumbs::render('statistic-topic')); ?>

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
                            <h2 class="card-title">Thống kê theo tác giả - <?php echo e($user); ?> </h2>
                            <h2 class="card-title">Tổng nhuận bút - <?php echo e(number_format($total)); ?>,000 VND </h2>
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
                                        <th>Tác giả</th>
                                        <th>Bút danh</th>
                                        <th>Ngày xuất bản</th>
                                        <th>Nguồn</th>
                                        <th>Loại bài viết</th>
                                        <th>Danh mục con</th>
                                        <th>Nhuận bút</th>
                                        <th data-orderable="false">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Tổng nhuận bút</th>
                                        <th><?php echo e(number_format($total)); ?>,000 VND</th>
                                    </tr>
                                    </tfoot>
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
            $('#roomTable').DataTable({
                stateSave: true,
                serverSide: true,
                ajax: '<?php echo route('statistic.userdata', ['id'=> $id]); ?>',
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
                    {data: 'author', name: 'author'},
                    {data: 'nickname', name: 'nickname'},
                    {data: 'public_time', name: 'public_time'},
                    {data: 'source', name: 'source'},
                    {data: 'type', name: 'type'},
                    {data: 'topic', name: 'topic'},
                    {data: 'price', name: 'price'},
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

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>