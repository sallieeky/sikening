@extends("base_views.dashboard")
@section("linkcss")
  <link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
@endsection
@section("akun_pengguna-active", "active")
@section("main")

<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Akun Pengguna SIKENING</strong></h1>
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
                <tr>
                  <td><img src="{{ asset("storage/menu/bolu_gulung.png") }}" alt="Bolu Gulung" style="max-height: 100px" class="img-responsive img-thumbnail"></td>
                  <td>Jaenet Angeline</td>
                  <td>jejeangeline@gmail.com</td>
                  <td>{{ date("Y-m-d h:i:s") }}</td>
                  <td class="table-action">
                    <button class="btn btn-primary" href="#"><i class="align-middle" data-feather="edit-2"></i></button>
                    <button class="btn btn-danger" href="#"><i class="align-middle" data-feather="trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><img src="{{ asset("storage/menu/gabin_fla.jpg") }}" alt="Gabin Fla" style="max-height: 100px" class="img-responsive img-thumbnail"></td>
                  <td>Hana Karimah</td>
                  <td>hana@gmail.com</td>
                  <td><i>Belum diverifikasi</i></td>
                  <td class="table-action">
                    <button class="btn btn-primary" href="#"><i class="align-middle" data-feather="edit-2"></i></button>
                    <button class="btn btn-danger" href="#"><i class="align-middle" data-feather="trash"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Datatables Responsive
    $("#datatables-reponsive").DataTable({
      responsive: true
    });
  });
</script>
@endsection