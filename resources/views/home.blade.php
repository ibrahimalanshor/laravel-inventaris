@extends('_layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1 class="title-1">Dashboard</h1>

    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c1 py-4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-archive"></i>
                        </div>
                        <div class="text">
                            <h2>{{ $stuff }}</h2>
                            <span>Barang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c2 py-4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-truck"></i>
                        </div>
                        <div class="text">
                            <h2>{{ $supplier }}</h2>
                            <span>Supplier</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c3 py-4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                        <div class="text">
                            <h2>{{ $loan }}</h2>
                            <span>Peminjaman</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection