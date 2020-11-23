@extends('layout')

@section('content')

    <div class="contentsArea">
      <section class="section">
        <h2 class="heading02">受注案件一覧</h2>



        @foreach($sales_client as $key)
                    {{ print_r($key) }}
        @endforeach






      </section>
    </div>

@endsection
