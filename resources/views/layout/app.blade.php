<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel  @yield('title')</title>
    <link rel="icon" href="image/logo-dbg.png">
    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{url('./style.css')}}"> 

    <style>
        
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <div class="admin-sidebar">
        <h4>Admin Panel</h4>
        <hr>

        <a href="{{ route('admin.dashboard') }}"> Dashboard</a>
        <a href="{{ route('admin.products.index') }}"> Products</a>
        <a class="nav-link text-white" href="{{ url('/admin/posts') }}">Posts</a>
        
        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
            Logout</a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
        <div class="ms-auto">
                <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm">View Site</a>
            </div>
    </div>

    {{-- HEADER --}}
    <div class="admin-header">
        @yield('title')
    </div>

    {{-- MAIN CONTENT AREA --}}
    <div class="admin-content">
        @yield('content')
    </div>

</body>
</html>
