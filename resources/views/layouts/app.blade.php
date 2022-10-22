@extends('layouts.skeleton')
@section('app')
@include('layouts._nav')
<main class="main-wrapper">
  @include('layouts._header')
  <section class="section">
    <div class="container-fluid">
      @yield('content')
    </div>
  </section>
  @include('layouts._footer')
</main>
@endsection

