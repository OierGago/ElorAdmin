@extends('admin')
@section('contenido')
<div class="container-fluid pt-4">
    <h1>Listado de Usuarios</h1>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
                    <a class="btn btn-primary btn-sm float-right" href="{{route('users.show',$user)}}" role="button">Ver
                        <i class="bi bi-eye"></i></a>
                

                <button type="button" class="btn btn-warning btn-sm float-right" data-bs-toggle="modal" data-bs-target="#modifyModal{{ $user->id }}">
                    Editar <i class="bi bi-pencil"></i>
                </button>

                <button type="button" class="btn btn-sm btn-danger float-right" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                    Borrar <i class="bi bi-trash3"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Warning</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Estás seguro de que deseas borrar usuario "{{ $user->name }}, {{$user->surname}} {{$user->dni}}"?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modifyModal{{ $user->id }}" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modifyModalLabel">Editar Usuario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>  
                            <form class="" name="editForm" 
                                action="{{ route('users.update', $user) }}" 
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <!-- Campos de edición, usa los valores del usuario para llenar los campos -->
                                    <div class="form-group">
                                        <label for="dni">DNI</label>
                                        <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni', $user->dni) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="surname">Apellido</label>
                                        <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname', $user->surname) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Mail</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Dirección</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Teléfono</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Roles</label>
                                        @foreach($roles as $role)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}"
                                                    @if(in_array($role->id, old('roles', $user->roles->pluck('id')->toArray()))) checked @endif>
                                                <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
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
            @endforeach
        </ul>
    </div>
    @if ($customPaginator->lastPage() > 1)
            <nav>
                <ul class="pagination justify-content-center">
                    {{-- Mostrar enlace para ir a la primera página --}}
                    @if ($customPaginator->currentPage() != 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $customPaginator->url(1) }}" rel="first">
                                <i class="bi bi-arrow-bar-left"></i>
                                <span class="d-none d-sm-inline">1</span>
                            </a>
                        </li>
                    @endif

                    {{-- Mostrar enlace a la página anterior --}}
                    @if ($customPaginator->onFirstPage())

                    @elseif (!( $customPaginator->currentPage() - 1 == 1))
                        <li class="page-item">
                            <a class="page-link" href="{{ $customPaginator->previousPageUrl() }}" rel="prev">{{ $customPaginator->currentPage() - 1 }}</a>
                        </li>
                    @endif

                    {{-- Mostrar enlace a la página actual --}}
                    <li class="page-item active">
                        <span class="page-link">{{ $customPaginator->currentPage() }}</span>
                    </li>

                    {{-- Mostrar enlace a la página siguiente --}}
                    @if ($customPaginator->hasMorePages() && !( $customPaginator->currentPage() + 1 == $customPaginator->lastPage()))
                        <li class="page-item">
                            <a class="page-link" href="{{ $customPaginator->nextPageUrl() }}" rel="next">{{ $customPaginator->currentPage() + 1 }}</a>
                        </li>
                    @endif

                    {{-- Mostrar enlace para ir a la última página --}}
                    @if ($customPaginator->currentPage() != $customPaginator->lastPage())
                        <li class="page-item">
                            <a class="page-link" href="{{ $customPaginator->url($customPaginator->lastPage()) }}" rel="last">
                                <span class="d-none d-sm-inline">{{ $customPaginator->lastPage() }}</span>
                                <i class="bi bi-arrow-bar-right"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
    @endif
    <div class="div-btn-crear d-inline-flex">
        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('registerUser') }}" role="button">Registar Usuario
                <i class="bi bi-plus-square"></i></a>
        </div>
    </div>

</div>
@endsection