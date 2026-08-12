# Topic Posts

## 概要

Topic Posts は、Laravelで作成した簡易SNSアプリです。

ユーザー登録・ログイン後、140字以内の投稿を作成できます。  
また、他ユーザーのフォロー、投稿へのいいね、ユーザー詳細ページでの投稿一覧表示など、SNSの基本機能を実装しています。

LaravelのEloquentリレーションを用いて、ユーザーと投稿の1対多関係、ユーザー同士のフォロー関係、ユーザーと投稿のいいね関係を管理しています。

## 使用技術

- PHP
- Laravel
- Laravel Breeze
- MySQL
- Laravel Sail
- Docker
- Blade
- Bootstrap
- Git / GitHub

## 主な機能

### 認証機能

- ユーザー登録
- ログイン
- ログアウト
- プロフィール編集
- パスワード変更
- アカウント削除

### 投稿機能

- 投稿作成
- 投稿一覧表示
- 投稿編集
- 投稿削除
- 140字以内のバリデーション
- 投稿者名からユーザー詳細ページへ移動

### ユーザー詳細機能

- ユーザーごとの詳細ページ
- ユーザー別の投稿一覧表示
- フォロー数・フォロワー数の表示
- 自分の詳細ページからプロフィール編集画面へ移動

### フォロー機能

- 他ユーザーのフォロー
- フォロー解除
- フォロー中一覧
- フォロワー一覧
- 自分自身をフォローできない制御

### いいね機能

- 投稿へのいいね
- いいね解除
- いいね数表示
- 同じ投稿への二重いいね防止

## データベース設計・リレーション

### users テーブル

ユーザー情報を管理します。

主な関連：

- User hasMany Post
- User belongsToMany User（フォロー関係）
- User belongsToMany Post（いいね関係）

### posts テーブル

投稿情報を管理します。

主な関連：

- Post belongsTo User
- Post belongsToMany User（いいねしたユーザー）

### user_follow テーブル

ユーザー同士のフォロー関係を管理する中間テーブルです。

| カラム | 内容 |
|---|---|
| user_id | フォローするユーザー |
| follow_id | フォローされるユーザー |

同じユーザーを二重にフォローできないように、`user_id` と `follow_id` の組み合わせにユニーク制約を設定しています。

### post_user テーブル

投稿へのいいね関係を管理する中間テーブルです。

| カラム | 内容 |
|---|---|
| user_id | いいねしたユーザー |
| post_id | いいねされた投稿 |

同じユーザーが同じ投稿に二重でいいねできないように、`user_id` と `post_id` の組み合わせにユニーク制約を設定しています。

## 工夫した点

### Eloquentリレーションの活用

ユーザーと投稿の1対多関係、フォロー機能・いいね機能の多対多関係をEloquentリレーションで実装しました。

特にフォロー機能では、同じ `users` テーブル同士を `user_follow` テーブルでつなぎ、フォロー中・フォロワーの双方を取得できるようにしています。

### Blade partialによる共通化

投稿一覧表示を `resources/views/posts/posts.blade.php` に切り出し、トップページとユーザー詳細ページで共通利用しています。

これにより、いいねボタンや投稿表示の修正を1か所で管理できるようにしました。

### Bootstrapによる画面整備

Laravel Breeze標準の画面を、アプリ全体の見た目に合わせてBootstrapベースに変更しました。

ログイン画面、ユーザー登録画面、プロフィール編集画面、投稿一覧画面などを統一感のあるデザインに整えています。

### 認証状態による表示制御

ログイン中・未ログインで表示を切り替えています。

未ログイン時は投稿一覧を閲覧できますが、投稿作成・いいね・編集・削除などの操作は表示しないようにしています。

## セットアップ方法

```bash
git clone https://github.com/mizuki012/laravel-sns.git
cd laravel-sns
cp .env.example .env
composer install
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate