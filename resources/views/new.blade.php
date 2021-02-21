@extends('layout')

@section('content')
  <div class="contentsArea">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href={{route('index')}}>TOP</a></li>
        <li class="breadcrumb-item active" aria-current="page">受注案件新規登録</li>
      </ul>
    </nav>
    <section class="section">
    <h2 class="heading02">受注案件新規登録</h2>

    <div class="formArea">
    {{ Form::open(['route' => 'projectlist.store', 'id' => 'uriage_form']) }}

    <div class="section bg-w">
      <div class="content-inner">
        <div class="row mb-3 align-items-start">
          <div class="col-10">
            <label>●計上日</label>
          </div>
          <div class="col-md-3 form-group">
            {{ Form::date('accounting_date', \Carbon\Carbon::now(), ['class'=>'form-control']) }}
          </div>
        </div>
        <div class="row mb-3 align-items-start">
          <div class="col-10">
            <label>●クライアント情報</label>
          </div>
          <div class="col-md-6 form-group" id="client_name">
            <select class="form-control data_section_sales_staff" name="client_name" required>
              <option value="">---</option>
            @foreach($clients as $client)
              <option value="{{ $client }}">{{ $client }}</option>
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
          <div class="col-md-5 form-group">
            <select class="form-control data_section_sales_staff" name="department_name" required>
              <option value="">---</option>
              @foreach($departments as $department)
                <option value="{{ $department }}">{{ $department }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2 form-group">
            <div class="honorific">
              <input class="form-control" type="text" name="sales_name" placeholder="担当者" value="" required="" data-error="※入力必須です">
            </div>
          </div>
        </div>
        <div class="row mb-3 align-items-start">
          <div class="col-12">
          <label>●案件名</label>
          </div>
          <div class="col-md-10 form-group">
            <input class="form-control" type="text" name="project_name" value="" required="" data-error="※入力必須です">
          </div>
          <div class="form-group col-md-2">
              <select class="form-control data_section_sales_staff show_requiredlike" name="status" required>
                <option value="">状態</option>
                  @foreach($status as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                  @endforeach
              </select>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label>●売上額　※売上分配の合計が自動入力されます</label>
          </div>
          <div class="col-md-5 form-group">
            <input class="form-control t-right numeral yen font-l mr-3" id="uriage" type="text" name="price" value="" required="">円
        </div>
        </div>
      </div>
    </div>

    <div class="mt-5 bg-w" id="data_section_sales">
      <div class="content-inner">
        <div class="row">
          <label class="col-md-3">●売上分配</label>
        </div>
        <article class="sales_accordion_art">
          <div class="accodion" data-event="accordion">
            <div class="acc-content">
              <div class="itemList">
                <div class="item-group row align-items-start">
                  <div class="form-group col-md-2">
    								<select class="form-control data_section_sales_staff show_requiredlike" name="creator_name[]" required>
            				<option value="">作業者</option>
                    @foreach($users as $user)
                      <option value="{{ $user }}">{{ $user }}</option>
                    @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <label>売上：</label>
                    <input class="bunpai numeral yen form-control show_requiredlike mr-3" type="text" name="creator_price[]" value="" data-group="bunpai" required>円
                  </div>

                  <div class="form-group col-md-3">
                    <select class="form-control show_requiredlike" name="creator_category[]" required>
                      <option value="">カテゴリ</option>
                      @foreach($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                      @endforeach
                    </select>
                  </div>
                  <button class="btn my-auto remove_line ml-3" type="button">行を削除</button><span class="unitPriceTime"></span>
      					</div>
              </div>
              <div class="row pl-3 mt-5">
                <button class="add_item btn" type="button">項目を追加する</button>
              </div>
      				</div>
      		</div>
        </article>
      </div>
    </div>

    <div class="form-group mt-5">
        {{ Form::submit('作成する', ['class' => 'btn-03']) }}
    </div>
    {{ Form::close() }}
    </div>
    <div class="pl-3 mt-5">
      <a href={{ route('projectlist.index') }} class="btn btn-secondary">一覧に戻る</a>
    </div>
    </div>
  </section>

@endsection
