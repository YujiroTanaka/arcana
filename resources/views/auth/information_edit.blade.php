@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="ml-3">Information</h1>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">お知らせ編集</h3>
            </div>
              <div class="card-body">
                {!! Form::open() !!}
                <div class="form-group">
                  <label for="exampleInputEmail1">お知らせ日時</label>
                  {{ Form::text('information_date', $information->information_date,[ 'class' => 'form-control','placeholder'=>'お知らせ日時']) }}
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">内容</label>
                  {{ Form::text('detail', $information->detail,[ 'class' => 'form-control','placeholder'=>'内容','required'=>'required']) }}
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">ステータス</label>
                  {{ Form::select('status', [0,1], $information->status, ['class' => 'form-control']) }}
                </div>
                {{Form::submit('送信', ['class'=>'btn btn-primary'])}}
              {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  @stop
