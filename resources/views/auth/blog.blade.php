@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="ml-3">Blog</h1>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-header bg-secondary">
              <h3 class="card-title pt-1">ブログ一覧</h3>
              <a class="ml-4" href="blog/register">
                <span class="badge bg-white p-2">追加</span>
              </a>              
            </div>
            <div class="card-body table-responsive p-0">
              <form method="POST" action="{{ url('admin/blog/top-position') }}">
                @csrf
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>タイトル</th>
                      <th>ステータス</th>
                      <th>カテゴリ</th>
                      <th>表示日時</th>
                      <th>TOP表示</th>
                      <th>作成日</th>
                      <th>詳細</th>
                      <th>編集</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($blogs as $blog)
                      <tr @if($blog->top_position) class="table-info" @endif>
                        <td>{{ $blog->id }}</td>
                        <td>
                          {{ mb_substr($blog->title, 0, 20) }}
                          @if (mb_strlen($blog->title) > 20)
                            ...
                          @endif
                        </td>
                        <td>{{ [0=>'非公開', 1=>'公開'][$blog->status] }}</td>
                        <td>{{ ['news' => 'NEWS', 'order_repair' => 'オーダー・リペア事例', 'others' => 'OTHERS'][$blog->category] }}</td>
                        <td>{{ $blog->display_date ? $blog->display_date->format('Y.m.d') : $blog->created_at->format('Y.m.d') }}</td>
                        <td>
                          <select name="positions[{{ $blog->id }}]" class="form-control form-control-sm top-position-select">
                            <option value="">--</option>
                            <option value="1" @if($blog->top_position == 1) selected @endif>枠1（左・大）</option>
                            <option value="2" @if($blog->top_position == 2) selected @endif>枠2（右上）</option>
                            <option value="3" @if($blog->top_position == 3) selected @endif>枠3（右下）</option>
                          </select>
                        </td>
                        <td>{{ $blog->created_at->format('Y.m.d') }}</td>
                        <td>
                          <a href="blog/detail/{{ $blog->id }}">
                            <span class="badge bg-secondary">詳細</span>
                          </a>
                        </td>
                        <td>
                          <a href="blog/edit/{{ $blog->id }}">
                            <span class="badge bg-secondary">編集</span>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="save-top-btn">TOP表示を保存</button>
                  <span class="ml-3 text-muted" id="top-count"></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  @stop

@section('css')
    <link rel="stylesheet" href="~/lib/datatables.net-bs/css/dataTables.bootstrap.min.css" />
@stop

@section('js')
<script>
$(function () {
    function validatePositions() {
        var selects = $('.top-position-select');
        var used = {};
        var count = 0;
        var hasError = false;

        selects.each(function () {
            $(this).removeClass('is-invalid');
        });

        selects.each(function () {
            var val = $(this).val();
            if (!val) return;
            count++;
            if (used[val]) {
                $(this).addClass('is-invalid');
                used[val].addClass('is-invalid');
                hasError = true;
            } else {
                used[val] = $(this);
            }
        });

        if (count > 3) hasError = true;
        $('#save-top-btn').prop('disabled', hasError);
        $('#top-count').text('選択中: ' + count + ' / 3');
        if (count > 3) $('#top-count').addClass('text-danger').removeClass('text-muted');
        else $('#top-count').removeClass('text-danger').addClass('text-muted');
    }

    $('.top-position-select').on('change', validatePositions);
    validatePositions();
});
</script>
@stop