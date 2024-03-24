@extends('layout')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card " >
                    <div class="card-header " >
                        <h4>Leave of Absence</h4>
                    </div>
                    <div class="card-body" >
                        @if(session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif
                        
                        <form action=" {{ route('leaveStore') }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb3">
                                <label for="typeL_id" class="mt-3">ประเภทการลา</label>
                                <select class="form-select mt-2" name="typeL_id" aria-label="Default select example">
                                    <option selected></option>
                                    @foreach($typeLeaves as $typeLeave)
                                    <option value="{{ $typeLeave->id }}">{{ $typeLeave->name }}</option>
                                    @endforeach
                                    </select>
                                @error('typeL_id') <span class="text-danger">Please select type</span> @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label>วันที่เริ่มลา</label>
                                <input type="date" name="firstDate" value="{{ old('firstDate') }}">
                                @error('firstDate') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label>วันที่สิ้นสุด</label>
                                <input type="date" name="endDate" value="{{ old('endDate') }}">
                                @error('endDate') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>ข้อมูลเพิ่มเติม (ถ้ามี)</label>
                                <textarea name="detail" class="form-control mt-2" rows="3">{{ old('detail') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="file"> Upload File (ถ้ามี) *pdf,jpg,jpeg,png</label>
                                <input type="file" name="file" class="form-control mt-2">
                            </div>

                            {{-- <select name="u_approver" class="form-control">
                                @foreach($approver as $app)
                                    <option value="{{ $app->id }}">{{ $app->firstname . ' ' . $app->lastname }}</option>
                                @endforeach
                            </select> --}}
                            <div class="mb3 ">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="/leaveMain" class="btn btn-danger ">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

                        
@endsection