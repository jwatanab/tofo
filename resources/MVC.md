## Document

***

### 概要

- ### Model - データベース内のテーブル仲介

  - データベースはenv参照,Model名がテーブルを参照する情報となりテーブルは小文字 + s(複数形)に命名する

  - クラスを定義しただけでコントローラーからデータを参照できる

  - 以下のコマンドでModelを作成できる

```
    php artisan make:model モデル名
```

- ### Controller - Viewを定義、またはViewに返すものを定義する

  - データベースを使用する場合には、use ??( Modelファイルまでのパスを書く )

  - public装飾詞をつけることでどこからでも関数を利用できる

  - View関数でResources/Views内の特定のファイルに受け取った情報を渡す

```php

use App\Article; //Model

/** 
 * view関数の第一引数には参照ファイル、第二引数には渡す変数を書く
 * viewでは.でフォルダを指定し、続く文字列でファイルを指定する。
 * 第二引数では現在、確認できるのは二通りを渡し方。
 * 
 * ['links' => $links] || compact($)
 * 
 * Controllerで定義された変数の頭に$はつけない
 * また後者ではController側で定義した変数名をそのままView側で使用できる
 * 
*/

public function index() {
        $articles = Article::all(); // データベースのレコードがすべて入っている
        return view('articles.index', compact('articles'));
}

public function show($id) {
        $article = Article::findOrFail($id); // SQLのSELECTに相当するレコードが入っている
        return view('articles.show', compact('article'));
}

```

  - 以下のコマンドでControllerを作成できる

```
    php artisan make:controller コントローラ名
```

- ### View - Controllerを指定し、データを受け取り表示

  - ViewはControllerに合わせたBladeテンプレート、Controllerから受け取ったデータをレイアウトに合わせて調節できる

  - Resource内にフォルダを作成することによってページの範囲を分かりやすくする

- 親

```php

<!DOCTYPE HTML>
<html lang="ja">
<head><meta charset="UTF-8"></head>
<body>
 
  @yield('content')

  <!--  親となるコンポーネント、@yield(name)で子コンポーネントは -->
  <!--  @section(nameで)この親コンポーネントを継承しレイアウトを共通化できる  -->
 
</body>
</html>

```

- 子

```php

  <!-- bladeテンプレートでは{{}}で囲むことでhtml内に変数を展開できる -->
  <!-- @に続いてphp構文が使える、また<?php ?>も使える-->
  <!-- @extendsで継承する親を決め、@sectionで親のどこの箇所に含めるか決める -->

  @extends('layout')
 
  @section('content')
  <h1>Articles</h1>
  
  @foreach($articles as $article)
    <article>
    <h2>
    
    <a href="{{ url('articles', $article->id) }}">
    {{ $article->title }}
    </a>
    </h2>
    <div class="body">
    {{ $article->body }}
    </div>
   </article>
  @endforeach
 
@endsection

```

- ### Route - ルーティングに合わせてControllerまたはViewを定義する

  - /routesのphpファイルにルーティングを設定する

  - apiやconsole,channelsなどのルーティングを設定できる

  - Viewを表示する場合には、web.phpにルーティングを記述する

```php

    /**  Controllerを指定する場合には、第二引数にController名@関数名を記述する  */
    Route::get('articles/{id}', 'ArticlesController@show');

    /**  Viewをそのまま返す場合には、View関数を利用してroutes/view内のファイルを指定する  */
    Route::get('/info',function(){ return view('info'); });
```   