
@extends('layouts.app')
{{-- @push('stylesheet') --}}
{{-- @endpush --}}
@section('content')


<div class="title-wrapper pt-30">
  <div class="row align-items-center">
    <div class="col-md-6">
      <div class="title mb-30">
        @component('components._back')
          @slot('route', route('sala.index'))
          @slot('titulo','Sala ' . $s->nombre)
        @endcomponent
      </div>
    </div>
    {{-- <div class="col-md-6">
      <div class="breadcrumb-wrapper mb-30">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#0">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Tables
            </li>
          </ol>
        </nav>
      </div>
    </div> --}}
  </div>
</div>

<div class="tables-wrapper">
  <div class="row">

    <div class="col-lg-12">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link {{ activeTab(["sala/".$s->id]) }}" href="{{ route('sala.show',$s->id) }}">
            Muros
          </a>
        </li>
        <li class="nav-item {{ activeTab(["sala/".$s->id."/edit"]) }}">
          <a class="nav-link" href="{{ route('sala.edit',$s->id) }}">
            Editar
          </a>
        </li>
      </ul>
      <div class="card-style mb-30">
        <a href="{{ route('sala.muro.create', $s->id) }}" class="btn btn-success">
          Crear muro
        </a>
        <div class="table-wrapper table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="lead-info"><h6>Nombre</h6></th>
                <th class="lead-email"><h6>Descripcion</h6></th>
                <th class="lead-company"><h6>Usuario</h6></th>
                <th class="lead-company"><h6>Mostrar</h6></th>
                <th class="lead-company"><h6>Feedback</h6></th>
                <th><h6></h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
              @foreach ($s->muros as $m)
              <tr>
                <td class="min-width">
                  <div class="lead">
                    <div class="lead-image">
                      <img src="{{ asset($m->getImage()) }}" alt="">
                    </div>
                    <div class="lead-text">
                      <p>{{ $m->titulo }}</p>
                    </div>
                  </div>
                </td>
                <td class="min-width">
                  <p>{{ $m->descripcion }}</p>
                </td>
                <td class="min-width">
                  <p>{{ $m->usuario->nombre }}</p>
                </td>
                <td>
                  <span class="badge rounded-pill bg-success">
                    {{ $m->feedbacks->count() }}
                  </span>
                </td>
                <td>
                  @if ($m->getConfigActive())
                  <span class="badge rounded-pill bg-success">
                    Activado
                  </span>
                  @else
                    <span class="badge rounded-pill bg-danger">
                      Desactivado
                    </span>
                  @endif
                </td>
                <td>
                  @if ($m->getConfigActiveComentario())
                  <span class="badge rounded-pill bg-success">
                    Activado
                  </span>
                  @else
                    <span class="badge rounded-pill bg-danger">
                      Desactivado
                    </span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('muro.show',$m->id) }}" class="btn btn-primary">
                    Ver
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
