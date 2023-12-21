@extends('layouts.app')
@section('content')
    <div class="Rectangle3">

        <div class="container">
            <div class="form_div">
                <div class="title_div">
                    <h2 class="title"></h2>
                </div>
                <div class="labels_div">
                    <form class="" name="create" action="@if (isset($cycle)) {{ route('cycles.update', $cycle) }} @else {{ route('cycles.store') }}@endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($cycle))
                        @method('PUT')

                    @endif
                    <div class="form_input_div">
                        <label for="nombre">Nombre de Ciclo</label>
                        <input type="text" name="nombre" id="nombre" required
                        value="{{old('nombre', $cycle->nombre ?? ' ')}}"/>
                    </div>
                    </form>
                </div>
            </div>
            <div class="list_div">

            </div>
        </div>

    </div>
@endsection