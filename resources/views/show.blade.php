@extends('layout')

@section('content')

    <div class="contentsArea">
      <section class="section">
        <h2 class="heading02">受注案件一覧</h2>

        @include('search')

        <table class="table-bordered table-hover table-01 mt-5">
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
              <td>{{ number_format($projectlist->price) }}</td>
              <td>{{ $projectlist->status }}</td>
              <td><a href={{ route('projectlist.detail', ['id' =>  $projectlist->id]) }} class="btn-02-s">詳細</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </section>
    </div>

@endsection
