@extends('app.layout')
    @section('content')

        <form action="/assetedit/{{$asset->id}}" enctype="multipart/form-data" method="post">
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
                                <input  class="form-control" type="text" placeholder=" " name="asset_id" value="{{$asset->asset_id}}">
                            </div>

                            <div  class="mb-3">
                                <label  for="inputnama" class="small mb-1">Nama</label>
                                <input class="form-control" type="text" placeholder="Masukan Type" name="name" value="{{$asset->name}}" >
                            </div>

                            <div  class="mb-3">
                                <label  for="input_type" class="small mb-1">Type</label>
                                <input class="form-control" type="text" placeholder="Masukan Type" name="type" value="{{$asset->type}}" >
                            </div>

                            <div  class="mb-3">
                                <label  for="input_type_asset" class="small mb-1">Type Asset</label>
                                <select name="type_asset" id="select" class="form-control" value="{{$asset->type_asset}}">

                                    <option value="">-- SELECT --</option>
                                    <option @if($asset->type_asset == "laptop") selected @endif value="laptop">laptop</option>
                                    <option @if($asset->type_asset == "pc") selected @endif value="pc">pc</option>
                                    <option @if($asset->type_asset == "server") selected @endif value="server">server</option>
                                    <option @if($asset->type_asset == "switch") selected @endif value="switch">switch</option>
                                    <option @if($asset->type_asset == "router") selected @endif value="router">router</option>
                                    <option @if($asset->type_asset == "switch") selected @endif value="switch">switch</option>
                                    <option @if($asset->type_asset == "ap") selected @endif value="ap">ap</option>
                                    <option @if($asset->type_asset == "license") selected @endif value="license">license</option>

                                </select>
                            <div  class="mb-3 hidden inputos-wrap">
                                <label  for="inputos" class="small mb-1">Operating System</label>
                                <input class="form-control" type="text" placeholder="Masukan OS" name="os" value="{{$asset->os}}">
                            </div>

                            <div  class="mb-3 hidden inputprocessor-wrap">
                                <label  for="inputprocessor" class="small mb-1">Processor</label>
                                <input class="form-control" type="text" placeholder="Masukan Tipe Processor" name="processor" value="{{$asset->processor}}" >
                            </div>

                            <div  class="mb-3 hidden inputram-wrap">
                                <label  for="inputram" class="small mb-1">RAM</label>
                                <input class="form-control" type="text" placeholder="Masukan Size RAM" name="ram" value="{{$asset->ram}}" >
                            </div>

                            <div  class="mb-3 hidden inputstorage-wrap">
                                <label  for="inputstorage" class="small mb-1">Storage</label>
                                <input class="form-control" type="text" placeholder="Masukan Size Storage" name="storage" value="{{$asset->storage}}" >
                            </div>

                            <div  class="mb-3 hidden inputsn-wrap">
                                <label  for="inputsn" class="small mb-1">Serial Number</label>
                                <input class="form-control" type="text" placeholder="Masukan SN" name="sn" value="{{$asset->sn}}" >
                            </div>

                            <div  class="mb-3 hidden inputantivirus-wrap">
                                <label  for="inputantivirus" class="small mb-1">Antivirus</label>
                                <input class="form-control" type="text" placeholder="Masukan Anti Virus" name="antivirus" value="{{$asset->antivirus}}">
                            </div>

                            <div  class="mb-3 hidden inputport-wrap">
                                <label  for="inputport" class="small mb-1">Port</label>
                                <input class="form-control" type="text" placeholder="Masukan Jumlah Port" name="port" rea value="{{$asset->port}}" >
                            </div>

                            <div  class="mb-3 hidden inputlicense-wrap">
                                <label  for="inputlicense" class="small mb-1">Key</label>
                                <input class="form-control" type="text" placeholder="Masukan License" name="key" value="{{$asset->key}}" >
                            </div>

                            <div  class="mb-3 hidden inputfile-wrap">
                                <label  for="inputfile" class="small mb-1">Sertifikat license</label>
                                <input class="form-control input-license" id="input-license" type="file" placeholder="Masukan Sertifikat license" name="license" value="{{$asset->license}}" >
                            </div>

                            <div  class="mb-3 hidden inputexpired-wrap">
                                <label  for="inputexpired" class="small mb-1">Expired</label>
                                <input class="form-control" type="date" placeholder="Masukan Expired Date" name="expired" value="{{$asset->expired}}" >
                            </div>


                            <div  class="mb-3 hidden inputemployee-wrap">
                                <label  for="inputEmploye" class="small mb-1">Karyawan</label>
                                <input list="employeelist"  class="form-control" type="text" placeholder="Karyawan" name="employee_id" value="{{ $asset->employee?->name}}" >
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