@extends('layouts.app')
@section('content')
    <div class="Rectangle3">

        <div class="container">
            <div class="form_div">
                <div class="title_div">
                    <h2 class="title"></h2>
                </div>
                <div class="labels_div">
                    <form class="" name="create" action="@if (isset($department)) {{ route('departments.update', $department) }} @else {{ route('departments.store') }}@endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($department))
                        @method('PUT')

                    @endif
                    <div class="form_input_div">
                        <label for="nombre">Nombre de Departamento</label>
                        <input type="text" name="nombre" id="nombre" required
                        value="{{old('nombre', $department->nombre ?? ' ')}}"/>
                    </div>
                    </form>
                </div>
            </div>
            <div class="list_div">

            </div>
        </div>

    </div>
@endsection
