<!-- Dashboards -->
<li class="nav-item @active_exact(admin)">
    <a href="/admin" class="nav-link">
        <i class="fa fa-dashboard mr-1"></i> {{__('Dashboard')}}
    </a>
</li>

@if( Auth::user()->can('viewAny', App\Models\User::class) )
    <li class="nav-item @active(admin/users)">
        <a href="/admin/users" class="nav-link">
            <i class="fa fa-user mr-1"></i> {{__('Users')}}
        </a>
    </li>
@endif
