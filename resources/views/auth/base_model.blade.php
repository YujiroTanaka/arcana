@extends('adminlte::page')

@section('title', 'ARCANAベースモデル')

@section('content_header')
    <h1 class="ml-3">ARCANA ベースモデル</h1>
@stop

@section('content')
    <div class="container-fluid">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-header bg-secondary">
              <h3 class="card-title pt-1">ベースモデル一覧</h3>
              <a class="ml-4" href="base-model/register">
                <span class="badge bg-white p-2">追加</span>
              </a>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>順番</th>
                    <th>画像</th>
                    <th>タイトル</th>
                    <th>URL</th>
                    <th>値段</th>
                    <th>編集</th>
                    <th>削除</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($models as $model)
                    <tr>
                      <td>{{ $model->sort_order }}</td>
                      <td>
                        @if($model->image)
                          <img src="{{ $model->image }}" width="60" alt="{{ $model->title }}">
                        @endif
                      </td>
                      <td>{{ $model->title }}</td>
                      <td>{{ $model->url ? mb_strimwidth($model->url, 0, 30, '...') : '-' }}</td>
                      <td>&yen;{{ number_format($model->price) }}</td>
                      <td>
                        <a href="base-model/edit/{{ $model->id }}">
                          <span class="badge bg-secondary">編集</span>
                        </a>
                      </td>
                      <td>
                        <a href="base-model/delete/{{ $model->id }}" onclick="return confirm('削除しますか？')">
                          <span class="badge bg-danger">削除</span>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop
