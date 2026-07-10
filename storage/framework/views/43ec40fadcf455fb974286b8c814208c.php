
<?php $__env->startSection('content'); ?>
<h2>Dashboard Peserta</h2>
<hr>
<div class="card">
    <div class="card-body">Selamat datang<b><?php echo e(auth()->user()->name); ?></b></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Hype AMD\eventkampus\resources\views/dashboard/peserta.blade.php ENDPATH**/ ?>