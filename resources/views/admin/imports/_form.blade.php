<div id="error"></div>
<div class="form-group">
    {!! Form::label('company_id','Empresa',['class'=>'control-label']) !!}
    {!! Form::select('company_id',$companies,null,['class'=>'form-control', 'required', 'placeholder'=>'Escolha uma empresa']) !!}
</div>
<div class="form-group">
    {!! Form::label('filexml','Arquivo',['class'=>'control-label']) !!}
    {!! Form::file('filexml', null, ['class' => 'form-control', 'placeholder' => 'Arquivo', 'id' => 'filexml']) !!}

</div>