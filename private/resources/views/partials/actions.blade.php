@if($type == 'only-show')
    <a href="{{ route("{$route}.show", ['id' => $id]) }}" class="icon edit-customer"><i class="zmdi zmdi-eye"></i></a>
@elseif($type == 'none')
@elseif($type == 'edit-delete')
    <a href="{{ route("{$route}.edit", ['id' => $id]) }}" class="icon edit-customer"><i class="zmdi zmdi-edit"></i></a>
    {!! Form::open(['url' => route("{$route}.destroy", ['id' => $id]), 'method' => 'POST', 'style' => 'vertical-align: middle; display: inline-block;']) !!}
    {{ method_field('DELETE') }}
    <a href="javascript:void(0)" class="icon edit-customer sweet-warning-cancel"><i class="zmdi zmdi-delete delete-icon"></i></a>
    {!! Form::close() !!}
@elseif($type == 'show-delete')
    <a href="{{ route("{$route}.show", ['id' => $id]) }}" class="icon edit-customer"><i class="zmdi zmdi-eye"></i></a>
    {!! Form::open(['url' => route("{$route}.destroy", ['id' => $id]), 'method' => 'POST', 'style' => 'vertical-align: middle; display: inline-block;']) !!}
    {{ method_field('DELETE') }}
    <a href="javascript:void(0)" class="icon edit-customer sweet-warning-cancel"><i class="zmdi zmdi-delete delete-icon"></i></a>
    {!! Form::close() !!}
@else
    <a href="{{ route("{$route}.show", ['id' => $id]) }}" class="icon edit-customer"><i class="zmdi zmdi-eye"></i></a>
    <a href="{{ route("{$route}.edit", ['id' => $id]) }}" class="icon edit-customer"><i class="zmdi zmdi-edit"></i></a>
    {!! Form::open(['url' => route("{$route}.destroy", ['id' => $id]), 'method' => 'POST', 'style' => 'vertical-align: middle; display: inline-block;']) !!}
    {{ method_field('DELETE') }}
        <a href="javascript:void(0)" class="icon edit-customer sweet-warning-cancel"><i class="zmdi zmdi-delete delete-icon"></i></a>
    {!! Form::close() !!}
@endif