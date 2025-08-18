@extends('app')

@section('content')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card">
                            <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                            <div class="card-body p-3 position-relative">
                                <div class="row">
                                    <div class="col-6 text-start">
                                        <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                                            <i class="ni ni-circle-08 text-dark text-gradient text-lg opacity-10" aria-hidden="true"></i>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                            1600
                                        </h5>
                                        <span class="text-white text-sm">Paid Bill</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card">
                            <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                            <div class="card-body p-3 position-relative">
                                <div class="row">
                                    <div class="col-6 text-start">
                                        <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                                            <i class="ni ni-circle-08 text-dark text-gradient text-lg opacity-10" aria-hidden="true"></i>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                            1600
                                        </h5>
                                        <span class="text-white text-sm">Unpaid Bill</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="row my-4">

        </div>
        <div class="row mt-4">

        </div>
        <div class="row mt-4">

            <div class="col-lg-7">
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>Sales overview</h6>
                        <p class="text-sm">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">4% more</span> in 2025
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mb-lg-0 mb-4">
                <div class="card z-index-2">
                    <div class="card-body p-2">
                        <div class="bg-dark border-radius-md py-3 pe-1 mb-3">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- <footer class="footer pt-3  mt-2">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="" class="font-weight-bold" target="_blank">Oddeven Infotech Pvt. Ltd.</a>
                                for a better Bill.
                            </div>
                        </div>
                     
                    </div>
                </div>
            </footer> --}}


    </div>
@endsection
