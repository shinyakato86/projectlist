{{ Form::open(['method' => 'get']) }}
    {{ csrf_field() }}
    <div class='form-group'>
        {{ Form::label('keyword', '検索キーワードを入力して下さい') }}
        <p class="fz-s c-red">※アーティスト名、アルバム名、コメントでの検索となります。</p>
        {{ Form::text('keyword', null, ['class' => 'form-control']) }}
    </div>
    <div class='form-group'>
        {{ Form::submit('検索', ['class' => 'btn btn-primary'])}}
        <a href={{ route('projectlist.index') }} class="btn btn-danger ml-5 btn-sm">クリア</a>
    </div>
{{ Form::close() }}
