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
                               <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                                    </div>
                               </div>
                               <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" required="required" value="" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3">Password</label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input id="password" type="password" name="password" data-validate-length="6,7" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                        <a type="submit" href="{{url('user')}}" class="btn btn-danger">Exit</a>
                                        <button id="send" type="submit" class="btn btn-success">Update Password</button>
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