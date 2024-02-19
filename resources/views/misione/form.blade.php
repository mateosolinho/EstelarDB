<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group mb-2">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $misione->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2">
            {{ Form::label('agencia_id') }}
            {{ Form::select('agencia_id', $agencias, $misione->agencia_id, ['class' => 'form-control' . ($errors->has('agencia_id') ? ' is-invalid' : ''), 'placeholder' => 'Agencia Id']) }}
            {!! $errors->first('agencia_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2">
            {{ Form::label('objetivo') }}
            {{ Form::text('objetivo', $misione->objetivo, ['class' => 'form-control' . ($errors->has('objetivo') ? ' is-invalid' : ''), 'placeholder' => 'Objetivo']) }}
            {!! $errors->first('objetivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2">
            {{ Form::label('tripulado') }}
            {{ Form::select('tripulado', ['True' => 'True', 'False' => 'False'], $misione->tripulado, ['class' => 'form-control' . ($errors->has('tripulado') ? ' is-invalid' : ''), 'placeholder' => 'Tripulado']) }}
            {!! $errors->first('tripulado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2">
            {{ Form::label('status') }}
            {{ Form::select('status', ['Success' => 'Success', 'Failure' => 'Failure'], $misione->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $misione->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
