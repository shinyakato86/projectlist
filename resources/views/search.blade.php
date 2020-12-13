{{ Form::open(['method' => 'get']) }}
    {{ csrf_field() }}
    <div class="row">
      <div class='form-group col-md-2 pl-0'>
        <select class="form-control" name="seach_year">
            <option value="" selected>---</option>
            @for ($i=$year - 5; $i <= $year; $i++)
            <option value="{{$i}}" @if($i == $keyword1) selected="selected" @endif>{{$i}}年</option>
            @endfor
        </select>
      </div>
      <div class='form-group col-md-2 pl-0'>
        <select class="form-control" name="seach_month">
            <option value="">---</option>
            @for ($i=1; $i <= 12; $i++)
            <option value="{{ $i }}" @if($i == $keyword2) selected="selected" @endif>{{ $i }}月</option>
            @endfor
        </select>
      </div>
        <div class='form-group col-md-2 pl-0'>
          <select class="form-control" name="seach_user">
              <option value="">作成者</option>
            @foreach($users as $user)
              <option value="{{ $user }}" @if($user == $keyword3) selected="selected" @endif>{{ $user }}</option>
            @endforeach
          </select>
        </div>
    </div>
    <div class='form-group'>
        <a href={{ route('projectlist.index') }} class="btn">クリア</a>
        {{ Form::submit('検索', ['class' => 'btn ml-3'])}}
    </div>
{{ Form::close() }}
