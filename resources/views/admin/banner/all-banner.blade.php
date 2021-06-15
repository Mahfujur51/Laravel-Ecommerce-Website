@extends('admin.admin_master')
@section('banner') active show-sub @endsection
@section('manage-banner') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Manage Banner</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-12">    
              <div class="card">
                <div class="card-header bg-primary text-white">
                <h6 class="card-body-title text-white">Banner List</h6>
              </div>    
               
                <div class="table-wrapper  pd-10">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-5p">Sl</th>
                        <th class="wd-15p">Banner Title</th>  
                        <th class="wd-10p">Banner Short Desc</th>  
                        <th class="wd-10p">Banner Short Desc2</th>  
                        <th class="wd-10p">Banner Long Desc</th>  
                        <th class="wd-10p">Banner image</th>
                        <th class="wd-20p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($banner as $row)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ strip_tags($row->small_description) }}</td>
                        <td>{{ $row->small_description2 }}</td>
                        <td>{{ strip_tags($row->big_description) }}</td>
                        <td><img src="{{ asset($row->image) }}" width="50px" height="50px" alt=""></td>
                        
                        <td>
                            <a href="{{url('banner-edit/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="{{url('/banner-delete/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>


    </div>

</div>
@endsection