<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Layout</title>
    <link rel="stylesheet" href="{{ asset('assets/css/layoutV2.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

</head>

<body>

    <div class="top">
        <nav class="nav">
            {{-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif --}}
            <img src="../assets/images/KU copy.png" class="logo">
            <ul>
                <li><a href="#">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }} </a></li>
            </ul>
            <img src="../assets/images/Cena.png" class="user-pic" onclick = "toggleMenu()">

            <div class="sub-menu-wrap" id = "subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../assets/images/Cena.png">
                        <h6>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</h6>
                    </div>
                    <hr>
                    {{-- เงื่อนไขปุ่มกด attendance และ form ปุ่มเข้างาน --}}
                    @if(!isset($hasCheckedInToday) || !$hasCheckedInToday)
                    
                    <form action="{{ route('attendance.add') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Record Attendance</button>
                    </form>
                    @else
                        <button class="btn btn-secondary" disabled>Attendance Recorded</button>
                    @endif
                    {{-- ปุ่มกด logout --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <img src = "../assets/images/logout.png">
                        <button type="submit" class="btn btn-danger">
                            
                           <span>Logout</span>
                        </button>
                    </form>
                    
                </div>
            </div>
        </nav>
    </div>
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>

    <div class="left">
    @teacherRole
        <ul class="sidebar-nav">
            <li><a href="#me">ปฎิทิน</a></li>
            <li><a href="{{ route('leaveMain') }}">ลงใบลา</a></li>
            <li><a href="#me">ประวัติการลาทั้งหมด</a></li>
            <li><a href="#me">ข้อมูลการลา</a></li>
            <li><a href="{{ route('display.attendance') }}">ประวัติการเข้างาน</a></li>
            @adminRole
            <li><a href="{{ route('userMain') }}">จัดการผู้ใช้งาน</a></li>
            <li><a href="#me">จัดการหมวดวิชา</a></li>
            <li><a href="#me">ประเภทการลา</a></li>   
            @endadminRole
        </ul>
    @endteacherRole

    @leaderRole
        <ul class="sidebar-nav">
            <li><a href="#me">Dashboard</a></li>
            <li><a href="#me">ปฎิทิน</a></li>
            <li><a href="{{ route('leaveMain') }}">ลงใบลา</a></li>
            <li><a href="#me">ประวัติการลาทั้งหมด</a></li>
            <li><a href="#me">ข้อมูลการลา</a></li>
            <li><a href="{{ route('display.attendance') }}">ประวัติการเข้างาน</a></li>
            @adminRole
            <li><a href="{{ route('userMain') }}">จัดการผู้ใช้งาน</a></li>
            <li><a href="#me">จัดการหมวดวิชา</a></li>   
            @endadminRole
        </ul>
    @endleaderRole

    @deputyRole
        <ul class="sidebar-nav">
            <li><a href="#me">Dashboard</a></li>
            <li><a href="#me">ปฎิทิน</a></li>
            <li><a href="{{ route('leaveMain') }}">ลงใบลา</a></li>
            <li><a href="#me">ประวัติการลาทั้งหมด</a></li>
            <li><a href="#me">ข้อมูลการลา</a></li>
            <li><a href="{{ route('display.attendance') }}">ประวัติการเข้างาน</a></li>
            @adminRole
            <li><a href="{{ route('userMain') }}">จัดการผู้ใช้งาน</a></li>
                <li><a href="#me">จัดการหมวดวิชา</a></li>   
            @endadminRole

        </ul>
    @enddeputyRole

    @directorRole
        <ul class="sidebar-nav">
        <li><a href="#me">Dashboard</a></li>
        <li><a href="#me">รับทราบการลา</a></li>
        <li><a href="#me">ปฎิทิน</a></li>
        <li><a href="{{ route('leaveMain') }}">ลงใบลา</a></li>
        <li><a href="#me">ประวัติการลาทั้งหมด</a></li>
        <li><a href="#me">ข้อมูลการลา</a></li>
        <li><a href="{{ route('display.attendance') }}">ประวัติการเข้างาน</a></li>
            @adminRole
            <li><a href="{{ route('userMain') }}">จัดการผู้ใช้งาน</a></li>
            <li><a href="#me">จัดการหมวดวิชา</a></li>
            @endadminRole
        </ul>

    @enddirectorRole
    </div>

    <div class="main">
        @yield('content')
    </div>
</body>

</html>
