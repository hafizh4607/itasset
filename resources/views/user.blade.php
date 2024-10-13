@extends('app.layout')

    @section('content')

        <form action="/user" enctype="multipart/form-data" method="post">
            @csrf
            <div  class="col-xl-12">
                <div  class="card mb-6">
                    <div  style="color:#0061f2" class="card-header">User Detalis
                     </div>
                     <div  class="card-body">
                        <form  novalidate="" class="ng-untouched ng-pristine ng-valid">
                            @csrf

                            <div  class="mb-3">
                                <label  for="inputnama" class="small mb-1">Email</label>
                                <input class="form-control" type="email" placeholder="Masukan Type" name="email" >
                            </div>

                            <div  class="mb-3">
                                <label  for="input_type" class="small mb-1">Nama</label>
                                <input class="form-control" type="text" placeholder="Masukan Type" name="name" >
                            </div>
                            
                            <div  class="mb-3">
                                <label  for="input_type" class="small mb-1">Password</label>
                                <input class="form-control" type="password" placeholder="Masukan Type" name="password" >
                            </div>

                            <div  class="mb-3">
                                <label class="form-label">Role</label><br>
                                <input type="radio" id="" name="role" value="admin" required> 
                                <label for="role-a">Admin</label>
                               
                                <br>
                                <input type="radio" id="" name="role" value="member" required> 
                                <label for="role-m">Member</label>
                            </div>
                                

                            <button  type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>                    
        </form> 
    @endsection