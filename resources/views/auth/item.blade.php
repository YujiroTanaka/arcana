@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="ml-3">Item</h1>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-header bg-secondary">
              <h3 class="card-title pt-1">商品一覧</h3>
              <a class="ml-4" href="item/register">
                <span class="badge bg-white p-2">更新</span>
              </a>              
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>タイトル</th>
                    <th>値段</th>
                    <th>画像</th>
                    <th>更新日</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($items as $item)
                    <tr>
                      <td>{{ $item->title }}</td>
                      <td>¥{{ $item->price }}</td>
                      <td><img src="{{ $item->image_url }}" width="50px" alt="item{{$item->id}}"/></td>
                      <td>{{ $item->created_at }}</td>
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