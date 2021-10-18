@extends('layouts.main', ['activePage' => 'products', 'titlePage' => 'Nuevo producto'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('productsmanage.store') }}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Producto</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
              {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
              @endif --}}
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" placeholder="Ingrese el titulo" value="{{ old('title') }}" autofocus>
                  @if ($errors->has('title'))
                    <span class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                  @endif
                </div>
              </div>
              
              <div class="row">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="descripcion" cols="30" rows="10" placeholder="Ingrese la descripcion del producto">{{ old('descripcion') }}</textarea>
                  {{-- <input type="text" class="form-control" name="descripcion" placeholder="Ingrese su nombre de usuario" value="{{ old('descripcion') }}"> --}}
                  @if ($errors->has('descripcion'))
                    <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                  @endif
                </div>
              </div>

              <div class="row">
                <label for="price" class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" name="price" placeholder="Precio del producto" value="{{ old('price') }}" step="any">
                  @if ($errors->has('price'))
                    <span class="error text-danger" for="input-price">{{ $errors->first('price') }}</span>
                  @endif
                </div>
              </div>

            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection