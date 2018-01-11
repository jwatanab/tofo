@extends('layout') @section('content')

<div class="output_content">
	<div class="tool">
		<div class="content_title">Articles</div>
		<button class="submit_btn"></button>
	</div>
	<hr/>
	<article class="article">
		@foreach($articles as $article)
		<li>
			<a class="item_link" href="{{ url('articles', $article->id) }}">
				{{ $article->name }}
			</a>
		</li>
		@endforeach
	</article>
</div>

@endsection @section('done')

<div class="output_content">
	<div class="tool">
		<div class="content_title">Done</div>
	</div>
	<hr/>
	<article class="article">
		@foreach($articles0 as $article)
		<li>
			<a class="item_link" href="{{ url('articles', $article->id) }}">
				{{ $article->name }}
			</a>
		</li>
		@endforeach
	</article>
</div>
@endsection('done')