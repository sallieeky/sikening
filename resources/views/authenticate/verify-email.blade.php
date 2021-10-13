@extends("base_views.authenticate_base")
@section("title", "Email Verification")
@section("main")
<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2"><b>BERHASIL MENDAFTAR AKUN</b></h1>
							<p class="lead">
								Silakan cek email untuk melakukan verifikasi email
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
										<div class="mb-3">
											<p class="text-center text-black-50">Tekan tombol dibawah untuk mengirim ulang kode verifikasi</p>
										</div>
										<div class="text-center mt-3">
                      <form action="/email/verification-notification" method="POST">
                        @csrf
  											<button type="submit" class="btn btn-lg btn-primary" name="user" value="{{ Auth::user() }}">Kirim Ulang Kode Verifikasi</button>
                      </form>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection