<!-- extends -->
<!-- section() -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <h1 class="mb-o">Acknowledge Page</h1>
    <hr />
    <div class="col-md-2">
            <div class="form-group">
                <form methode="get" action="/search">
                    <div class="input-group">
                        <input class="form-control" name="search" placeholder="Search..." value="{{isset($search)?$search:''}}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            </div>
    </div>                                                                                                                                                                                                      
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('sucess')}}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Approve Status</th>
                <th>Approved By</th>
                <th>Detail</th>
                <th>Acknowledge Status</th>
                <th>Acknowledge</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Acknowledge as $ack)
            <tr>
                <td class="align-middle">{{$loop->iteration}}</td>
                <td class="align-middle">{{$ack->user->firstname .' '. $ack->user->lastname}}</td>
                <td class="align-middle">{{$ack->typeleave->name}}</td>
                <td class="align-middle">{{$ack->firstDate}}</td>
                <td class="align-middle">{{$ack->endDate}}</td>
                <td class="align-middle">{{$ack->status}}</td>
                <td class="align-middle">{{$ack->userapprover->firstname . ' ' . $ack->userapprover->lastname}}</td>
                <td>
                    <a href="{{route('ackdetail', $ack->id)}}" type="button" class="btn btn-secondary">Detail</a>
                </td>
                <td class="align-middle">{{$ack->acknowledge}}</td>
                <td>
                    <a href="{{route('accept', $ack->id)}}" class="btn btn-success">Acknowledge</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<!-- endsection -->