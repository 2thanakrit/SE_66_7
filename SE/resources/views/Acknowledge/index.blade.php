@extends('layout')
@section('content')
<h1 class="mb-0">รับทราบการลา</h1>
<hr />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <div align="center" style="padding-top:100px;">
            <table class="table table-striped">
                <tr>
                    <th style="padding:10px;">#</th>
                    <th style="padding:10px;">u_id</th>
                    <th style="padding:10px;">typeL_id</th>
                    <th style="padding:10px;">วันที่เริ่มลา</th>
                    <th style="padding:10px;">วันที่สิ้นสุดการลา</th>
                    <th style="padding:10px;">detail</th>
                    <th style="padding:10px;">file</th>
                    <th style="padding:10px;">date</th>
                    <th style="padding:10px;">status</th>
                    <th style="padding:10px;">u_approver</th>
                    <th style="padding:10px;">acknowledge</th>
                    <th style="padding:10px;">accepted</th>
                </tr>
                @foreach($data as $acknow)
                <tr align="center";>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$acknow->user->firstname . ' ' . $acknow->user->lastname}}</td>
                    <td>{{$acknow->typeleave->name}}</td>
                    <td>{{$acknow->firstDate}}</td>
                    <td>{{$acknow->endDate}}</td>
                    <td>{{$acknow->detail}}</td>
                    <td>{{$acknow->file}}</td>
                    <td>{{$acknow->date}}</td>
                    <td>{{$acknow->status}}</td>
                    <td>{{$acknow->userapprover->firstname . ' ' . $acknow->userapprover->lastname}}</td>
                    <td>{{$acknow->acknowledge}}</td>
                    <td>
                        <a href="{{url('accepted',$acknow->id)}}" class="btn btn-success">accepted</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
@endsection
