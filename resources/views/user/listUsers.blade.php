@section('title', 'User List')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<section class="card">
   <div class="card-header">
        <div class="dropdown pull-right">
           <a href="{{ url('userCreate')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add User &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>User list</strong>
        </span>
    </div>
    @if (session('succes'))
                <div class="alert alert-success col-sm-12 text-center text-monospace">
                    {{ session('succes') }}
                </div>
            @endif
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                      <th scope="col">Username</th>
                      <th scope="col">Description</th>
                      <th scope="col">Email</th>
                      <th scope="col">Profile_image</th>
                      <th scope="col">Role</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                            <td>{!!$user->description!!}</td>
                            <td>{{$user->email}}</td>
                            <td><img src="{{ asset('storage/users/'.$user->profile_image) }}" alt=""></td>
                            <td>{{$user->role}}</td>
                            <td class="pt-2"><a href="{{url('userEdit',$user->user_id)}}" class="btn btn-sm  btn-outline-primary"><span class="icmn-pencil"></span></a></td>
                            <td class="pt-2">
                              <form action="{{ url('userDestroy/'.$user->user_id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-sm btn-outline-danger"><span class="icmn-bin"></span></button>
                            </form>
                            </td>
                        </tr>
                      @endforeach 
                  </tbody>
                </table>  
            </table>
          </div>
    </div>
</section>
@include('components/footer')
