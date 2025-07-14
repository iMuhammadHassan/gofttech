@extends('layout.client')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <!-- Dashboard Counts (unchanged) -->
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count">
                        <div class="dash-counts">
                            <h4>{{ $projectCount }}</h4>
                            <h5>My Project</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das1">
                        <div class="dash-counts">
                            <h4>100</h4>
                            <h5>Pending Task</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="user-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das2">
                        <div class="dash-counts">
                            <h4>100</h4>
                            <h5>Due Invoices</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file-text"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Column Chart</h5>
                        </div>
                        <div class="card-body">
                            <div id="s-col" class="chart-set"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Donut Chart</h5>
                        </div>
                        <div class="card-body">
                            <div id="donut-chart" class="chart-set"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Radial Chart</h5>
                        </div>
                        <div class="card-body">
                            <div id="radial-chart" class="chart-set"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="progress-example card bg-white">
                <div class="card-header">
                    <h5 class="card-title">Large Progress Bars</h5>
                </div>
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <div class="progress progress-lg">
                                    <div class="progress-bar" role="progressbar" style="width: 10%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress progress-lg">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <div class="progress progress-lg">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress progress-lg">
                                    <div class="progress-bar bg-warning" role="progressbar"
                                        style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <div class="progress progress-lg">
                                    <div class="progress-bar bg-danger" role="progressbar"
                                        style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="progress progress-lg">
                                <div class="progress-bar progress-bar-striped" role="progressbar"
                                    style="width: 10%" aria-valuenow="10" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="progress progress-lg">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                    style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="progress progress-lg">
                                <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                    style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="progress progress-lg">
                                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                    style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="progress progress-lg">
                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                    style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    
@endsection
