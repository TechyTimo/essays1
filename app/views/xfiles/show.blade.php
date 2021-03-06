@extends('layouts.scaffold')

@section('main')

<h1>Show Xfile</h1>

<p>{{ link_to_route('xfiles.index', 'Return to all xfiles') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Url</th>
				<th>Title</th>
				<th>Order_id</th>
				<th>User_id</th>
				<th>Downloads</th>
				<th>Category</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $xfile->url }}}</td>
					<td>{{{ $xfile->title }}}</td>
					<td>{{{ $xfile->order_id }}}</td>
					<td>{{{ $xfile->user_id }}}</td>
					<td>{{{ $xfile->downloads }}}</td>
					<td>{{{ $xfile->category }}}</td>
                    <td>{{ link_to_route('xfiles.edit', 'Edit', array($xfile->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('xfiles.destroy', $xfile->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
