<div class="col-md-2 bg-dark text-white min-vh-100">
    <h3 class="text-center py-3">
        EVENT
    </h3>
    <hr>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link text-white">
                Dashboard
            </a>
        </li>
        <?php if(auth()->user()->role=='panitia'): ?>
        <li>
            <a href="<?php echo e(route('kategori.index')); ?>" class="nav-link text-white">
                Kategori
            </a>
        </li>
        <li>
            <a href="/event" class="nav-link text-white">
                Event
            </a>
        </li>
        <li>
            <a href="/anggaran" class="nav-link text-white">
                Anggaran
            </a>
        </li>
        <?php endif; ?>
        <?php if(auth()->user()->role=='peserta'): ?>
        <li>
            <a href="/event" class="nav-link text-white">
                Daftar Event
            </a>
        </li>
        <li>
            <a href="/pendaftaran" class="nav-link text-white">
                Riwayat
            </a>
        </li>
        <?php endif; ?>
        <li>
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button class="btn btn-danger w-100 mt-3">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div><?php /**PATH C:\Users\Hype AMD\eventkampus\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>