@extends('admin.admin_master')
@section('hero') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Coupon</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-8">    
              <div class="card">
              <div class="card-header bg-primary text-white">
                <h6 class="card-body-title text-white">Hero Image List</h6>
              </div>
                 
                <br>   
                <div class="table-wrapper  pd-10">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Sl</th>
                        <th class="wd-15p">Hero Image</th>  
                        <th class="wd-25p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php
                            $i = 1;
                        @endphp
                        @foreach($hero as $row)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{<img src="{{ asset($row->image_one) }}" width="50px" height="50px" alt=""></td>
                        <td>
                            <a href="{{url('hero-edit/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="{{url('hero-delete/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                            
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">Add Hero Image
                </div>

                <div class="card-body">

                    <form action="{{ route('store.hero') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label class="form-control-label">Hero Image: <span class="tx-danger">*</span></label>
                  
                  <input type="file" class="upload form-control" accept="image/*"  name="image_one" id="photo" onchange="readURL(this);">
                  <img id="image" src="#">
                  @error('image')
                            <span class="text-danger">{{$message}}</span>
                  @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>




                </div>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript">
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e){
                $('#image')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


@endsection