
@extends('layouts.app')
{{-- @push('stylesheet') --}}
{{-- @endpush --}}
@section('content')


<div class="title-wrapper pt-30">
  <div class="row align-items-center">
    <div class="col-md-6">
      <div class="title mb-30">
        @component('components._back')
          @slot('route', route('sala.show',$m->id_sala))
          @slot('titulo','Sala ' . $m->sala->nombre . ' - MURO ' . $m->titulo)
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
          <a class="nav-link {{ activeTab(["muro/".$m->id]) }}" href="{{ route('muro.show',$m->id) }}">
            Feedbacks
          </a>
        </li>
        <li class="nav-item {{ activeTab(["muro/".$m->id."/edit"]) }}">
          <a class="nav-link" href="{{ route('muro.edit',$m->id) }}">
            Editar
          </a>
        </li>
      </ul>
      <div class="card-style mb-30">
        <div class="table-wrapper table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th></th>
                <th class="lead-info"><h6>Nombre</h6></th>
                <th class="lead-email"><h6>Correo</h6></th>
                <th class="lead-company"><h6>Comentario</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
              @foreach ($m->feedbacks as $key => $f)
              <tr>
                <td>
                  {{ ++$key }}
                </td>
                <td class="min-width">
                  {{ $f->nombre }}
                </td>
                <td class="min-width">
                  {{ $f->correo }}
                </td>
                <td class="min-width">
                  {{ $f->comentario }}
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
