@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Resume</li>
        </ol>

        <!-- Example DataTables Card-->

        <div class="card mb-3">

            <div class="card-header">
                <i class="fa fa-table"></i> Dashboard
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="row">

                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-info o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="mr-5">Total
                                        <br />
                                        <span class="dashboard_totals">999</span>
                                    </div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="">
                                    <span class="float-left">Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-primary o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-paper-plane"></i>
                                    </div>
                                    <div class="mr-5">Total
                                        <br />
                                        <span class="dashboard_totals">999</span>
                                    </div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="">
                                    <span class="float-left">Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-success o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa fa-clock"></i>
                                    </div>
                                    <div class="mr-5">Total
                                        <br />
                                        <span class="dashboard_totals">999</span>
                                    </div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="">
                                    <span class="float-left">Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-warning o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa fa-exclamation"></i>
                                    </div>
                                    <div class="mr-5">Total
                                        <br />
                                        <span class="dashboard_totals">999</span>
                                    </div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="">
                                    <span class="float-left">Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-danger o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="mr-5">Total
                                        <br />
                                        <span class="dashboard_totals">999</span>
                                    </div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="">
                                    <span class="float-left">Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-secondary o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-hourglass-half"></i>
                                    </div>
                                    <div class="mr-5">Total
                                        <br />
                                        <span class="dashboard_totals">999</span>
                                    </div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="">
                                    <span class="float-left">Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-danger o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-user-minus"></i>
                                    </div>
                                    <div class="mr-5">Total
                                        <br />
                                        <span class="dashboard_totals">999</span>
                                    </div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="">
                                    <span class="float-left">Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!-- /.container-fluid-->

        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Heineken 2022</small>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>

        @include('layouts.modals')

    </div>

    @endsection