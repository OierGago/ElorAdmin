@extends('admin')
@section('contenido')

<div class="container">
    <div class="form_div">
        <div class="title_div">
            <h2 class="title">{{$user->name}}</h2>
        </div>
        <div class="labels_div">
            <form class="" name="create"
                action="@if (isset($module)) {{ route('modules.update', $module) }} @else {{ route('modules.store') }} @endif"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($module))
                @method('PUT')
                @endif
                <div class="form_input_div">
                    <label for="name">Nombre del usuario</label>
                    <input type="text" name="name" id="name" required/>
                </div>
                <div class="btnce d-inline-flex">
                        <button type="submit" class="btn btn-success btn-sm" name="">Guardar <i class="bi bi-bookmark-check"></i></button>
        </div>
            </form>
        </div>
    </div>
    <div class="list_div">
        <ol>
            @foreach ($modules as $module)
            <li>{{ $module->name }}</li>
            @endforeach
        </ol>
    </div>
</div>

@endsection