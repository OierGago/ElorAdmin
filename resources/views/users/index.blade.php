@extends('admin')
@section('contenido')
<div class="container-fluid">
    <h1>Listado de Usuarios</h1>
    <form action="{{ route('users.index') }}" method="GET">
        <div class="form-group">
            <label for="search">Buscar:</label>
            <input type="text" name="search" class="form-control" value="{{ request('search') }}">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    @if($users->isEmpty())
    <p>No se encontraron resultados.</p>
    @else
    <div>
        <ul>
            @foreach ($users as $user)
            <li>
                <p class="d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12">{{$user->dni}}: {{ $user->name }},
                    {{$user->surname}}</p>
                <div class="btnce d-inline-flex col-xl-2 col-md-3 col-sm-12">
                    <a class="btn btn-primary btn-sm float-right" href="{{route('users.show',$user)}}" role="button">Ver
                        <i class="bi bi-eye"></i></a>
                </div>
                <div class="btnce d-inline-flex d-inline-flex col-xl-2 col-md-3 col-sm-12">
                    <p><a class="btn btn-warning btn-sm float-right" href="{{ route('users.edit', $user) }}"
                            role="button">Editar <i class="bi bi-pencil"></i></a></p>
                </div>
                <form class="d-inline-flex d-inline-flex col-xl-2 col-md-3 col-sm-12"
                    action="{{route('users.destroy',$user)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit"
                        onclick="return confirm('¿Estas seguro?')">Borrar <i class="bi bi-trash3"></i></button>
                </form>
            </li>
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
    @endif
    <div class="div-btn-crear d-inline-flex">
        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('register') }}" role="button">Registar Usuario
                <i class="bi bi-plus-square"></i></a>
        </div>
    </div>

</div>
@endsection