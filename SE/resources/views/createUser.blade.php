@extends('layout')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="container mt-3">
                    <div class="row justify-content-center">
                        <div class="col-md-0">
                            <div class="bd-example">
                                <form action="{{ route('userStore') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname">
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">นามสกุล</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">อีเมล</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">รหัสผ่าน</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>

                                    <div class="mb-3">
                                        <label for="subcategory" class="form-label">หมวดวิชา</label>
                                        <select class="form-select" id="subcategory" name="subcategory">
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        @foreach ($roles as $role)
                                            <div class="form-check">

                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $role->id }}" id="role" name="role[] multiple">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <span>{{ $role->name }}</span>
                                                </label>

                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="mb-3">

                                        <label for="role" class="form-label">ตำแหน่ง</label>
                                        <select class="form-select" id="role" name="role[]" multiple>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="/userMain" class="btn btn-danger ">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
