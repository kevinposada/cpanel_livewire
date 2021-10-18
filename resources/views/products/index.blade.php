@extends('layouts.main', ['activePage' => 'products', 'titlePage' => 'Productos'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        @cannot('productsmanage.index')
          <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3">
                  <div class="card card-chart">
                    <div class="card-header card-header-tabs card-header-primary">
                      {{$product->title}}
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">{{$product->title}}</h4>
                      <p class="card-category">
                        {{-- <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> --}}
                        {{Str::limit($product->descripcion, 100)}}
                      </p>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">access_time</i> {{$product->price}} €
                      </div>
                      <button type="button" class="btn btn-sm btn-outline-success">Comprar</button>
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
          <div class="card-footer mr-auto">
            {{ $products->links() }}
          </div>
        @endcannot

        @can('productsmanage.index')
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <h4 class="card-title">Productos</h4>
                  <p class="card-category">Productos registrados</p>
                  <div class="nav-tabs-navigation mt-3">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Modo:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#admin" data-toggle="tab">
                            <i class="material-icons">bug_report</i> Admin
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#client" data-toggle="tab">
                            <i class="material-icons">code</i> Client
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="admin">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="card">
                                {{-- <div class="card-header card-header-primary">
                                  <h4 class="card-title">Productos</h4>
                                  <p class="card-category">Productos registrados</p>
                                </div> --}}
                                <div class="card-body">
                                  @if (session('success'))
                                  <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                  </div>
                                  @endif
                                  <div class="row">
                                    <div class="col-12 text-right">
                                      <a href="{{ route('products.create') }}" class="btn btn-sm btn-facebook">Añadir producto</a>
                                    </div>
                                  </div>
                                  <div class="table-responsive">
                                    <table class="table">
                                      <thead class="text-primary">
                                        <th>ID</th>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Created_at</th>
                                        <th class="text-right">Acciones</th>
                                      </thead>
                                      <tbody>
                                        @foreach ($products as $product)
                                          <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ Str::limit($product->descripcion, 50) }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td class="td-actions text-right">
                                              @can('productsmanage.show')
                                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                                              @endcan
                                              @can('productsmanage.edit')
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                              @endcan
                                              @can('productsmanage.destroy')
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button class="btn btn-danger" type="submit" rel="tooltip">
                                                    <i class="material-icons">close</i>
                                                  </button>
                                                </form>
                                              @endcan
                                            </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <div class="card-footer mr-auto">
                                  {{ $products->links() }}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="client">
                      <div class="row">
                        @foreach ($products as $product)
                          <div class="col-md-3">
                            <div class="card card-chart">
                              <div class="card-header card-header-tabs card-header-primary">
                                {{$product->title}}
                              </div>
                              <div class="card-body">
                                <h4 class="card-title">{{$product->title}}</h4>
                                <p class="card-category">
                                  {{-- <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> --}}
                                  {{Str::limit($product->descripcion, 100)}}
                                </p>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">access_time</i> {{$product->price}} €
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-success">Comprar</button>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                      <div class="card-footer mr-auto">
                        {{ $products->links() }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endcan
      </div>
    </div>
@endsection