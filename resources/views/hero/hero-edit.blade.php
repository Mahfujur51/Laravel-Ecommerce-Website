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

        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Update Hero Image
                </div>

                <div class="card-body">

                    <form action="{{route('hero.update',$hero->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label class="form-control-label">Hero Image: <span class="tx-danger">*</span></label>
                  
                  <input type="file" class="upload form-control" accept="image/*" value="{{ asset($hero->image_one) }}"  name="image_one" id="photo" onchange="readURL(this);">
                  <img id="image" src="{{ asset($hero->image_one) }}">
                  @error('image')
                            <span class="text-danger">{{$message}}</span>
                  @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
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