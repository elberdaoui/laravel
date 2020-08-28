@section('title', 'City List')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<section class="card">
   <div class="card-header">
        <div class="dropdown pull-right">
           <a href="{{ url('villeCreate')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add City &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>City list</strong>
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
                      <th scope="col">City name</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($villes as $ville)
                            <tr>
                                <td>{{$ville->nom_ville}}</td>
                                <td class="pt-2"><a href="{{url('villeEdit',$ville->id)}}" class="btn btn-sm  btn-outline-primary"><span class="icmn-pencil"></span></a></td>
                                <td class="pt-2">
                                <form action="{{ url('villeDestroy/'.$ville->id) }}" method="post">
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
