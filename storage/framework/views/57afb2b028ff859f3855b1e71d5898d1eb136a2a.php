<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">

        <title> <?php echo $__env->yieldContent("title", "BikeShop | จำหน่ายอะไหล่จักรยานออนไลน์"); ?> </title>

        <link rel="stylesheet" href="<?php echo e(asset('vendor/font-awesome/css/all.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset ('vendor/toastr/toastr.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
        <script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script>
        <script src="<?php echo e(asset ('vendor/toastr/toastr.min.js')); ?>"></script>

    </head>

    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"> BikeShop </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#"> หน้าแรก </a></li>
                        <li><a href="<?php echo e(URL::to('product')); ?>"> ข้อมูลสินค้า </a></li>
                        <li><a href="<?php echo e(URL::to('category')); ?>"> ข้อมูลประเภทสินค้า </a></li>
                        <li><a href="#"> รายงาน </a></li>
                    </ul>
                </div>
            </div>
        </nav> <h4><center> 6206021620086 ชนิภรณ์ ศิริสุข</center></h4>
        <?php echo $__env->yieldContent("content"); ?>     

        <!-- js -->
        <?php if(session('msg')): ?>
            <?php if(session('ok')): ?>
                <script>toastr.success("<?php echo e(session('msg')); ?>")</script>
            <?php else: ?>
            <script>toastr.error("<?php echo e(session('msg')); ?>")</script>
            <?php endif; ?>
        <?php endif; ?>
        <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>

    </body>

</html>
<?php /**PATH D:\laravel65\bikeshop\resources\views/layouts/master.blade.php ENDPATH**/ ?>