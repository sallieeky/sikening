@extends("base_views.dashboard")
@section("keuangan-active", "active")
@section("main")
<main class="content">
  <div class="container-fluid p-0">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">World Map</h5>
        </div>
        <div class="card-body">
          <div id="world_map" style="height:350px;"></div>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">USA Map</h5>
        </div>
        <div class="card-body">
          <div id="usa_map" style="height:350px;"></div>
        </div>
      </div>
    </div>
  </div>
</main>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    var useMapMarkers = [{
        coords: [37.77, -122.41],
        name: "San Francisco: 375"
      },
      {
        coords: [40.71, -74.00],
        name: "New York: 350"
      },
      {
        coords: [39.09, -94.57],
        name: "Kansas City: 250"
      },
      {
        coords: [36.16, -115.13],
        name: "Las Vegas: 275"
      },
      {
        coords: [32.77, -96.79],
        name: "Dallas: 225"
      }
    ];
    var usaMap = new jsVectorMap({
      map: "us_aea_en",
      selector: "#usa_map",
      zoomButtons: true,
      markers: useMapMarkers,
      markerStyle: {
        initial: {
          r: 9,
          stroke: window.theme.white,
          strokeWidth: 7,
          stokeOpacity: .4,
          fill: window.theme.primary
        },
        hover: {
          fill: window.theme.primary,
          stroke: window.theme.primary
        }
      },
      regionStyle: {
        initial: {
          fill: window.theme["gray-200"]
        }
      },
      zoomOnScroll: false
    });
    window.addEventListener("resize", () => {
      worldMap.updateSize();
      usaMap.updateSize();
    });
    setTimeout(function() {
      worldMap.updateSize();
      usaMap.updateSize();
    }, 250);
  });
</script>
@endsection