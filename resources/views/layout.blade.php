<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
	 crossOrigin="anonymous" />
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,400" rel="stylesheet" type="text/css">
	<title>ToDo</title>
</head>
<style>
	html,
	body {
		background-color: #ffe;
		color: #636b6f;
		font-family: 'Raleway', sans-serif;
		font-weight: 200;
		height: 100vh;
		margin: 0;
	}

	a {
		color: rgb(0, 0, 0);
		text-decoration: none;
		transition: .3s;
	}

	a:hover {
		color: rgb(22, 122, 169);
	}

	h1 {
		font-weight: 100;
	}

	.container {
		padding: 50px;
	}

	.container .content_header .header_title {
		font-weight: 100;
		font-size: 3.8em;
		font-weight: 100;
	}

	.container .main_content .action_content {
		margin: 30px 0 60px 0;
	}

	.container .main_content .action_content .input_content #input {
		background-color: #ffe;
		font-size: 1.4em;
		padding: 2px 12px;
		border: none;
	}

	.container .main_content .output_content .tool {
		display: table;
	}

	.container .main_content .output_content .content_title {
		display: inline-table;
		font-size: 2.3em;
	}

	.container .main_content .output_content .article {
		padding: 20px 50px;
		display: table;
	}

	.container .main_content .output_content li {
		margin: 12px 0;
	}

	.container .main_content .output_content .item_link {
		font-family: 'Yu Gothic';
		font-size: 1.5em;
		font-weight: 100;
	}

	.container .main_content .output_content .tool .submit_btn {
		padding: 15px;
		margin-left: 10px;
		vertical-align: 60%;
		border: none;
		border-radius: 50%;
	}

	.container .main_content .output_content .article .result {
		font-family: 'Yu Gothic';
		font-weight: 100;
		background-color: #ffe;
		border: none;
		font-size: 1.5em;
		transition: .3s;
	}

	.container .main_content .output_content .article .result:hover {
		color: red;
	}

	.container .main_content .output_content .hidden {
		display: none;
	}

	.container .main_content .output_content .article .fa {
		font-size: 0.85em;
		font-weight: 100;
		margin-left: 5px;
		transition: .3s;
	}

	.container .main_content .output_content .article .fa:hover {
		color: rgb(128, 177, 198);
	}

	.container .main_content .output_content .article form {
		display: inline-table;
	}


	@media screen and (max-width: 480px) {
		.container .content_header .header_title {
			font-size: 2em;
		}

		.container .main_content .action_content .input_content #input {
			font-size: 1.3em;
			width: 200px;
		}

		.container .main_content .output_content .content_title {
			font-size: 1.7em;
		}

		.container .main_content .output_content .tool .submit_btn {
			vertical-align: 52%;
			padding: 12px;
		}

		.container .main_content .output_content .article {
			padding: 10px;
		}

		.container .main_content .output_content .item_link {
			font-size: 0.8em;
		}

		.container .main_content .output_content .article .result {
			font-size: 0.8em;
		}
	}
</style>

<body>
	<div class="container">
		<div class="content_header">
			<a href="/articles">
				<div class="header_title">ToDo Function</div>
			</a>
		</div>
		<div class="main_content">
			<form action="/submit" method="post">
				{!! csrf_field() !!}
				<div class="action_content">
					<div class="input_content">
						<ul>
							<li>
								<input type="text" size='38' id='input' placeholder='ToDoを入力' name="name">
							</li>
						</ul>
					</div>
			</form>
			@yield('content') @yield('done')
			</div>
		</div>
</body>

</html>