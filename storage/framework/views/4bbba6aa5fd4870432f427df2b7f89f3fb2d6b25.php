
<?php $__env->startSection('title'); ?> BikeShop | เพิ่มข้อมูลประเภทสินค้า <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>แก้ไขประเภทสินค้า</h1>

            <ul class="breadcrumb">
                <li><a href="<?php echo e(URL::to('product')); ?>">หน้าแรก</a></li>
                <li class="active">แก้ไขประเภทสินค้า</li>
            </ul>

            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div> <?php echo e($error); ?> </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

        </div>
        
        <?php echo Form::open(array( 'action'=>'App\Http\Controllers\CategoryController@insert','method'=>'post' , 'enctype'=>'multipart/form-data')); ?>


        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <strong> เพิ่มประเภทสินค้า </strong>
                </div>
            </div>
            <div class="panel-body">
                <table>
                    <tr>
                        <td><?php echo e(Form::label('name', 'ชื่อประเภทสินค้า ')); ?></td>
                        <td><?php echo e(Form::text('name', Request::old('name'), ['class' => 'form-control'])); ?></td>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">
                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel65\bikeshop\resources\views/category/add.blade.php ENDPATH**/ ?>