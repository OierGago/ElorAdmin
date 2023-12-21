@extends('admin')
@section('contenido')
<div class="">

    <div class="infomacion">
        <h1>Listado de Usuarios</h1>
        <ul>
            @foreach ($users as $user)
            <li>
                <p class="d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12">{{ $user->name }}, {{$user->surname}}</p>
                <div class="btnce d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12">
                    <p><a class="btn btn-warning btn-sm float-right" href="{{ route('users.edit', $user) }}" role="button">Editar usuario <i class="bi bi-pencil"></i></a></p>
                </div>
                <form class="d-inline-flex d-inline-flex col-xl-3 col-md-3 col-sm-12" action="{{route('users.destroy',$user)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estas seguro?')">Borrar <i class="bi bi-trash3"></i></button>
                </form>
            </li>
            @endforeach
        </ul>
        <div class="paginacion">
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
        </div>
        <div class="div-btn-crear d-inline-flex">
            <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('register') }}" role="button">Registar Usuario <i class="bi bi-plus-square"></i></a>
        </div>
        </div>
    </div>
</div>
@endsection