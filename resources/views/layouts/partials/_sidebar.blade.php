<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('index') }}"><img src="{{ asset('images/logo-kazee.png') }}" class="logo-l"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('index') }}"><img src="{{ asset('images/icon-kazee.png') }}" class="logo-m"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->is('/') || request()->is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-th-large"></i> <span>Dashboard Customer</span></a>
            </li>

            <li class="menu-header">Master Data</li>
            <li class="{{ request()->is('asset/products*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('asset.products.index')}}"><i class="fas fa-box"></i> <span>Product</span></a>
            </li>
            <li class="{{ request()->is('asset/data-collections*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('asset.data-collections.index')}}"><i class="fas fa-database"></i> <span>Data Collection</span></a>
            </li>
            <li class="{{ request()->is('asset/models*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('asset.models.index')}}"><i class="fas fa-puzzle-piece"></i> <span>Model</span></a>
            </li>
            <li class="{{ request()->is('asset/copy-rights*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('asset.copy-rights.index')}}"><i class="fas fa-copyright"></i> <span>Copy Right</span></a>
            </li>
            <li class="{{ request()->is('asset/softwares*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('asset.softwares.index')}}"><i class="fas fa-fax"></i> <span>Software</span></a>
            </li>
            <li class="{{ request()->is('asset/clients*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('asset.clients.index')}}"><i class="fas fa-users"></i> <span>Client</span></a>
            </li>
            <li class="{{ request()->is('asset/insights*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('asset.insights.index')}}"><i class="fas fa-file"></i> <span>Insight</span></a>
            </li>
            <li class="{{ request()->is('asset/clipping-onlines*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('asset.clipping-onlines.index')}}"><i class="fas fa-paperclip"></i> <span>Clipping Online</span></a>
            </li>
            <li class="{{ request()->is('asset/reports*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('asset.reports.index')}}"><i class="fas fa-file-alt"></i> <span>Report</span></a>
            </li>
            <li class="{{ request()->is('asset/domains*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('asset.domains.index')}}"><i class="fas fa-globe"></i> <span>Domain</span></a>
            </li>
            <li class="{{ request()->is('operational/server*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('operational.server.index')}}"><i class="fas fa-globe"></i> <span>Server</span></a>
            </li>
            <li class="{{ request()->is('operational/groupserver*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('operational.groupserver.index')}}"><i class="fas fa-globe"></i> <span>Group Server</span></a>
            </li>
            <li class="{{ request()->is('operational/database*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('operational.database.index')}}"><i class="fas fa-globe"></i> <span>Database</span></a>
            </li>
            <li class="{{ request()->is('operational/engine*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('operational.engine.index')}}"><i class="fas fa-globe"></i> <span>Engine</span></a>
            </li>
            <li class="{{ request()->is('operational/serverxgroup*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('operational.serverxgroup.index')}}"><i class="fas fa-globe"></i> <span>Server x Group</span></a>
            </li>
            <li class="{{ request()->is('operational/enginexdatabase*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('operational.enginexdatabase.index')}}"><i class="fas fa-globe"></i> <span>Engine x Database</span></a>
            </li>
            <li class="{{ request()->is('operational/enginexserver*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('operational.enginexserver.index')}}"><i class="fas fa-globe"></i> <span>Engine x Server</span></a>
            </li>
            
            
                    {{-- <li class="dropdown {{ request()->is('asset*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('asset/products*') ? 'active' : '' }}"><a class="nav-link" href="{{route('asset.products.index')}}"><i class="fas fa-box"></i> Data Product</a></li>
                    <li class="{{ request()->is('asset/data-collections*') ? 'active' : '' }}"><a class="nav-link" href="{{route('asset.data-collections.index')}}"><i class="fas fa-database"></i> Data Collection</a></li>
                    <li class="{{ request()->is('asset/models*') ? 'active' : '' }}"><a class="nav-link" href="{{route('asset.models.index')}}"><i class="fas fa-puzzle-piece"></i> Data Model</a></li>
                    <li class="{{ request()->is('asset/copy-rights*') ? 'active' : '' }}"><a class="nav-link" href="{{route('asset.copy-rights.index')}}"><i class="fas fa-copyright"></i> Data Copy Right</a></li>
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>
