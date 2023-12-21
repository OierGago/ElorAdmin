@extends('admin')
@section('contenido')



<div class="">


    <h1>Listado de departamento</h1>
    <ul>
        @foreach ($departments as $department)
        <li>
            <p class="d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12">{{ $department->name }}</p>
            <div class="btnce d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12">
                <a class="btn btn-warning btn-sm float-right" href="{{ route('departments.edit', $department) }}"
                    role="button">Editar departamento <i class="bi bi-pencil"></i></a>
            </div>
            <form class="d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12" action="{{route('departments.destroy',$department)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estas seguro?')">Borrar <i
                        class="bi bi-trash3"></i></button>
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
    <div class="div-btn-crear d-inline-flex">

        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('departments.create') }}" role="button">Crear
                departamento <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
</div>

@endsection