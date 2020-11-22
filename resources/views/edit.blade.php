@extends('layout')

@section('content')
<section class="section">
    <div class="contentsArea">
    <h2 class="heading02">受注案件編集</h2>

    <div class="formArea">
    {{ Form::model($projectlist, ['route' => ['projectlist.update', $projectlist->id]]) }}

    <div class="section bg-w">
        <div class="content-inner">
          <div class="row mb-3 align-items-start">
            <div class="col-12">
              <label>●クライアント情報</label>
            </div>
            <div class="col-6 form-group" id="client_name">
              <select class="form-control" name="client_name" required="" data-error="※選択してください">
                @foreach($clients as $value5)
                  @if ($value5 === $projectlist->client_name)
                    <option value="{{ $value5 }}" selected="selected">{{ $value5 }}</option>
                  @else
                    <option value="{{ $value5 }}">{{ $value5 }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="col-4">
            </div>
          </div>
          <div class="row align-items-start mb-3">
            <div class="col-12">
              <label>●発注元営業部門情報</label>
            </div>
            <div class="col-5 form-group">
              <select class="form-control" name="department_name" required="" data-error="※選択してください">
                @foreach($departments as $value4)
                  @if ($value4 === $projectlist->department_name)
                    <option value="{{ $value4 }}" selected="selected">{{ $value4 }}</option>
                  @else
                    <option value="{{ $value4 }}">{{ $value4 }}</option>
                  @endif
                @endforeach
              </select>
              <div class="help-block with-errors font-s"></div>
            </div>
            <div class="col-2 form-group">
              <div class="honorific">
                <input class="form-control" type="text" name="sales_name" placeholder="担当者" value="{{ $projectlist->sales_name }}" required="" data-error="※入力必須です">
              </div>
              <div class="help-block with-errors font-s"></div>
            </div>
          </div>
          <div class="row mb-3 align-items-start">
            <div class="col-10 form-group">
              <label>●案件名</label>
              <input class="form-control" type="text" name="project_name" value="{{ $projectlist->project_name }}" required="" data-error="※入力必須です">
              <div class="help-block with-errors font-s"></div>
            </div>
            <div class="col-2" id="anken">
                <label>●状態</label>
                <select class="form-control" name="status">
                  @foreach($status as $value3)
                    @if ($value3 === $projectlist->status)
                      <option value="{{ $value3 }}" selected="selected">{{ $value3 }}</option>
                    @else
                      <option value="{{ $value3 }}">{{ $value3 }}</option>
                    @endif
                  @endforeach
                </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-4">
              <label>●売上額</label>
              <input class="form-control t-right numeral yen font-l" id="ju_uriage" type="text" name="price" value="{{ $projectlist->price }}" required="">円
              <div class="help-block with-errors font-s"></div>
            </div>

          </div>
        </div>
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
                    @foreach($creators as $creator)
                      <div class="itemList">
                        <div class="item-group row align-items-start">
                          <div class="form-group col-2">
                              <select class="form-control data_section_sales_staff show_requiredlike" name="creator_name[]">
                      <option value="">作業者</option>
                      @foreach($users as $value1)
                        @if ($value1 === $creator->creator_name)
                          <option value="{{ $value1 }}" selected="selected">{{ $value1 }}</option>
                        @else
                          <option value="{{ $value1 }}">{{ $value1 }}</option>
                        @endif
                      @endforeach
                        </select>
                          </div>

                          <div class="form-group col-3">
                            <label>売上：</label>
                            <input class="bunpai numeral yen form-control show_requiredlike" type="text" name="creator_price[]" value="{{ $creator->creator_price }}">円
                          </div>

                          <div class="form-group col-3">
                            <select class="form-control show_requiredlike" name="creator_category[]">
                              <option value="">カテゴリ</option>
                              @foreach($categories as $value2)
                                @if ($value2 === $creator->creator_category)
                                  <option value="{{ $value2 }}" selected="selected">{{ $value2 }}</option>
                                @else
                                  <option value="{{ $value2 }}">{{ $value2 }}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                          <button class="remove_line" type="button"><span>行を削除</span></button><span class="unitPriceTime"></span>
                                              </div>
                      </div>
            @endforeach
                      <div class="btns">
                        <button class="add_item" type="button">項目を追加する</button>
                      </div>
                      </div>
                  </div>
                </article>
              </div>
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
