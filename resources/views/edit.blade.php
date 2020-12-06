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
            <div class="col-10">
              <label>●計上日</label>
            </div>
            <div class="col-md-3 form-group">
            {{ Form::date('accounting_date', $projectlist->accounting_date, ['class'=>'form-control']) }}
            </div>
          </div>
          <div class="row mb-3 align-items-start">
            <div class="col-md-12">
              <label>●クライアント情報</label>
            </div>
            <div class="col-md-6 form-group" id="client_name">
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
            <div class="col-md-12">
              <label>●発注元営業部門情報</label>
            </div>
            <div class="col-md-5 form-group">
              <select class="form-control" name="department_name" required="" data-error="※選択してください">
                @foreach($departments as $value4)
                  @if ($value4 === $projectlist->department_name)
                    <option value="{{ $value4 }}" selected="selected">{{ $value4 }}</option>
                  @else
                    <option value="{{ $value4 }}">{{ $value4 }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="col-md-2 form-group">
              <div class="honorific">
                <input class="form-control" type="text" name="sales_name" placeholder="担当者" value="{{ $projectlist->sales_name }}" required="" data-error="※入力必須です">
              </div>
            </div>
          </div>
          <div class="row mb-3 align-items-start">
            <div class="col-12">
            <label>●案件名</label>
            </div>
            <div class="col-md-10 form-group">
              <input class="form-control" type="text" name="project_name" value="{{ $projectlist->project_name }}" required="" data-error="※入力必須です">
            </div>
            <div class="col-md-2 form-group" id="anken">
                <select class="form-control data_section_sales_staff show_requiredlike" name="status" required>
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
          <div class="row">
            <div class="col-md-12">
              <label>●売上額</label>
            </div>
            <div class="col-md-5 form-group">
              <input class="form-control t-right numeral yen font-l mr-3" id="uriage" type="text" name="price" value="{{ $projectlist->price }}" required="">円
            </div>

          </div>
        </div>
      </div>

      <div class="mt30 bg-w" id="data_section_sales">
        <div class="content-inner">
          <div class="row">
            <label class="col-md-3">●売上分配</label>
          </div>

          <article class="sales_accordion_art">
            <div class="accodion" data-event="accordion">
              <div class="acc-content">
              @foreach($creators as $creator)
                <div class="itemList">
                  <div class="item-group row align-items-start">
                    <div class="form-group col-md-2">
                      <select class="form-control data_section_sales_staff" name="creator_name[]" required>
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

                    <div class="form-group col-md-4">
                      <label>売上：</label>
                      <input class="form-control mr-3" type="text" name="creator_price[]" value="{{ $creator->creator_price }}" required data-group="bunpai">円
                    </div>

                    <div class="form-group col-md-3">
                      <select class="form-control" name="creator_category[]" required>
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
                    <button class="btn my-auto remove_line ml-3" type="button">行を削除</button>
                  </div>
                </div>
              @endforeach
                <div class="row pl-3 mt-5">
                  <button class="add_item btn" type="button">項目を追加する</button>
                </div>
                </div>
            </div>
          </article>
        </div>
      </div>

        <div class="form-group mt-5">
            {{ Form::submit('更新する', ['class' => 'btn-03']) }}
        </div>
    {{ Form::close() }}
    </div>
    <div class="mt-5">
        <a href={{ route('projectlist.index') }} class="btn btn-secondary mt20">一覧に戻る</a>
    </div>
    </div>
    <section>

@endsection
