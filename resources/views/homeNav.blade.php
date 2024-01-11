@extends('layouts.app')
@section('content')
    
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="/departments" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-people"></i><span class="ms-1 d-none d-sm-inline">Departamentos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/cycles" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-journal"></i><span class="ms-1 d-none d-sm-inline">Ciclos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/users" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Usuario</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="contentAdmin col-auto col-md-9 col-xl-10 px-sm-10">
            <!-- Contenido del área principal -->
            @yield('contenidoHome')
        </div>

@endsection
