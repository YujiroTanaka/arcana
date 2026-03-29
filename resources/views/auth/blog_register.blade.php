@extends('adminlte::page')

@section('title', 'Blog Register')

@section('content_header')
    <h1 class="ml-3">Blog</h1>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ブログ登録</h3>
            </div>
              <div class="card-body">
                {!! Form::open(['files' => true]) !!}
                <div class="form-group">
                  <label>タイトル</label>
                  {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'タイトル']) }}
                </div>
                <div class="form-group">
                  <label>カテゴリ</label>
                  {{ Form::select('category', [
                      'news' => 'NEWS',
                      'order_repair' => 'オーダー・リペア事例',
                      'others' => 'OTHERS'
                  ], 'news', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                  <label>表示日時</label>
                  {{ Form::date('display_date', null, ['class' => 'form-control']) }}
                  <small class="form-text text-muted">フロントに表示される日付です。未設定の場合は作成日が表示されます。</small>
                </div>
                <div class="form-group">
                  <label>サムネイル画像</label>
                  <div id="dropzone" class="dropzone-area">
                    <input type="file" name="thumbnail" id="thumbnail-input" accept="image/*" style="display:none;">
                    <div id="dropzone-placeholder">
                      <i class="fas fa-cloud-upload-alt fa-3x text-muted"></i>
                      <p class="mt-2 mb-0 text-muted">ここに画像をドラッグ＆ドロップ</p>
                      <p class="text-muted"><small>またはクリックしてファイルを選択</small></p>
                    </div>
                    <div id="thumbnail-preview" style="display:none;">
                      <img id="preview-img" src="" alt="preview">
                      <button type="button" id="remove-btn" class="btn btn-sm btn-danger mt-2">削除</button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>本文</label>
                  <div id="quill_editor"></div>
                  <input type="hidden" id="detail" name="detail">
                </div>
                <div class="form-group">
                  <label>ステータス</label>
                  {{ Form::select('status', [0 => '非公開', 1 => '公開'], null, ['class' => 'form-control']) }}
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
<style>
/* Quill ツールバー日本語化 */
.ql-snow .ql-tooltip[data-mode="link"]::before { content: 'URLを入力:'; }
.ql-snow .ql-tooltip::before { content: 'URLを開く:'; }
.ql-snow .ql-tooltip a.ql-action::after { content: '編集'; }
.ql-snow .ql-tooltip a.ql-remove::after { content: '削除'; }
.ql-snow .ql-tooltip[data-mode="video"]::before { content: '動画URLを入力:'; }
.ql-snow .ql-tooltip[data-mode="formula"]::before { content: '数式を入力:'; }
.ql-snow .ql-tooltip.ql-editing a.ql-action::after { content: '保存'; }
.ql-snow .ql-picker.ql-header .ql-picker-label::before,
.ql-snow .ql-picker.ql-header .ql-picker-item::before { content: '本文'; }
.ql-snow .ql-picker.ql-header .ql-picker-label[data-value="1"]::before,
.ql-snow .ql-picker.ql-header .ql-picker-item[data-value="1"]::before { content: '見出し1'; }
.ql-snow .ql-picker.ql-header .ql-picker-label[data-value="2"]::before,
.ql-snow .ql-picker.ql-header .ql-picker-item[data-value="2"]::before { content: '見出し2'; }
.ql-snow .ql-picker.ql-header .ql-picker-label[data-value="3"]::before,
.ql-snow .ql-picker.ql-header .ql-picker-item[data-value="3"]::before { content: '見出し3'; }
.ql-snow .ql-picker.ql-header .ql-picker-label[data-value="4"]::before,
.ql-snow .ql-picker.ql-header .ql-picker-item[data-value="4"]::before { content: '見出し4'; }
.ql-editor { min-height: 15em; }

.dropzone-area {
  border: 2px dashed #ccc;
  border-radius: 8px;
  padding: 30px;
  text-align: center;
  cursor: pointer;
  transition: border-color .2s, background .2s;
}
.dropzone-area.dragover {
  border-color: #007bff;
  background: #f0f7ff;
}
.dropzone-area #preview-img {
  max-width: 100%;
  max-height: 300px;
  border-radius: 4px;
}
</style>
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

  // Dropzone
  (function() {
    var dropzone = document.getElementById('dropzone');
    var input = document.getElementById('thumbnail-input');
    var placeholder = document.getElementById('dropzone-placeholder');
    var preview = document.getElementById('thumbnail-preview');
    var previewImg = document.getElementById('preview-img');
    var removeBtn = document.getElementById('remove-btn');

    function showPreview(file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        previewImg.src = e.target.result;
        placeholder.style.display = 'none';
        preview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }

    dropzone.addEventListener('click', function() {
      if (!preview.style.display || preview.style.display === 'none') input.click();
    });

    input.addEventListener('change', function() {
      if (input.files[0]) showPreview(input.files[0]);
    });

    dropzone.addEventListener('dragover', function(e) {
      e.preventDefault();
      dropzone.classList.add('dragover');
    });

    dropzone.addEventListener('dragleave', function() {
      dropzone.classList.remove('dragover');
    });

    dropzone.addEventListener('drop', function(e) {
      e.preventDefault();
      dropzone.classList.remove('dragover');
      if (e.dataTransfer.files[0] && e.dataTransfer.files[0].type.startsWith('image/')) {
        input.files = e.dataTransfer.files;
        showPreview(e.dataTransfer.files[0]);
      }
    });

    removeBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      input.value = '';
      preview.style.display = 'none';
      placeholder.style.display = 'block';
    });
  })();
</script>
@stop
