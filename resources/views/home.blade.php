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

    <div class="container-fluid">
        <div class="form_div">
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
                @foreach ($cyclesRegisters as $cycleRegisterOne)
                @if($cycleRegisterOne->module->name == $module->name)
                <li>{{ $cycleRegisterOne->user->name }} - {{ $cycleRegisterOne->user->email }}</li>
                @endif
                
                @endforeach
                </ul>
                @endforeach
            </ul>
            @endif
            @endforeach
          
            @elseif(Auth::user()->hasRole('Administrador'))
            <h2>Información para Administrador</h2>


            @elseif(Auth::user()->hasRole('Estudiante'))
            <h2>Información para Alumno</h2>
            <p>Ciclo Formativo: {{ Auth::user()->cycle->name}}</p>
            <h3>Ciclos Matriculados:</h3>
            <!--TODO -->
            @foreach($cycles as $index => $cycle)
    <div class="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                    {{ $cycle->name }}
                </button>
            </h2>
            <div id="collapse{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table-with-padding table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Modulo</th>
                                <th scope="col">Nombre de Profesor</th>
                                <th scope="col">E-Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cycle->modules as $module)
                                <tr>
                                    <td>{{ $module->name }}</td>
                                    <td>{{ $module->teacher_name }}</td>
                                    <td>{{ $module->teacher_email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach
            @endif
        </div>
    </div>
</div>

@endsection