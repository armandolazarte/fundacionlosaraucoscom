@extends('layouts.master')

@section('contenido')

  <header>
    <div class="container">
      <h1 class="page-header">
        <img src="img/logo.png" alt="Fundación Los Araucos" class="pull-left img-responsive" />
        Fundación Los Araucos
        <small>Fundación para el desarrollo y bienestar social de los trabajadores de la industria del petróleo del departamento de Arauca.</small>
      <h1>
    </div>
  </header>

  <section class="container">

    <div class="row">

      <section id="convocatorias" class="col-md-5">
        <h2>
          <span class="glyphicon glyphicon-ok"></span>
          Convocatorias cerradas <br />
          <small>
            Inicio: Marzo 25 de 2014 HORA 8:00 AM <br />
            Cierre: Marzo 31 de 2014 HORA 6:00 PM
          </small>
        </h2>

        <p>La Fundación los Araucos invitó a participar en la <strong>convocatoria Nº 001 de 2014</strong> a todos los trabajadores y trabajadoras contratistas y subcontratistas que laboran o han laborado en los últimos tres (3) años, a partir de la solicitud del crédito en la industria petrolera de manera continua o discontinua por lo menos (12) meses, y que son o han sido beneficiarios de la convención colectiva de trabajo suscrita entre la Unión Sindical Obrera de la Industria del Petróleo “USO” Subdirectiva Arauca y la empresa Occidental de Colombia, Inc., en el departamento de Arauca, interesados en tramitar una solicitud de crédito para vivienda o proyectos productivos.</p>

        <p><a href="docs/convocatoria_001_2014.pdf" class="btn btn-success" target="_blank">Descargar convocatoria en PDF</a></p>

      </section>{{-- /#convocatorias --}}

      <section class="col-md-7">

        <div id="carousel" class="carousel slide" data-ride="carousel">
          {{-- Indicadores --}}
          <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            <li data-target="#carousel" data-slide-to="3"></li>
          </ol>

          <div class="carousel-inner">

            <div class="item">
              <img src="img/fachada2-tiny.png" />
              <div class="carousel-caption">
                <h4>Estamos ubicados en la carrera 25 Nº 21-50</h4>
              </div>
            </div>

            <div class="item active">
              <img src="img/fachada1-tiny.png" />
              <div class="carousel-caption">
                <h4>Entrada de la oficina de la Fundación Los Araucos</h4>
              </div>
            </div>

            <div class="item">
              <img src="img/carmen-tiny.png" />
              <div class="carousel-caption">
                <h4>CARMEN OMAIRA GARCIA</h4> <h5>Secretaria</h5>
              </div>
            </div>

            <div class="item">
              <img src="img/jose-luis-tiny.png" />
              <div class="carousel-caption">
                <h4>JOSE LUIS MORALES</h4> <h5>Director</h5>
              </div>
            </div>

          </div><!-- /.carousel-inner -->

          <a class="left carousel-control" href="#carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>

        </div><!-- /#carousel -->

      </section>{{-- /.col-md-6 --}}

    </div>{{-- /.row --}}

  </section> {{-- /.container --}}

  @include('informacion/requisitos')

@stop