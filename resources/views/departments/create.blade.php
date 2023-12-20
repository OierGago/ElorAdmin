@extends('admin')
@section('contenido')

        <div class="container">
            <div class="form_div">
                <div class="title_div">
                    <h2 class="title">Departamentos</h2>
                </div>
                <div class="labels_div">
                    <form class="" name="create"
                        action="@if (isset($department)) {{ route('departments.update', $department) }} @else {{ route('departments.store') }} @endif"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($department))
                            @method('PUT')
                        @endif
                        <div class="form_input_di0 d-inline-flex">
                            <label for="name">Nombre de Departamento</label>
                            <input type="text" name="name" id="name" required value="{{ old('name', $department->name ?? '') }}" />
                        </div>
                        <div class="btnce d-inline-flex">
                        <button type="submit" class="btn btn-success btn-sm" name="">Guardar <i class="bi bi-bookmark-check"></i></button>
        </div>
                    </form>
                </div>
            </div>
            <div class="list_div">
                <ol>
                    @foreach ($departments as $department)
                        <li>{{ $department->name }}</li>
                    @endforeach
                </ol>
            </div>
        </div>

@endsection
