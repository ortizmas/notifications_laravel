@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="table-responsive">
			<div class="card">
				<div class="card-header">
					{{ $post->title }}
				</div>
				<div class="card-body">
					{{ $post->description }}
				</div>

				
				@include('posts.comments.comment')
			</div>
		</div>
	</div>
@endsection