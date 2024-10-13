@extends('app.layout')
@section('content')

        <form action="/employeedit/{{$employees->id}}" enctype="multipart/form-data" method="post">
            @csrf
        <div  class="row gx-4">
                <div  class="col-xl-4">
                <div  class="card">
                <div  class="card-header">Profile Picture</div>

             <div  class="card-body text-center"><img  src="assets/img/illustrations/profiles/profile-1.png" alt="" class="img-account-profile rounded-circle mb-2">
                        {{-- <button  type="button" class="btn btn-primary">Upload new image</button> --}}
                        <div class="mb-5">
                            <img id="foto-pic" src="{{asset($employees->foto)}}" alt="JPG or PNG no larger than 5 MB" width="100" height="100" />
                        </div>


                        <label for="foto" class="custom-file-upload">
                            Upload
                        </label>
                        <input type="file" name="foto" id="foto" value="{{$employees->foto}}"
                        onchange="document.getElementById('foto-pic').src = window.URL.createObjectURL(this.files[0])">
                    </div>
            </div>
        </div>
        
                        
                        
        <div  class="col-xl-8">
            <div  class="card mb-4">
                <div  class="card-header">Account Details
                 </div>
                 <div  class="card-body">
                    <form  novalidate="" class="ng-untouched ng-pristine ng-valid">
                    <div  class="mb-3"><label  for="inputNik" class="small mb-1">NIK
                        </label>
                        <input  class="form-control" type="text" placeholder="Masukan NIK " name="nik" value="{{$employees->nik}}" >
                    </div>
                
                    <div  class="mb-3">
                        <label  for="inputnama" class="small mb-1">Nama</label>
                        <input class="form-control" type="text" placeholder="Masukan Nama" name="name" value="{{$employees->name}}">
                    </div>

                    <div  class="mb-3">
                        <label class="form-label">Jenis Kelamin</label><br>
                        <input type="radio" name="gender" <?php if ($employees["gender"] == "Laki-laki") echo "checked" ?> value="Laki-laki" required> Laki-laki<br>
                        <input type="radio" name="gender" <?php if ($employees["gender"] == "Perempuan") echo "checked";  ?> value="Perempuan" required> Perempuan
                    
                    </div>

                    <div  class="mb-3">
                        <label  for="inputjabatan" class="small mb-1">Jabatan</label>
                        <input class="form-control" type="text" placeholder="Masukan Jabatan" name="jabatan" value="{{$employees->jabatan}}">
                    </div>

                    <div  class="mb-3">
                        <label  for="inputDepartment" class="small mb-1">Department</label>
                        <input class="form-control" type="text" placeholder="Masukan Department" name="department" value="{{$employees->department}}" >
                    </div>

                  
                    <button  type="submit" class="btn btn-primary">Save changes</button>
                    </form>

                 </div>
            </div>
        </div>
@endsection