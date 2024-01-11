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
    <div class="profesores">
        <div class="accordion" id="accordionExample">
            @foreach ($cycles as $cycle)

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#{{$cycle->name}}" aria-expanded="true" aria-controls="{{$cycle->name}}">
                        {{$cycle->name}}
                    </button>
                </h2>
                <div id="{{$cycle->name}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach ($cycle->modules as $modules)
                        <p>{{$modules->name}}</p>
                        @endforeach
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection