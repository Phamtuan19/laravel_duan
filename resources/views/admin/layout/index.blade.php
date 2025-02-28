<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin . X-shop</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/custom_layout/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/custom_layout/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>

    {{-- css custom layout --}}
    <link rel="stylesheet" href="{{ asset('admin/custom_admin/customIndex.css') }}">

    @yield('link')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ route('admin.dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PH 29384</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            @can('orders')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.orders.index') }}">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Đơn hàng</span>
                    </a>
                </li>
            @endcan

            <!-- Nav Item - Pages Collapse Menu -->
            @can('posts')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fa-solid fa-pen"></i>
                        <span>Quản lý bài viết</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @can('posts.add')
                                <a class="collapse-item" href="{{ route('admin.posts.create') }}">Thêm bài viết</a>
                            @endcan
                            <a class="collapse-item" href="{{ route('admin.posts.index') }}">Danh sách bài viết</a>
                            <a class="collapse-item" href="{{ route('admin.listSoftErase') }}">Bài viết đã xóa</a>
                        </div>
                    </div>
                </li>
            @endcan

            <!-- Nav Item - Pages Collapse Menu -->
            @can('products')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
                        aria-expanded="true" aria-controls="collapseProduct">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>Quản lý sản phẩm</span>
                    </a>
                    <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @can('products.add')
                                <a class="collapse-item" href="{{ route('admin.products.create') }}">Thêm sản phẩm</a>
                            @endcan
                            <a class="collapse-item" href="{{ route('admin.products.index') }}">Danh sách sản phẩm</a>
                            <a class="collapse-item" href="{{ route('admin.erase') }}">Sản phẩm đã xóa</a>
                        </div>
                    </div>
                </li>
            @endcan

            @can('categories')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
                        aria-expanded="true" aria-controls="collapseCategories">
                        <i class="fa-solid fa-list"></i>
                        <span>Danh mục</span>
                    </a>
                    <div id="collapseCategories" class="collapse" aria-labelledby="headingCB"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @can('categories.add')
                                <a class="collapse-item" href="{{ route('admin.categories.create') }}">Thêm danh mục </a>
                            @endcan
                            <a class="collapse-item" href="{{ route('admin.categories.index') }}">Danh sách danh mục</a>
                        </div>
                    </div>
                </li>
            @endcan

            {{-- Thương hiệu sản phảm --}}
            @can('brands')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrand"
                        aria-expanded="true" aria-controls="collapseBrand">
                        <i class="fa-solid fa-bars-staggered"></i>
                        <span>Thương hiệu</span>
                    </a>
                    <div id="collapseBrand" class="collapse" aria-labelledby="headingCB" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @can('brands.add')
                                <a class="collapse-item" href="{{ route('admin.brand.create') }}">Thêm thương hiệu </a>
                            @endcan
                            <a class="collapse-item" href="{{ route('admin.brand.index') }}">Danh sách thương hiệu</a>
                        </div>
                    </div>
                </li>
            @endcan

            <!-- Nav Item - Utilities Collapse Menu -->
            @can('users')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePositions"
                        aria-expanded="true" aria-controls="collapsePositions">
                        <i class="fa-solid fa-user"></i>
                        <span>Quản lý người dùng</span>
                    </a>
                    <div id="collapsePositions" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @can('users.add')
                                <a class="collapse-item" href="{{ route('admin.users.create') }}">Thêm tài khoản</a>
                            @endcan
                            <a class="collapse-item" href="{{ route('admin.users.index') }}">Danh sách người dùng</a>
                        </div>
                    </div>
                </li>
            @endcan

            @can('positions')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-user"></i>
                        <span>Quyền truy cập</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @can('positions.add')
                                <a class="collapse-item" href="{{ route('admin.positions.create') }}">Thêm quyền</a>
                            @endcan
                            <a class="collapse-item" href="{{ route('admin.positions.index') }}">Danh sách quyền truy cập</a>
                        </div>
                    </div>
                </li>
            @endcan



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <div class="admin_name">
                                <span style="text-transform: capitalize">{{ Auth::user()->username }}
                                    {{ Auth::user()->email }}</span>
                                <i class="fa-solid fa-caret-down"></i>
                            </div>

                            <div class="admin_name-dropdown d-none">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12 background-white">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4 title-page">
                                <h1 class="h3 mb-0 text-gray-800">
                                    @yield('page_heading')
                                </h1>

                                @yield('redirect')
                            </div>

                            {{-- Content --}}
                            @yield('content')
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white ">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/custom_layout/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/custom_layout/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/custom_layout/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/custom_layout/js/sb-admin-2.min.js') }}"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('admin/custom_layout/js/custom-js/index.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

    <script src="{{ asset('admin/custom_admin/customIndex.js') }}"></script>

    @yield('js')


</body>

</html>
