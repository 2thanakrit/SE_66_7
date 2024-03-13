<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/sider-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/top-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/content.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('Title')</title>
</head>

<body>
    <!-- The Topbar -->
    <div class = "hero">
        <nav class="nav">
            <ul>
                <li><a href="#">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }} </a></li>
            </ul>
            <img src="../assets/images/amongus.png" class="user-pic" onclick = "toggleMenu()">

            <div class="sub-menu-wrap" id = "subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../assets/images/user.png">
                        <h2>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</h2>
                    </div>
                    <hr>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="sub-menu-link">
                            <p>Logout</p>
                        </button>
                    </form>

                </div>
            </div>
        </nav>
        <!-- Page content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
    <!-- The sidebar -->

    @adminRole
        <div class="sidebar">
            <a href="#me">ปฎิทิน</a>
            <a href="{{ route('leaveMain') }}">ลงใบลา</a>
            <a href="#me">จัดการผู้ใช้งาน</a>
            <a href="#me">จัดการหมวดวิชา</a>
            <a href="#me">ประวัติการลาทั้งหมด</a>
            <a href="#me">ประเภทการลา</a>
            <a href="#me">ประวัติการเข้างาน</a>
            <a href="#me">ข้อมูลการลา</a>
            @leaderRole
                <a href="#me">Dashboard</a>
            @endleaderRole
            @deputyRole
                <a href="#me">Dashboard</a>
            @enddeputyRole
            @directorRole
                <a href="#me">Dashboard</a>
                <a href="#me">รับทราบการลา</a>
            @enddirectorRole
        </div>
    @endadminRole

    @teacherRole
        <div class="sidebar">
            <a href="#me">ปฎิทิน</a>
            <a href="{{ route('leaveMain') }}">ลงใบลา</a>
            <a href="#me">ประวัติการลาทั้งหมด</a>
            <a href="#me">ข้อมูลการลา</a>
            <a href="#me">ประวัติการเข้างาน</a>
            @adminRole
            <a href="#me">จัดการผู้ใช้งาน</a>
            <a href="#me">จัดการหมวดวิชา</a>
            <a href="#me">ประเภทการลา</a>   
            @endadminRole
        </div>
    @endteacherRole

    @leaderRole
        <div class="sidebar">
            <a href="#me">Dashboard</a>
            <a href="#me">ปฎิทิน</a>
            <a href="{{ route('leaveMain') }}">ลงใบลา</a>
            <a href="#me">ประวัติการลาทั้งหมด</a>
            <a href="#me">ข้อมูลการลา</a>
            <a href="#me">ประวัติการเข้างาน</a>
            @adminRole
            <a href="#me">จัดการผู้ใช้งาน</a>
            <a href="#me">จัดการหมวดวิชา</a>   
            @endadminRole
        </div>
    @endleaderRole

    @deputyRole
        <div class="sidebar">
            <a href="#me">Dashboard</a>
            <a href="#me">ปฎิทิน</a>
            <a href="{{ route('leaveMain') }}">ลงใบลา</a>
            <a href="#me">ประวัติการลาทั้งหมด</a>
            <a href="#me">ข้อมูลการลา</a>
            <a href="#me">ประวัติการเข้างาน</a>
            @adminRole
            <a href="#me">จัดการผู้ใช้งาน</a>
            <a href="#me">จัดการหมวดวิชา</a>   
            @endadminRole

        </div>
    @enddeputyRole

    @directorRole
        <div class="sidebar">
            <a href="#me">Dashboard</a>
            <a href="#me">รับทราบการลา</a>
            <a href="#me">ปฎิทิน</a>
            <a href="{{ route('leaveMain') }}">ลงใบลา</a>
            <a href="#me">ประวัติการลาทั้งหมด</a>
            <a href="#me">ข้อมูลการลา</a>
            <a href="#me">ประวัติการเข้างาน</a>
            @adminRole
            <a href="#me">จัดการผู้ใช้งาน</a>
            <a href="#me">จัดการหมวดวิชา</a>   
            @endadminRole
        </div>

    @enddirectorRole



</body>

</html>
