<div>
    <div class="mb-5 mt-7">
        <h3>Listado de Departamentos</h3>
        <p>La cantidad total de departamentos es:</p>
    </div>
    <div class="table-responsive scrollbar">
        <table class="table fs-10 mb-0">
            <thead>
                <tr>
                    <th class="sort border-top border-translucent ps-0 align-middle" scope="col" data-sort="country"
                        style="width:55%">Nombre del Departamento</th>
                    <th class="sort border-top border-translucent align-middle" scope="col" data-sort="users"
                        style="width:15%">VISUALIZAR</th>
                    <th class="sort border-top border-translucent text-end align-middle" scope="col"
                        data-sort="transactions" style="width:15%">EDITAR</th>
                    <th class="sort border-top border-translucent text-end align-middle" scope="col" data-sort="revenue"
                        style="width:15%">ELIMINAR</th>
                </tr>
            </thead>
            <tbody class="list" id="table-regions-by-revenue">
                @foreach ($departments as $department)
                <tr>
                    <td class="white-space-nowrap ps-0 country" style="width:55%">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0 me-3">{{ $department->id }} </h6>
                            <a href="/admin/department/{{ $department->id }}">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 ps-3 text-primary fw-bold fs-9">{{ $department->name }}</p>
                                </div>
                            </a>
                        </div>
                    </td>

                    <td class="align-middle users" style="width:15%">
                        <h6 class="mb-0">92896<span class="text-body-tertiary fw-semibold ms-2">(41.6%)</span></h6>
                    </td>
                    <td class="align-middle text-end transactions" style="width:15%">
                        <div class="btnce d-inline-flex">
                            <a class="btn btn-warning btn-sm float-right"
                                href="{{ route('departments.edit', $department) }}" role="button">Editar<i
                                    class="bi bi-pencil"></i></a>
                        </div>
                    </td>
                    <td class="align-middle text-end revenue" style="width:15%">
                        <form class="d-inline-flex" action="{{route('departments.destroy',$department)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"
                                onclick="return confirm('¿Estas seguro?')">Borrar <i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row align-items-center py-1">
        <div class="pagination d-none"></div>
        <div class="col-auto d-flex">
            @if ($customPaginator->onFirstPage())
            <span>Anterior</span>
            @else
            <a class="a_pagination" href="{{ $customPaginator->previousPageUrl() }}" rel="prev">Anterior</a>
            @endif

            @if ($customPaginator->hasMorePages())
            <a class="a_pagination" href="{{ $customPaginator->nextPageUrl() }}" rel="next">Siguiente</a>
            @else
            <span>Siguiente</span>
            @endif
        </div>
    </div>
    <div class="div-btn-crear d-inline-flex">

        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('departments.create') }}" role="button">Crear
                departamento <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
</div>


<div class="">


    <h1>Listado de departamento</h1>
    <ul>
        @foreach ($departments as $department)
        <li>
            <p class="d-inline-flex department-name">{{ $department->name }}</p>
            <div class="btnce d-inline-flex">
                <a class="btn btn-warning btn-sm float-right" href="{{ route('departments.edit', $department) }}"
                    role="button">Editar departamento <i class="bi bi-pencil"></i></a>
            </div>
            <form class="d-inline-flex" action="{{route('departments.destroy',$department)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estas seguro?')">Borrar <i
                        class="bi bi-trash3"></i></button>
            </form>
        </li>
        @endforeach
    </ul>
    <div class="paginacion">
        @if ($customPaginator->onFirstPage())
        <span>Anterior</span>
        @else
        <a class="a_pagination" href="{{ $customPaginator->previousPageUrl() }}" rel="prev">Anterior</a>
        @endif

        @if ($customPaginator->hasMorePages())
        <a class="a_pagination" href="{{ $customPaginator->nextPageUrl() }}" rel="next">Siguiente</a>
        @else
        <span>Siguiente</span>
        @endif
    </div>
    <div class="div-btn-crear d-inline-flex">

        <div class="btnce">
            <a class="btn btn-success btn-sm float-right" href="{{ route('departments.create') }}" role="button">Crear
                departamento <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
</div>