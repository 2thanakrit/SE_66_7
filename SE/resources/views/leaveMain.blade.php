@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-0">
            <div class="bd-example">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">FirstDate</th>
                            <th scope="col">EndDate</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Approver</th>

                            <th scope="col"></th>   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($LeaveOfAbsence as $leave)
                            <tr>
                                <th scope="row">{{ $leave->id }}</th>
                                <td>{{ $leave->user->firstname . ' ' . $leave->user->lastname }}</td>
                                <td>{{ $leave->typeLeave->name}}</td>
                                <td>{{ $leave->firstDate }}</td>
                                <td>{{ $leave->endDate }}</td>
                                <td>{{ $leave->date }}</td>
                                <td>{{ $leave->status }}</td>
                                <td>{{ $leave->approver->firstname . ' ' . $leave->approver->lastname }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection