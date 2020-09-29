@extends('themes.admin.master')
@section('nav-articles', 'active')
@push('styles')
  <script type="text/javascript" src="{{asset("/assets/ckeditor/ckeditor.js")}}"></script>
@endpush
@section('create')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <span class="fa fa-plus-square"></span>Add Article
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          {{ method_field('POST') }}
         
          <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
          <div class="form-group">
            <label for="Category">Title</label>
            <input type="text" class="form-control" id="Category" name="title">
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <textarea type="text" id="editor1" class="form-control" rows="5" name="description" required></textarea>
          </div>
          <div class="form-group">
          <label for="">Image</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>
        <div class="form-group">
          <label>Categories</label>
          <select class="custom-select" name="category_id">
            @foreach ($category as $dt)
          <option value="{{$dt->id}}">{{$dt->title}}</option>
            @endforeach
          </select>
      </div>
      </div> {{-- modal-body --}}
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </form>
    </div>
  </div>
</div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Articles Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Writer</th>
                  <th>Category</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($article as $key)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$key->title}}</td>
                    <td>{{$key->description}}</td>
                    <td><img src="{{asset("storage/".$key->image)}}" alt="" width="128"></td>
                    <td>{{$key->user->name}}</td>
                    <td>{{$key->category->title}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection

@push('scripts')
<script>
  CKEDITOR.replace('editor1');
  CKEDITOR.stylesSet.add('myStyles', [{
      name: 'Custom Span',
      element: 'span'
}]);
  CKEDITOR.config.stylesSet = 'myStyles';
  CKEDITOR.config.height = 150;
</script>
<script>
  $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush