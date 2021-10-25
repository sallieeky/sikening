@extends("base_views.dashboard")
@section("invoice-active", "active")
@section("pesanan-active", "active")
@section("linkcss")
<link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
@endsection
@section("main")
<main class="content">
  <div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Invoice</strong></h1>

    <div  class="row">
      <div class="col-12">
        <div class="card">
          <div id="content-html" class="card-body m-sm-3 m-md-5">
            <div class="mb-4">
              Halo <strong>{{ $invoice->user->nama }}</strong>,
              <br />
              Ini adalah laporan pemesanan atau pembayaran <strong>Rp. {{ number_format($invoice->total_pembayaran,2,",",".") }}</strong> (Rupiah) yang anda lakukan melalui SIKENING.
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="text-muted">Kode Pembayaran.</div>
                <strong>#{{ $invoice->kode_pembayaran }}</strong>
              </div>
              <div class="col-md-6 text-md-end">
                <div class="text-muted">Tanggal Pembayaran</div>
                <strong>@if($invoice->metode_pembayaran == "langsung") Silakan membayar langsung di Cake Nining @else {{ $invoice->created_at->format("l, j F Y - h:m a") }} @endif</strong>
                <div class="text-muted">Status</div>
                @if ($invoice->status == "belum")
                  <span class="badge bg-warning">Belum Dikonfirmasi</span>
                @elseif ($invoice->status == "Terima")
                  <span class="badge bg-success">Pesanan Anda Telah Dikonfirmasi</span>
                @elseif ($invoice->status == "Tolak")
                  <span class="badge bg-danger">Pesanan Anda Ditolak</span>
                @endif
              </div>
            </div>

            <hr class="my-4" />

            <div class="row mb-4">
              <div class="col-md-6">
                <div class="text-muted">Pemesan</div>
                <strong>
                  {{ $invoice->user->nama }}
                </strong>
                <p>
                  {{ $invoice->user->alamat }} <br>
                  {{ $invoice->user->kota }} <br>
                  {{ $invoice->user->provinsi }} <br>
                  {{ $invoice->user->kode_pos }} <br>
                  {{ $invoice->user->no_telp }} <br>
                  <a href="#">
                    {{ $invoice->user->email }}
                  </a>
                </p>
              </div>
              <div class="col-md-6 text-md-end">
                <div class="text-muted">Pembayaran Kepada</div>
                @if($invoice->metode_pembayaran == "langsung")
                <strong>
                  Cake Nining
                </strong>
                <p>
                  Jl. Jend. Soedirman <br>
                  Sangatta <br>
                  Kalimantan Timur <br>
                  75312 <br>
                  082113643151 <br>
                  <a href="#">
                    sikening.a6@gmail.com
                  </a>
                </p>
                @else
                <strong>
                  Cake Nining
                </strong>
                <p>
                  Sallie Trixie Zebada Mansurina <br>
                  BNI <br>
                  0722323432 <br>
                  WA : 081243942304 <br>
                  <a href="#">
                    sikening.a6@gmail.com
                  </a>
                </p>
                @endif
              </div>
            </div>

            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Nama Menu</th>
                  <th>Jumlah</th>
                  <th class="text-end">Biaya</th>
                </tr>
              </thead>
              <tbody>
                <?php $harga = 0; ?>
                @foreach ($keranjang as $kr)
                <?php $harga += $kr->menu->harga * $kr->jumlah ?>
                <tr>
                  <td>{{ $kr->menu->nama }}</td>
                  <td>{{ $kr->jumlah }}</td>
                  <td class="text-end"> Rp. {{ number_format($kr->menu->harga * $kr->jumlah,2,",",".") }}</td>
                </tr>
                @endforeach
                <tr>
                  <th>&nbsp;</th>
                  <th>Subtotal </th>
                  <th class="text-end">Rp. {{ number_format($harga,2,",",".") }}</th>
                </tr>
                <tr>
                  <th>&nbsp;</th>
                  <th>Biaya Pengiriman </th>
                  <th class="text-end">@if($invoice->metode_pembayaran == "langsung") Rp. 0,00 @else Rp. 8.000,00 @endif</th>
                </tr>
                <tr>
                  <th>&nbsp;</th>
                  <th>Total </th>
                  <th class="text-end">Rp. {{ number_format($invoice->total_pembayaran,2,",",".") }}</th>
                </tr>
              </tbody>
            </table>
            <div class="text-center">
              <p class="text-sm">
                <strong>Catatan:</strong>
                Terima kasih telah memesan melalui SIKENING
                Pesanan anda akan segera kami proses, hubungi kami apabila memiliki kendala melalui 
                <a target="_blank" href="https://wa.me/+6281241944616?text=Saya%20ingin%20bertanya">Whatsapp</a> atau 
                <a href="mailto:sikening.a6@gmail.com">Email</a>
                {{-- Please send all items at the same time to the shipping address.
                Thanks in advance. --}}
              </p>
            </div>
          </div>
          <button type="button" id="cmd" class="btn btn-primary">
            Download Invoice sebagai Pdf
          </button>
        </div>
      </div>
    </div>
  </div>
</main>

@if (session("pesan"))
  <div class="notyf" style="justify-content: flex-end; align-items: flex-end;"><div id="notify-custom" class="notyf__toast notyf__toast--lower"><div class="notyf__wrapper"><div class="notyf__icon"><i class="notyf__icon--success" style="color: rgb(59, 125, 221);"></i></div><div class="notyf__message">{{ session("pesan") }}</div></div><div class="notyf__ripple" style="background: rgb(59, 125, 221);"></div></div></div>
@endif

<div id="editor-content"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script>
  const notify = document.getElementById("notify-custom")
      setTimeout(() => {
        notify.classList.add("notyf__toast--disappear")
      }, 7500)
</script>

<script>





//   var doc = new jsPDF();
//   var specialElementHandlers = {
//     '#editor-content': function (element, renderer) {
//         return true;
//     }
// };

  var contenttoprint = document.getElementById("content-html");

  $('#cmd').click(function () {

    html2canvas(contenttoprint, {height: document.body.clientHeight, width: document.body.clientWidth})
      .then(function (canvas) {
        var wdt;
        var hgt;

        var img = canvas.toDataURL("image/png", wdt = canvas.width, hgt = canvas.height);
        var rasio = hgt/wdt;

        var doc = new jsPDF("p", "pt", "a4");
        var width = doc.internal.pageSize.width;
        var height = width * rasio;
        doc.addImage(img, "JPEG", 100, 100, width, height);
        doc.save("Invoice #{{ $invoice->kode_pembayaran }}.pdf");
        
      })



    // html2canvas(contenttoprint, {width: 500}).then((canvas) => {
    //   doc.addImage(canvas.toDataURL("image/png"), "PNG", 5, 5, 500, 500)
    // })
    // doc.fromHTML($('#content-html').html(), 15, 15, {
    //     'width': 170,
    //         'elementHandlers': specialElementHandlers
    // });
    // doc.save('sample-file.pdf');
});
</script>
@endsection