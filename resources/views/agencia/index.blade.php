@extends('layouts.app')

@section('template_title')
    Agencia
@endsection

@section('content')
<style>
    body {
        background-image: url('\\nasaBuilding.jpg');
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
                                {{ __('Agencias') }}
                            </span>
                             <div class="float-right">
                                <a href="{{ route('agencias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Añadir nuevo') }}
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
                                        <th>Logo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agencias as $agencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $agencia->nombre }}</td>
                                            <td><img src="/storage/{{$agencia->imagen}}" style="max-width: 100px; max-height: 80px;"></td>
                                            <td>
                                                <form action="{{ route('agencias.destroy',$agencia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('agencias.show',$agencia->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('agencias.edit',$agencia->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $agencias->links() !!}
            </div>
        </div>
    </div>
@endsection
