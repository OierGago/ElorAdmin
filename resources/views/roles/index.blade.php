@extends('admin')
@section('contenido')

<div class="">
    <h1>Listado de Roles</h1>
    <ul>
        @foreach ($roles as $role)
        <li>
            <p class="d-inline-flex col-xl-3 col-md-3 col-sm-12 d-inline-flex">{{ $role->name }}</p>
            <div class="btnce d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12">
                <a class="btn btn-warning btn-sm float-right" href="{{ route('roles.edit', $role) }}" role="button">Editar rol <i class="bi bi-pencil"></i></a>
            </div>
            <form class="d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12" action="{{route('roles.destroy',$role)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estas seguro?')">Borrar <i class="bi bi-trash3"></i></button>
            </form>
        </li>
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
    <div class="div-btn-crear">

        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('roles.create') }}" role="button">Crear rol <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
</div>
</div>
@endsection