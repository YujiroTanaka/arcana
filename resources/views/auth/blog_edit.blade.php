@extends('adminlte::page')

@section('title', 'Blog Edit')

@section('content_header')
    <h1 class="ml-3">Blog</h1>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ブログ編集</h3>
            </div>
              <div class="card-body">
                {!! Form::open() !!}
                <div class="form-group">
                  <label>タイトル</label>
                  {{ Form::text('title', $blog->title, ['class' => 'form-control', 'placeholder' => 'タイトル']) }}
                </div>
                <div class="form-group">
                  <label>カテゴリ</label>
                  {{ Form::select('category', [
                      'news' => 'NEWS',
                      'order_repair' => 'オーダー・リペア事例',
                      'others' => 'OTHERS'
                  ], $blog->category ?? 'news', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                  <label>サムネイル画像URL</label>
                  {{ Form::text('thumbnail_url', $blog->thumbnail_url, ['class' => 'form-control', 'placeholder' => 'https://...']) }}
                </div>
                <div class="form-group">
                  <label>本文</label>
                  <div id="quill_editor">{!! $blog->detail !!}</div>
                  <input type="hidden" id="detail" name="detail">
                </div>
                <div class="form-group">
                  <label>ステータス</label>
                  {{ Form::select('status', [0 => '非公開', 1 => '公開'], $blog->status, ['class' => 'form-control']) }}
                </div>
                {{ Form::submit('送信', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
              </div>
          </div>
        </div>
      </div>
    </div>
@stop

@section('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@stop

@section('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript" src="/js/quillcustom.js"></script>
<script>
  var detail = document.getElementById('quill_editor');
  var detailInput = document.getElementById('detail');
  var quill = quillEditor("quill_editor");
  quill.on('text-change', function() {
    var editorHtml = detail.querySelector('.ql-editor').innerHTML;
    detailInput.value = editorHtml;
  });
</script>
@stop
