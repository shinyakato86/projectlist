@extends('layout')

@section('content')
    <section class="section">
    <div class="contentsArea">
    <h2 class="heading02">新しい投稿の作成</h2>

    <div class="formArea">
    {{ Form::open(['route' => 'projectlist.store']) }}
        <div class='form-group'>
            {{ Form::label('name', '案件名:') }}
            {{ Form::text('name', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('address', '営業部門情報:') }}
            {{ Form::text('address', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('coment', '担当者名:') }}
            {{ Form::text('address', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('name', 'クライアント名:') }}
            {{ Form::text('name', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('name', '金額:') }}
            {{ Form::text('name', null) }}
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
