@extends("base_views.dashboard")
@section("dashboard-active", "active")
@section("linkcss")
  <link rel="stylesheet" href="{{ asset("assets/css/dashboard_product.css") }}">

  <style>
    .product-grid:hover {
      background-color: #E3C26980; 
    }
  </style>
@endsection
@section("main")
<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Menu</strong> Terlaris</h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0"><a href="/menu">Lihat Menu Lainnya</a></h5>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row">
                  @foreach ($menu_terlaris as $mt)
                  <div class="col-md-3 col-sm-6">
                      <div class="product-grid" style="border-radius: 5px">
                          <div class="product-image">
                              <a href="#" class="image">
                                  <img class="pic-1" style="height: 150px; object-fit: cover" src="{{ asset("storage/menu/" . $mt->gambar) }}">
                                  <img class="pic-2" style="height: 150px; object-fit: cover" src="{{ asset("storage/menu/" . $mt->gambar) }}">
                              </a>
                              <span class="product-sale-label">hot</span>
                          </div>
                          <div class="product-content">
                              <h3 class="title"><a href="#">{{ $mt->nama }}</a></h3>
                              <div class="price"> Rp. {{ number_format($mt->harga,2,",",".") }}</div>
                              <div class="product-button-group">
                                  <a class="add-to-cart" href="#"><i class="fa fa-shopping-bag"></i>ADD TO CART</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
                  {{-- <div class="col-md-3 col-sm-6">
                      <div class="product-grid">
                          <div class="product-image">
                              <a href="#" class="image">
                                <img class="pic-1" style="height: 150px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                                <img class="pic-2"style="height: 150px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                              </a>
                              <span class="product-sale-label">hot</span>
                          </div>
                          <div class="product-content">
                              <h3 class="title"><a href="#">Women's Shirt</a></h3>
                              <div class="price"><span>$30.00</span>$12.30</div>
                              <div class="product-button-group">
                                  <a class="add-to-cart" href="#"><i class="fa fa-shopping-bag"></i>ADD TO CART</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="product-grid">
                          <div class="product-image">
                              <a href="#" class="image">
                                <img class="pic-1" style="height: 150px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                                <img class="pic-2"style="height: 150px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                              </a>
                              <span class="product-sale-label">hot</span>
                          </div>
                          <div class="product-content">
                              <h3 class="title"><a href="#">Women's Shirt</a></h3>
                              <div class="price">$12.30</div>
                              <div class="product-button-group">
                                  <a class="add-to-cart" href="#"><i class="fa fa-shopping-bag"></i>ADD TO CART</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="product-grid">
                          <div class="product-image">
                              <a href="#" class="image">
                                <img class="pic-1" style="height: 150px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                                <img class="pic-2"style="height: 150px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                              </a>
                              <span class="product-sale-label">hot</span>
                          </div>
                          <div class="product-content">
                              <h3 class="title"><a href="#">Women's Shirt</a></h3>
                              <div class="price">$12.30</div>
                              <div class="product-button-group">
                                  <a class="add-to-cart" href="#"><i class="fa fa-shopping-bag"></i>ADD TO CART</a>
                              </div>
                          </div>
                      </div>
                  </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">

    <h1 class="h3 mb-3"><strong>Aktifitas</strong></h1>

      <div class="col-md-12 col-xl-12">
        <div class="card">
          <div class="card-header">

            <h5 class="card-title mb-0">Aktifitas</h5>
          </div>
          <div class="card-body h-100">

            <div class="d-flex align-items-start">
              <img src="{{ asset("dashboard_assets") }}/img/avatars/avatar-5.jpg" width="36" height="36" class="rounded-circle me-2" alt="Vanessa Tucker">
              <div class="flex-grow-1">
                <small class="float-end text-navy">5m ago</small>
                <strong>Vanessa Tucker</strong> started following <strong>Christina Mason</strong><br />
                <small class="text-muted">Today 7:51 pm</small><br />

              </div>
            </div>

            <hr />
            <div class="d-flex align-items-start">
              <img src="{{ asset("dashboard_assets") }}/img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2" alt="Charles Hall">
              <div class="flex-grow-1">
                <small class="float-end text-navy">30m ago</small>
                <strong>Charles Hall</strong> posted something on <strong>Christina Mason</strong>'s timeline<br />
                <small class="text-muted">Today 7:21 pm</small>

                <div class="border text-sm text-muted p-2 mt-1">
                  Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus
                  pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.
                </div>

                <a href="#" class="btn btn-sm btn-danger mt-1"><i class="feather-sm" data-feather="heart"></i> Like</a>
              </div>
            </div>

            <hr />
            <div class="d-flex align-items-start">
              <img src="{{ asset("dashboard_assets") }}/img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
              <div class="flex-grow-1">
                <small class="float-end text-navy">1h ago</small>
                <strong>Christina Mason</strong> posted a new blog<br />

                <small class="text-muted">Today 6:35 pm</small>
              </div>
            </div>

            <hr />
            <div class="d-flex align-items-start">
              <img src="{{ asset("dashboard_assets") }}/img/avatars/avatar-2.jpg" width="36" height="36" class="rounded-circle me-2" alt="William Harris">
              <div class="flex-grow-1">
                <small class="float-end text-navy">3h ago</small>
                <strong>William Harris</strong> posted two photos on <strong>Christina Mason</strong>'s timeline<br />
                <small class="text-muted">Today 5:12 pm</small>

                <div class="row g-0 mt-1">
                  <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                    <img src="{{ asset("dashboard_assets") }}/img/photos/unsplash-1.jpg" class="img-fluid pe-2" alt="Unsplash">
                  </div>
                  <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                    <img src="{{ asset("dashboard_assets") }}/img/photos/unsplash-2.jpg" class="img-fluid pe-2" alt="Unsplash">
                  </div>
                </div>

                <a href="#" class="btn btn-sm btn-danger mt-1"><i class="feather-sm" data-feather="heart"></i> Like</a>
              </div>
            </div>

            <hr />
            <div class="d-flex align-items-start">
              <img src="{{ asset("dashboard_assets") }}/img/avatars/avatar-2.jpg" width="36" height="36" class="rounded-circle me-2" alt="William Harris">
              <div class="flex-grow-1">
                <small class="float-end text-navy">1d ago</small>
                <strong>William Harris</strong> started following <strong>Christina Mason</strong><br />
                <small class="text-muted">Yesterday 3:12 pm</small>

                <div class="d-flex align-items-start mt-1">
                  <a class="pe-3" href="#">
          <img src="{{ asset("dashboard_assets") }}/img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
        </a>
                  <div class="flex-grow-1">
                    <div class="border text-sm text-muted p-2 mt-1">
                      Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <hr />
            <div class="d-flex align-items-start">
              <img src="{{ asset("dashboard_assets") }}/img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
              <div class="flex-grow-1">
                <small class="float-end text-navy">1d ago</small>
                <strong>Christina Mason</strong> posted a new blog<br />
                <small class="text-muted">Yesterday 2:43 pm</small>
              </div>
            </div>

            <hr />
            <div class="d-flex align-items-start">
              <img src="{{ asset("dashboard_assets") }}/img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2" alt="Charles Hall">
              <div class="flex-grow-1">
                <small class="float-end text-navy">1d ago</small>
                <strong>Charles Hall</strong> started following <strong>Christina Mason</strong><br />
                <small class="text-muted">Yesterdag 1:51 pm</small>
              </div>
            </div>

            <hr />
            <div class="d-grid">
              <a href="#" class="btn btn-primary">Load more</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection