@extends('layouts.layout')

@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$customer->first_name}} {{$customer->last_name}}</h3>
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

                            <form class="form-horizontal form-label-left input_mask" data-parsley-validate action="{{route('user.update', $customer->id) }}" method="POST">
                               @csrf
                               @method('PUT')
                               <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" value="{{$customer->first_name}}" data-validate-length-range="2" data-validate-words="1" name="first_name" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" value="{{$customer->last_name}}" data-validate-length-range="2" data-validate-words="1" name="last_name" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" required="required" value="{{$customer->email}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Salary <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="number" name="salary" required="required" value="{{$customer->salary}}" data-validate-minmax="1000,10000000" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Phone Number <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="tel" id="telephone" name="phone_number" required="required" value="{{$customer->phone_number}}" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="textarea" required="required" name="address" class="form-control col-md-7 col-xs-12">{{$customer->address}}</textarea>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                    <a class="btn btn-danger" href="{{url('manage')}}">EXIT</a>    
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div> 
                                        <input type="hidden" name="customer_id" value="{{$customer->id}}" > 
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