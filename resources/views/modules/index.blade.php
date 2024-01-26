@extends('admin')
@section('contenido')
<div class="container-fluid pt-4">
    <div class="infomacion">
        <h1>{{__('ModuleList')}}</h1>
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
            @foreach ($modules as $module)
            <li>
                <p class="d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12">{{ $module->name }}</p>
                        <a class="btn btn-primary btn-sm float-right" href="{{route('modules.show',$module)}}"
                            role="button">{{__('See')}} <i class="bi bi-eye"></i></a>
                <button type="button" class="btn btn-warning btn-sm float-right" data-bs-toggle="modal" data-bs-target="#modifyModal{{ $module->id }}">
                {{__('Edit')}} <i class="bi bi-pencil"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger float-right" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $module->id }}">
                    {{__('Delete')}} <i class="bi bi-trash3"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $module->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               {{__('Are you sure you want to delete module?')}} "{{ $module->name }}"?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancell')}}</button>
                                <form action="{{ route('modules.destroy', $module) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modifyModal{{ $module->id }}" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modifyModalLabel">{{__('EditModule')}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="" name="editForm" 
                                action="{{ route('modules.update', $module) }}" 
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">{{__('ModuleName')}}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $module->name) }}" required>
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
            <a class="btn btn-success btn-sm float-right" href="{{ route('registerUser') }}" role="button">{{__('RegisterUser')}} <i class="bi bi-plus-square"></i></a>
        </div>
        </div>
        <div class="div-btn-crear d-inline-flex">
            <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('modules.create') }}" role="button">{{__('CreateModule')}} <i class="bi bi-plus-square"></i></a>
        </div>
        </div>
    </div>
</div>
@endsection