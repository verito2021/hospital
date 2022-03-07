<li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('usuarios') ? 'active' : '' }}">
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
</li>
<li class="side-menus {{ Request::is('roles') ? 'active' : '' }}">
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
</li>
<li class="side-menus {{ Request::is('especialidades') ? 'active' : '' }}">
    <a class="nav-link" href="/especialidades">
        <i class=" fas fa-building"></i><span>Especialidades</span>
    </a>
</li>
<li class="side-menus {{ Request::is('paciente') ? 'active' : '' }}">
    <a class="nav-link" href="/paciente">
        <i class=" fas fa-building"></i><span>Pacientes</span>
    </a>
</li>
