@extends('admin')
@section('contenido')
<div class="container-fluid">

    <h1 class="moduleTitle">Usuarios con rol : {{$role->name}}</h1>
    <ul>
    @foreach ($roleUsers as $user)
        <li>
            <p class="d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12">{{$user->dni}}: {{ $user->name }},
                {{$user->surname}}</p>
            <div class="btnce d-inline-flex col-xl-2 col-md-3 col-sm-12">
                <a class="btn btn-primary btn-sm float-right" href="{{route('users.show',$user)}}" role="button">Ver
                    <i class="bi bi-eye"></i></a>
            </div>
            <div class="btnce d-inline-flex d-inline-flex col-xl-2 col-md-3 col-sm-12">
                <p><a class="btn btn-warning btn-sm float-right" href="{{ route('users.edit', $user) }}"
                        role="button">Editar <i class="bi bi-pencil"></i></a></p>
            </div>
            <form class="d-inline-flex d-inline-flex col-xl-2 col-md-3 col-sm-12"
                action="{{route('users.destroy',$user)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit"
                    onclick="return confirm('¿Estas seguro?')">Borrar <i class="bi bi-trash3"></i></button>
            </form>
        </li>
    @endforeach
    </ul>
</div>

@endsection