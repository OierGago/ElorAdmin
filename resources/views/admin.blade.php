@extends('layouts.app')
@section('content')
<div id="containerAdmin" class="containerAdmin">
    <div id="navAdmin" class="navAdmin">
        <!-- Contenido de la navegación vertical -->
        <ul>
            <li class="lista"><a href="/admin/departments">Departamentos</a></li>
            <li class="lista"><a href="/admin/cycles">Ciclos</a></li>
            <li class="lista"><a href="/admin/modules">Modulos</a></li>
            <li class="lista"><a href="/admin/roles">Roles</a></li>

        </ul>
        <div class="barra_intermedia"></div>
    <ul>
        <li  class="lista" >
            <a  href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
   </ul>
    </div>
    <div id="contentAdmin" class="contentAdmin">
        <!-- Contenido del área principal -->
        @yield('contenido')
    </div>
</div>
@endsection
