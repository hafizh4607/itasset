@extends('app.layout')
@section('content')
    <!-- Topbar Search -->
    {{--   ml-md-3 my-md-0 mw-100 --}}
    <form style="margin-bottom: 20px; " class="d-none d-sm-inline-block form-inline w-100 mr-auto navbar-search">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control bg-white border-0 small" placeholder="Search for..." name="search"
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-info" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped overflow-x-auto">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>asset_id</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Type Asset</th>
                    {{-- <th>Operating System</th> --}}
                    {{-- <th>Processor</th> --}}
                    {{-- <th>Ram</th> --}}
                    {{-- <th>Storage</th> --}}
                    {{-- <th>sn</th> --}}
                    {{-- <th>antivirus</th> --}}
                    {{-- <th>port</th> --}}
                    {{-- <th>key</th> --}}
                    {{-- <th>license</th> --}}
                    <th>expired</th>
                    <th>date</th>
                    <th>Employee</th>
                    @if (auth()->user()->role == 'admin')
                        <th>Option</th>
                    @endif
                </tr>
            </thead>


            @foreach ($assets as $asset)
                <tr>
                    {{-- {{ dd($asset) }}  --}}
                    <td>{{ $asset->id }}</td>

                    <td>
                        <a href="/asset/detail/{{ $asset->asset_id }}">
                            {{ $asset->asset_id }}
                        </a>
                    </td>

                    <td>{{ $asset->name }}</td>
                    <td>{{ $asset->type }}</td>
                    <td>{{ $asset->type_asset }}</td>
                    {{-- <td>{{ $asset->os }}</td> --}}
                    {{-- <td>{{ $asset->processor }}</td> --}}
                    {{-- <td>{{ $asset->ram }}</td> --}}
                    {{-- <td>{{ $asset->storage }}</td> --}}
                    {{-- <td>{{ $asset->sn }}</td> --}}
                    {{-- <td>{{ $asset->antivirus }}</td> --}}
                    {{-- <td>{{ $asset->port }}</td> --}}
                    {{-- <td>{{ $asset->key }}</td> --}}
                    {{-- <td>
                        {{ $asset->license }}
                        <img width="50" height="50"src="{{ asset($asset->license) }}" alt="">
                    </td> --}}
                    <td>{{ $asset->expired }}</td>
                    <td>{{ $asset->created_at }}</td>
                    <td>{{ $asset->employee?->name }}</td>

                    @if (auth()->user()->role == 'admin')
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="/assetedit/{{ $asset->id }} " class="mx-2">
                                @csrf
                                <button>edit</button>
                            </a>
                            <form method="post" action="/asset/{{ $asset->id }}" class="mx-2">
                                @csrf
                                <button>Delete</button>
                            </form>
                        </td>
                    @endif

                </tr>
            @endforeach
        </table>
    </div>
@endsection
