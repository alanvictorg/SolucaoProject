<div class="row">
    {{-- descricao do post --}}
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
            {!! Form::label('company_id', 'Arquivo', ['class' => '']) !!}
            {!! Form::select('company_id',$companies,null,['class'=>'form-control', 'required']) !!}
            <small class="text-danger">{{ $errors->first('company_id') }}</small>
        </div>
    </div>

</div>