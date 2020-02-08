<?php $__env->startSection('content'); ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?php echo e($customer->first_name); ?> <?php echo e($customer->last_name); ?></h3>
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

                            <form class="form-horizontal form-label-left input_mask" data-parsley-validate action="<?php echo e(route('manage.update', $customer->id)); ?>" method="POST">
                               <?php echo csrf_field(); ?>
                               <?php echo method_field('PUT'); ?>
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                            <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Customer ID</label>
                                    <input type="text" class="form-control"  id="inputSuccess5" name="id" value="<?php echo e($customer->id); ?>"  required="required" disabled>
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control"  id="inputSuccess5" name="first_name" value="<?php echo e($customer->first_name); ?>"  required="required">
                                </div>
        
                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" id="inputSuccess5" name="last_name" value="<?php echo e($customer->last_name); ?>" required="required">
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" id="inputSuccess5" name="email" value="<?php echo e($customer->email); ?>" required="required" disabled>
                                </div>
            
                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="<?php echo e($customer->phone_number); ?>" id="inputSuccess5" required="required">
                                </div>
            
                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Salary</label>
                                    <input type="text" class="form-control"  id="inputSuccess5" name="salary" value="<?php echo e($customer->salary); ?>" required="required">
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Active Status</label>
                                    <input type="text" class="form-control"  id="inputSuccess5" value="<?php echo e($customer->active_status); ?>" required="required" disabled>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="">Address</label>
                                <textarea class="form-control" d="inputSuccess5" rows="3" name="address" placeholder="Address"><?php echo e($customer->address); ?></textarea>
                                </div>

                                <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback ">
                                <button class="btn btn-success " type="submit" >SAVE</button>
                                <a class="btn btn-danger" href="<?php echo e(url('manage')); ?>">EXIT</a>    
                                </div> 
                                        </div>   
                                        <input type="hidden" name="customer_id" value="<?php echo e($customer->id); ?>" > 
                                    </form>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>