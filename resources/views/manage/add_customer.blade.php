@extends('layouts.layout')

@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Customer</h3>
            </div>
                <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_panel">
                                    <div class="x_title">
                                 <h2>Edit</h2>
                               <div class="clearfix"></div>
                            </div>

                            <form class="form-horizontal form-label-left input_mask" data-parsley-validate action="{{route('manage.store') }}" method="POST">
                               @csrf
                               @method('POST')
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control"  id="inputSuccess5" name="first_name" value=""  required="required">
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" id="inputSuccess5" name="last_name" value="" required="required">
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" id="inputSuccess5" name="email" value="" required="required" >
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="" id="inputSuccess5" required="required">
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Salary</label>
                                    <input type="text" class="form-control"  id="inputSuccess5" name="salary" value="" required="required">
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Address</label>
                                <textarea class="form-control" d="inputSuccess5" rows="3" name="address" placeholder="Address"></textarea>
                                </div>

                                <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback ">
                                <button class="btn btn-success " type="submit" >SAVE</button>
                                <a class="btn btn-danger" href="{{url('manage')}}">EXIT</a>    
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
    
    
@endsection
@section('script')

@endsection