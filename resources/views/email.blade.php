<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 1rem;
        }
        table {
            margin-left: 7rem;
        }
    </style>
</head>
<body>
    <p>Dear ...</p>
    <P>license ini akan </P>
    &emsp;
    &emsp;
    <table>
        <thead>
            <tr>
                <th style="background-color: lightgrey;">Name</th>
                <th style="background-color: lightgrey;">Type</th>
                <th style="background-color: lightgrey;">Type Asset</th>
                <th style="background-color: lightgrey;">expired</th>
                <th style="background-color: lightgrey;">day left</th>
            </tr>
            </thead>
        <tbody>
            @foreach($form as $asset)
            <tr>
                    <td>{{$asset->name}}</td>
                    <td>{{$asset->type}}</td>
                    <td>{{$asset->type_asset}}</td>
                    <td>{{$asset->expired}}</td>
                    <td>{{floor($asset->timeleft)}} Days</td>

                
            </tr>
            @endforeach
            </tbody>
    </table>
    <br>
    <p>Best regards</p>

</body>
</html>