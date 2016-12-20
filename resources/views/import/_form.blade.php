<div id="error"></div>
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">RAR-XML :</label>

    <div class="col-sm-10">
        {!! Form::file('filexml', null, ['class' => 'form-control', 'placeholder' => 'Arquivo', 'id' => 'filexml']) !!}
    </div>
    <label for="company_id" class="col-sm-2 control-label">Empresa:</label>
    <div class="col-sm-10">
        {!! Form::select('company_id',$companies,null,['class'=>'form-control', 'required']) !!}
    </div>

</div>