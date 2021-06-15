@extends('admin.admin_master')
@section('banner') active show-sub @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Add Banner</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row">
        <div class="card">
        <div class="card-header bg-primary text-white" >
                <h2 class="card-body-title text-white pl-2" style="font-size:15px;">Add New Banner</h2>
              </div>
      <form action="{{route('banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
          <div class="form-layout  pd-10">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Banner Title: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="title" placeholder="Enter Product Name" value="{{$banner->title}}">
                  @error('title')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                
                  <label class="form-control-label">Banner Image: <span class="tx-danger">*</span></label>
                  
                  <input type="file" class="upload form-control" accept="image/*" value="{{ asset($banner->image) }}"  name="image" id="photo" onchange="readURL(this);">
                  <img id="image" src="{{ asset($banner->image) }}" width="50%">
                  @error('image')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Small Desc: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="small_description2" placeholder="Enter Product Name" value="{{$banner->small_description2}}">
                  @error('small_description2')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Small Desc: <span class="tx-danger">*</span></label>
                  <textarea name="small_description" id="summernote">{{$banner->small_description}}</textarea>
                  @error('small_description')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Big Desc: <span class="tx-danger">*</span></label>
                  <textarea name="big_description" id="summernote2">{{$banner->big_description}}</textarea>
                  @error('big_description')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->

              </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Update Banner</button>
            </div><!-- form-layout-footer -->
          
          </div><!-- form-layout -->
        </form>
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