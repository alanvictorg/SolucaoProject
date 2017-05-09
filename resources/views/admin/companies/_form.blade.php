<div class="row">
    {{-- descricao do post --}}
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nome', ['class' => '']) !!}
            {!! Form::text('name',   null, ['class' => 'form-control', 'placeholder'=>'Digite o Nome']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
    </div>
</div>

<div class="row">
    {{-- descricao do post --}}
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('manager') ? ' has-error' : '' }}">
            {!! Form::label('manager', 'Responsável', ['class' => '']) !!}
            {!! Form::text('manager',   null, ['class' => 'form-control', 'placeholder'=>'Digite o Nome']) !!}
            <small class="text-danger">{{ $errors->first('manager') }}</small>
        </div>
    </div>
</div>
<div class="row">
    {{-- descricao do post --}}
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            {!! Form::label('phone', 'Telefone', ['class' => '']) !!}
            {!! Form::text('phone',   null, ['class' => 'form-control', 'placeholder'=>'Digite o Telefone']) !!}
            <small class="text-danger">{{ $errors->first('phone') }}</small>
        </div>
    </div>
</div>