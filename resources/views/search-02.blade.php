{{ Form::open(['method' => 'get']) }}
    {{ csrf_field() }}
    <div class="row">
        <div class='form-group col-2'>
          <select class="form-control" name="seach_year">
              <option value="" selected>年</option>
              @for ($i=$year - 5; $i <= $year; $i++)
              <option value="{{$i}}" @if($i == $year) selected="selected" @endif>{{$i}}年</option>
              @endfor
          </select>
        </div>
        <div class='form-group col-2'>
          <select class="form-control" name="seach_month">
              <option value="">月</option>
              @for ($i=1; $i <= 12; $i++)
              <option value="{{ $i }}" @if($i == $month) selected="selected" @endif>{{ $i }}</option>
              @endfor
          </select>
        </div>
    </div>
    <div class='form-group'>
        <a href={{ route('sales.client') }} class="btn">クリア</a>
        {{ Form::submit('検索', ['class' => 'btn ml-3'])}}
    </div>
{{ Form::close() }}
