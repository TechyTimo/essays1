@extends('layouts.scaffold')

@section('main')

<h1>Create Xfile</h1>

{{ Form::open(array('route' => 'xfiles.store')) }}
	<ul>
        <li>
            {{ Form::label('url', 'Url:') }}
            {{ Form::text('url') }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('order_id', 'Order_id:') }}
            {{ Form::text('order_id') }}
        </li>

        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::text('user_id') }}
        </li>

        <li>
            {{ Form::label('downloads', 'Downloads:') }}
            {{ Form::input('number', 'downloads') }}
        </li>

        <li>
            {{ Form::label('category', 'Category:') }}
            {{ Form::text('category') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


