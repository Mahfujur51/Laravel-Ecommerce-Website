 <div class="card" style="width: 18rem;">
             <div class="card-header bg-success text-white">
                <h6 class="card-body-title text-white" >Online Shop</h6>
              </div>
              <br>
        
  <ul class="list-group list-group-flush">
    <a href="{{url('/')}}" class="btn btn-sm btn-block btn-success"><i class="fa fa-home"></i>
    Home</a>
    <a href="{{route('user.order')}}" class="btn btn-sm btn-block btn-success"><i class="fa fa-sign-out-alt"></i>Orders</a>
    <a class="btn btn-sm btn-block btn-danger" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </ul>
  
</div>