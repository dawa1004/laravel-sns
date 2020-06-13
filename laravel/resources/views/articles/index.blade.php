<!-- app.blade.phpをベースで使うことを宣言 -->
@extends('app')
<!-- app.blade.phpの@yield('title')に対応 -->
@section('title', '記事一覧')
<!-- appblade.phpの@yield('content')に対応 -->
@section('content')
  <!-- 別のビューを取り込む→nav.blade.php -->
  @include('nav')
  <div class="container">
    @foreach($articles as $article)<!-- 繰り返し処理 -->
      <div class="card mt-3">
        <div class="card-body d-flex flex-row">
          <i class="fas fa-user-circle fa-3x mr-1"></i>
          <div>
            <div class="font-weight-bold">
              {{ $article->user->name }}
            </div>
            <div class="font-weight-lighter">
            <!-- formatメソッドの引数に日付時刻表示のフォーマット(形式)を渡し年月日時刻を表示 -->
              {{ $article->created_at->format('Y/m/d H:i') }}
            </div>
          </div>
        </div><!-- card-body d-flex flex-row -->
        <div class="card-body pt-0 pb-2">
          <h3 class="h4 card-title">
            {{ $article->title }}
          </h3>
          <div class="card-text">
            {!! nl2br(e( $article->body )) !!}
          </div>
        </div><!-- /card-body pt-0 pb-2 -->
      </div><!-- /card mt-3 -->
    @endforeach
  </div><!-- /container -->
@endsection
