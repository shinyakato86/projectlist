@extends('layout')

@section('content')
    <section class="section">
    <div class="contentsArea">
    <h2 class="heading02">受注案件新規登録</h2>

    <div class="formArea">
    {{ Form::open(['route' => 'projectlist.store']) }}
        <div class='form-group'>
            {{ Form::label('project_name', '案件名:') }}
            {{ Form::text('project_name', null) }}
        </div>
        <div class='form-group'>
          <label>営業部門：</label>
          <select class="form-control data_section_sales_staff show_requiredlike" name="department_name">
            <option value="">営業部門</option>
          @foreach($departments as $department)
            <option value="{{ $department }}">{{ $department }}</option>
          @endforeach
          </select>
        </div>
        <div class='form-group'>
            {{ Form::label('sales_name', '営業担当:') }}
            {{ Form::text('sales_name', null) }}
        </div>
        <div class='form-group'>
          <label>クライアント名：</label>
          <select class="form-control data_section_sales_staff show_requiredlike" name="client_name">
            <option value="">クライアント名</option>
          @foreach($clients as $client)
            <option value="{{ $client }}">{{ $client }}</option>
          @endforeach
          </select>
        </div>
        <div class='form-group'>
            {{ Form::label('price', '金額:') }}
            {{ Form::text('price', null) }}
        </div>
        <div class='form-group'>
          <label>状態：</label>
          <select class="form-control data_section_sales_staff show_requiredlike" name="status">
            <option value="">状態</option>
          @foreach($status as $status)
            <option value="{{ $status }}">{{ $status }}</option>
          @endforeach
          </select>
        </div>


        <div class="mt30 bg-w" id="data_section_sales">
          <div class="content-inner">
            <div class="row">
              <label class="col-3">●売上分配</label>
            </div>
                      <div class="help-block with-errors font-s"></div>
                          <article class="sales_accordion_art" area="中日本" section="制作1部">
                        <div class="accodion" data-event="accordion">
                          <div class="acc-content">
                  <div class="itemList">
                              <div class="item-group row align-items-start">
                                <div class="form-group col-2">
        														<select class="form-control data_section_sales_staff show_requiredlike" name="creator_name[]">
        										<option value="">作業者</option>
                            @foreach($users as $user)
                              <option value="{{ $user }}">{{ $user }}</option>
                            @endforeach
                              </select>
                                </div>

                                <div class="form-group col-3">
                                  <label>売上：</label>
                                  <input class="bunpai numeral yen form-control show_requiredlike" type="text" name="creator_price[]" value="">円
                                </div>

                                <div class="form-group col-3">
                                  <select class="form-control show_requiredlike" name="creator_category[]">
                                    <option value="">カテゴリ</option>
                                    @foreach($categories as $category)
                                      <option value="{{ $category }}">{{ $category }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <button class="remove_line" type="button"><span>行を削除</span></button><span class="unitPriceTime"></span>
        																						</div>
                            </div>                    <div class="btns">
                              <button class="add_item" type="button">項目を追加する</button>
                            </div>
        																		</div>
        																</div>
                      </article>
                    </div>
                    <input type="hidden" name="data_array_sales" value="">
                    <input type="hidden" name="sales_leaf" value="">
                  </div>


        <div class="form-group">
            {{ Form::submit('作成する', ['class' => 'btn-03']) }}
        </div>
    {{ Form::close() }}
    </div>
    <div>
        <a href={{ route('projectlist.index') }} class="btn btn-secondary mt20">一覧に戻る</a>
    </div>
    </div>
    <section>

@endsection
