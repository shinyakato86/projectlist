@extends('layout')

@section('content')

<div class="contentsArea">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href={{route('index')}}>TOP</a></li>
      <li class="breadcrumb-item active" aria-current="page">月次売上（個人）</li>
    </ul>
  </nav>
  <section class="section">
  <h2 class="heading02">月次売上（個人）</h2>

  @include('search-02')
  <table class="table-02 mt-5 mx-auto table-bordered">
    <thead>
      <tr>
        <th>名前</th>
        <th>売上金額</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      @foreach($sales_personal as $value)
        <td>{{ $value->creator_name }}</td>
        <td class="text-center">{{ number_format($value->amount) }}円</td>

        </tr>
      @endforeach

      @if($sales_personal->isEmpty())
        {!! "<p style='color:red'>$error_text</p>"; !!}
      @endif
    </tbody>
  </table>
  </section>
</div>

@endsection
