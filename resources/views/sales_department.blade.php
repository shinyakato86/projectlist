@extends('layout')

@section('content')

<div class="contentsArea">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href={{route('index')}}>TOP</a></li>
      <li class="breadcrumb-item active" aria-current="page">営業部門別売上</li>
    </ul>
  </nav>
  <section class="section">
  <h2 class="heading02">営業部門別売上</h2>

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
      @foreach($sales_department as $value)
        <td>{{ $value->department_name }}</td>
        <td class="text-center">{{ number_format($value->amount) }}円</td>

        </tr>
      @endforeach

      @if($sales_department->isEmpty())
        {!! "<p style='color:red'>$error_text</p>"; !!}
      @endif
    </tbody>
  </table>
  </section>
</div>

@endsection
