@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('product.insert') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                               
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('descripcion') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="descripcion" value="{{ old('email') }}" required autocomplete="email">

                              
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('precio') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="number" class="form-control" name="precio" required>

                                <input id="password" type="hidden" class="form-control" value="e" name="val" required >
                                
                            </div>
                        </div>

                       

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div style="margin:0 auto; margin-top: 30px ; width:60%;">
    <div class="card" >
        <div class="card-header row-sm-9">

            <div class="input-group mb-3">
                <input wire:model="search"  type="text" class="form-control" placeholder="Ingrese un nombre de producto" aria-label="Nombre de usuario del destinatario" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary"  type="button" id="button-addon2">Buscar</button>
            </div>
            
        </div>

 


        @if($products->count())
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Producto</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)

                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->descripcion}}</td>
                                <td>{{$product->precio}}</td>
                                <!--td >
                                    <button class="btn btn-danger js-btnDeleteproduct" data-bs-toggle="modal" data-bs-target="#delete" js-product= "{{$product}}" >Eliminar</button>
                                </td-->
                                <td id="rowContainerBtn">
                                      
                                      <form class="js-formDelete" action="" method="POST">
                                        <!--a href="" class="btn btn-primary">Editar</a-->
                                        @csrf
                                        @method('delete')
                                            <!--button type="submit" js-id="{{$product->id}}" 
                                                class="btn btn-danger js-btnDeleteTable" >Eliminar</button-->
                                      </form>
                                    
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </tbody>
                </table>

            </div>

            <div class="card-footer">
            </div>
        @else 
            
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
            
    </div>

</div>
@endsection
