
@extends('layouts.app')
{{-- @push('stylesheet') --}}
{{-- @endpush --}}
@section('content')

<div class="title-wrapper pt-30">
  <div class="row align-items-center">
    <div class="col-md-6">
      <div class="title mb-30">
        @component('components._back')
          @slot('route', route('muro.show',$m->id))
          @slot('titulo','Editar ' . $m->titulo)
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

    <div class="col-lg-6">

      <div class="card-style mb-30">

        {{-- <h6 class="mb-15">Sign up Form</h6>
        <p class="text-sm mb-25">
          Start creating the best possible user experience for you
          customers.
        </p> --}}
        <form action="{{ route('muro.update', $m->id) }}" method="POST"  enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="row mb-3">
              <div class="col-6">
                <label for="inputNombret">Titulo</label>
              </div>
              <div class="col-6">
                <input type="text" class="form-control" id="inputNombret" name="titulo" value="{{ $m->titulo }}" placeholder="" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label for="inputNombredescripcion">Descripción</label>
              </div>
              <div class="col-6">
                <input type="text" class="form-control" id="inputNombredescripcion" name="descripcion" value="{{ $m->descripcion }}" placeholder="" required>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label class="col-form-label" for="hf-rut">Imagen</label>
              </div>
              <div class="input-group">
                <img src="{{ asset($m->getImage()) }}" class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                <br>
              </div>
              <div class="input-group">
                <!-- <img src="" class='Responsive image img-thumbnail'  width='200px' height='200px' alt=""> -->
                <input type="file" name="image" accept="image/*" onchange="preview(this)" />
                <br>
              </div>
            </div>
            <div class="form-group text-center">
              <div id="preview"></div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label for="inputNombre">Mostrar</label>
              </div>
              <div class="col-6">
                <select class="form-select" name="active" aria-label="Default select example">
                  <option value="1" @if ($m->getConfigActive())
                    selected
                  @endif>Si</option>
                  <option value="2" @if (!$m->getConfigActive())
                    selected
                  @endif>No</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="inputNombre">Habilitar feedback</label>
              </div>
              <div class="col-6">
                <select class="form-select" name="active_comentario" aria-label="Default select example">
                  <option value="1" @if ($m->getConfigActiveComentario())
                    selected
                  @endif>Si</option>
                  <option value="2" @if (!$m->getConfigActiveComentario())
                    selected
                  @endif>No</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label for="inputNombre">Habilitar password</label>
              </div>
              <div class="col-6">
                <select class="form-select" name="active_pass" aria-label="Default select example">
                  <option value="1" @if ($m->getConfigIsPassword())
                    selected
                  @endif>Si</option>
                  <option value="2" @if (!$m->getConfigIsPassword())
                    selected
                  @endif>No</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-6">
                <label for="inputNombret">Contraseña</label>
              </div>
              <div class="col-6">
                <input type="text" class="form-control" id="pass" name="pass" value="{{ $m->getConfigPassword() }}">
              </div>
            </div>

            <div class="col-12">
              <div class="button-group d-flex justify-content-center flex-wrap">
                <button class="main-btn primary-btn btn-hover w-100 text-center">
                  Guardar
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
{{--
  <div class="row">
    <div class="col-lg-6">
      <div class="card-style mb-30">
        <h6 class="mb-10">Striped Table</h6>
        <p class="text-sm mb-20">
          For Striped Table—light padding and only horizontal
          dividers.
        </p>
        <div class="table-wrapper table-responsive">
          <table class="table striped-table">
            <thead>
              <tr>
                <th></th>
                <th><h6>Account No</h6></th>
                <th><h6>Balance</h6></th>
                <th><h6>Action</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="check-input-primary">
                    <input class="form-check-input" type="checkbox" id="checkbox-1">
                  </div>
                </td>
                <td>
                  <p>AC336 508 2157</p>
                </td>
                <td>
                  <p>$523</p>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <div class="check-input-primary">
                    <input class="form-check-input" type="checkbox" id="checkbox-2">
                  </div>
                </td>
                <td>
                  <p>AC336 756 0987</p>
                </td>
                <td>
                  <p>$123</p>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <div class="check-input-primary">
                    <input class="form-check-input" type="checkbox" id="checkbox-3">
                  </div>
                </td>
                <td>
                  <p>AC336 098 8765</p>
                </td>
                <td>
                  <p>$223</p>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <div class="check-input-primary">
                    <input class="form-check-input" type="checkbox" id="checkbox-4">
                  </div>
                </td>
                <td>
                  <p>AC336 897 3242</p>
                </td>
                <td>
                  <p>$323</p>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <div class="check-input-primary">
                    <input class="form-check-input" type="checkbox" id="checkbox-5">
                  </div>
                </td>
                <td>
                  <p>AC336 654 0987</p>
                </td>
                <td>
                  <p>$423</p>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <div class="check-input-primary">
                    <input class="form-check-input" type="checkbox" id="checkbox-6">
                  </div>
                </td>
                <td>
                  <p>AC336 234 9804</p>
                </td>
                <td>
                  <p>$523</p>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- end table row -->
            </tbody>
          </table>
          <!-- end table -->
        </div>
      </div>
      <!-- end card -->
    </div>
    <!-- end col -->
    <div class="col-lg-6">
      <div class="card-style mb-30">
        <h6 class="mb-10">Table head options</h6>
        <p class="text-sm mb-20">
          Use one of two modifier classes to make thead appear light
          or dark gray.
        </p>
        <div class="table-wrapper table-responsive">
          <table class="table striped-table">
            <thead>
              <tr>
                <th></th>
                <th><h6>First Name</h6></th>
                <th><h6>Last Name</h6></th>
                <th><h6>Username</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
              <tr>
                <td>
                  <h6 class="text-sm">#1</h6>
                </td>
                <td>
                  <p>Albert</p>
                </td>
                <td>
                  <p>Miles</p>
                </td>
                <td>
                  <p>@albert_miles</p>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <h6 class="text-sm">#2</h6>
                </td>
                <td>
                  <p>John</p>
                </td>
                <td>
                  <p>Doe</p>
                </td>
                <td>
                  <p>@john_doe</p>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <h6 class="text-sm">#3</h6>
                </td>
                <td>
                  <p>David</p>
                </td>
                <td>
                  <p>Smith</p>
                </td>
                <td>
                  <p>@davidsmith</p>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <h6 class="text-sm">#4</h6>
                </td>
                <td>
                  <p>Jameel</p>
                </td>
                <td>
                  <p>Kareem</p>
                </td>
                <td>
                  <p>@jkreem</p>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <h6 class="text-sm">#5</h6>
                </td>
                <td>
                  <p>Anna</p>
                </td>
                <td>
                  <p>Miles</p>
                </td>
                <td>
                  <p>@anna_miles</p>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <h6 class="text-sm">#6</h6>
                </td>
                <td>
                  <p>Hafiz</p>
                </td>
                <td>
                  <p>Miles</p>
                </td>
                <td>
                  <p>@hafiz_miles</p>
                </td>
              </tr>
              <!-- end table row -->
            </tbody>
          </table>
          <!-- end table -->
        </div>
      </div>
      <!-- end card -->
    </div>
    <!-- end col -->
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card-style mb-30">
        <h6 class="mb-10">Data Table</h6>
        <p class="text-sm mb-20">
          For basic styling—light padding and only horizontal
          dividers—use the class table.
        </p>
        <div class="table-wrapper table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th><h6>#</h6></th>
                <th><h6>Name</h6></th>
                <th><h6>Email</h6></th>
                <th><h6>Project</h6></th>
                <th><h6>Status</h6></th>
                <th><h6>Action</h6></th>
              </tr>
              <!-- end table row-->
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="employee-image">
                    <img src="assets/images/lead/lead-1.png" alt="">
                  </div>
                </td>
                <td class="min-width">
                  <p>Esther Howard</p>
                </td>
                <td class="min-width">
                  <p><a href="#0">yourmail@gmail.com</a></p>
                </td>
                <td class="min-width">
                  <p>Admin Dashboard Design</p>
                </td>
                <td class="min-width">
                  <span class="status-btn active-btn">Active</span>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <div class="employee-image">
                    <img src="assets/images/lead/lead-2.png" alt="">
                  </div>
                </td>
                <td class="min-width">
                  <p>D. Jonathon</p>
                </td>
                <td class="min-width">
                  <p><a href="#0">yourmail@gmail.com</a></p>
                </td>
                <td class="min-width">
                  <p>React Dashboard</p>
                </td>
                <td class="min-width">
                  <span class="status-btn active-btn">Active</span>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <div class="employee-image">
                    <img src="assets/images/lead/lead-3.png" alt="">
                  </div>
                </td>
                <td>
                  <p>John Doe</p>
                </td>
                <td>
                  <p><a href="#0">yourmail@gmail.com</a></p>
                </td>
                <td>
                  <p>Bootstrap Template</p>
                </td>
                <td>
                  <span class="status-btn success-btn">Done</span>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <div class="employee-image">
                    <img src="assets/images/lead/lead-4.png" alt="">
                  </div>
                </td>
                <td>
                  <p>Rayhan Jamil</p>
                </td>
                <td>
                  <p><a href="#0">yourmail@gmail.com</a></p>
                </td>
                <td>
                  <p>Css Grid Template</p>
                </td>
                <td>
                  <span class="status-btn info-btn">Pending</span>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <div class="employee-image">
                    <img src="assets/images/lead/lead-5.png" alt="">
                  </div>
                </td>
                <td>
                  <p>Esther Howard</p>
                </td>
                <td>
                  <p><a href="#0">yourmail@gmail.com</a></p>
                </td>
                <td>
                  <p>Admin Dashboard Design</p>
                </td>
                <td>
                  <span class="status-btn close-btn">Close</span>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- end table row -->
              <tr>
                <td>
                  <div class="employee-image">
                    <img src="assets/images/lead/lead-6.png" alt="">
                  </div>
                </td>
                <td>
                  <p>Anee Doe</p>
                </td>
                <td>
                  <p><a href="#0">yourmail@gmail.com</a></p>
                </td>
                <td>
                  <p>Space Template Update</p>
                </td>
                <td>
                  <span class="status-btn active-btn">Active</span>
                </td>
                <td>
                  <div class="action">
                    <button class="text-danger">
                      <i class="lni lni-trash-can"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> --}}
</div>
@endsection
@push('javascript')
  <script src="{{ asset('custom/preview.js') }}"></script>

@endpush
