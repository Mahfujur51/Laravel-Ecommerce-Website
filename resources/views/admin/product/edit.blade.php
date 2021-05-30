@extends('admin.admin_master')
@section('products') active show-sub @endsection
@section('manage-product') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Edit Products</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Edit Product</h6>
      <form action="{{ route('update-products')}}" method="POST" enctype="multipart/form-data">
      @csrf

      <input type="hidden" name="id" value="{{$products->id}}">
          <div class="form-layout">
          
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{$products->product_name}}">
                  @error('product_name')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code"  value="{{$products->product_code}}">
                  @error('product_code')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="price" value="{{$products->price}}">
                  @error('price')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="product_quantity" value="{{$products->product_quantity}}">
                  @error('product_quantity')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id" data-placeholder="Choose country">
                    <option label="Choose category"></option>
                    
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{ $category->id == $products->category_id ? "selected" : "" }}>{{$category->category_name}}</option>
                     @endforeach
                     
                  </select>
                  @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="brand_id" data-placeholder="Choose country">
                      
                    <option label="Choose Brand"></option>
                   
                    @foreach ($brands as $brand)
                    <option value="{{$brand->id}}"  {{ $brand->id == $products->brand_id ? "selected" : "" }}>{{ $brand->brand_name }}</option>
                    @endforeach
                    
                  </select>
                  @error('brand_id')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
            

            <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                  <textarea name="short_description" id="summernote">{{$products->short_description}}</textarea>
                </div>
                @error('short_description')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
              </div><!-- col-lg-8 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                  <textarea name="long_description" id="summernote2">{{$products->long_description}}</textarea>
                </div>
                @error('long_description')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
              </div><!-- col-lg-8 -->
                </div>
              <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Update Data</button>
            </div><!-- form-layout-footer -->
              </form>
              <form action="{{ route('update-image')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$products->id}}">
      <input type="hidden" name="img_one" value="{{$products->image_one}}">
      <input type="hidden" name="img_two" value="{{$products->image_two}}">
      <input type="hidden" name="img_three" value="{{$products->image_three}}">
            <div class="row row-sm">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main Thumbnail: <span class="tx-danger">*</span></label>
                  <img src="{{asset($products->image_one)}}" alt="" height="120px" width="120px">
                </div>
              </div><!-- col-4 -->

              

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                  <img src="{{asset($products->image_two)}}" alt="" height="120px" width="120px">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                  <img src="{{asset($products->image_three)}}" alt="" height="120px" width="120px">
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main Thumbnail: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_one">
                  @error('image_one')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_two" value="{{$products->image_two}}">
                  @error('image_two')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->

              

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_three" value="{{$products->image_three}}">
                  @error('image_three')
                            <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div><!-- col-4 -->

              </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Update Image</button>
            </div><!-- form-layout-footer -->
          
          </div><!-- form-layout -->
        </form>
        </div>
    </div>

</div>
@endsection