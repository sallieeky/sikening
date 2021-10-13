@extends("base_views.dashboard")
@section("dashboard-active", "active")
@section("linkcss")
  <link rel="stylesheet" href="https://demo.adminkit.io/css/light.css">
@endsection
@section("main")
<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Statistik</strong> Cake Nining</h1>
    <div class="row">
      <div class="col-xl-6 col-xxl-5 d-flex">
        <div class="w-100">
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-0">
                      <h5 class="card-title">Penjualan</h5>
                    </div>
                    <div class="col-auto">
                      <div class="stat text-primary">
                        <i class="align-middle" data-feather="truck"></i>
                      </div>
                    </div>
                  </div>
                  <h4 class="mt-1 mb-3">2.382</h1>
                  <div class="mb-0">
                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                    <span class="text-muted">Since last week</span>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-0">
                      <h5 class="card-title">Pengunjung</h5>
                    </div>
                    <div class="col-auto">
                      <div class="stat text-primary">
                        <i class="align-middle" data-feather="users"></i>
                      </div>
                    </div>
                  </div>
                  <h4 class="mt-1 mb-3">{{ $pengunjung }}</h4>
                  <div class="mb-0">
                    <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                    <span class="text-muted">Since last week</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-0">
                      <h5 class="card-title">Pendapatan</h5>
                    </div>
                    <div class="col-auto">
                      <div class="stat text-primary">
                        <i class="align-middle" data-feather="dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                  <h4 class="mt-1 mb-3">Rp. {{ number_format(23000,2,",",".") }}</h4>
                  <div class="mb-0">
                    <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                    <span class="text-muted">Since last week</span>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-0">
                      <h5 class="card-title">Pesanan</h5>
                    </div>
                    <div class="col-auto">
                      <div class="stat text-primary">
                        <i class="align-middle" data-feather="shopping-cart"></i>
                      </div>
                    </div>
                  </div>
                  <h4 class="mt-1 mb-3">64</h4>
                  <div class="mb-0">
                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                    <span class="text-muted">Since last week</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-xxl-7">
        <div class="card flex-fill w-100">
          <div class="card-header">
            <h5 class="card-title mb-0">Recent Movement</h5>
          </div>
          <div class="card-body py-3">
            <div class="chart chart-sm">
              <canvas id="chartjs-dashboard-line"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-8 col-xxl-9 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <h5 class="card-title mb-0">Menu Terlaris Cake Nining</h5>
          </div>
          <table class="table table-borderless my-0">
            <thead>
              <tr>
                <th>Nama</th>
                <th class="d-none d-xxl-table-cell">Kategori</th>
                <th class="d-none d-xl-table-cell">Sisa Stok</th>
                <th class="d-none d-xl-table-cell text-end">Total Dipesan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menu_terlaris as $mt)
              <tr>
                <td>
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <div class="bg-light rounded-2">
                        <img class="p-2" width="100" src="{{ asset("storage/menu/" . $mt->gambar) }}">
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3 d-flex align-items-center">
                      <strong>{{ $mt->nama }}</strong>
                    </div>
                  </div>
                </td>
                <td class="d-none d-xxl-table-cell">
                  <strong>{{ $mt->kategori }}</strong>
                </td>
                <td class="d-none d-xl-table-cell">
                  <strong>{{ $mt->stok }}</strong>
                </td>
                <td class="d-none d-xl-table-cell text-end">
                  {{ $mt->count }}
                </td>
                <td>
                  @if ($mt->stok > 0)
                  <span class="badge badge-success-light">Tersedia</span>
                  @else
                  <span class="badge badge-danger-light">Habis</span>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
        <div class="card flex-fill">
          <div class="card-header">
            <h5 class="card-title mb-0">Calendar</h5>
          </div>
          <div class="card-body d-flex">
            <div class="align-self-center w-100">
              <div class="chart">
                <div id="datetimepicker-dashboard"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- <div class="row">
      <div class="col-12 col-lg-8 col-xxl-9 d-flex">
        <div class="card flex-fill">
          <div class="card-header">

            <h5 class="card-title mb-0">Latest Projects</h5>
          </div>
          <table class="table table-hover my-0">
            <thead>
              <tr>
                <th>Name</th>
                <th class="d-none d-xl-table-cell">Start Date</th>
                <th class="d-none d-xl-table-cell">End Date</th>
                <th>Status</th>
                <th class="d-none d-md-table-cell">Assignee</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Project Apollo</td>
                <td class="d-none d-xl-table-cell">01/01/2021</td>
                <td class="d-none d-xl-table-cell">31/06/2021</td>
                <td><span class="badge bg-success">Done</span></td>
                <td class="d-none d-md-table-cell">Vanessa Tucker</td>
              </tr>
              <tr>
                <td>Project Fireball</td>
                <td class="d-none d-xl-table-cell">01/01/2021</td>
                <td class="d-none d-xl-table-cell">31/06/2021</td>
                <td><span class="badge bg-danger">Cancelled</span></td>
                <td class="d-none d-md-table-cell">William Harris</td>
              </tr>
              <tr>
                <td>Project Hades</td>
                <td class="d-none d-xl-table-cell">01/01/2021</td>
                <td class="d-none d-xl-table-cell">31/06/2021</td>
                <td><span class="badge bg-success">Done</span></td>
                <td class="d-none d-md-table-cell">Sharon Lessman</td>
              </tr>
              <tr>
                <td>Project Nitro</td>
                <td class="d-none d-xl-table-cell">01/01/2021</td>
                <td class="d-none d-xl-table-cell">31/06/2021</td>
                <td><span class="badge bg-warning">In progress</span></td>
                <td class="d-none d-md-table-cell">Vanessa Tucker</td>
              </tr>
              <tr>
                <td>Project Phoenix</td>
                <td class="d-none d-xl-table-cell">01/01/2021</td>
                <td class="d-none d-xl-table-cell">31/06/2021</td>
                <td><span class="badge bg-success">Done</span></td>
                <td class="d-none d-md-table-cell">William Harris</td>
              </tr>
              <tr>
                <td>Project X</td>
                <td class="d-none d-xl-table-cell">01/01/2021</td>
                <td class="d-none d-xl-table-cell">31/06/2021</td>
                <td><span class="badge bg-success">Done</span></td>
                <td class="d-none d-md-table-cell">Sharon Lessman</td>
              </tr>
              <tr>
                <td>Project Romeo</td>
                <td class="d-none d-xl-table-cell">01/01/2021</td>
                <td class="d-none d-xl-table-cell">31/06/2021</td>
                <td><span class="badge bg-success">Done</span></td>
                <td class="d-none d-md-table-cell">Christina Mason</td>
              </tr>
              <tr>
                <td>Project Wombat</td>
                <td class="d-none d-xl-table-cell">01/01/2021</td>
                <td class="d-none d-xl-table-cell">31/06/2021</td>
                <td><span class="badge bg-warning">In progress</span></td>
                <td class="d-none d-md-table-cell">William Harris</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-12 col-lg-4 col-xxl-3 d-flex">
        <div class="card flex-fill w-100">
          <div class="card-header">

            <h5 class="card-title mb-0">Monthly Sales</h5>
          </div>
          <div class="card-body d-flex w-100">
            <div class="align-self-center chart chart-lg">
              <canvas id="chartjs-dashboard-bar"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

  </div>
</main>
@endsection