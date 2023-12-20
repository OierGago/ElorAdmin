@extends('admin')
@section('contenido')

<div class="container">
    <div class="form_div">
        <div class="title_div">
            <h2 class="title">Ciclos</h2>
        </div>
        <div class="labels_div">
            <form class="" name="create"
                action="@if (isset($cycle)) {{ route('cycles.update', $cycle) }} @else {{ route('cycles.store') }} @endif"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($cycle))
                @method('PUT')
                @endif
                <div class="form_input_div">
                    <label for="name">Nombre de Ciclo</label>
                    <input type="text" name="name" id="name" required value="{{ old('nombre', $cycle->nombre ?? '') }}" />
                </div>
                <div class="form_input_div d-inline-flex">
                    <label for="department_id">Departamento asociado</label>
                    <select name="department_id">
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="btnce d-inline-flex">
                        <button type="submit" class="btn btn-success btn-sm" name="">Guardar <i class="bi bi-bookmark-check"></i></button>
        </div>
            </form>
        </div>
    </div>
    <div class="list_div">
        <ol>
            @foreach ($cycles as $cycle)
            <li>{{ $cycle->name }}</li>
            @endforeach
        </ol>
    </div>
</div>

@endsection