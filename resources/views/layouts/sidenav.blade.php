<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Statistic</div>
                <a class="nav-link" href="{{route('index')}}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Database</div>
                <a class="nav-link" href="{{route('customers')}}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    Customers
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Login as:</div>
            {{Auth::user()->name}}
        </div>
    </nav>
</div>
