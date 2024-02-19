@extends('layouts.app')

@section('template_title')
    Misione
@endsection

@section('content')
    <style>
        body {
            background-image: url('\\EVANasa.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;/
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Misiones') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('misiones.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Añadir Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Nº</th>

                                        <th>Nombre</th>
                                        <th>Agencia</th>
                                        <th>Objetivo</th>
                                        <th>Tripulado</th>
                                        <th>Status</th>
                                        <th>Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($misiones as $misione)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $misione->nombre }}</td>
                                            <td>{{ $misione->agencia->nombre }}</td>
                                            <td>{{ $misione->objetivo }}</td>
                                            <td>{{ $misione->tripulado }}</td>
                                            <td>
                                                @if ($misione->status == 'Success')
                                                    <span style="color: green;">{{ $misione->status }}</span>
                                                @elseif ($misione->status == 'Failure')
                                                    <span style="color: red;">{{ $misione->status }}</span>
                                                @else
                                                    {{ $misione->status }}
                                                @endif
                                            </td>
                                            <td>{{ $misione->fecha }}</td>

                                            <td>
                                                <form action="{{ route('misiones.destroy', $misione->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('misiones.show', $misione->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('misiones.edit', $misione->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $misiones->links() !!}
            </div>
        </div>
    </div>
@endsection
