<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <style>
        table, th, td {
            padding: 1px;
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style> --}}
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>
<body>
    <p>Dear ...</p>
    <P>license ini akan </P>

    <table class="table table-striped overflow-x-auto">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Type Asset</th>
                <th>expired</th>
            </tr>
            </thead>
        <tbody>
            @foreach($form as $asset)
            <tr>
                    <td>{{$asset->name}}</td>
                    <td>{{$asset->type}}</td>
                    <td>{{$asset->type_asset}}</td>
                    <td>{{$asset->expired}}</td>
                
            </tr>
            @endforeach
            </tbody>
    </table>
    <br>
    <p>Best regards</p>

</body>
</html>