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
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>タイトル</th>
                    <th>ステータス</th>
                    <th>作成日</th>
                    <th>編集日</th>
                    <th>詳細</th>
                    <th>編集</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($blogs as $blog)
                    <tr>
                      <td>{{ $blog->id }}</td>
                      <td>
                        {{ mb_substr($blog->title, 0, 20) }}
                        @if (mb_strlen($blog->title) > 20)
                          ...
                        @endif
                      </td>
                      <td>{{ [0=>'非公開', 1=>'公開'][$blog->status] }}</td>
                      <td>{{ $blog->created_at }}</td>
                      <td>{{ $blog->updated_at }}</td>
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
    <script src="~/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="~/lib/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $("#example").DataTable();
        });
    </script>
@stop