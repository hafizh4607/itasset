<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Dear ...</p>
    <P>license ini akan </P>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Type Asset</th>
                <th>expired</th>
            </tr>
            </thead>
        <tbody>
            @foreach($expiringAssets as $asset)
            <tr>
                    <td>{{$asset->name}}</td>
                    <td>{{$asset->type}}</td>
                    <td>{{$asset->type_asset}}</td>
                    <td>{{$asset->expired}}</td>
                
            </tr>
            @endforeach
            </tbody>
    </table>
    <p>Best regards</p>

</body>
</html>