@extends('admin')
@section('contenido')

<div class="">


    <h1>Listado de ciclos</h1>
    <div class="container-fluid">

        <ul>
            @foreach ($cycles as $cycle)
            <div class="row">
                <li>
                        <p class="d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12">{{ $cycle->name }}</p>
                        <a class="btn btn-primary btn-sm float-right" href="{{route('cycles.show',$cycle)}}"
                            role="button">Ver <i class="bi bi-eye"></i></a>
                    

                    <button type="button" class="btn btn-warning btn-sm float-right" data-bs-toggle="modal" data-bs-target="#modifyModal{{ $cycle->id }}">
                    Editar <i class="bi bi-pencil"></i>
                    </button>
        
                    <button type="button" class="btn btn-sm btn-danger float-right" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $cycle->id }}">
                        Borrar <i class="bi bi-trash3"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $cycle->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Estás seguro de que deseas borrar ciclo "{{ $cycle->name }}"?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atrás</button>
                                    <form action="{{ route('cycles.destroy', $cycle) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modifyModal{{ $cycle->id }}" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modifyModalLabel">Editar Ciclo</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="" name="editForm" 
                                    action="{{ route('cycles.update', $cycle) }}" 
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Nombre del Ciclo</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $cycle->name) }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="department_id">Departamento asociado</label>
                                            <select class="form-control" name="department_id">
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}" {{ $department->id == $cycle->department_id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Puedes agregar más campos según tus necesidades -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

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
            <a class="btn btn-success btn-sm float-right" href="{{ route('registerUser') }}" role="button">Registar Usuario
                <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
    <div class="div-btn-crear d-inline-flex">

        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('cycles.create') }}" role="button">Crear ciclo
                <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
</div>
@endsection


