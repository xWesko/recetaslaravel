@extends('layouts.app')


@section('botones')

    <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2">Volver</a>

@endsection


@section('content')

    <h2 class="text-center mb-5">Crear nueva receta</h2>


    
    <div class="row justify-content-center mt.5">
        <div class="col-md-8">

            <form method="post" action="{{ route('recetas.store') }}" novalidate>
                @csrf
            
                <div class="form-group">
                    <label for="titulo">Titulo receta</label>
                    <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid  @enderror" placeholder="Titulo receta" value={{ old('titulo')  }}>
                    
                    @error('titulo') 
                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control">
                        @foreach ($categorias as $id => $categoria)
                            <option value="{{ $id }}"> {{ $categoria }} </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar receta">
                </div>



            </form>

        </div>
    </div>
    
@endsection