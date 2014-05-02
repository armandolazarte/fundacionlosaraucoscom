<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand visible-sm visible-xs" href="{{ url('/') }}">Fundación Los Araucos</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
          <a href="{{ url('/') }}">
            <span class="glyphicon glyphicon-home"></span>
            Inicio
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Acerca de nosotros <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('historia') }}">Historia</a></li>
            <li><a href="{{ url('mision') }}">Misión</a></li>
            <li><a href="{{ url('vision') }}">Visión</a></li>
            <li><a href="{{ url('objetivos') }}">Objetivos</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Trámites <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('tramites/solicitud-de-credito') }}">Solicitud de crédito</a></li>
            <li><a href="{{ url('tramites/reestructuracion-de-credito') }}">Reestructuración de crédito</a></li>
            <li><a href="{{ url('tramites/desembolso-de-credito') }}">Desembolso del crédito</a></li>
            <li><a href="{{ url('tramites/constitucion-de-hipoteca') }}">Constitución de hipoteca</a></li>
            <li><a href="{{ url('tramites/cancelacion-de-hipoteca') }}">Cancelación de hipoteca</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Normatividad <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('docs/estatutos.pdf') }}" target="_blank">Estatutos</a></li>
            <li><a href="{{ url('docs/reglamentocreditoycartera.pdf') }}" target="_blank">Crédito y cartera</a></li>
            <li><a href="{{ url('docs/reglamentotramitesysolicitudescreditos.pdf') }}" target="_blank">Solicitudes de crédito</a></li>
            <li><a href="{{ url('docs/reglamentoevaluacioncreditos.pdf') }}" target="_blank">Evaluación de créditos</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span>
              {{ Auth::user()->nombre }} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ url('estado-de-mi-cuenta') }}">
                  <span class="glyphicon glyphicon-eye-open"></span>
                  Ver mi cuenta
                </a>
              </li>
              <li>
                <a href="{{ url('usuarios/cambiar-clave') }}">
                  <span class="glyphicon glyphicon-cog"></span>
                  Cambiar mi clave
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="{{ url('usuarios/logout') }}">
                  <span class="glyphicon glyphicon-log-out"></span>
                  Cerrar sesión
                </a>
              </li>
            </ul>
          </li>
        </ul>
        @else
          {{ Form::open(array('url' => 'usuarios/login', 'method' => 'post', 'role' => 'form', 'class' => 'navbar-form navbar-left')) }}

          <div class="form-group">
              {{ Form::text('cedula', '', array('class' => 'form-control', 'placeholder' => 'Cédula', 'required', 'autofocus')) }}
          </div>

          <div class="form-group">
              {{ Form::password('clave', array('class' => 'form-control', 'placeholder' => 'Clave', 'required')) }}
          </div>

          {{ Form::submit('Entrar', array('class' => 'btn btn-primary')) }}

          {{ Form::close() }}
        @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>