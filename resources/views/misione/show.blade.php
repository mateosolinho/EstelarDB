@extends('layouts.app')

@section('template_title')
    {{ $misione->name ?? __("Show Misione") }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Info Misiones') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary mt-2" href="{{ route('misiones.index') }}">{{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Agencia Id:</strong>
                            {{ $misione->agencia_id }}
                        </div>

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $misione->nombre }}
                        </div>

                        <div class="form-group">
                            <strong>Objetivo:</strong>
                            {{ $misione->objetivo }}
                        </div>

                        <div class="form-group">
                            <strong>Tripulado:</strong>
                            {{ $misione->tripulado }}
                        </div>

                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $misione->status }}
                        </div>

                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $misione->fecha }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
