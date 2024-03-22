@extends('layout')
@section('Title')
    ประเภทการลา
@endsection

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ประเภทการลา</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <br><h1>นาย {{Auth::user()->firstname}} 
            <br>นามสกุล {{Auth::user()->lastname}}
            <br>หมวดวิชา:{{Auth::user()->SubCategory->name}}</h1>
            <br><br><br>
            <div class="card">
                <div class="card-header"><h2>Leave Credits</h2></div>
                <div class="card-body">
                    <table class ="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ประเภทการลา</th>
                                <th>ลาไปแล้ว</th>
                                <th>คงเหลือ</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leavebalances as $item)
                            <tr>
                                <td>{{$item->typeleave->name}}</td>
                                <td>{{$item->usedLeave}}</td>
                                <td>{{$item->remainingLeave}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </body>
    </html>

@endsection