{{ Form::open(['method' => 'get']) }}
    {{ csrf_field() }}
    <div class="row">
        <div class='form-group pl-0'>
          <select class="form-control" name="seach_year">
              <option value="" selected>---</option>
              @for ($i=$year - 5; $i <= $year; $i++)
              <option value="{{$i}}" @if($i == $keyword) selected="selected" @endif>{{$i}}年</option>
              @endfor
          </select>
        </div>
        <div class='form-group pl-0 ml-3'>
          <select class="form-control" name="seach_month">
              <option value="">---</option>
              @for ($i=1; $i <= 12; $i++)
              <option value="{{ $i }}" @if($i == $keyword2) selected="selected" @endif>{{ $i }}月</option>
              @endfor
          </select>
        </div>
    </div>
    <div class='form-group'>
        <a href={{ route('sales.client') }} class="btn">クリア</a>
        {{ Form::submit('検索', ['class' => 'btn ml-3'])}}
    </div>
{{ Form::close() }}
