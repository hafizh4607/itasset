@extends('app.layout')
    @section('content')


        <div class="table-responsive">
            <table class="table table-striped overflow-x-auto">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Role</th>

                    </tr>
                </thead>
    

                    @foreach ($users as $user)
                        <tr>
                            
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->name}}</td>                          
                            <td>{{ $user->role}}</td>    
                            
                            @if(auth()->user()->role == 'admin')
                            <td>
                                <a href="/useredit/{{ $user->id }}">
                                    @csrf
                                    <button>edit</button>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="/user/{{ $user->id }}">
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