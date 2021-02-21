@extends('layout')

@section('content')

<div class="contentsArea">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href={{route('index')}}>TOP</a></li>
      <li class="breadcrumb-item active" aria-current="page">クライアント別売上</li>
    </ul>
  </nav>
  <section class="section">
  <h2 class="heading02">クライアント別売上</h2>

  @include('search-02')
  <table class="table-02 mt-5 mx-auto table-bordered">
    <thead>
      <tr>
        <th>クライアント名</th>
        <th>売上金額</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      @foreach($sales_client as $value)
        <td>{{ $value->client_name }}</td>
        <td class="text-center">{{ number_format($value->amount) }}円</td>

        </tr>
      @endforeach

      @if($sales_client->isEmpty())
        {!! "<p style='color:red'>$error_text</p>"; !!}
      @endif
    </tbody>
  </table>
  </section>
</div>

@endsection
