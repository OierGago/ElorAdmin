@extends('homeNav')
@section('contenido')

<div class="pt-4 px-0">
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
                        @foreach ($cycle->modules->sortBy('name') as $modules)
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