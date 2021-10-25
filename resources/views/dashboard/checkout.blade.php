@extends("base_views.dashboard")
@section("keranjang-active", "active")
@section("main")
<main class="content">
  <div class="container-fluid p-0">
    <form action="/checkout" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="kode_keranjang" value="{{ $keranjang[0]->kode_keranjang }}">
      <input type="hidden" name="metode_pembayaran" value="{{ $metode_pembayaran }}">
      <input type="hidden" name="total_pembayaran" value="@if($metode_pembayaran == "bni") {{ $total+8000 }} @else {{ $total }} @endif">
      <input type="hidden" name="tanggal_pengambilan" value="{{ $tanggal_pengambilan }}">
    <section>
      <div class="row">
        <div class="col-lg-8">
          <div class="card wish-list pb-1">
            <div class="card-body">
              <h5 class="mb-2 card-title">Detail Data Diri</h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group mb-2">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" class="form-control" disabled value="{{ Auth::user()->nama }}">
                  </div>
                </div>
              </div>
              <div class="md-form mb-2 md-outline mt-0">
                <label for="form14">Email</label>
                <input type="text" id="form14" disabled value="{{ Auth::user()->email }}" class="form-control">
              </div>
              <div class="md-form mb-2 md-outline mt-0">
                <label for="form1231">Nomor Telepon</label>
                <input type="text" id="form1231" disabled value="{{ Auth::user()->no_telp }}" class="form-control">
              </div>
              <div class="md-form mb-2 md-outline">
                <label for="form15">Alamat</label>
                <input type="text" id="form15" disabled value="{{ Auth::user()->alamat }}" class="form-control">
              </div>
              <div class="row mb-2">
                <div class="col-md-4">
                  <div class="md-form md-outline">
                    <label for="form16">Kota</label>
                    <input type="text" id="form16" disabled value="{{ Auth::user()->kota }}" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="md-form md-outline">
                    <label for="form16">Provinsi</label>
                    <input type="text" id="form16" disabled value="{{ Auth::user()->provinsi }}" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="md-form md-outline">
                    <label for="form16">Kode Pos</label>
                    <input type="text" id="form16" disabled value="{{ Auth::user()->kode_pos }}" class="form-control">
                  </div>
                </div>
              </div>
              @if (Auth::user()->alamat && Auth::user()->kota && Auth::user()->provinsi && Auth::user()->kode_pos && Auth::user()->no_telp)
              <div class="form-check pl-0 mb-4 mb-lg-0">
                <label class="form-check-label small text-uppercase card-link-secondary" for="new3">Saya yakin informasi di atas telah sesuai</label>
                <input required name="konfirmasi" type="checkbox" class="form-check-input filled-in" id="new3">
              </div>
							@else
								<small class="text-danger m-0">Lengkapi data diri anda pada halaman <a href="/profile">profile</a></small>
							@endif
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card mb-3">
              <div class="card-body">
                  <h5 class="mb-2 card-title">Total biaya</h5>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                          Total Menu
                          <span>Rp. {{ number_format($total,2,",",".")  }}</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                          Biaya Pengiriman
                          <span>Rp. @if ($metode_pembayaran == "langsung") 0 @else 8.000,00 @endif</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                          <div>
                              <strong>Total</strong>
                          </div>
                          <span><strong>Rp. @if($metode_pembayaran == "bni") {{ number_format($total+8000,2,",",".")  }} @else {{ number_format($total,2,",",".")  }} @endif</strong></span>
                      </li>
                  </ul>
                  <button type="submit" @if (Auth::user()->alamat && Auth::user()->kota && Auth::user()->provinsi && Auth::user()->kode_pos && Auth::user()->no_telp) @else disabled @endif class="btn btn-primary btn-block waves-effect waves-light">Lakukan pemesanan</b>
              </div>
          </div>
        </div>   
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-2">Detali Pemesanan</h4>
              
              <div class="md-form mb-2 md-outline">
                <label>Tanggal Pengambilan / Pengiriman</label>
                <input type="text" disabled value="{{ $tanggal }}" class="form-control">
              </div>

              @if ($metode_pembayaran == "bni")
              <div class="row format">
                <div class="col-md-12">
                  <label class="my-3">Silakan Melakukan Konfirmasi Pemayaran Ke Kontak Dibawah Ini</label>
                </div>
                <div class="col-md-12">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row">WhatsApp</th>
                        <td>081243942304</td>
                      </tr>
                      <tr>
                        <th scope="row">Nama Rekening</th>
                        <td>Sallie Trixie Zebada Mansurina</td>
                      </tr>
                      <tr>
                        <th scope="row">Bank Rekening</th>
                        <td>BNI</td>
                      </tr>
                      <tr>
                        <th scope="row">Nomor Rekening</th>
                        <td>0722323432</td>
                      </tr>
                      <tr>
                        <th scope="row">Total</th>
                        <td>Rp. @if($metode_pembayaran == "bni") {{ number_format($total+8000,2,",",".")  }} @else {{ number_format($total,2,",",".")  }} @endif</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="md-form mb-2 md-outline">
                  <div class="form-group">
                    <label for="">Masukkan bukti pembayaran</label>
                    <input required type="file" class="form-control" name="bukti_pembayaran" accept="image/jpeg,image/jpg,image/png" id="" aria-describedby="helpId" placeholder="">
                  </div>
                </div>
                
              </div>
              
              @else
              <div class="md-form mb-2 md-outline">
                <div class="form-group">
                  <label>Metode Pembayaran</label>
                  <input required type="text" disabled class="form-control" value="Pembayaran langsung di Cake Nining" aria-describedby="helpId" >
                  <small>*silakan lakukan pemesanan dan melakukan pembayaran di Cake Nining pada <a target="_blank" href="https://goo.gl/maps/XaUdoiY9N3Lw3kay6">alamat ini</a></small>
                </div>
              </div>
              @endif
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
  </div>
</main>

@endsection