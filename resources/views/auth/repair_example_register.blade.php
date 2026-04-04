@extends('adminlte::page')

@section('title', 'リペア事例登録')

@section('content_header')
    <h1 class="ml-3">リペア事例</h1>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">リペア事例登録</h3>
            </div>
            <form action="/admin/repair-example/register" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>タイトル</label>
                  <input type="text" name="title" class="form-control" placeholder="リペア事例名" required>
                </div>
                <div class="form-group">
                  <label>URL</label>
                  <input type="url" name="url" class="form-control" placeholder="https://...">
                </div>
                <div class="form-group">
                  <label>画像</label>
                  <input type="file" name="image" class="form-control-file" accept="image/*">
                </div>
                <div class="form-group">
                  <label>値段</label>
                  <input type="number" name="price" class="form-control" placeholder="10000" required>
                </div>
                <div class="form-group">
                  <label>表示順（小さいほど先に表示）</label>
                  <input type="number" name="sort_order" class="form-control" value="0">
                </div>
                <button type="submit" class="btn btn-primary">登録</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@stop
