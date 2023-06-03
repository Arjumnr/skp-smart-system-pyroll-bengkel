<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Antrian</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('themes/assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('themes/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('themes/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <link href="{{ asset('themes/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    @include('sweetalert::alert')
    <?php ?>
    <header id="header" class="header fixed-top  align-items-center ">
        <div class="d-flex justify-content-center py-4">
            <a href="/" class="logo d-flex align-items-center w-auto">
                <img src="{{ asset('themes/assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">Sinar Alam Pratama</span>
            </a>
        </div>

        <div class="px-2">
            <marquee class="py-2">Selamat datang di Yamaha Sinar Alam Pratama</marquee>
        </div>
    </header>

    <main>

        <div class="container" style="padding-top: 5%;">
            <section class="section dashboard">
                <br>
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row justify-content-center">

                            <div class="col-xxl-6 col-md-6">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Antrian <span>| Sekarang</span> </h5>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="ps-3">
                                                <h1> <?= $sekarang ?> </h1>
                                            </div>
                                        </div>
                                        <h5 class="text-end" id="waktu"></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Antrian <span>| Dilayani</span></h5>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="ps-3">
                                                <h1><?= $dilayani ?></h1>
                                            </div>
                                        </div>
                                        <h5 class="text-start"> <?= date('d-m-Y') ?></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        {{-- <div class="d-flex justify-content-center py-4">
                                            <a href="/" class="logo d-flex align-items-center w-auto">
                                                <img src="{{ asset('themes/assets/img/logo.png') }}" alt="">
                                                <span class="d-none d-lg-block">Sinar Alam Pratama</span>
                                            </a>
                                        </div> --}}
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Antrian</h5>
                                            <p class="text-center small">Submit untuk mendapatkan Antrian
                                            </p>
                                        </div>
                                        <form class="row g-3 needs-validation" novalidate
                                            action="{{ route('postAntrian') }}" method="POST">
                                            @csrf

                                            <input type="text" hidden value="<?= $sekarang ?>" name="nomor">

                                            <div class="col-12">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" name="nama" class="form-control"
                                                    placeholder="Masukkan Nama Anda..." id="nama" required>
                                                <div class="invalid-feedback">Nama Tidak Boleh Kosong</div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check">

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit">Submit</button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="text-center">
                                        <p class="small">© 2023 Sinar Alam Pratama</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Daftar Antrian</h5>

                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr class="text-center">
                                                        {{-- <th>No</th> --}}
                                                        <th>Nama</th>
                                                        <th>Nomor</th>
                                                        <th>Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @forelse ($antrian as $item)
                                                        <tr>
                                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->nomor }}</td>
                                                            <td>{{ $item->status }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="3" class="text-center">Tidak Ada Data</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

     



    <script src="{{ asset('themes/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/php-email-form/validate.js') }}"></script>

    <script src="{{ asset('themes/assets/js/main.js') }}"></script>

    <script type="text/javascript">
        window.onload = function() {
            var waktu = document.getElementById('waktu');
            setInterval(function() {
                waktu.innerHTML = new Date().toLocaleTimeString();
            }, 1000);
        }
    </script>

</body>

</html>
