<div class="col-md-2 bg-dark text-white min-vh-100">
    <h3 class="text-center py-3">
        EVENT
    </h3>
    <hr>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link text-white">Dashboard</a>
        </li>
        @if(auth()->user()->role=='panitia')
        <li>
            <a href="{{ route('kategori.index') }}" class="nav-link text-white">Kategori</a>
        </li>
        <li>
            <a href="/event" class="nav-link text-white">Event</a>
        </li>
        <li>
            <a href="/anggaran" class="nav-link text-white">Anggaran</a>
        </li>
        <li>
            <a href="{{ route('scan.index') }}" class="nav-link text-white">Scan Kehadiran</a>
        </li>
        @endif
        @if(auth()->user()->role=='peserta')
        <li>
            <a href="/event" class="nav-link text-white">Daftar Event</a>
        </li>
        <li>
            <a href="/pendaftaran" class="nav-link text-white">Riwayat</a>
        </li>
        @endif
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger w-100 mt-3">Logout</button>
            </form>
        </li>
    </ul>
</div>