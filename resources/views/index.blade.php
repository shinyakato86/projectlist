@extends('layout')

@section('content')

<div class="contentsArea">
  <div class="content-inner">
    <section class="section">
      <dl class="dl-style01">
        <dt>登録・編集</dt>
        <dd><a href="{{ route('projectlist.index') }}">受注案件一覧</a></dd>
        <dd><a href="{{ route('projectlist.new') }}">受注案件登録</a></dd>
      </dl>
      <dl class="dl-style01">
        <dt>閲覧</dt>
        <dd><a href="">月次売上（個人）</a></dd>

        <dd><a href="">通期売上（部・課・個人）</a></dd>
        <dd><a href="">クライアント別売上</a></dd>
        <dd><a href="">カテゴリー別売上</a></dd>
        <dd><a href="">営業部門別売上</a></dd>

      </dl>
    </section>
  </div><!-- /content-inner -->

</div>

@endsection
