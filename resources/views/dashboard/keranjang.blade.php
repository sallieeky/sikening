@extends("base_views.dashboard")
@section("linkcss")
<link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
  <style>
    /* Chrome, Safari, Edge, Opera */
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
@section("keranjang-active", "active")
@section("main")
<main class="content">
  <div class="container-fluid p-0">
    <section>
        <div class="row">
            <div class="col-lg-8">
                <div class="card wish-list mb-3">
                    <div class="card-body">
                        <h5 class="mb-4 card-title">Keranjang (<span>{{ count($keranjang) }}</span> Item)</h5>
                        @if (count($keranjang) == 0)
                            <div class="alert alert-primary p-3" role="alert">
                                <p class="mb-0">Anda belum memasukkan item kedalam keranjang</p>
                            </div>
                        @endif
                        @foreach ($keranjang as $krj)
                        <div class="row mb-4">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <img class="img-fluid w-100" src="{{ asset("storage/menu/" . $krj->menu->gambar) }}" alt="{{ $krj->menu->nama }}">
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-9 col-xl-9">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5>{{ $krj->menu->nama }}</h5>
                                            <p class="mb-3 text-muted text-uppercase small">{{ $krj->menu->kategori }}</p>
                                            <p class="mb-3 text-muted text-uppercase small">Harga : Rp. {{ number_format($krj->menu->harga,2,",",".")  }}</p>
                                        </div>
                                        <div>
                                            <div class="def-number-input number-input safari_only mb-0 w-100">
                                                {{-- <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                class="btn btn-sm btn-outline-primary"><i class="align-middle" data-feather="minus-square"></i></button> --}}
                                                <label for="">Jumlah : &nbsp;</label><input class="quantity" disabled min="1" name="quantity" value="{{ $krj->jumlah }}" type="number">
                                                {{-- <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                class="btn btn-sm btn-outline-primary"><i class="align-middle" data-feather="plus-square"></i></button> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="/hapus-keranjang/{{ $krj->id }}" type="button" class="card-link-primary small text-uppercase mr-3 text-danger"><i class="align-middle" data-feather="trash-2"></i> Hapus Item </a>
                                        </div>
                                        <p class="mb-0"><span><strong>Rp. {{ number_format($krj->menu->harga * $krj->jumlah,2,",",".")  }}</strong></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        @endforeach
                        <p class="text-primary mb-0"><i class="align-middle" data-feather="info"></i> Jangan telat untuk melakukan pembayaran agar kami dapat melayani anda dengan maksimal</p>
            
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="mb-4">Expected shipping delivery</h5>
                        <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="mb-4">We accept</h5>
                        <img class="mr-2" width="45px"
                        src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                        alt="Visa">
                        <img class="mr-2" width="45px"
                        src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                        alt="American Express">
                        <img class="mr-2" width="45px"
                        src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                        alt="Mastercard">
                    </div>
                </div>
                <!-- Card -->
        
            </div>

            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="mb-3">Total biaya</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Total menu
                                <span>Rp. {{ number_format($total,2,",",".")  }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Biaya Pengiriman
                                <span>Rp. 0 - 8.000,00</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total</strong>
                                    {{-- <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong> --}}
                                </div>
                                <span><strong>Rp. {{ number_format($total,2,",",".")  }}</strong></span>
                            </li>
                        </ul>
                        <a href="/checkout?checkout=true" type="button" class="btn btn-primary btn-block waves-effect waves-light">go to checkout</a>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        {{-- <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample1"
                        aria-expanded="false" aria-controls="collapseExample1">
                        Add a discount code (optional)
                        <span><i class="fas fa-chevron-down pt-1"></i></span>
                        </a> --}}
                    </div>
                </div>
            </div>    
        </div>    
    </section>
  </div>

  {{-- ALERT BERHASIL --}}
@if (session("pesan"))
<div class="notyf" style="justify-content: flex-end; align-items: flex-end;"><div id="notify-custom" class="notyf__toast notyf__toast--lower"><div class="notyf__wrapper"><div class="notyf__icon"><i class="notyf__icon--success" style="color: rgb(59, 125, 221);"></i></div><div class="notyf__message">{{ session("pesan") }}</div></div><div class="notyf__ripple" style="background: rgb(59, 125, 221);"></div></div></div>
@endif
</main>

<script>

const notify = document.getElementById("notify-custom")
      setTimeout(() => {
        notify.classList.add("notyf__toast--disappear")
      }, 7500)



const increaseProductQuantity = (product) => {
  const productId = $(product).parents('.product').get(0).id
  const price = $.grep(productsInCart, el => { return el.id == productId })[0].price;

  $.each(storageData, (i, el) => {
    if (el.id == productId) {
      el.itemsNumber += 1
      $(product).siblings('.quantity').val(el.itemsNumber);
      $(`#${productId}`).find('.price').html(`$${(price * el.itemsNumber).toFixed(2)}`);
      $(`#${productId}-dropdown`).find('.price').html(`$${(price * el.itemsNumber).toFixed(2)}`);
    }
  });

  updateCart();
}

const subtractProductQuantity = (product) => {
  const productId = $(product).parents('.product').get(0).id
  const price = $.grep(productsInCart, el => { return el.id == productId })[0].price;
  let itemsInCart = $.grep(productsInCart, el => { return el.id == productId })[0].itemsNumber;

  if (itemsInCart > 0 ) {
    storageData.map( el => {
      if (el.id == productId) {
        el.itemsNumber -= 1
        $(product).siblings('.quantity').val(el.itemsNumber)
        $(`#${productId}`).find('.price').html(`$${(price * el.itemsNumber).toFixed(2)}`);
        $(`#${productId}-dropdown`).find('.price').html(`$${(price * el.itemsNumber).toFixed(2)}`);
      }
    });

    updateCart();
  };
}

const removeProduct = (product) => {
  const productId = $(product).parents('.product').get(0).id

  storageData = $.grep(storageData, (el, i) => {
    return el.id != productId
  });

  updateCart();
  updateProductList();
}

</script>

@endsection