@extends('admin')
@section('contenido')

<div class="">


    <h1>Listado de las Relaciones de Role y Usuario</h1>
    <ul>
        @foreach ($roleUsers as $roleUser)
        <li class="list-item">{{ $roleUser->name }}</li>
        <!-- Lo suyo aqui sería meterlo en una tabla para poder poner bien los botones -->
        <div class="btnce d-inline-flex">
            <a class="btn btn-warning btn-sm float-right" href="{{ route('roleUsers.edit', $roleUser) }}"
                role="button">Editar RolUsuario <i class="bi bi-check-square"></i></a>
        </div>
        <form class="d-inline-flex" action="{{route('roleUsers.destroy',$roleUser)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
            </button>
        </form>

        @endforeach
    </ul>
    <div class="paginacion">
        @if ($customPaginator->onFirstPage())
        <span>Anterior</span>
        @else
        <a class="a_pagination" href="{{ $customPaginator->previousPageUrl() }}" rel="prev">Anterior</a>
        @endif

        @if ($customPaginator->hasMorePages())
        <a class="a_pagination" href="{{ $customPaginator->nextPageUrl() }}" rel="next">Siguiente</a>
        @else
        <span>Siguiente</span>
        @endif
    </div>
</div>
</div>
@endsection