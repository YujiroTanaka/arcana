@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="ml-3">Blog</h1>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">{{ $blog->title }}</h3>
              <a class="ml-4" href="/admin/blog/edit/{{ $blog->id }}">
                <span class="badge bg-secondary p-2">編集</span>
              </a>              
              <div class="card-tools">
                @if($blog->status)
                  <span class="badge bg-success">公開</span>
                @else
                  <span class="badge bg-secondary">非公開</span>
                @endif
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-message">
                {!! $blog->detail !!}
              </div>
              <!-- /.mailbox-read-message -->
            </div>      </div>
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