@extends('admin')
@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left border-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total usuarios dados de alta</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalUsers}}</div>
                        </div>
                        <div class="col-auto">
                            <h1><i class="bi bi-person"></i></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left border-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total usuarios matriculados</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$usuariosMatriculados}}</div>
                        </div>
                        <div class="col-auto">
                            <h1><i class="bi bi-person"></i></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left border-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total roles</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalRoles}}</div>
                        </div>
                        <div class="col-auto">
                            <h1><i class="bi bi-key"></i></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left border-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total modulos
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalModules }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <h1><i class="bi bi-book"></i></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left border-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total ciclos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCycles }}</div>
                        </div>
                        <div class="col-auto">
                            <h1><i class="bi bi-journal"></i></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left border-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total departamentos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalDepartment}}</div>
                        </div>
                        <div class="col-auto">
                            <h1><i class="bi bi-people"></i></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    </div>
    </div>
    </div>
</div>
@endsection