@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="form_div">
        <div class="title_div">
        </div>
        <h1>Bienvenid@ {{ Auth::user()->name}}</h1>

            @if(Auth::user()->hasRole('Profesor'))
            <h2>Información para Profesor</h2>
                <p>Departamento: {{ Auth::user()->department->name }}</p>

                @foreach ($cycles as $cycle)
                    @if (Auth::user()->cycle_id == $cycle->id)
                        <h3>Ciclo: {{ $cycle->name }}</h3>
                        <h4>Módulos:</h4>
                        <ul>
                            @foreach ($cycle->modules as $module)
                                <li>{{ $module->name }}</li>
                                
                                <ul>
                                    @foreach ($users as $user)
                                        @if($user->cycle->module = $module->name && $user->hasRole('Estudiante'))
                                            
                                            <li>{{ $user->name }} - {{ $user->email }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endforeach
                        </ul>
                    @endif  
                @endforeach
            @elseif(Auth::user()->hasRole('Administrador'))
                <h2>Información para Administrador</h2>
            

            @elseif(Auth::user()->hasRole('Alumno'))
                <h2>Información para Alumno</h2>
                <p>Ciclo Formativo: {{ $ciclo }}</p>
                <h3>Módulos Matriculados:</h3>
                @foreach ($modulosMatriculados as $modulo => $Profesor)
                    <h4>{{ $modulo }}</h4>
                    <p>Profesor: {{ $profesor->name }}</p>
                    <p>Email: {{ $profesor->email }}</p>
                @endforeach
            @endif         
    </div>
</div>

@endsection

