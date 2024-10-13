@extends('app.layout')

    @section('content')

        <form action="/asset" enctype="multipart/form-data" method="post">
            @csrf
            <div  class="col-xl-12">
                <div  class="card mb-6">
                    <div  style="color:#0061f2" class="card-header">Asset Detalis
                     </div>
                     <div  class="card-body">
                        <form  novalidate="" class="ng-untouched ng-pristine ng-valid">
                            @csrf
                            <div  class="mb-3"><label  for="inputAsset_iD " class="small mb-1">Asset ID
                                </label>
                                <input  class="form-control" type="text" value="{{$asset_id}}" readonly placeholder=" " name="asset_id" >
                            </div>

                            <div  class="mb-3">
                                <label  for="inputnama" class="small mb-1">Nama</label>
                                <input class="form-control" type="text" placeholder="Masukan Type" name="name" >
                            </div>

                            <div  class="mb-3">
                                <label  for="input_type" class="small mb-1">Type</label>
                                <input class="form-control" type="text" placeholder="Masukan Type" name="type" >
                            </div>

                            <div  class="mb-3">
                                <label  for="input_type_asset" class="small mb-1">Type Asset</label>
                                <select name="type_asset" id="select" class="form-control">

                                    <option value="">-- SELECT --</option>
                                    <option value="laptop">laptop</option>
                                    <option value="pc">pc</option>
                                    <option value="server">server</option>
                                    <option value="switch">switch</option>
                                    <option value="router">router</option>
                                    <option value="switch">switch</option>
                                    <option value="ap">ap</option>
                                    <option value="license">license</option>

                                    {{-- <option value="">-- SELECT --</option>
                                    <option @if($asset->type_asset == "laptop") selected endif value="laptop">laptop</option>
                                    <option @if($asset->type_asset == "pc") selected endif value="pc">pc</option>
                                    <option @if($asset->type_asset == "server") selected endif value="server">server</option>
                                    <option @if($asset->type_asset == "switch") selected endif value="switch">switch</option>
                                    <option @if($asset->type_asset == "router") selected endif value="router">router</option>
                                    <option @if($asset->type_asset == "switch") selected endif value="switch">switch</option>
                                    <option @if($asset->type_asset == "ap") selected endif value="ap">ap</option>
                                    <option @if($asset->type_asset == "license") selected endif value="license">license</option> --}}

                                </select>
                               
                            </div>

                            <div  class="mb-3 hidden inputos-wrap">
                                <label  for="inputos" class="small mb-1">Operating System</label>
                                <input class="form-control" id="inputos" type="text" placeholder="Masukan OS" name="os" >
                            </div>

                            <div  class="mb-3 hidden inputprocessor-wrap">
                                <label  for="inputprocessor" class="small mb-1">Processor</label>
                                <input class="form-control" id="inputprocessor" type="text" placeholder="Masukan Tipe Processor" name="processor" >
                            </div>

                            <div  class="mb-3 hidden inputram-wrap">
                                <label  for="inputram" class="small mb-1">RAM</label>
                                <input class="form-control" id="inputram" type="text" placeholder="Masukan Size RAM" name="ram" >
                            </div>

                            <div  class="mb-3 hidden inputstorage-wrap">
                                <label  for="inputstorage" class="small mb-1">Storage</label>
                                <input class="form-control" id="inputstorage" type="text" placeholder="Masukan Size Storage" name="storage" >
                            </div>

                            <div  class="mb-3 hidden inputsn-wrap">
                                <label  for="inputsn" class="small mb-1">Serial Number</label>
                                <input class="form-control" id="inputsn" type="text" placeholder="Masukan SN" name="sn" >
                            </div>

                            <div  class="mb-3 hidden inputantivirus-wrap">
                                <label  for="inputantivirus" class="small mb-1">Antivirus</label>
                                <input class="form-control" id="inputantivirus" type="text" placeholder="Masukan Anti Virus" name="antivirus" >
                            </div>

                            <div  class="mb-3 hidden inputport-wrap">
                                <label  for="inputport" class="small mb-1">Port</label>
                                <input class="form-control" id="inputport" placeholder="Masukan Jumlah Port" name="port" >
                            </div>

                            <div  class="mb-3 hidden inputlicense-wrap">
                                <label  for="input-license" class="small mb-1">Key</label>
                                <input class="form-control" id="input-license" type="text" placeholder="Masukan License" name="key" >
                            </div>

                            <div  class="mb-3 hidden inputfile-wrap">
                                <label  for="inputfile" class="small mb-1">Sertifikat license</label>
                                <input class="form-control" id="inputfile" type="file" placeholder="Masukan Sertifikat license" name="license" >
                            </div>

                            <div  class="mb-3 hidden inputexpired-wrap">
                                <label  for="inputexpired" class="small mb-1">Expired</label>
                                <input class="form-control" id="inputexpired" type="date" placeholder="Masukan Expired Date" name="expired" >
                            </div>

                            <div  class="mb-3 inputemployee-wrap">
                                <label  for="inputemployee" class="small mb-1">Karyawan</label>
                                <input list="employeelist" class="form-control" id="inputemployee" type="text" placeholder="Karyawan" name="employee_id" >
                                <datalist id="employeelist">
                                    @foreach ($employees as $e )
                                        <option value="{{$e->name}}"></option>
                                    @endforeach
                                </datalist>
                            </div>

                            <button  type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>                    
        </form> 
    @endsection