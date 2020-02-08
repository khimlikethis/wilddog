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
                                 <h2>Add</h2>
                               <div class="clearfix"></div>
                            </div>

                            <form class="form-horizontal form-label-left input_mask" data-parsley-validate id="loginForm" action="{{route('user.store') }}" method="POST">
                               @csrf
                               @method('POST')
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                    <label for="">name</label>
                                    <input type="text" class="form-control"  id="inputSuccess5" name="name" value=""  required="required" >
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" id="inputSuccess5" name="email" value="" required="required" >
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                    <label for="">password</label>
                                <input type="password" class="form-control" name="password" value="" id="password" required="required">
                                <input type="checkbox" onclick="showpass()">Show Password
                                </div>
                                <!-- <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                    <label for="">Confirm password</label>
                                    <input type="password" class="form-control"  id="confirmpassword" name="confirmpassword" value="" required="required">
                                </div> -->
                                <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback ">
                                <button class="btn btn-success " type="submit" onClick="validatePassword();" >SAVE</button>
                                <a class="btn btn-danger" href="{{url('user')}}">EXIT</a>    
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
    <script>
        function showpass() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
    </script>
    @endsection