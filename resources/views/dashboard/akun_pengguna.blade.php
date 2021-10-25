@extends("base_views.dashboard")
@section("linkcss")
  <link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
@endsection
@section("akun_pengguna-active", "active")
@section("main")

<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Akun</strong> Pengguna SIKENING</h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Daftar akun pengguna pada SIKENING</h5>
          </div>
          <div class="card-body">
            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>Foto Profile</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Verifikasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $us)
                <tr>
                  <td><img src="{{ asset("storage/users/" . $us->foto) }}" alt="{{ $us->nama }}" style="max-height: 100px" class="img-responsive img-thumbnail"></td>
                  <td>{{ $us->nama }}</td>
                  <td>{{ $us->email }}</td>
                  <td>@if($us->email_verified_at) {{ $us->email_verified_at->format("l, j F Y g:i a") }} @else <i>Belum Diverifikasi</i> @endif</td>
                  <td class="table-action">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail-{{ $us->id }}">Detail</button>
                    {{-- <button class="btn btn-primary" href="#"><i class="align-middle" data-feather="edit-2"></i></button>
                    <button class="btn btn-danger" href="#"><i class="align-middle" data-feather="trash"></i></button> --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Modal -->
@foreach ($user as $us)
<div class="modal fade" id="detail-{{ $us->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail {{ $us->nama }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="m-0"><strong>Nama</strong></h5>
        <p class="m-1">{{ $us->nama }}</p>
        <h5 class="m-0"><strong>Status</strong></h5>
        <p class="m-1">{{ $us->status }}</p>
        <h5 class="m-0"><strong>Email</strong></h5>
        <p class="m-1">{{ $us->email }}</p>
        <h5 class="m-0"><strong>Nomor Telepon</strong></h5>
        <p class="m-1">{{ $us->no_telp }}</p>
        <h5 class="m-0"><strong>Alamat</strong></h5>
        <p class="m-1">{{ $us->alamat }}</p>
        <h5 class="m-0"><strong>Kota</strong></h5>
        <p class="m-1">{{ $us->kota }}</p>
        <h5 class="m-0"><strong>Provinsi</strong></h5>
        <p class="m-1">{{ $us->provinsi }}</p>
        <h5 class="m-0"><strong>Kode Pos</strong></h5>
        <p class="m-1">{{ $us->kode_pos }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

@endforeach

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Datatables Responsive
    $("#datatables-reponsive").DataTable({
      responsive: true
    });
  });
</script>
@endsection