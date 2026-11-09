<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo-dbg.png">
    <title>Admin Dashboard - TechMart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color:  #0a3d62;"> -->
        <nav class="navbar navbar-expand-lg my-navbar shadow-sm" style="background-color:  #0a3d62; ">
        <div class="container">
            <a class="navbar-brand" href="#"  style="color: #ffff;">TechMart Admin</a>
            <div class="ms-auto">
                <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm">View Site</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">

        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar -->
                <div class="list-group shadow-sm">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action active" style="background-color:  #0a3d62;">Dashboard</a>
                    <!-- <a href="{{ url('/admin/products/create') }}" class="list-group-item list-group-item-action">Manage Products</a> -->
                    <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action">Manage Products</a>
                    <!-- <a href="{{ route('admin.products.create') }}" class="list-group-item list-group-item-action">Add Product</a> -->
                    <a href="{{ url('/admin/categories') }}" class="list-group-item list-group-item-action">Categories</a>
                    <a href="{{ url('/admin/posts') }}" class="list-group-item list-group-item-action">Posts</a>
                    <a href="{{ url('/admin/orders') }}" class="list-group-item list-group-item-action">Orders</a>
                    <a href="{{ url('/crud') }}" class="list-group-item list-group-item-action">Manage Posts</a>
                     <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action active" style="background-color:  #0a3d62;"> 
                        Logout</a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="col-md-9">
                <!-- Dashboard Content -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="mb-4">Welcome, Admin 👋</h3>

                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="p-3 bg-white shadow-sm rounded">
                                    <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action"><h4>Products</h4></a>
                                    <p>Manage all products</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-3 bg-white shadow-sm rounded">
                                     <a href="{{ url('/admin/categories') }}" class="list-group-item list-group-item-action"><h4>Categories</h4></a>
                                    <p>Manage product categories</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-3 bg-white shadow-sm rounded">
                                     <a href="{{ url('/admin/orders') }}" class="list-group-item list-group-item-action"><h4>Orders</h4></a>
                                    <p>View customer orders</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</body>
</html>
