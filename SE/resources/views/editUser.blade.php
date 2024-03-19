@extends('layout')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('userUpdate', $user->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- ใช้เมธอด PUT -->

                <div class="mb-3">
                    <label for="firstname" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">นามสกุล</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน (กรอกเฉพาะหากต้องการเปลี่ยนแปลง)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="mb-3">
                    <label for="subcategory" class="form-label">หมวดวิชา</label>
                    <select class="form-select" id="subcategory" name="subcategory">
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ $user->subcategory->id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </div>
               
                <div class="mb-3">
                    @foreach ($roles as $role)
                        <div class="form-check">

                            <input class="form-check-input" type="checkbox"
                                value="{{ $role->id }}" id="role" name="role[]" multiple
                                {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">
                                <span>{{ $role->name }}</span>
                            </label>

                        </div>
                    @endforeach
                </div>
        

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('userMain') }}" class="btn btn-danger">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
