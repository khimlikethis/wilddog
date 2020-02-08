@extends('layouts.layout')

@section('content')
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
                        
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif
                          
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
                                        <th style="width:10%">Email</th>
                                        <th style="width:5%">Active_Admin</th>
                                        <th style="width:5%">Status_Active</th>
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
@endsection
@section('script')

<script>

function btnDelete(id){
    var _token = "{{ csrf_token() }}";
    confirm("คุณต้องการลบรายการนี้หรือไม่ ?", function () {
    $.ajax({
               type: 'DELETE',
               url: "user/"+id,
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
                            "className": "text-center", targets:[0,1,2,3,4]
                        }],

        ajax: {
            url: '{{url('user/datatables')}}',
            data: function(data) {
                data.Email = $('input[name=Email]').val();
            }
        },
        columns: [
                    {data:'users_id',name:'users_id'},
                    {data:'email',name:'email'},
                    {data:'type',name:'type'},
                    {data:'status',name:'status'},
                    {data:'buttondelete',name:'buttondelete'},


        ]
    });

</script>

@endsection 