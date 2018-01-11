## Document

***

- DB作成 - まずLaravelディレクトリ下のenvの設定と行う

```php

DB_CONNECTION=mysql //DBの種類を記入

/** 
 * Xamppを利用しているので127.0.0.1 || localhost
 * なおXampp内のphpファイルをPATHに通さないと接続できない
 */

DB_HOST=localhost 

DB_PORT=3306 // Xamppのadminポートは3306
DB_DATABASE=laravel // テーブル名
DB_USERNAME=root // ユーザ、デフォルトはroot
DB_PASSWORD= //パスワード、デフォルトは空

```

- Migrations作成

```

php artisan make:migration Migrations名

```

- Migrations実行 - up

```
php artisan migrate

```

- Migrations実行 - down

```

php artisan migrate:rollback

```