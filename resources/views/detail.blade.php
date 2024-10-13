@extends('app.layout')
@section('content')

        <form action="" enctype="multipart/form-data" method="post">
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
                                <input  class="form-control" type="text" readonly  placeholder=" " name="asset_id" value="{{$asset->asset_id}}">
                            </div>

                            <div  class="mb-3">
                                <label  for="inputnama" class="small mb-1">Nama</label>
                                <input class="form-control" type="text" readonly  placeholder="Masukan Type" name="name" value="{{$asset->name}}" >
                            </div>

                            <div  class="mb-3">
                                <label  for="input_type" class="small mb-1">Type</label>
                                <input class="form-control" type="text"  placeholder="Masukan Type" name="type" readonly value="{{$asset->type}}" >
                            </div>

                            <div  class="mb-3">
                                <label  for="input_type_asset" class="small mb-1">Type Asset</label>
                                <select disabled name="type_asset" id="select" class="form-control" value="{{$asset->type_asset}}">

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
                                <input class="form-control" type="text" placeholder="Masukan OS" name="os" readonly value="{{$asset->os}}">
                            </div>

                            <div  class="mb-3 hidden inputprocessor-wrap">
                                <label  for="inputprocessor" class="small mb-1">Processor</label>
                                <input class="form-control" type="text" placeholder="Masukan Tipe Processor" name="processor" readonly value="{{$asset->processor}}" >
                            </div>

                            <div  class="mb-3 hidden inputram-wrap">
                                <label  for="inputram" class="small mb-1">RAM</label>
                                <input class="form-control" type="text" placeholder="Masukan Size RAM" name="ram" readonly value="{{$asset->ram}}" >
                            </div>

                            <div  class="mb-3 hidden inputstorage-wrap">
                                <label  for="inputstorage" class="small mb-1">Storage</label>
                                <input class="form-control" type="text" placeholder="Masukan Size Storage" name="storage" readonly value="{{$asset->storage}}" >
                            </div>

                            <div  class="mb-3 hidden inputsn-wrap">
                                <label  for="inputsn" class="small mb-1">Serial Number</label>
                                <input class="form-control" type="text" placeholder="Masukan SN" name="sn" readonly value="{{$asset->sn}}" >
                            </div>

                            <div  class="mb-3 hidden inputantivirus-wrap">
                                <label  for="inputantivirus" class="small mb-1">Antivirus</label>
                                <input class="form-control" type="text" placeholder="Masukan Anti Virus" name="antivirus" readonly value="{{$asset->antivirus}}">
                            </div>

                            <div  class="mb-3 hidden inputport-wrap">
                                <label  for="inputport" class="small mb-1">Port</label>
                                <input class="form-control" type="text" placeholder="Masukan Jumlah Port" name="port" readonly value="{{$asset->port}}" >
                            </div>

                            <div  class="mb-3 hidden inputlicense-wrap">
                                <label  for="inputlicense" class="small mb-1">Key</label>
                                <input class="form-control" type="text" placeholder="Masukan License" name="key" readonly value="{{$asset->key}}" >
                            </div>

                            <div  class="mb-3 hidden inputfile-wrap d-flex flex-column">
                                <label  for="inputfile" class="small mb-1">Sertifikat license</label>
                                <img width="100" height="100"src="{{ asset($asset->license) }}" alt="">
                                {{-- <input class="form-control input-license" id="input-license" type="" placeholder="Masukan Sertifikat license" readonly disabled name="license" value="{{$asset->license}}" > --}}
                            </div>

                            <div  class="mb-3 hidden inputexpired-wrap">
                                <label  for="inputexpired" class="small mb-1">Expired</label>
                                <input class="form-control" type="date" placeholder="Masukan Expired Date" name="expired" readonly value="{{$asset->expired}}" >
                                
                                <div id="expired" class="progress mb-3 mt-3" style="height: 30px" data-bs-toggle="tooltip" title="Time Left : {{floor($daysLeft)}} days">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $progressPercentage }}%;" aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="100">
                                        {{ round($progressPercentage, 2) }}%
                                    </div>
                                </div>
                            </div>

                            <div  class="mb-3 hidden inputemployee-wrap">
                                <label  for="inputEmploye" class="small mb-1">Karyawan</label>
                                <input class="form-control" type="text" placeholder="Karyawan" readonly name="employee_id" value="{{ $asset->employee?->name}}" >
                               
                            </div>


                           

                    </div> 


@endsection