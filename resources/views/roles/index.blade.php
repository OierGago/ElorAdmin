@extends('admin')
@section('contenido')

<div class="">
    <h1>Listado de Roles</h1>
    <ul>
        @foreach ($roles as $role)
        <li>
            <p class="d-inline-flex col-xl-3 col-md-3 col-sm-12 d-inline-flex">{{ $role->name }}</p>
            <div class="btnce d-inline-flex col-xl-2 col-md-2 col-sm-12">
                        <a class="btn btn-primary btn-sm float-right" href="{{route('roles.show',$role)}}"
                            role="button">Ver <i class="bi bi-eye"></i></a>
                    </div>
            <div class="btnce d-inline-flex d-inline-flex col-xl-2 col-md-2 col-sm-12">
                <a class="btn btn-warning btn-sm float-right" href="{{ route('roles.edit', $role) }}" role="button">Editar <i class="bi bi-pencil"></i></a>
            </div>
            <button type="button" class="btn btn-sm btn-danger float-right" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $role->id }}">
                Borrar <i class="bi bi-trash3"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $role->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Estás seguro de que deseas borrar rol "{{ $role->name }}"?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atrás</button>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
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
            <a class="btn btn-success btn-sm float-right" href="{{ route('register') }}" role="button">Registar Usuario
                <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
    <div class="div-btn-crear d-inline-flex">

        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('roles.create') }}" role="button">Crear rol
                <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
</div>
</div>
@endsection