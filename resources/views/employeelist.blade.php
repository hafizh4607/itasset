@extends('app.layout')
@section('content')

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

    <table  class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>foto</th>
                <th>Name</th>
                <th>gender</th>
                <th>Jabatan</th>
                <th>Department</th>
                <th>Asset</th>
                @if(auth()->user()->role == 'admin')
                <th colspan="2" class="text-center">Option</th>
                @endif
            </tr>
        </thead>
       
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->nik }}</td>
                    <td>
                        <img width="50" height="50" src="{{ asset($employee->foto) }}" alt="">
                    </td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->jabatan }}</td>
                    <td>{{ $employee->department }}</td>
        

                    <td>
                        @foreach($employee->assets->pluck("asset_id") as $asset_id)
                        <a href="/asset/detail/{{$asset_id}}">
                            {{ $asset_id }}
                        </a>
                        @endforeach
                        </td>
                    
                    
                    @if(auth()->user()->role == 'admin')
                    <td class="text-center">
                        <a href="/employeedit/{{ $employee->id }}">
                            @csrf
                            <button>edit</button>
                        </a>
                    </td>
                    <td class="text-center">
                        <form method="post" action="/employee/{{ $employee->id }}">
                            @csrf
                            <button>Delete</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach

       
    </table>

    
@endsection
