<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Customers</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        
                        <?php if(session()->get('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('success')); ?>

                        </div><br />
                        <?php endif; ?>
                          
                        <div class="x_panel">
                                <div class="x_title">
                                    <h2>Search</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                        <form method="POST" id="search-form" class="form-inline" role="form">
                                                    <div class="container d-flex flex-row align-items-center">
                                                        <div class="row">
                                                        <div class="form-group">
                                                            <label for="name">First Name</label><br>
                                                            <input type="text" class="form-control" width="20" name="firstName" id="firstName" placeholder="Code">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="OFFICECODE">Last Name</label><br>
                                                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Search">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="OFFICECODE">Email</label><br>
                                                            <input type="text" class="form-control" name="Email" id="Email" placeholder="Search">
                                                        </div>
                                                        <div class="form-group">
                                                            <label></label><br><br>
                                                                <button type="button" id="search-btn" class="btn btn-info btn-md">Search</button><br>
                                                            <label></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label></label><br><br>
                                                                <a type="button" href="export" class="btn btn-info btn-md">Export</a><br>
                                                            <label></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label></label><br><br>
                                                                <a type="button" href="add" class="btn btn-info btn-md">Add</a><br>
                                                            <label></label>
                                                        </div>
                                                    </div>
                                                </div>  
                                             </form> 
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="tableInfo">
                                <thead>
                                    <tr>
                                        <th style="width:3%" >ID</th>
                                        <th style="width:5%">Name</th>
                                        <th style="width:10%">Address</th>
                                        <th style="width:5%">PhoneNumber</th>
                                        <th style="width:6%">Salary</th>
                                        <th style="width:10%">Email</th>
                                        <th style="width:5%">Active_Status</th>
                                        <th style="width:3%">Action</th>
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
<!-- /page content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>

function btnDelete(id){
    var _token = "<?php echo e(csrf_token()); ?>";
    confirm("คุณต้องการลบรายการนี้หรือไม่ ?", function () {
    $.ajax({
               type: 'DELETE',
               url: "manage/"+id,
               data: {
                "id":id,
               "_token": _token
               },
            success: function (){
            console.log("it deleted Works");
            }
        });
        location.reload();
    });
    
}
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // searchButton
    $('#search-btn').on('click', function(e) {
        oTable.draw();
        e.preventDefault();
             
    });

   
    // datatables
    var oTable = $('#tableInfo').DataTable({
        responsive: true,
        processing: false,
        serverSide: true,
        searching: false,
        paging: true,
        ordering: true,
        bLengthChange: false,
        iDisplayLength: 8,
        
        'columnDefs': [
                        {
                            "className": "text-center", targets:[0,1,2,3,4,5,6,7]
                        }],

        ajax: {
            url: '<?php echo e(url('manage/datatables')); ?>',
            data: function(data) {
                data.firstName = $('input[name=firstName]').val();
                data.lastName = $('input[name=lastName]').val();
                data.Email = $('input[name=Email]').val();

            }
        },
        columns: [
                    {data:'customer_id',name:'customer_id'},
                    {data:'fullname',name: '',"render": function(data, type, full, meta) 
                    {return full["first_name"] + " " + full["last_name"];}},
                    {data:'address',name:'address'},
                    {data:'phone_number',name:'phone_number'},
                    {data:'salary',name:'salary',render: $.fn.dataTable.render.number( ',', '.', 2 )},
                    {data:'email',name:'email'},
                    {data:'status',name:'status'},
                    {data:'buttonView',name:'buttonview'},


        ]
    });

</script>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>