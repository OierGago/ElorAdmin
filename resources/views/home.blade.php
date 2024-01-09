@extends('layouts.app') <!-- Asumiendo que tienes una plantilla principal -->

@section('content')

<div class="container">
    <h1>Bienvenido {{ Auth::user()->name }}</h1>

    @if(Auth::user()->hasRole('profesor'))
        <h2>Información para Profesor</h2>
        <p>Departamento: {{ $department }}</p>
        <h3>Alumnos por Módulos:</h3>
        @foreach ($alumnosPorModulos as $modulo => $alumnos)
            <h4>{{ $modulo }}</h4>
            <ul>
                @foreach ($alumnos as $alumno)
                    <li>{{ $alumno->name }} - {{ $alumno->email }}</li>
                @endforeach
            </ul>
        @endforeach

    @elseif(Auth::user()->hasRole('administrador'))
        <h2>Información para Administrador</h2>
        <p>Nº de Alumnos Totales: {{ $totalAlumnos }}</p>
        <p>Nº de Personal: {{ $totalPersonal }}</p>
        <!-- Mostrar otros datos necesarios -->

    @elseif(Auth::user()->hasRole('alumno'))
        <h2>Información para Alumno</h2>
        <p>Ciclo Formativo: {{ $ciclo }}</p>
        <h3>Módulos Matriculados:</h3>
        @foreach ($modulosMatriculados as $modulo => $profesor)
            <h4>{{ $modulo }}</h4>
            <p>Profesor: {{ $profesor->name }}</p>
            <p>Email: {{ $profesor->email }}</p>
        @endforeach
    @endif

    <!-- Agrega cualquier otra sección que sea común para todos los usuarios -->

</div>

@endsection

