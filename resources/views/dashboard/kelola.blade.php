@extends("base_views.dashboard")
@section("linkcss")
  <link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
@endsection
@section("kelola-active", "active")
@section("main")


<main class="content">
  {{-- PROFILE --}}
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Kelola Profile SIKENING</strong></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Profile yang menjelaskan tentang Cake Nining</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="#" method="post">
                  <div class="form-group mb-3">
                    <label >Nama Toko</label>
                    <h3><strong>Cake Nining</strong></h3>
                  </div>
                  <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="" id="deskripsi" rows="10" placeholder="Masukkan Deskripsi SIKENING . . .">{{ $deskripsi }}</textarea>
                  </div>
                  <button type="button" class="btn btn-primary">Simpan</button>
                </form>
              </div>
              <div class="col-md-4">
                <img src="{{ asset('assets/logo.png') }}" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- END PROFILE --}}
  
  {{-- PROMO --}}
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Kelola Promo SIKENING</strong></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Promo yang diberikan oleh Cake Nining</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <form action="#" method="post">
                  <div class="form-group mb-3">
                    <label for="nama_promo">Nama Promo</label>
                    <input type="text" class="form-control" name="" id="nama_promo" aria-describedby="helpId" placeholder="Nama Promo">
                  </div>
                  <div class="form-group mb-3">
                    <label for="tanggal_promo" class="form-label">Tanggal Akhir Promo</label>
										<input type="date" id="tanggal_promo" class="form-control flatpickr-range" placeholder="Select date.." />
                  </div>
                  <div class="form-group mb-3">
                    <label for="deskripsi_promo">Deskripsi</label>
                    <textarea class="form-control" name="" id="deskripsi_promo" rows="3" placeholder="Masukkan Deskripsi SIKENING . . ."></textarea>
                  </div>
                  <button type="button" class="btn btn-primary">Tambah Promo</button>
                </form>
              </div>
              <div class="col-md-6">
                <table class="table">
									<thead>
										<tr>
											<th style="width:45%;">Nama Promo</th>
											<th class="d-none d-md-table-cell" style="width:25%">Akhir Promo</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                    <tr>
                      <td class="table-primary" colspan="3" style="text-align: center">Belum ada promo yang anda berikan</td>
                    </tr>
										<tr>
											<td>Vanessa Tucker</td>
											<td class="d-none d-md-table-cell">June 21, 1961</td>
											<td class="table-action">
												<button class="btn btn-primary" href="#"><i class="align-middle" data-feather="edit-2"></i></button>
                        <button class="btn btn-danger" href="#"><i class="align-middle" data-feather="trash"></i></button>
											</td>
										</tr>
										<tr>
											<td>William Harris</td>
											<td class="d-none d-md-table-cell">May 15, 1948</td>
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
    </div>
  </div>
  {{-- END PROMO --}}

  {{-- MENU --}}
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Kelola Menu SIKENING</strong></h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Menu-menu yang ada di Cake Nining</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalPrimary">
              <i class="align-middle" data-feather="plus-square"></i> Tambah Menu
            </button>
          </div>
          <div class="card-body">
            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Nama Menu</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><img src="{{ asset("storage/menu/bolu_gulung.png") }}" alt="Bolu Gulung" style="max-height: 100px" class="img-responsive img-thumbnail"></td>
                  <td>Bolu Gulung</td>
                  <td>12</td>
                  <td>Rp. {{ number_format(12000,2,",",".") }}</td>
                  <td class="table-action">
                    <button class="btn btn-primary" href="#"><i class="align-middle" data-feather="edit-2"></i></button>
                    <button class="btn btn-danger" href="#"><i class="align-middle" data-feather="trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><img src="{{ asset("storage/menu/gabin_fla.jpg") }}" alt="Gabin Fla" style="max-height: 100px" class="img-responsive img-thumbnail"></td>
                  <td>Gabin Fla</td>
                  <td>13</td>
                  <td>Rp. {{ number_format(12000,2,",",".") }}</td>
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

  
  <!-- Tambah Menu Modal -->
  <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-3">
          <p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user
            notifications, or completely custom content.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Tambah Menu</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END Tambah Menu Modal -->

  {{-- END MENU --}}
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