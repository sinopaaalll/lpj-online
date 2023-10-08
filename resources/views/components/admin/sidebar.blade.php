<!-- Sidebar -->
<div class="sidebar sidebar-style-1">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth()->user()->name }}
                            <span class="user-level">{{ auth()->user()->email }}</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('lpj') ? 'active' : '' }} }}">
                    <a href="{{ route('lpj.index') }}">
                        <i class="fas fa-upload"></i>
                        <p>Upload LPJ</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('role') ? 'active' : '' }} }}">
                    <a href="{{ route('role.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Role</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
