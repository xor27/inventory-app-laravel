<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Investory App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/png"
          href="{{ asset('seodash/assets/images/logos/seodashlogo.png') }}" />

    {{-- SEODash CSS --}}
    <link rel="stylesheet"
          href="{{ asset('seodash/assets/css/styles.min.css') }}">
</head>

<body>

<div class="page-wrapper" id="main-wrapper"
     data-layout="vertical"
     data-navbarbg="skin6"
     data-sidebartype="full"
     data-sidebar-position="fixed"
     data-header-position="fixed">

    {{-- ================= SIDEBAR ================= --}}
    <aside class="left-sidebar">
        <div>
            {{-- LOGO --}}
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                    <img src="{{ asset('seodash/assets/images/logos/logo-light.svg') }}" alt="logo"/>
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>

            {{-- NAVIGATION --}}
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">

                    {{-- DASHBOARD --}}
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('dashboard') }}">
                            <span>
                                <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    {{-- ADMIN --}}
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-small-cap">
                            <span class="hide-menu">MASTER DATA</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('categories.index') }}">
                                <span>
                                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Category</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('products.index') }}">
                                <span>
                                    <iconify-icon icon="solar:box-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Product</span>
                            </a>
                        </li>
                    @endif

                    {{-- STAFF --}}
                    @if(auth()->user()->role === 'staff')
                        <li class="nav-small-cap">
                            <span class="hide-menu">PRODUCT</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('products.index') }}">
                                <span>
                                    <iconify-icon icon="solar:box-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Product</span>
                            </a>
                        </li>
                    @endif

                    {{-- USER --}}
                    @if(auth()->user()->role === 'user')
                        <li class="nav-small-cap">
                            <span class="hide-menu">MENU</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('products.index') }}">
                                <span>
                                    <iconify-icon icon="solar:box-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Product</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('transactions.index') }}">
                                <span>
                                    <iconify-icon icon="solar:transfer-horizontal-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Transaction</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>
    </aside>
    {{-- ================= END SIDEBAR ================= --}}

    {{-- ================= MAIN CONTENT ================= --}}
    <div class="body-wrapper">

        {{-- HEADER --}}
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                </ul>

                <div class="navbar-collapse justify-content-end px-0">
                    <ul class="navbar-nav flex-row ms-auto align-items-center">

                        {{-- USER DROPDOWN --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)"
                               data-bs-toggle="dropdown">
                                <img src="{{ asset('seodash/assets/images/profile/user-1.jpg') }}"
                                     alt="user" width="35" height="35"
                                     class="rounded-circle">
                            </a>

                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up">
                                <div class="message-body">
                                    {{-- USER: MY PROFILE BISA DIKLIK --}}
                                    @if(auth()->user()->role === 'user')
                                        <a href="{{ route('user.profile.edit') }}"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                    @endif
                                    
                                    {{-- ADMIN & STAFF: MY PROFILE TIDAK BISA DIKLIK --}}
                                    @if(in_array(auth()->user()->role, ['admin', 'staff']))
                                        <div class="d-flex align-items-center gap-2 dropdown-item text-muted"
                                            style="cursor: not-allowed;">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </div>
                                    @endif
                                    
                                    {{-- LOGOUT (SEMUA ROLE) --}}
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-outline-primary mx-3 mt-2 d-block">
                                            Logout
                                        </button>
                                    </form>
                                
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        {{-- PAGE CONTENT --}}
        <div class="container-fluid">
            @yield('content')
        </div>

        {{-- FOOTER --}}
        <div class="py-3 text-center">
            <p class="mb-0 fs-4">
                Investory App – Sanbercode
            </p>
        </div>
    </div>
</div>

{{-- ================= JS ================= --}}
<script src="{{ asset('seodash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('seodash/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('seodash/assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('seodash/assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('seodash/assets/js/app.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

</body>
</html>