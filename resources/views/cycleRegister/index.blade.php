@extends('admin')
@section('contenido')

<div class="">
    <h1>adasda</h1>
    <div class="container-fluid">

        <ul>
            @foreach ($cycleRegister as $cycleRegisterOne)
            {{$cycleRegisterOne->user->name}}||
            {{$cycleRegisterOne->module->name}}||
            {{$cycleRegisterOne->cycle->name}}||
            {{$cycleRegisterOne->year}} -----
            @endforeach
        </ul>

    </div>

</div>
@endsection