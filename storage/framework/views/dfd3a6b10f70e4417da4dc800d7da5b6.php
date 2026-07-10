<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
    <title>Event Kampus</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <?php if(auth()->guard()->check()): ?>
            <?php echo $__env->make('layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
        <main class="<?php if(auth()->guard()->check()): ?> col-md-10 <?php else: ?> col-md-12 <?php endif; ?> p-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</div>
</body>
</html><?php /**PATH C:\Users\Hype AMD\eventkampus\resources\views/layouts/app.blade.php ENDPATH**/ ?>