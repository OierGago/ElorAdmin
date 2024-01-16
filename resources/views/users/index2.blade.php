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
    <div class="profesores">
        <table class="table-with-padding table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Apellido</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">DNI</th>
                    <th scope="col">E-mail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->dni}}</td>
                    <td>{{$user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end col space">
            {!! $users->links('vendor.pagination.default') !!}
        </div>
    </div>
</div>

@endsection