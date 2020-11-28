@extends('layout')

@section('content')

    <div class="contentsArea">
      <section class="section">
        <h2 class="heading02">クライアント別売上</h2>

        @include('search-02')
<table class="table-02 mt-5 mx-auto">
<thead>
  <tr>
    <th>クライアント名</th>
    <th>売上金額</th>
  </tr>
</thead>
<tbody>
    <tr>
  @foreach($sales_client as $value)
<td>{{   $value->client_name   }}</td>
<td>{{   $value->amount   }}</td>

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
