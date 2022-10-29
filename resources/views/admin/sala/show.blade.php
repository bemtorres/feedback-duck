
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
        <div class="table-responsive">
          <table class="table table-sm table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Usuario</th>
                <th class="text-center">Total</th>
                <th class="text-center">Mostrar</th>
                <th class="text-center">Feedback</th>
                <th class="text-center">Password</th>
                <th></th>
              </tr>
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
                <td class="text-center">
                  <span class="badge rounded-pill bg-success">
                    {{ $m->feedbacks->count() }}
                  </span>
                </td>
                <td class="text-center">
                  @if ($m->getConfigActive())
                    <i class="fa-solid fa-circle-check text-success"></i>
                  @else
                    <i class="fa-solid fa-circle-xmark text-danger"></i>
                  @endif
                </td>
                <td class="text-center">
                  @if ($m->getConfigActiveComentario())
                    <i class="fa fa-circle-check text-success"></i>
                  @else
                    <i class="fa-solid fa-circle-xmark text-danger"></i>
                  @endif
                </td>
                <td class="text-center">
                  @if ($m->getConfigIsPassword())
                    <i class="fa-solid fa-lock"></i>
                  @else
                    <i class="fa-solid fa-lock-open text-gray"></i>
                  @endif
                </td>
                <td>
                  <a href="{{ route('muro.show',$m->id) }}" class="btn btn-primary btn-sm">
                    ver
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
