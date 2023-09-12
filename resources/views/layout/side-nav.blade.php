
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column my-4">
            <li class="nav-item">
                <a
                    class="nav-link {{ (\Route::getCurrentRoute()->getName() === 'dashboard.view') ? 'active' : null }}"
                    href="{{ route('dashboard.view') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            @if(auth()->user()->admin)
                <li class="nav-item">
                    <a
                        class="nav-link {{ (\Route::getCurrentRoute()->getName() === 'admin.domain.index') ? 'active' : null }}"
                        href="{{ route('admin.domain.index') }}">
                        <span data-feather="shopping-cart" class="align-text-bottom"></span>
                        Domains
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a
                        class="nav-link {{ (\Route::getCurrentRoute()->getName() === 'auth.edit.view') ? 'active' : null }}"
                        href="{{ route('auth.edit.view') }}">
                        <span data-feather="file" class="align-text-bottom"></span>
                        Edit Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link {{ (\Route::getCurrentRoute()->getName() === 'auth.reset.view') ? 'active' : null }}"
                        href="{{ route('auth.reset.view') }}">
                        <span data-feather="shopping-cart" class="align-text-bottom"></span>
                        Reset password
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a
                    class="nav-link"
                    href="{{ route('auth.logout') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
