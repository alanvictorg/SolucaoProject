{!! Form::open([
    'url'=>route($module_name.'.destroy',['id'=>$row->id]),
    'method'=>'DELETE',
    'class'=>'form-delete-'.$row->id
    ])
!!}
{!! Form::close() !!}