@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Contact</h1>
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">{{ $contact->type }}のお問い合わせ</h3>

              <div class="card-tools">
                @if($status != 1)
                  <a href="{{ $contact->id + 1 }}" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                @endif
                @if($status != 2)
                  <a href="{{ $contact->id - 1 }}" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                @endif
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5 style="margin-bottom:5px">{{ $contact->name }} 様</h5>
                <h6>{{ $contact->email }}
                  <span class="mailbox-read-time float-right">{{ $contact->created_at }}</span>
                </h6>
                @if($contact->phone)
                  <h6>{{ $contact->phone }}</h6>
                @endif
              </div>
              <div class="mailbox-read-message">
                {!! nl2br(e($contact->msg)) !!}
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