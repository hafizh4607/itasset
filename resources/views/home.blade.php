@extends('app.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  
</div>

{{-- @if(session('license_warning'))
            <div class="alert alert-warning">
                {{ session('license_warning') }}
            </div>
        @endif --}}

       
        @if($expiringAssets->isEmpty())
            {{-- <p>No licenses are expiring in the next 15 days.</p> --}}
        @else
            <ul class="list-group">
                @foreach($expiringAssets as $asset)
                    <p class=" alert alert-warning ">
                        license {{ $asset->asset_id }}_{{ $asset->name }}_{{ $asset->type }}- Expires on {{ \Carbon\Carbon::parse($asset->expired)->format('d-m-Y') }}
                    </p>
                @endforeach
            </ul>
        @endif

<!-- Content Row -->
    <div class="row">

        <!-- Menu Laptop -->
        <div class="col-md-4 mb-3">
            <a href="/asset/laptop{{typelist}}">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Laptop</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$laptops}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-laptop fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <!-- Menu PC -->
        <div class=" col-md-4 mb-3">
            <a href="/asset/pc{{typelist}}">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Komputer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pcs}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-computer fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Server -->
        <div class="col-md-4 mb-3">
            <a href="/asset/server">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Server</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$servers}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-server fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Router -->
        <div class="col-md-4 mb-3">
            <a href="/asset/router">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Router</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$routers}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-network-wired fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Switch -->
        <div class="col-md-4 mb-3">
            <a href="/asset/switch">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Switch</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$switchs}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-light fa-server fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu AP -->
        <div class="col-md-4 mb-3">
            <a href="/asset/ap">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Access Point</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$aps}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-wifi fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- License -->
        <div class="col-md-4 mb-3">
            <a href="/asset/license">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                License</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$licenses}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-file-invoice fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spare -->
        <div class="col-md-4 mb-3">
            <a href="/asset/spare">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Spare</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$spare}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Total -->
        <div class="col-md-4 mb-3">
            <a href="/asset">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection