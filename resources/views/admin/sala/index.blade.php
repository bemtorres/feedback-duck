
@extends('layouts.app')
{{-- @push('stylesheet') --}}
{{-- @endpush --}}
@section('content')

<div class="title-wrapper pt-30">
  <div class="row align-items-center">
    <div class="col-md-6">
      <div class="title mb-30">
        <h2>Salas</h2>
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
      <div class="card-style mb-30">
        <a href="{{ route('sala.create') }}" class="btn btn-primary">
          Crear nueva
        </a>
        <div class="table-wrapper table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="lead-info"><h6>Nombre</h6></th>
                <th class="lead-email"><h6>Descripcion</h6></th>
                <th class="lead-company"><h6>Usuario</h6></th>
                <th><h6></h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
              @foreach ($salas as $s)
              <tr>
                <td class="min-width">
                  <div class="lead">
                    <div class="lead-image">
                      <img src="{{ asset($s->getImage()) }}" alt="">
                    </div>
                    <div class="lead-text">
                      <p>{{ $s->nombre }}</p>
                    </div>
                  </div>
                </td>
                <td class="min-width">
                  <p>{{ $s->descripcion }}</p>
                </td>
                <td class="min-width">
                  <p>{{ $s->usuario->nombre }}</p>
                </td>
                <td>
                  <span class="badge bg-primary">12</span>
                  <a href="{{ route('sala.show',$s->id) }}" class="btn btn-primary">
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
