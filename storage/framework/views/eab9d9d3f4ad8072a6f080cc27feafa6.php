
<?php $__env->startSection('content'); ?>
<h3>Tambah Kategori</h3>
<hr>
<form action="<?php echo e(route('kategori.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama"class="form-control">
        <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="text-danger">
                <?php echo e($message); ?>

            </small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <button class="btn btn-success">Simpan</button>
    <a href="<?php echo e(route('kategori.index')); ?>"class="btn btn-secondary">Kembali</a>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Hype AMD\eventkampus\resources\views/kategori/create.blade.php ENDPATH**/ ?>