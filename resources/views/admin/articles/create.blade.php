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
    <form method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
      @csrf
      {{ method_field('POST') }}
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label>Categories</label>
            <select class="custom-select">
              <option>option 1</option>
              <option>option 2</option>
              <option>option 3</option>
              <option>option 4</option>
              <option>option 5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <div class="pad">
                <div class="mb-3">
                  <textarea class="textarea" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Image</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="dodol" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
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