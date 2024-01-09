@extends('admin')
@section('contenido')

<div class="">
    

    <h1>Listado de ciclos</h1>
    <div class="container-fluid">
    
    <ul>
        @foreach ($cycles as $cycle)
        <div class="row">
            <li >    
            <p class="d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12">{{ $cycle->name }}</p>
                    <div class="btnce d-inline-flex col-xl-3 col-md-3 col-sm-12">
                        <a class="btn btn-warning btn-sm float-right" href="{{ route('cycles.edit', $cycle) }}" role="button">Editar ciclo <i class="bi bi-pencil"></i></a>
                    </div>

                    <form class="d-inline-flex col-xl-3 col-md-3 col-sm-12" action="{{route('cycles.destroy',$cycle)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger float-right" type="submit" onclick="return confirm('¿Estas seguro?')">Borrar <i
                            class="bi bi-trash3"></i> </button>
                    </form>
            </li>
        </div>
        @endforeach
    </ul>

</div>
<div class="paginacion">
            {{-- Mostrar enlace para ir a la primera página --}}
            <a class="a_pagination" href="{{ $customPaginator->url(1) }}" rel="first">
            <i class="bi bi-arrow-bar-left"></i>
            </a>

            {{-- Mostrar enlace "Anterior" --}}
            @if ($customPaginator->onFirstPage())
                <span>Anterior</span>
            @else
                <a class="a_pagination" href="{{ $customPaginator->previousPageUrl() }}" rel="prev">Anterior</a>
            @endif

            {{-- Mostrar enlace "Siguiente" --}}
            @if ($customPaginator->hasMorePages())
                <a class="a_pagination" href="{{ $customPaginator->nextPageUrl() }}" rel="next">Siguiente</a>
            @else
                <span>Siguiente</span>
            @endif

            {{-- Mostrar enlace para ir a la última página --}}
            <a class="a_pagination" href="{{ $customPaginator->url($customPaginator->lastPage()) }}" rel="last">
            <i class="bi bi-arrow-bar-right"></i>
            </a>
        </div>
        <div class="div-btn-crear d-inline-flex">
            <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('register') }}" role="button">Registar Usuario <i class="bi bi-plus-square"></i></a>
        </div>
        </div>
    <div class="div-btn-crear d-inline-flex">

        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('cycles.create') }}" role="button">Crear ciclo <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
</div>
@endsection