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

        {{-- Copiado el formulario que estaba en el panel de registro, no se como lo quiere Oier asi que de momento lo dejo asi --}}
        <div class="row mb-3">
                            <label for="curso" class="col-md-4 col-form-label text-md-end">{{ __('Curso') }}</label>

                            <div class="col-md-6">
                                <input id="curso" type="text" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{ old('curso') }}" required autocomplete="curso" autofocus>

                                @error('curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="fct" class="col-md-4 col-form-label text-md-end">{{ __('FCT') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="fct" name="fct">
                                    </div>
                                </div>
                            </div>

                        <div class="row mb-3">
                            <label for="department_id" class="col-md-4 col-form-label text-md-end">{{ __('Departamento') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" name="department_id" id="department_id">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>    
                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="row mb-3">
                            <label for="cycle_id" class="col-md-4 col-form-label text-md-end">{{ __('Ciclo') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="cycle_id" id="cycle_id">
                                    @foreach($cycles as $cycle)
                                        <option value="{{ $cycle->id }}">{{ $cycle->name }}</option>
                                    @endforeach
                                </select>
                                @error('cycle_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    </div>
</div>
@endsection