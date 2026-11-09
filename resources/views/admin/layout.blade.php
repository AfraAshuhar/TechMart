<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMart Admin</title>
    <link rel="icon" href="image/logo-dbg.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width: 220px; height:100vh;">
        <h4 class="mb-4">Admin Panel</h4>
        
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ url('/admin/posts') }}">Posts</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ url('/admin/products') }}">Products</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ url('/admin/categories') }}">Categories</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.logout') }}">Logout</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.logout') }}">Logout</a></li>
            
        </ul>
         href="{{ url('/') }}"
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>

</div>

</body>
</html>
