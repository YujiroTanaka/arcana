@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Contact</h1>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-secondary">
              <h3 class="card-title">お問い合わせ</h3>

              <div class="card-tools">
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ご用件</th>
                    <th>お名前</th>
                    <th>メールアドレス</th>
                    <th>内容</th>
                    <th>日時</th>
                    <th>詳細</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($contacts as $contact)
                    <tr>
                      <td>{{ $contact->type }}</td>
                      <td>{{ $contact->name }}</td>
                      <td>{{ $contact->email }}</td>
                      <td class="msg">
                        {{ mb_substr($contact->msg, 0, 20) }}
                        @if (mb_strlen($contact->msg) > 20)
                          ...
                        @endif
                      </td>
                      <td>{{ $contact->created_at }}</td>
                      <td>
                        <a href="contact/{{ $contact->id }}">
                          <span class="badge bg-secondary">詳細</span>
                        </a>
                      </td>
                    </tr>
                  </a>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
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