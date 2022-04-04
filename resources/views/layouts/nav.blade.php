<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/admin') }}">LARAVEL BASE</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="">
                    <i class="fa fa-signal"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>        

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuración">
                <a class="nav-link" href="">
                    <i class="fas fa-cogs"></i>
                    <span class="nav-link-text">Configuración</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dealers">
                <a class="nav-link" href="">
                    <i class="fas fa-users"></i>
                    <span class="nav-link-text">Dealers</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categorías Modelos">
                <a class="nav-link" href="">
                    <i class="fas fa-share-alt"></i>
                    <span class="nav-link-text">Categorías Modelos</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Modelos">
                <a class="nav-link" href="">
                    <i class="fas fa-motorcycle"></i>
                    <span class="nav-link-text">Modelos</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reportes">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseReport" data-parent="#exampleAccordion">
                    <i class="fas fa-chart-line"></i>
                    <span class="nav-link-text">Reportes</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseReport">
                    <li class="nav-sub-menu">
                        <a href="">Leads</a>
                    </li>
                    <li class="nav-sub-menu">
                        <a href="">Tiempo de Respuesta</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Leads">
                <a class="nav-link" href="">
                    <i class="fas fa-list"></i>
                    <span class="nav-link-text">Leads</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Encuestas">
                <a class="nav-link" href="">
                    <i class="fa fa-question-circle"></i>
                    <span class="nav-link-text">Encuestas</span>
                </a>
            </li>

        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="nav-link" style="cursor:default;">
                    <i class="fa fa-fw fas fa-user"></i>{{ Auth::user()->name }}
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fas fa-sign-out-alt"></i>Logout
                </a>
            </li>
        </ul>
    </div>
</nav>