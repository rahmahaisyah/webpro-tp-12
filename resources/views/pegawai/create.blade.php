@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Tambah Karyawan Baru</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('pegawai.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required>
                </div>
                
                <div class="mb-3">
                    <label for="posisi" class="form-label">Posisi / Jabatan</label>
                    <select class="form-select" id="posisi" name="posisi" required>
                        <option value="" selected disabled>Pilih Posisi</option>
                        <option value="Project Manager">Project Manager</option>
                        <option value="Software Engineer">Software Engineer</option>
                        <option value="UI/UX Designer">UI/UX Designer</option>
                        <option value="Quality Assurance">Quality Assurance</option>
                        <option value="Business Analyst">Business Analyst</option>
                        <option value="HR Manager">HR Manager</option>
                        <option value="Marketing Staff">Marketing Staff</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="gaji" class="form-label">Gaji (IDR)</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control" id="gaji" name="gaji" placeholder="50000000" required oninput="formatRupiah(this)">
                    </div>
                    <small class="text-muted">Masukkan angka saja tanpa titik atau koma</small>
                </div>
                
                <div class="text-end">
                    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function formatRupiah(input) {
    // Hapus semua karakter non-digit
    let value = input.value.replace(/\D/g, '');
    
    // Format dengan titik sebagai pemisah ribuan
    input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

// Sebelum submit, hapus formatting untuk dikirim ke server
document.querySelector('form').addEventListener('submit', function(e) {
    let gajiInput = document.getElementById('gaji');
    gajiInput.value = gajiInput.value.replace(/\./g, '');
});
</script>
@endsection