@extends('admin')
@section('contenido')

<div class="">
    

    <h1>Listado de departamento</h1>
    <table class="table">
        @foreach ($departments as $department)
        <tr>
            <th scope="col">{{ $department->name }}</th>
            <th>
                <div class="btnce d-inline-flex">
                    <a class="btn btn-warning btn-sm float-right" href="{{ route('departments.edit', $department) }}" role="button">Editar departamento <i class="bi bi-check-square"></i></a>
                </div>
            </th> 
            <th>
                <form class="d-inline-flex" action="{{route('departments.destroy',$department)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </th>
        </tr>
        @endforeach
    </table>
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
            <a class="btn btn-success btn-sm float-right" href="{{ route('departments.create') }}" role="button">Crear departamento <i class="bi bi-check-square"></i></a>
        </div>
    </div>
</div>
@endsection