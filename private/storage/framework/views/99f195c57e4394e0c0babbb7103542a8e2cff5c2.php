<?php $__env->startSection('pageTitle', 'Members'); ?>
<?php $__env->startSection('content'); ?>
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>Member management</h1>
                        <?php echo e(Breadcrumbs::render('members')); ?>

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
                            <h2 class="card-title">List members</h2>
                            <small class="dataTables_info"></small>
                            <div class="card-search">
                                <div id="productsTable_wrapper" class="form-group label-floating is-empty">
                                    <i class="zmdi zmdi-search search-icon-left"></i>
                                    <input type="text" class="form-control filter-input" placeholder="Filter Products..." autocomplete="off">
                                    <a href="javascript:void(0)" class="close-search" data-card-search="close" data-toggle="tooltip" data-placement="top" title="Close"><i class="zmdi zmdi-close"></i></a>
                                </div>
                            </div>
                            <ul class="card-actions icons right-top">
                                <li id="deleteItems" style="display: none;">
                                    <span class="label label-info pull-left m-t-5 m-r-10 text-white"></span>
                                    <a href="javascript:void(0)" id="confirmDelete" data-toggle="tooltip"
                                       data-placement="top" data-original-title="Delete Product(s)">
                                        <i class="zmdi zmdi-delete"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-card-search="open" data-toggle="tooltip"
                                       data-placement="top" data-original-title="Filter Products">
                                        <i class="zmdi zmdi-filter-list"></i>
                                    </a>
                                </li>
                                <li class="dropdown" data-toggle="tooltip" data-placement="top"
                                    data-original-title="Show Entries">
                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <div id="dataTablesLength">
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"
                                       data-original-title="Export All">
                                        <i class="zmdi zmdi-inbox"></i>
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="memberTable" class="mdl-data-table customer-table m-t-30 sweet_alerts_card" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Avatar</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Created at</th>
                                        <th data-orderable="false">
                                            <a href="<?php echo e(route('members.create')); ?>">
                                                <?php echo e(Form::button('<i class="zmdi zmdi-plus"></i>', ['type' => 'button', 'class' => 'btn btn-primary btn-fab  animate-fab'])); ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(function () {
            $('#memberTable').DataTable({
                stateSave: true,
                serverSide: true,
                ajax: '<?php echo route('members.data'); ?>',
                processing:     "Loading...",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: function (data) {
                            return '<div class="text-center"><span class="avatar"><img src="'+data.avatar+'" alt="" class="img-circle max-w-40"></span>'
                        }, targets: 'no-sort', 'searchable': true, orderable: false, name: 'avatar'},
                    {data: 'email', name: 'email'},
                    {data: 'phone_number', name: 'phone_number'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', targets: 'no-sort', 'searchable': false, orderable: false, className: 'text-right', width: '214px'}
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