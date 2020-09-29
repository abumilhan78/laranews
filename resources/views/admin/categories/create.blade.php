@extends('themes.admin.master')

@push('styles')
      <!-- summernote -->
  <link rel="stylesheet" href="{{asset("/assets/adminlte/plugins/summernote/summernote-bs4.css") }}">
@endpush

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
        </div>
      <!-- /.card-body -->

      <div class="">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    </form>
  </div>
@endsection

@push('scripts')
<script src="{{asset("assets/adminlte/plugins/summernote/summernote-bs4.min.js")}}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endpush