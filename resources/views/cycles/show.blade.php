@extends('admin')
@section('contenido')
<div class="container-fluid">

    <h1 class="moduleTitle">Modulos de : {{$cycle->name}}</h1>

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
            @foreach ($cycle->profesores as $user)
            
                    <tr>
                        <td>{{$user->surname}}, {{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->dni}}</td>
                        <td>
                            <div class="btnce d-inline-flex col-xl-2 col-md-3 col-sm-12">
                                <a class="btn btn-primary btn-sm float-right" href="{{route('users.show',$user)}}"
                                    role="button">Ver
                                    <i class="bi bi-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                   
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection