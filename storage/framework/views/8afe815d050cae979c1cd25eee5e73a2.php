
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-3">
    <h3>Data Kategori</h3>
    <a href="<?php echo e(route('kategori.create')); ?>" class="btn btn-primary">
    Tambah Kategori
    </a>
</div>
<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th width="80">No</th>
            <th>Nama Kategori</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($item->nama); ?></td>
            <td>
                <a href="<?php echo e(route('kategori.edit',$item->id)); ?>"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>
                <form
                    action="<?php echo e(route('kategori.destroy',$item->id)); ?>"
                    method="POST"
                    class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button
                        onclick="return confirm('Hapus kategori?')"
                        class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="3" class="text-center">
                Belum ada data
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Hype AMD\eventkampus\resources\views/kategori/index.blade.php ENDPATH**/ ?>