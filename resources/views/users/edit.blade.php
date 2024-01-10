@extends('admin')
@section('contenido')

<div class="container-fluid">
    <div class="form_div">
        <div class="title_div">
            <h2 class="title">Usuario</h2>
        </div>
            <div class="card-body">
                <form class="" name="create"
                    action="@if (isset($user)) {{ route('users.update', $user) }} @else {{ route('users.store') }} @endif"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($user))
                    @method('PUT')
                    @endif
                    <div class=" row form_input_div d-inline-flex col-xl-12 col-md-12 col-sm-12 col-form-label">
                        <label class="col-form-label" for="dni">DNI</label>
                        <input class="form-control" type="text" name="dni" id="dni" required value="{{$user->dni}}"/>
                    </div>  
                    <div class=" row form_input_div d-inline-flex col-xl-12 col-md-12 col-sm-12 col-form-label">
                        <label class="col-form-label" for="name">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" required value="{{$user->name}}"/>
                    </div>
                    <div class=" row form_input_div d-inline-flex col-xl-12 col-md-12 col-sm-12 col-form-label">
                        <label class="col-form-label" for="surname">Apellido</label>
                        <input class="form-control" type="text" name="surname" id="surname" required value="{{$user->surname}}"/>
                    </div>
                    <div class=" row form_input_div d-inline-flex col-xl-12 col-md-12 col-sm-12 col-form-label">
                        <label class="col-form-label" for="email">Mail</label>
                        <input class="form-control" type="text" name="email" id="email" required value="{{$user->email}}"/>
                    </div>
                    <div class=" row form_input_div d-inline-flex col-xl-12 col-md-12 col-sm-12 col-form-label">
                        <label class="col-form-label" for="address">Dirección</label>
                        <input class="form-control" type="text" name="address" id="address" required value="{{$user->address}}"/>
                    </div>
                    <div class="row form_input_div d-inline-flex col-xl-12 col-md-12 col-sm-12 col-form-label">
                        <label class="col-form-label" for="phone">Teléfono</label>
                        <input class="form-control" type="text" name="phone" id="phone" required value="{{$user->phone}}"/>
                    </div>
                    <div class="row form_input_div d-inline-flex col-xl-12 col-md-12 col-sm-12 col-form-label">
                        <label class="col-form-label">Roles</label>
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}"
                                    @if(isset($user) && $user->roles->contains($role->id)) checked @endif>
                                <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="btnce d-inline-flex">
                            <button type="submit" class="btn btn-success btn-sm" name="">Guardar<i class="bi bi-bookmark-check"></i></button>
                    </div>
                </form>
            </div>
    </div>
</div>

@endsection