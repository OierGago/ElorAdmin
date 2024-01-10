@extends('admin')
@section('contenido')
        <div class="container">
            <div class="form_div">
                <div class="title_div">
                    <h1 class="title">Usuarios en el departamento {{$department->name}}:</h1>
                </div>
                <div class="list_div">
                <table class="table-with-padding">
            <thead>
                <tr>
                    <th scope="col">Apellido</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Ciclo</th>
                    <th scope="col">Rol</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                </tr>
                @empty
                No hay usuarios asignados a este departamento
                @endforelse
            </tbody>    
</table>
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
    <div class="title_div">
                    <h1 class="title">Ciclos en el departamento {{$department->name}}:</h1>
                </div>
                <div class="list_div">
    <ul>
        @forelse ($cycles as $cycle)
            <li>{{ $cycle->name }}</li>
        @empty
        No hay ciclos que pertenezcan de este departamento
        @endforelse
    </ul>
</div>
                </div>
            </div>
        </div>
@endsection
