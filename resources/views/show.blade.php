@extends('layout')

@section('content')

<section class="section">
    <h2 class="heading02">投稿一覧</h2>
    <div class="contentsArea">
    @include('search')

    <section class="section-review">

    <table class="table-bordered table-hover table-checkbox" id="orderList">
      <thead>
        <tr>
          <th class="col-no">作成日</th>
          <th class="col-date">発注元営業部門</th>
          <th class="col-section">営業</th>
          <th class="col-client">クライアント名</th>
          <th class="col-anken">案件名</th>
          <th class="col-creater">作成者</th>
          <th class="col-price">金額</th>
          <th class="col-status">状態</th>
          <th class="col-status"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projectlist as $projectlist)
        <tr>
          <td>{{ $projectlist->created_at->format('Y/m/d') }}</td>
          <td>{{ $projectlist->department_name }}</td>
          <td>{{ $projectlist->sales_name }}</td>
          <td>{{ $projectlist->client_name }}</td>
          <td>{{ $projectlist->project_name }}</td>
          <td>{{ $projectlist->author_name }}</td>
          <td>{{ $projectlist->price }}</td>
          <td>{{ $projectlist->status }}</td>
          <td><a href={{ route('projectlist.detail', ['id' =>  $projectlist->id]) }} class="btn-02-s">詳細</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>

    </div>

    <section>

    </div>
</section>

@endsection
