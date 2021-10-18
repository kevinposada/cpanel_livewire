@extends('layouts.main', ['activePage' => 'products', 'titlePage' => 'Detalles del producto'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="card-title">Productos</div>
            <p class="card-category">Vista detallada del producto {{ $product->title }}</p>
          </div>
          <!--body-->
          <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="success">
              {{ session('success') }}
            </div>
            @endif
            <div class="row">

              <div class="col-md-4">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">
                        <a href="#" class="d-flex">
                          <img src="{{ asset('/img/default-avatar.png') }}" alt="image" class="avatar">
                          <h5 class="title mx-3">{{ $product->title }}</h5>
                        </a>
                        <p class="description">
                          {{ $product->descripcion }} <br>
                          {{ $product->price }} <br>
                          {{ $product->created_at }}
                        </p>
                      </div>
                    </p>
                    <div class="card-description">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam officia corporis molestiae aliquid provident
                      placeat.
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <a href="{{ route('products.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                      <a href="{{ route('products.edit', $product->id) }}">
                        <button class="btn btn-sm btn-primary">Editar</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div><!--end card user 2-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection