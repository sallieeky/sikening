@extends("base_views.dashboard")
@section("linkcss")
  <link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
@endsection
@section("profile-active", "active")
@section("main")
<main class="content">
  <div class="container-fluid p-0">
    <div class="mb-3">
      <h1 class="h3 d-inline align-middle">Profil Pengguna</h1>
    </div>
    <div class="row">
      <div class="col-md-4 col-xl-3">
        <div class="card mb-3">
          <div class="card-header">
            <h5 class="card-title mb-0">Detail Profil Pengguna</h5>
          </div>
          <div class="card-body text-center">
            <img src="{{ asset("storage/users/" . Auth::user()->foto) }}" alt="{{ Auth::user()->nama }}" style="object-fit: cover" class="rounded-circle mb-2" width="128" height="128" />
            <h5 class="card-title mb-0">{{ Auth::user()->nama }}</h5>
            <div class="text-muted mb-2">Pengguna</div>
          </div>
          <hr class="my-0" />
          <hr class="my-0" />
          <div class="card-body">
            <h5 class="h6 card-title">Status</h5>
            <p style="text-align: justify">@if(Auth::user()->status) {{ Auth::user()->status }} @else Belum memasang status @endif</p>
          </div>
          <hr class="my-0" />
          <hr class="my-0" />
          <div class="card-body">
            <h5 class="h6 card-title">Tentang</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Asal <a href="#">{{ Auth::user()->kota }}</a></li>
              <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> Kode pos <a href="#">{{ Auth::user()->kode_pos }}</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-8 col-xl-9">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="account" role="tabpanel">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">Info Publik</h5>
              </div>
              <div class="card-body">
                <form action="/profile-public-info" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="foto_backup" value="{{ Auth::user()->foto }}">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="mb-3">
                        <label class="form-label" for="inputUsername">Nama Lengkap</label>
                        <input type="text" name="nama" required class="form-control" id="inputUsername" value="{{ Auth::user()->nama }}" placeholder="Nama Lengkap">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="inputUsername">Status</label>
                        <textarea rows="2" class="form-control" id="inputBio" required
                          placeholder="Status tentang anda" name="status">{{ Auth::user()->status }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="text-center">
                        <img id="img_foto_profile" alt="Charles Hall" src="{{ asset("storage/users/" . Auth::user()->foto) }}" class="rounded-circle img-responsive mt-2"
                          width="128" height="128" style="object-fit: cover" />
                        <div class="mt-2">
                          <label for="foto_profile" class="btn btn-primary"><i class="align-middle" data-feather="upload"></i> Upload</label>
                          <input name="foto" type="file" id="foto_profile" hidden accept="image/jpeg,image/jpg,image/png">
                        </div>
                        <small>Untuk hasil terbaik, gunakan ukuran gambar 128px x 128px dengan format .jpg</small>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">Info pribadi</h5>
              </div>
              <div class="card-body">
                <form action="/profile-private-info" method="POST">
                  @csrf
                  <div class="row">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputEmail4">Email</label>
                    <input type="email" required disabled class="form-control" id="inputEmail4" value="{{ Auth::user()->email }}" placeholder="Email">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputAddress">Alamat</label>
                    <input name="alamat" type="text" required class="form-control" id="inputAddress" value="{{ Auth::user()->alamat }}" placeholder="Alamat saat ini">
                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label class="form-label" for="inputCity">Kota</label>
                      <input name="kota" type="text" required class="form-control" id="inputCity" value="{{ Auth::user()->kota }}" placeholder="Kota saat ini">
                    </div>
                    <div class="mb-3 col-md-4">
                      <label class="form-label" for="inputState">Provinsi</label>
                      <input name="provinsi" type="text" required class="form-control" id="inputState" value="{{ Auth::user()->provinsi }}" placeholder="Provinsi saat ini">
                      
                    </div>
                    <div class="mb-3 col-md-2">
                      <label class="form-label" for="inputZip">Kode Pos</label>
                      <input name="kode_pos" required type="text" class="form-control" id="inputZip" value="{{ Auth::user()->kode_pos }}" placeholder="Kode pos">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
              </div>
            </div>
          </div>
          {{-- <div class="tab-pane fade" id="password" role="tabpanel">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Password</h5>
                <form>
                  <div class="mb-3">
                    <label class="form-label" for="inputPasswordCurrent">Current password</label>
                    <input type="password" class="form-control" id="inputPasswordCurrent">
                    <small><a href="#">Forgot your password?</a></small>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputPasswordNew">New password</label>
                    <input type="password" class="form-control" id="inputPasswordNew">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputPasswordNew2">Verify password</label>
                    <input type="password" class="form-control" id="inputPasswordNew2">
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
              </div>
            </div>
          </div> --}}
        </div>
    </div>
  </div>

  {{-- ALERT BERHASIL --}}
  @if (session("pesan"))
  <div class="notyf" style="justify-content: flex-end; align-items: flex-end;"><div id="notify-custom" class="notyf__toast notyf__toast--lower"><div class="notyf__wrapper"><div class="notyf__icon"><i class="notyf__icon--success" style="color: rgb(59, 125, 221);"></i></div><div class="notyf__message">{{ session("pesan") }}</div></div><div class="notyf__ripple" style="background: rgb(59, 125, 221);"></div></div></div>
  @endif
  
  {{-- ALERT ERROR --}}
  @if ($errors->any())
      <div class="notyf" style="justify-content: flex-end; align-items: flex-end;"><div id="notify-custom-eror" class="notyf__toast notyf__toast--lower"><div class="notyf__wrapper"><div class="notyf__icon"><i class="notyf__icon--danger" style="color: #DC3646;"></i></div><div class="notyf__message">{{ $errors->all()[0] }}</div></div><div class="notyf__ripple" style="background: #DC3646;"></div></div></div>
  @endif
  
  
</main>

<script>
  const foto_profile = document.getElementById("foto_profile")
  const img_foto_profile = document.getElementById("img_foto_profile")

  foto_profile.onchange = evt => {
    const [file] = foto_profile.files
    if (file) {
        img_foto_profile.src = URL.createObjectURL(file)
    }
  }

  const notify = document.getElementById("notify-custom")
      setTimeout(() => {
        notify.classList.add("notyf__toast--disappear")
      }, 7500)
  const notify2 = document.getElementById("notify-custom-eror")
      setTimeout(() => {
        notify2.classList.add("notyf__toast--disappear")
      }, 7500)
</script>
@endsection