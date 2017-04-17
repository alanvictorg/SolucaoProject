<div class="row">
    {{-- descricao do post --}}
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nome', ['class' => '']) !!}
            {!! Form::text('name',   null, ['class' => 'form-control', 'placeholder'=>'Digite o Nome']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
    </div> {{-- descricao do post --}}
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
            {!! Form::label('label', 'Descrição', ['class' => '']) !!}
            {!! Form::text('label',   null, ['class' => 'form-control', 'placeholder'=>'Digite a Descricão']) !!}
            <small class="text-danger">{{ $errors->first('label') }}</small>
        </div>
    </div>
</div>
