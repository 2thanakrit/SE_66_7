<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SE Group 7</title>
    <link rel="stylesheet" href="{{ asset('assets/css/layoutV2.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

</head>

<body>
    <div class="top">
        <nav class="nav">
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
            <li><a href="{{ route('calendar.index') }}">ปฎิทิน</a></li>
            <li><a href="{{ route('leaveMain') }}">ลงใบลา</a></li>
            <li><a href="/leavetype">ข้อมูลการลา</a></li>
            <li><a href="{{ route('display.attendance') }}">ประวัติการเข้างาน</a></li>
            @adminRole
            <li><a href="/leavehis">ประวัติการลาทั้งหมด</a></li>
            <li><a href="{{ route('userMain') }}">จัดการผู้ใช้งาน</a></li>
            <li><a href="/display/subcategory">จัดการหมวดวิชา</a></li>
            <li><a href="/display/typeleave">จัดการประเภทการลา</a></li> 
            @endadminRole
        </ul>
    @endteacherRole

    @leaderRole
        <ul class="sidebar-nav">
            <li><a href="/display/leaveofabsences">Dashboard</a></li>
            <li><a href="{{ route('calendar.index') }}">ปฎิทิน</a></li>
            <li><a href="{{ route('leaveMain') }}">ลงใบลา</a></li>
            <li><a href="/leavetype">ข้อมูลการลา</a></li>
            <li><a href="{{ route('display.attendance') }}">ประวัติการเข้างาน</a></li>
            @adminRole
            <li><a href="/leavehis">ประวัติการลาทั้งหมด</a></li>
            <li><a href="{{ route('userMain') }}">จัดการผู้ใช้งาน</a></li>
            <li><a href="/display/subcategory">จัดการหมวดวิชา</a></li>   
            <li><a href="/display/typeleave">จัดการประเภทการลา</a></li>
            @endadminRole
        </ul>
    @endleaderRole

    @deputyRole
        <ul class="sidebar-nav">
            <li><a href="/display/leaveofabsences">Dashboard</a></li>
            <li><a href="{{ route('calendar.index') }}">ปฎิทิน</a></li>
            <li><a href="{{ route('leaveMain') }}">ลงใบลา</a></li>
            <li><a href="/leavetype">ข้อมูลการลา</a></li>
            <li><a href="{{ route('display.attendance') }}">ประวัติการเข้างาน</a></li>
            @adminRole
            <li><a href="/leavehis">ประวัติการลาทั้งหมด</a></li>
            <li><a href="{{ route('userMain') }}">จัดการผู้ใช้งาน</a></li>
            <li><a href="/display/subcategory">จัดการหมวดวิชา</a></li>  
            <li><a href="/display/typeleave">จัดการประเภทการลา</a></li> 
            @endadminRole

        </ul>
    @enddeputyRole

    @directorRole
        <ul class="sidebar-nav">
        <li><a href="/display/leaveofabsences">Dashboard</a></li>
        <li><a href="{{ route('calendar.index') }}">ปฎิทิน</a></li>
        <li><a href="{{ route('leaveMain') }}">ลงใบลา</a></li>
        <li><a href="/leavetype">ข้อมูลการลา</a></li>
        <li><a href="{{ route('display.attendance') }}">ประวัติการเข้างาน</a></li>
            @adminRole
            <li><a href="/leavehis">ประวัติการลาทั้งหมด</a></li>
            <li><a href="{{ route('userMain') }}">จัดการผู้ใช้งาน</a></li>
            <li><a href="/display/subcategory">จัดการหมวดวิชา</a></li>
            <li><a href="/display/typeleave">จัดการประเภทการลา</a></li>
            @endadminRole
        </ul>
    @enddirectorRole
    </div>

    <div class="main">
    @yield('content')
    <div class="container mt-5">
        <div class="border p-4">
            <h1 class="text-center mb-4">Event Detail</h1>
            <div class="event-details">
                <p><strong>Date:</strong> {{ $event->date }}</p>
                <p style="word-wrap: break-word;"><strong>Detail:</strong> {{ $event->detail }}</p>
                <p><strong>Date Name:</strong> {{ $event->dateName->name }}</p>
                <p><strong>Check Rest:</strong> {{ $event->checkRest == 1 ? 'หยุด' : 'ไม่หยุด' }}</p>
            </div>
            <a href="{{ route('calendar.index') }}" class="btn btn-primary mt-3">Back</a>
        </div>
    </div>
</div>

</body>

</html>
