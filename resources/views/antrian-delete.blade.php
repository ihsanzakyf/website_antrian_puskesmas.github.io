@extends('layouts.main-layouts')

@section('title', 'Delete Antrian')

@section('content')

<div class="container mt-5">
    <div class="card px-0">
        <h5 class="card-header">Halaman Delete Antrian</h5>
        
        <div class="card-body">
            <h5>Apakah yakin data dengan, {{$pasien->nama}}, waktu antri ({{$pasien->waktu->waktu_antri}}) akan dihapus ?</h5>
            <form style="display: inline-block" action="/antrian-destroy/{{$pasien->id}}" method="POST" id="delete-form">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="/antrian" class="btn btn-primary">Cancel</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Mencegah pengiriman form secara langsung
        document.getElementById('delete-form').addEventListener('submit', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data dengan nama {{$pasien->nama}} akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengklik "Ya, hapus!", submit form secara manual
                    event.target.submit();
                }
            });
        });
    </script>
@endsection
    
