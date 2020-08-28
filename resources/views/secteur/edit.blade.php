@section('title', 'Add Sector')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<section class="card">
   <div class="card-header">
        <div class="dropdown pull-right">
           <a href="{{ url('secteurCreate')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Sector &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Edit Sector</strong>
        </span>
    </div>
    <div class="card-body">
        <div class="row">
            @if (session('succes'))
                <div class="alert alert-success col-sm-12 text-center text-monospace">
                    {{ session('succes') }}
                </div>
            @endif
            <div class="col-lg-12">
            <form action="{{ url('sectorUpdate',$sector->id) }}" method="post" name="form_add_secteur" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-sector">Sector Name<span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                        <input id="validation-sector" value="{{$sector->nom_secteur}}" class="form-control"  placeholder="Sector Name"   name="sector_name"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Sector nae  must not be empty!">
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary width-150" >Submit</button>
                    <button type="reset" class="btn btn-warning width-150" >Reset</button>
                    <a href="{{ url('listSectors')}}"  class="btn btn-default">Cancel</a>
                </div>
			</form>
            </div>
 
        </div>
    </div>
</section>
@include('components/footer')
