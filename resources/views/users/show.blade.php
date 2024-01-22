@extends('admin')
@section('contenido')
<div class="Rectangle6">
    <table class="userTable" style="">
        <tbody>
            <tr>
                <td style="font-weight: bold;">NOMBRE :</td>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">APELLIDO :</td>
                <td>{{$user->surname}}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">FECHA DE NACIMIENTO :</td>
                <td>{{$user->birthDate}}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">DNI :</td>
                <td>{{$user->dni}}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">TELEFONO :</td>
                <td>{{$user->phone}}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">E-MAIL :</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">DIRECCION :</td>
                <td>{{$user->address}}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="Rectangle6">
    <table class="table-with-padding table table-borderless">
        @foreach($user->cycles as $cycle)
        <p>{{$cycle->name}}</p>
        @foreach ($cycle->modules as $module)
        <p>{{$module->name}}</p>
        @endforeach
        @endforeach
    </table>
</div>
@endsection