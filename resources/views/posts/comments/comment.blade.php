@if (auth()->check())

	<div class="card-header">
		<h3>Deixe seu comentario</h3>
		{{-- https://www.youtube.com/watch?v=xvAowEZl1Pg&list=PLVSNL1PHDWvSOFpHtRi1-oZjBll69lehn&index=7 --}}
	</div>
	<div class="card-body">

		@if (session()->get('success'))
			<div class="alert alert-success">
				<strong>Obrigado</strong> {{ session()->get('success') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif

		@if ($errors->any())
			<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
					<ul>
						<li>{{ $error }}</li>
					</ul>
				@endforeach
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		<form action="{{ route('comments.store') }}" method="POST">
			@csrf
			<input type="hidden" name="post_id" value="{{ $post->id }}">
			<div class="form-group">
				<input type="text" name="title" placeholder="Titulo do post" class="form-control">
			</div>
			<div class="form-group">
				<textarea name="body" class="form-control" rows="4" placeholder="Comentar post"></textarea>
			</div>
			<button type="submit" class="btn btn-success btn-sm float-right">Comentar</button>
		</form>
	</div>
@else
	<div class="card-footer">
		<p>Precisa estar logeado para comentar <a href="{{ route('login') }}">Login</a></p>
	</div>
	
@endif

<div class="card-body">
	<hr>
	<h3>Comentairos ({{ $post->comments->count() }})</h3>
	@forelse($post->comments as $comment)
	<b>{{ $comment->user->name }} comentou: </b> 
	<p>{{ $comment->title }} - {{ $comment->body }}</p>
	@empty
	<b>Nao existe comentarios para este post</b>
	@endforelse
</div>