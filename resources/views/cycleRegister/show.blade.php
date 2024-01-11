@extends('admin')
@section('contenido')
<div class="container-fluid">

    <h1 class="moduleTitle">Modulos de :{{$cycle->name}}</h1>

    <div class="modulos">
        @foreach ($cycle->modules as $modules)
        <div class="modulo-item">
            <p>{{$modules->name}}</p>
        </div>
        @endforeach
    </div>
    <div class="profesores">
        <table>
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Vista</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesores as $profesor)
                <tr>
                    <td>{{$profesor->name}}</td>
                    <td>{{$profesor->email}}</td>
                    <td>{{$profesor->dni}}</td>
                    <td>
                        <div class="btnce d-inline-flex col-xl-2 col-md-3 col-sm-12">
                            <a class="btn btn-primary btn-sm float-right" href="{{route('users.show',$profesor)}}"
                                role="button">Ver
                                <i class="bi bi-eye"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end col space">
            {!! $profesores->links('vendor.pagination.default') !!}
        </div>
    </div>
</div>

@endsection