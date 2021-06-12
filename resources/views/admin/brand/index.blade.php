@extends('admin.admin_master')
@section('brand') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-8">    
              <div class="card">
              <div class="card-header bg-primary text-white"><h6 class="card-body-title text-white">Brand List</h6></div> 
              <br>   
                <div class="table-wrapper pd-10">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Sl</th>
                        <th class="wd-15p">Brand Name</th>
                        <th class="wd-20p">Status</th>  
                        <th class="wd-25p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($brands as $brand)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $brand->brand_name }}</td>
                        <td>
                            @if($brand->status == 1)
                            <span class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i> Active</span>
                            @else 
                            <span class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i> Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/brand/edit/'.$brand->id) }}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="{{ url('admin/brand/delete/'.$brand->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i> Delete</a>
                            @if($brand->status == 1)
                            <a href="{{ url('admin/brand/inactive/'.$brand->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i> Inactive</a>
                            @else
                            <a href="{{ url('admin/brand/active/'.$brand->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i> Active</a>
                            @endif
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
                <div class="card-header bg-primary text-white">Add Brand
                </div>

                <div class="card-body">

                    <form action="{{ route('store.brand') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Add Brand</label>
                          <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand">

                          @error('brand_name')
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
@endsection