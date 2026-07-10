
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-3">
    <h3>Data Event</h3>
    <?php if(auth()->user()->role == 'panitia'): ?>
    <a href="<?php echo e(route('event.create')); ?>" class="btn btn-primary">Tambah Event</a>
    <?php endif; ?>
</div>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Poster</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>Kuota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><img src="<?php echo e(asset('storage/'.$event->poster)); ?>" width="100"></td>
            <td><?php echo e($event->judul); ?></td>
            <td><?php echo e($event->kategori->nama); ?></td>
            <td><?php echo e($event->tanggal); ?></td>
            <td><?php echo e($event->kuota); ?></td>
            <?php if(auth()->user()->role == 'panitia'): ?>
                <td><a href="<?php echo e(route('event.edit',$event->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?php echo e(route('event.destroy',$event->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus event?')">Hapus</button>
                    </form>
                </td>
            <?php endif; ?>
        </tr>
        <a href="<?php echo e(route('event.detail',$event->id)); ?>"class="btn btn-info btn-sm">Detail</a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Hype AMD\eventkampus\resources\views/event/index.blade.php ENDPATH**/ ?>