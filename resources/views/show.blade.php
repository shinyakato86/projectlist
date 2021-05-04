@extends('layout')

@section('content')

    <div class="contentsArea">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href={{route('index')}}>TOP</a></li>
          <li class="breadcrumb-item active" aria-current="page">受注案件一覧</li>
        </ul>
      </nav>
      <section class="section">
        <h2 class="heading02">受注案件一覧</h2>

        @include('search')
        <div class="table-scroll">
          <table class="table-bordered table-hover table-01 mt-5">
            <thead>
              <tr>
                <th>計上日</th>
                <th>発注元営業部門</th>
                <th>営業</th>
                <th>クライアント名</th>
                <th>案件名</th>
                <th>作成者</th>
                <th>金額</th>
                <th>状態</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($projectlist as $projectlist)
              <tr>
                <td class="ta-center">{{ $projectlist->accounting_date->format('Y/m/d') }}</td>
                <td class="ta-center">{{ $projectlist->department_name }}</td>
                <td class="ta-center">{{ $projectlist->sales_name }}</td>
                <td class="ta-center">{{ $projectlist->client_name }}</td>
                <td class="ta-center">{{ $projectlist->project_name }}</td>
                <td class="ta-center">{{ $projectlist->author_name }}</td>
                <td class="ta-right">{{ number_format($projectlist->price) }}</td>
                <td class="ta-center">{{ $projectlist->status }}</td>
                <td><a href={{ route('projectlist.detail', ['id' =>  $projectlist->id]) }} class="btn-02-s">詳細</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </section>
    </div>

@endsection
