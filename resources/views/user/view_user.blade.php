@extends('layouts.layout')

@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$user->email}}</h3>
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

                            <form class="form-horizontal form-label-left input_mask" data-parsley-validate action="{{route('user.update', $user->id) }}" method="PUT">
                               @csrf
                               @method('PUT')
                             <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label for="">user ID</label>
                                        <input type="text" class="form-control"  id="inputSuccess5" name="id" value="{{$user->id}}"  required="required" disabled>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="">Email</label>
                                      <input type="text" class="form-control" id="inputSuccess5" name="email" value="{{$user->email}}" required="required" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control"  id="new_password" name="new_password"  required="required" autocomplete="current-password">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label for="">Confirm Password</label>
                                        <input type="password" class="form-control"  id="new_confirm_password" name="new_confirm_password" required="required" autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback ">
                                <button class="btn btn-success " type="submit" >Update Password</button>
                                <a class="btn btn-danger" href="{{url('user')}}">EXIT</a>    
                                </div>
                            </div>
                        </div>  
                                        <input type="hidden" name="user_id" value="{{$user->id}}" > 
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