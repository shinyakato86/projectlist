{{ Form::open(['method' => 'get']) }}
    {{ csrf_field() }}
    <div class="row">
      <div class='form-group'>
          <input class="form-control" placeholder="フリーワード" name="keyword" type="text" value="">
      </div>
        <div class='form-group col-2'>
          <select class="form-control" name="seach_user">
              <option value="">作成者</option>
            @foreach($users as $user)
              <option value="{{ $user }}">{{ $user }}</option>
            @endforeach
          </select>
        </div>
    </div>
    <div class='form-group col-2'>
        {{ Form::submit('検索', ['class' => 'btn'])}}
        <a href={{ route('projectlist.index') }} class="btn ml-5">クリア</a>
    </div>
{{ Form::close() }}
