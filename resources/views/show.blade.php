@extends('layout')

@section('content')

<section class="section">
    <h2 class="heading02">投稿一覧</h2>
    <div class="contentsArea">
    @include('search')

    <section class="section-review">
    @foreach ($projectlists as $projectlist)
    <table class="table-bordered table-hover table-checkbox" id="orderList">
      <thead>
        <tr>
          <th><span class="ion-checkmark-round"></span></th>
          <th class="col-no">No.</th>
          <th class="col-date">作成日</th>
          <th class="col-section">発注元営業部門</th>
          <th class="col-eigyo">営業</th>
          <th class="col-client">クライアント名</th>
          <th class="col-anken">案件名</th>
          <th class="col-creater">作成者</th>
          <th class="col-price">金額</th>
          <th class="col-status">状態</th>
        </tr>
      </thead>
      <tbody>
        <tr id="or-20-004863" uid="8169829b4d5f3f94ef0da07dda6e78639e7d08ff">
          <td>{{ $projectlist->id }}</td>
          <td></td>
          <td>{{ $projectlist->name }}</td>
          <td>リテールビジネス事業部<br>東海営業部 営業課</td>
          <td class="ta-center">田中</td>
          <td>松坂屋名古屋店</td>
          <td class="proname">真珠ネックレス・イヤリング撮影</td>
          <td class="ta-center col-creater" style="display: table-cell;">古川 智幸</td>
          <td class="numeral olModal oLrB" data-toggle="modal" data-target="#orderListModal" style="display: table-cell;" uid="8169829b4d5f3f94ef0da07dda6e78639e7d08ff">¥13,200</td>
          <td class="ta-center status" order="受注見込"><i>受注見込</i></td>
        </tr>

        <a href={{ route('projectlist.detail', ['id' =>  $projectlist->id]) }} class="btn-02-s mt40">
                        投稿詳細ページへ
        </a>

    </div>
    @endforeach
    <section>

    </div>
</section>

    @auth
    <a href={{ route('shop.new') }} class="float-btn">
                <div class="float-btn-icon">
                <i class="fas fa-pen"></i>
                </div>
                <div class="float-btn-text">レビューする</div>
    </a>
    @endauth

@endsection
