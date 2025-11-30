@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Edit Data Karyawan</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $pegawai->name }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="posisi" class="form-label">Posisi / Jabatan</label>
                    <select class="form-select" id="posisi" name="posisi" required>
                        <option value="" disabled>Pilih Posisi</option>
                        <option value="Project Manager" {{ $pegawai->posisi == 'Project Manager' ? 'selected' : '' }}>Project Manager</option>
                        <option value="Software Engineer" {{ $pegawai->posisi == 'Software Engineer' ? 'selected' : '' }}>Software Engineer</option>
                        <option value="UI/UX Designer" {{ $pegawai->posisi == 'UI/UX Designer' ? 'selected' : '' }}>UI/UX Designer</option>
                        <option value="Quality Assurance" {{ $pegawai->posisi == 'Quality Assurance' ? 'selected' : '' }}>Quality Assurance</option>
                        <option value="Business Analyst" {{ $pegawai->posisi == 'Business Analyst' ? 'selected' : '' }}>Business Analyst</option>
                        <option value="HR Manager" {{ $pegawai->posisi == 'HR Manager' ? 'selected' : '' }}>HR Manager</option>
                        <option value="Marketing Staff" {{ $pegawai->posisi == 'Marketing Staff' ? 'selected' : '' }}>Marketing Staff</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="gaji" class="form-label">Gaji (IDR)</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control" id="gaji" name="gaji" value="{{ number_format($pegawai->gaji, 0, '', '.') }}" required oninput="formatRupiah(this)">
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