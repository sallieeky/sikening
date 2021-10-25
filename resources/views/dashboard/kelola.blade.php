@extends("base_views.dashboard")
@section("linkcss")
  <link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
@endsection
@section("kelola-active", "active")
@section("main")


<main class="content">
  {{-- PROFILE --}}
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Kelola</strong> Profile SIKENING</h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Profile yang menjelaskan tentang Cake Nining</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="/kelola-profile" method="POST">
                  @csrf
                  <div class="form-group mb-3">
                    <label>Nama Toko</label>
                    <h3><strong>Cake Nining</strong></h3>
                  </div>
                  <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" placeholder="Masukkan Deskripsi SIKENING . . ." required>{{ str_replace('<br />', '', $deskripsi) }}</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
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
    <h1 class="h3 mb-3"><strong>Kelola</strong> Promo SIKENING</h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Promo yang diberikan oleh Cake Nining</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <form action="/kelola-promo" method="POST">
                  @csrf
                  <div class="form-group mb-3">
                    <label for="nama_promo">Nama Promo</label>
                    <input type="text" class="form-control" name="nama" id="nama_promo" aria-describedby="helpId" placeholder="Nama Promo" required>
                  </div>
                  <div class="form-group mb-3">
                    <label for="tanggal_promo" class="form-label">Tanggal Akhir Promo</label>
										<input type="date" id="tanggal_promo" name="tanggal_akhir" min="{{date("Y-m-d")}}" class="form-control flatpickr-range" placeholder="Select date.." / required>
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah Promo</button>
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
                    @if (count($promo) == 0)
                    <tr>
                      <td class="table-primary" colspan="3" style="text-align: center">Belum ada promo yang anda berikan</td>
                    </tr>
                    @endif
                    @foreach ($promo as $pr)
										<tr>
											<td>{{ $pr->value }}</td>
											<td class="d-none d-md-table-cell">{{ $waktu[$loop->iteration - 1] }}</td>
											<td class="table-action">
                        <form action="#" method="POST">
                          @csrf
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#promo-edit-{{ $pr->id }}"><i class="align-middle" data-feather="edit-2"></i></button>
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#promo-hapus-{{ $pr->id }}"><i class="align-middle" data-feather="trash"></i></button>
                        </form>
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
    </div>
  </div>
  {{-- END PROMO --}}

  {{-- MENU --}}
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Kelola</strong> Menu SIKENING</h1>
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
                @foreach ($menu as $mn)
                <tr>
                  <td><img src="{{ asset("storage/menu/" . $mn->gambar) }}" alt="Bolu Gulung" style="max-height: 100px" class="img-responsive img-thumbnail"></td>
                  <td>{{ $mn->nama }}</td>
                  <td>{{ $mn->stok }}</td>
                  <td>Rp. {{ number_format($mn->harga,2,",",".") }}</td>
                  <td class="table-action">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-menu-modal-{{ $mn->id }}">Ubah</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-menu-modal-{{ $mn->id }}">Hapus</button>
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

  
  <!-- Tambah Menu Modal -->
  <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-3">
          <form action="/menu-tambah" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group mb-3">
            <label for="gambar-menu">Gambar</label><br>
            <img src="" alt="Pilih Gambar" style="height: 200px" id="img-menu" class="img img-thumbnail my-3">
            <input type="file" required name="gambar" id="gambar-menu" class="form-control" aria-describedby="helpId">
          </div>
          <div class="form-group mb-3">
            <label for="nama-menu-modal">Nama Menu</label><br>
            <input type="text" required name="nama" placeholder="Nama Menu" id="nama-menu-modal" class="form-control" aria-describedby="helpId">
          </div>
          <div class="form-group mb-3">
            <label for="harga-menu-modal">Harga</label>
            <div class="input-group">
              <span class="input-group-text">Rp.</span>
              <input required type="number" name="harga" id="harga-menu-modal" class="form-control" placeholder="Harga" aria-label="Dollar amount (with dot and two decimal places)">
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="stok-menu-modal">Stok</label>
            <input required type="number" name="stok" id="stok-menu-modal" class="form-control" placeholder="Stok">
          </div>
          <div class="form-group mb-3">
          <label for="stok-menu-modal">Kategori</label>
          <div class="input-group">
            <select class="form-select" required name="kategori" id="inputGroupSelect01">
              <option value="Kue Basah">Kue Basah</option>
              <option value="Kue Kering">Kue Kering</option>
              <option value="Gorengan">Gorengan</option>
            </select>
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!-- END Tambah Menu Modal -->


  @foreach ($menu as $mn)
  <!-- Edit Menu Modal -->
  <div class="modal fade" id="edit-menu-modal-{{ $mn->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-3">
          <form action="/menu-edit" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="gambar_backup" value="{{ $mn->gambar }}">
          <div class="form-group mb-3">
            <label>Gambar</label><br>
            <img src="{{ asset("storage/menu/" . $mn->gambar) }}" alt="Pilih Gambar" style="height: 200px" id="img-menu-edit" class="img img-thumbnail my-3">
            <input type="file" name="gambar" id="gambar-menu-edit" class="form-control" aria-describedby="helpId">
          </div>
          <div class="form-group mb-3">
            <label for="nama-menu-modal">Nama Menu</label><br>
            <input type="text" name="nama" value="{{ $mn->nama }}" required placeholder="Nama Menu" id="nama-menu-modal" class="form-control" aria-describedby="helpId">
          </div>
          <div class="form-group mb-3">
            <label for="harga-menu-modal">Harga</label>
            <div class="input-group">
              <span class="input-group-text">Rp.</span>
              <input type="number" id="harga-menu-modal" name="harga" required class="form-control" value="{{ $mn->harga }}" placeholder="Harga" aria-label="Dollar amount (with dot and two decimal places)">
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="stok-menu-modal">Stok</label>
            <input type="number" id="stok-menu-modal" name="stok" required class="form-control" placeholder="Stok" value="{{ $mn->stok }}">
          </div>
          <div class="form-group mb-3">
          <label for="stok-menu-modal">Kategori</label>
          <div class="input-group">
            <select class="form-select" required name="kategori" id="inputGroupSelect01">
              <option @if($mn->kategori == "Kue Basah") selected @endif value="Kue Basah">Kue Basah</option>
              <option @if($mn->kategori == "Kue Kering") selected @endif value="Kue Kering">Kue Kering</option>
              <option @if($mn->kategori == "Gorengan") selected @endif value="Gorengan">Gorengan</option>
            </select>
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" name="id" value="{{ $mn->id }}">Edit</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!-- END Edit Menu Modal -->
  
  <!-- Hapus Menu Modal -->
  <div class="modal fade" id="hapus-menu-modal-{{ $mn->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-3">
          <p class="mb-0">Apakah anda yakin untuk menghapus menu ini?</p>
          <h5><strong>{{ $mn->nama }}</strong></h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <a href="/menu-hapus/{{ $mn->id }}" class="btn btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div>
  <!-- END Hapus Menu Modal -->
  @endforeach
  

  @foreach ($promo as $pr)
  <!-- Edit Promo Modal -->
  <div class="modal fade" id="promo-edit-{{ $pr->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Promo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="promo-edit" method="POST">
          @csrf
        <div class="modal-body m-3">
          <div class="form-group mb-3">
            <label for="nama_promo_edit">Nama Promo</label>
            <input type="text" name="nama" id="nama_promo_edit" value="{{ $pr->value }}" required class="form-control" placeholder="Nama Promo" aria-describedby="helpId">
          </div>
          <div class="form-group mb-3">
            <label for="tanggal_akhir_promo_edit">Tanggal Akhir Promo</label>
            <input type="date" id="tanggal_akhir_promo_edit" required name="tanggal_akhir" value="{{ $pr->tanggal_akhir }}" min="{{date("Y-m-d")}}" class="form-control flatpickr-range" placeholder="Select date.." / required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" name="id" value="{{ $pr->id }}" class="btn btn-primary">Edit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- END Edit Promo Modal -->
  
  <!-- Hapus Promo Modal -->
  <div class="modal fade" id="promo-hapus-{{ $pr->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Promo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-3">
          <p class="mb-0">Apakah anda yakin untuk menghapus promo ini?</p>
          <h5><strong>{{ $pr->value }}</strong></h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <a href="/promo-hapus/{{ $pr->id }}" class="btn btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div>
  <!-- END Hapus Promo Modal -->
  @endforeach

  {{-- ALERT BERHASIL --}}
  @if (session("pesan"))
    <div class="notyf" style="justify-content: flex-end; align-items: flex-end;"><div id="notify-custom" class="notyf__toast notyf__toast--lower"><div class="notyf__wrapper"><div class="notyf__icon"><i class="notyf__icon--success" style="color: rgb(59, 125, 221);"></i></div><div class="notyf__message">{{ session("pesan") }}</div></div><div class="notyf__ripple" style="background: rgb(59, 125, 221);"></div></div></div>
  @endif
  
  {{-- ALERT ERROR TAMBAH DATA --}}
  @if ($errors->any())
    <div class="notyf" style="justify-content: flex-end; align-items: flex-end;"><div id="notify-custom" class="notyf__toast notyf__toast--lower"><div class="notyf__wrapper"><div class="notyf__icon"><i class="notyf__icon--danger" style="color: #DC3646;"></i></div><div class="notyf__message">{{ session("pesan") }}</div></div><div class="notyf__ripple" style="background: rgb(59, 125, 221);"></div></div></div>
  @endif

  {{-- END MENU --}}
</main>
<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
      const notify = document.getElementById("notify-custom")
      setTimeout(() => {
        notify.classList.add("notyf__toast--disappear")
      }, 7500)
		});

  const img_btn = document.getElementById("gambar-menu")
  const img = document.getElementById("img-menu")
  const img_btn_edit = document.getElementById("gambar-menu-edit")
  const img_edit = document.getElementById("img-menu-edit")

  img_btn.onchange = evt => {
    const [file] = img_btn.files
    if (file) {
        img.src = URL.createObjectURL(file)
    }
  }
  img_btn_edit.onchange = evt => {
    const [file] = img_btn_edit.files
    if (file) {
        img_edit.src = URL.createObjectURL(file)
    }
  }
	</script>
@endsection