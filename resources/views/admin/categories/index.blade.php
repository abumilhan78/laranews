@extends('themes.admin.master')
@section('nav-categories', 'active')

@section('create')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <span class="fa fa-plus-square"></span> Add Category
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
        <form action="{{route('category.store')}}" method="POST">
          @csrf
          {{ method_field('POST') }}
          <div class="form-group">
            <label for="Category">Category Name</label>
            <input type="text" class="form-control" id="Category" name="title">
          </div>
          
           </div>
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
                    <th>No</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($category as $key)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$key->title}}</td>
                    <td>
                      <a href="{{route('category.show', $key->id)}}" class="btn btn-outline-info">Lihat</a>
                      <a href="{{route('category.edit', $key->id)}}" class="btn btn-outline-warning">Edit</a>
                      <form action="{{route('category.destroy', $key->id)}}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-outline-danger">Hapus</button>
                      </form>
                    </td>
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