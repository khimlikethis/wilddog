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

                            <form class="form-horizontal form-label-left input_mask" data-parsley-validate action="{{route('user.update', $user->id) }}" method="POST" >
                               @csrf
                               @method('PUT')
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" required="required" value="{{$user->email}}" class="form-control col-md-7 col-xs-12" disabled>
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