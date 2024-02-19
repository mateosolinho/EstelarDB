@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Agencia
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
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Agencia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('agencias.update', $agencia->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @if($agencia->imagen)
                                <img src="/storage/{{$agencia->imagen}}" style="max-width: 100px; max-height: 80px;">
                            @endif
                            {{-- @include('agencia.form') --}}
                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        {{ Form::label('nombre') }}
                                        {{ Form::text('nombre', $agencia->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('imagen') }}
                                        <input type="file" name="imagen">
                                    </div>
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
