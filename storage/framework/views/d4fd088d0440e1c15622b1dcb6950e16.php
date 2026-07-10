
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">Register</div>
                <div class="card-body">
                    <form action="/register" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="name" class="form-control mb-3" placeholder="Nama">
                        <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                        <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                        <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Konfirmasi Password">
                        <button class="btn btn-primary w-100">Daftar</button>
                    </form>
                </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Hype AMD\eventkampus\resources\views/auth/register.blade.php ENDPATH**/ ?>