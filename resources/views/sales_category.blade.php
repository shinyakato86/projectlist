@extends('layout')

@section('content')

<div class="contentsArea">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href={{route('index')}}>TOP</a></li>
      <li class="breadcrumb-item active" aria-current="page">カテゴリー別売上</li>
    </ul>
  </nav>
  <section class="section">
  <h2 class="heading02">カテゴリー別売上</h2>

  @include('search-02')
  <table class="table-02 mt-5 mx-auto table-bordered">
    <thead>
      <tr>
        <th>カテゴリー</th>
        <th>売上金額</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      @foreach($sales_category as $value)
        <td>{{ $value->creator_category }}</td>
        <td class="text-center">{{ number_format($value->amount) }}円</td>

        </tr>
      @endforeach

      @if($sales_category->isEmpty())
        {!! "<p style='color:red'>$error_text</p>"; !!}
      @endif
    </tbody>
  </table>
  </section>
</div>

@endsection
