@extends('adminlte::page')

@section('title', 'オーダー事例編集')

@section('content_header')
    <h1 class="ml-3">オーダー事例</h1>
@stop

@section('content')
    <div class="container-fluid">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">オーダー事例編集</h3>
            </div>
            <form action="/admin/order-example/edit/{{ $example->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>タイトル</label>
                  <input type="text" name="title" class="form-control" value="{{ $example->title }}" required>
                </div>
                <div class="form-group">
                  <label>URL</label>
                  <input type="url" name="url" class="form-control" value="{{ $example->url }}" placeholder="https://theend0304.base.shop/items/...">
                </div>
                <div class="form-group">
                  <label>現在の画像</label><br>
                  @if($example->image)
                    <img src="{{ $example->image }}" width="200" alt="{{ $example->title }}" class="mb-2">
                  @else
                    <p class="text-muted">未設定</p>
                  @endif
                </div>
                <div class="form-group">
                  <label>画像変更</label>
                  <input type="file" name="image" class="form-control-file" accept="image/*">
                </div>
                <div class="form-group">
                  <label>値段</label>
                  <input type="number" name="price" class="form-control" value="{{ $example->price }}" required>
                </div>
                <div class="form-group">
                  <label>表示順（小さいほど先に表示）</label>
                  <input type="number" name="sort_order" class="form-control" value="{{ $example->sort_order }}">
                </div>
                <button type="submit" class="btn btn-primary">更新</button>
                <a href="/admin/order-example" class="btn btn-secondary ml-2">戻る</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@stop
