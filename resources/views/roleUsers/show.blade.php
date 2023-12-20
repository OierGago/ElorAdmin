@extends('admin')
@section('contenido')

<div class="">
    <div class="div-btn-crear">

        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('roles.create') }}" role="button">Crear Rol <i class="bi bi-check-square"></i></a>
        </div>
    </div>

    <h1>Listado de Roles</h1>
    <ul>
        @foreach ($roleUsers as $roleUser)
        <li><a href="/admin/roles/{{$roleUser->id}}/edit">{{ $roleUser->name }}</a></li>
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