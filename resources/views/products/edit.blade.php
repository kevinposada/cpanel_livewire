@extends('layouts.main', ['activePage' => 'products', 'titlePage' => 'Editar producto'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        {{-- <form action="{{ route('users.update', $user->id) }}" method="post" class="form-horizontal">
          @csrf
          @method('PUT') --}}
        {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) !!}
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Producto</h4>
              <p class="card-category">Editar datos</p>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="title" value="{{ old('title', $product->title) }}" autofocus>
                  @if ($errors->has('title'))
                    <span class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-7">
                  {{-- <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion', $product->descripcion) }}"> --}}
                  <textarea class="form-control" name="descripcion" cols="30" rows="10" placeholder="Ingrese la descripcion del producto">{{ old('descripcion', $product->descripcion) }}</textarea>
                  @if ($errors->has('descripcion'))
                    <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" name="price" value="{{ old('price', $product->price) }}" step="any">
                  @if ($errors->has('price'))
                    <span class="error text-danger" for="input-price">{{ $errors->first('price') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <!--End footer-->
          </div>
        {!! Form::close() !!}
        {{-- </form> --}}
      </div>
    </div>
  </div>
</div>
@endsection