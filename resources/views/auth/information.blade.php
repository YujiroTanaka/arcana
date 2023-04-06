@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="ml-3">Information</h1>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-header bg-secondary">
              <h3 class="card-title pt-1">お知らせ一覧</h3>
              <a class="ml-4" href="information/register">
                <span class="badge bg-white p-2">追加</span>
              </a>              
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>お知らせ日時</th>
                    <th>内容</th>
                    <th>作成日</th>
                    <th>編集</th>
                    <th>削除</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($informations as $information)
                    <tr>
                      <td>{{ $information->id }}</td>
                      <td>{{ $information->information_date ? $information->information_date->format('Y年m月d日') : '' }}</td>
                      <td>{{ $information->detail }}</td>
                      <td>{{ $information->created_at }}</td>
                      <td>
                        <a href="information/edit/{{ $information->id }}">
                          <span class="badge bg-secondary p-2">編集</span>
                        </a>
                      </td>
                      <td>
                        <a href="information/delete/{{ $information->id }}">
                          <span class="badge bg-danger p-2">削除</span>
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