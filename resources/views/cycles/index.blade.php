@extends('admin')
@section('contenido')

<div class="">
    <div class="div-btn-crear">
        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('cycles.create') }}" role="button">Crear ciclo <i class="bi bi-check-square"></i></a>
        </div>
    </div>

    <div class="infomacion">
        <h1>Listado de ciclos</h1>
        <ul>
            @foreach ($cycles as $cycle)
            <li><a href="/admin/cycles/{{$cycle->id}}/edit">{{ $cycle->name }}</a></li>
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
    </div>

</div>
@endsection