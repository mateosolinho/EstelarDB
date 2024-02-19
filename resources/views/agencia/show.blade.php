@extends('layouts.app')

@section('template_title')
    {{ $agencia->name ?? __("Show Agencia") }}
@endsection

@section('content')
    <style>
        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        body {
            background-image: url('\\nasaBuilding.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
    </style>
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar Agencia') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary mt-2" href="{{ route('agencias.index') }}">{{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $agencia->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <img src="/storage/{{ $agencia->imagen }}" style="max-width: 400px; max-height: 300px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
