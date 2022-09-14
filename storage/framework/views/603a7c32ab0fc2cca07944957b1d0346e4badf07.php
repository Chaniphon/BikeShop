
<?php $__env->startSection('title'); ?> BikeShop | รายการสินค้า <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <h1> รายการสินค้า </h1>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong> รายการ </strong>
            </div>
            <div class="panel-body">
                <!--search form -->
                <form action="<?php echo e(URL::to('product/search')); ?>" method="post" class="form-inline">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" name="q" class="form-control" placeholder="...">
                    <button type="submit" class="btn btn-primary"> ค้นหา </button>
                    <a href="<?php echo e(URL::to('product/edit')); ?>" class="btn btn-success pull-right"> เพิ่มสินค้า </a>
                </form>
            </div>
        </div>

        <table class="table table-bordered bs-table">
            <thead>
                <tr>
                    <th> รูปสินค้า </th>
                    <th> รหัส </th>
                    <th> ชื่อสินค้า </th>
                    <th> ประเภท </th>
                    <th> คงเหลือ </th>
                    <th> ราคาต่อหน่วย </th>
                    <th> การทำงาน </th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e($p->image_url); ?>" width="50px"></td>
                        <td><?php echo e($p->code); ?></td>
                        <td><?php echo e($p->name); ?></td>
                        <td><?php echo e($p->category->name); ?></td>
                        <td class="bs-price"><?php echo e(number_format($p->stock_qty, 0)); ?></td>
                        <td class="bs-price"><?php echo e(number_format($p->price, 2)); ?></td>

                        <td class="bs-center">
                            <a href="<?php echo e(URL::to('product/edit/'.$p->id)); ?>" class="btn btn-info"> <i class="fa fa-edit"> </i> แก้ไข </a>
                            <a href="#" class="btn btn-danger btn-delete" id-delete="<?php echo e($p->id); ?>"> <i class="fa fa-trash"> </i> ลบ </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4"> รวม </th>
                    <th class="bs-price"><?php echo e(number_format($products->sum('stock_qty'), 0)); ?></th>
                    <th class="bs-price"><?php echo e(number_format($products->sum('price'), 2)); ?></th>
                </tr>
            </tfoot>
        </table>
        
        <div class="panel-footer">
            <span> แสดงข้อมูลจำนวน <?php echo e(count($products)); ?> รายการ </span>
        </div>
        
    </div>
    <?php echo e($products->links()); ?>

</div>

<script>
    $('.btn-delete').on('click', function()
    {
        if(confirm("คุณต้องการลบข้อมลสินค้าหรือไม่?"))
        {
            var url = "<?php echo e(URL::to('product/remove')); ?>" + '/' + $(this).attr('id-delete'); 
            window.location.href = url;       
        }
    }); 
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel65\bikeshop\resources\views/product/index.blade.php ENDPATH**/ ?>