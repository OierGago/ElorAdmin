@extends('admin')
@section('contenido')

<div class="container-fluid pt-4">
    <h1>{{__('RoleList')}}</h1>
    @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <ul>
        @foreach ($roles as $role)
        <li>
            <p class="d-inline-flex col-xl-3 col-md-3 col-sm-12 d-inline-flex">{{ $role->name }}</p>
                        <a class="btn btn-primary btn-sm float-right" href="{{route('roles.show',$role)}}"
                            role="button">{{__('See')}} <i class="bi bi-eye"></i></a>
            <button type="button" class="btn btn-warning btn-sm float-right" data-bs-toggle="modal" data-bs-target="#modifyModal{{ $role->id }}">
                {{__('Edit')}} <i class="bi bi-pencil"></i>
            </button>
            <button type="button" class="btn btn-sm btn-danger float-right" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $role->id }}">
                {{__('Delete')}} <i class="bi bi-trash3"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $role->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Warning')}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{__('Estás seguro de que deseas borrar rol?')}} "{{ $role->name }}"?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancell')}}</button>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modifyModal{{ $role->id }}" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modifyModalLabel">{{__('EditRole')}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="" name="editForm" 
                            action="{{ route('roles.update', $role) }}" 
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">{{__('RoleName')}}</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name) }}" required>
                                </div>
                                <!-- Puedes agregar más campos según tus necesidades -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancell')}}</button>
                                <button type="submit" class="btn btn-primary">{{__('SaveChanges')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </li>
        @endforeach
    </ul>
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
        <div class="div-btn-crear d-inline-flex">
        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('registerUser') }}" role="button">{{__('RegisterUser')}}
                <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
    <div class="div-btn-crear d-inline-flex">

        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('roles.create') }}" role="button">{{__('CreateRol')}}
                <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
</div>
</div>
@endsection