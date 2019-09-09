@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="table-responsive">
			<table class="table table-hover">
				<caption>Lista de posts</caption>
				<thead>
					<tr>
						<th>#</th>
						<th>Titulo</th>
						<th class="float-right">Opções</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $post)
					<tr>
						<td>{{ $post->id }}</td>
						<td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }} ({{ $post->comments->count() }})</a></td>
						<td class="float-right">
							<a class="btn btn-success btn-xs" href="{{ route('posts.show', $post->id) }}" title="">Ver</a>
							<a class="btn btn-info btn-xs" href="{{ route('posts.edit', $post->id) }}" title="">Alterar</a>
							<a class="btn btn-danger btn-xs" href="{{ route('posts.destroy', $post->id) }}" title="">Excluir</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $posts->links() }}
		</div>
	</div>
@endsection