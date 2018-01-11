@extends('layout') @section('content')

<div class="output_content">
	<div class="tool">
		<div class="content_title">Result</div>
	</div>
	<hr/>
	<article class="article">
		<form action="/del" method="get">
			<input type="text" class="hidden" name="id" value="{{ $article->id }}" />
			<button class="result">{{ $article->name }}: {{$article->created_at}}</button>
		</form>
		<form action="/done" method="get">
			<input type="text" class="hidden" name="id" value="{{ $article->id }}" />
			<button class="result">
				<i class="fa fa-check-square-o" aria-hidden="true"></i>
			</button>
		</form>
	</article>
</div>

@endsection