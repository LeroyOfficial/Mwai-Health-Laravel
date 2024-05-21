<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand text-center pt-4 m-0" href="{{url('/')}}">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('assets/img/logo.png')}}" alt="{{config('app.name')}}'s logo">
            </div>
            <div class="sidebar-brand-text mx-3">
                <span>{{config('app.name')}}</span>
            </div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/doctors')}}">
                    <i class="fas fa-users"></i>
                    <span>Doctors</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/patients')}}">
                    <i class="fas fa-users"></i>
                    <span>Patients</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/messages')}}">
                    <i class="fas fa-comments"></i>
                    <span>Messages</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/products')}}">
                    <i class="fas fa-gift"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/orders')}}">
                    <i class="fas fa-cart-plus"></i>
                    <span>Orders</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-users-circle"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" hidden="" method="POST" action="{{route('logout')}}">
                    @csrf
                </form>
            </li>

        </ul>
        <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
        </div>
    </div>
</nav>
