@extends('layout')

@section('content')

<div class="contentsArea">
<section class="section">
    <h2 class="heading02">投稿編集詳細</h2>
<table class="table-01">
        <tbody>
            <tr>
                <th>アルバム名</th>
                <td>{{ $projectlist->project_name }}</td>
            </tr>
            <tr>
                <th>アーティスト名</th>
                <td>{{ $projectlist->department_name }}</td>
            </tr>
            <tr>
                <th>コメント</th>
                <td>{{ $projectlist->price }}</td>
            </tr>
            <tr>
                <th>ジャンル</th>
                <td>{{ $projectlist->status }}</td>
            </tr>
        </tbody>
</table>
</section>


    <div class="mt60">
    <a href={{ route('projectlist.index') }} class="btn-secondary btn mr-3">一覧に戻る</a>

            <a href={{ route('projectlist.edit', ['id' =>  $projectlist->id]) }} class="btn-primary btn">編集</a>
            <p></p>
            {{ Form::open(['method' => 'delete', 'route' => ['projectlist.destroy', $projectlist->id]]) }}
                {{ Form::submit('削除', ['class' => 'btn btn-danger mt20']) }}
            {{ Form::close() }}

</div>

</div>
@endsection