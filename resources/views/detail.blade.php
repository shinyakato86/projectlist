@extends('layout')

@section('content')

<div class="contentsArea">
<section class="section">
    <h2 class="heading02">受注案件詳細</h2>
<table class="table-02">
    <tbody>
        <tr>
            <th>作成日</th>
            <td>{{ $projectlist->created_at->format('Y/m/d') }}</td>
        </tr>
        <tr>
            <th>営業部門</th>
            <td>{{ $projectlist->department_name }}</td>
        </tr>
        <tr>
            <th>営業担当</th>
            <td>{{ $projectlist->sales_name }}</td>
        </tr>
        <tr>
            <th>クライアント名</th>
            <td>{{ $projectlist->client_name }}</td>
        </tr>
        <tr>
            <th>案件名</th>
            <td>{{ $projectlist->project_name }}</td>
        </tr>
        <tr>
            <th>作成者</th>
            <td>{{ $projectlist->author_name }}</td>
        </tr>
        <tr>
            <th>売上金額</th>
            <td>{{ number_format($projectlist->price) }}円</td>
        </tr>
        <tr>
            <th>状態</th>
            <td>{{ $projectlist->status }}</td>
        </tr>
    </tbody>
</table>

<h3 class="heading03">売上分配</h3>

      @foreach ($creators as $creator)
      <table class="table-03">
          <tbody>
      <tr>
          <th>作業者名</th>
          <td>{{ $creator->creator_name }}</td>
      </tr>
      <tr>
          <th>売上金額</th>
          <td>{{ number_format($creator->creator_price) }}円</td>
      </tr>
      <tr>
          <th>カテゴリ</th>
          <td>{{ $creator->creator_category }}</td>
      </tr>
        </tbody>
    </table>
      @endforeach
</section>


    <div class="mt-5">
    <a href={{ route('projectlist.index') }} class="btn mr-3">一覧に戻る</a>

            <a href={{ route('projectlist.edit', ['id' =>  $projectlist->id]) }} class="btn">編集</a>
            <p></p>
            {{ Form::open(['method' => 'delete', 'route' => ['projectlist.destroy', $projectlist->id]]) }}
                {{ Form::submit('削除', ['class' => 'btn mt-5']) }}
            {{ Form::close() }}

</div>

</div>
@endsection
