@section('title', 'Add Bricoler')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<section class="card">
   <div class="card-header">
        <div class="dropdown pull-right">
           <a href="{{ url('bricoler/create')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add bricoler &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Add bricoler</strong>
        </span>
    </div>
    <div class="card-body">
        <div class="row">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif


       


            <div class="col-lg-12">
			 {!! Form::open(array('route' => 'bricoler.store','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation','enctype'=>'multipart/form-data')) !!}
				<div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="validation-bricolername">Name <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-bricolername" class="form-control"  placeholder="Name"   name="nom"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Bricoler Name must not be empty!">
                        </div>
                    </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                            <label for="validation-bricolerpre">LastName <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-bricolerpre" class="form-control"  placeholder="LastName"   name="prenom"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Bricoler prenom must not be empty!">
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                            <label for="validation-bricolertel">Phone <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-bricolertel" class="form-control"  placeholder="Phone"   name="telephone"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Bricoler telephone must not be empty!">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="CIN">CIN <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-CIN" class="form-control"  placeholder="CIN"   name="CIN"  type="text" data-validation="[NOTEMPTY]" data-validation-message="CIN must not be empty!">
                        </div>
                    </div>

                     <div class="col-lg-3">
                        <div class="form-group">
                            <label for="email">email <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-email" class="form-control"  placeholder="Email"   name="email"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Email must not be empty!">
                        </div>
                    </div>

                     <div class="col-lg-3">
                        <div class="form-group">
                            <label for="image">Picture <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-image" class="form-control"    name="image"  type="file" data-validation="[NOTEMPTY]" data-validation-message="Picture must not be empty!">
                        </div>
                    </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                            <label for="lat">Maps <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="lat" class="form-control"    name="lat"  type="text" placeholder="Lat" data-validation="[NOTEMPTY]" data-validation-message="lat must not be empty!">
                             <input id="lng" class="form-control"    name="lng" placeholder="Lng" type="text" data-validation="[NOTEMPTY]" data-validation-message="lng must not be empty!">
                        </div>
                    </div>
                        <div class="col-lg-3">
                        <div class="form-group">
                            <label for="ville_id">Villes <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                              <select type="text" class="form-control" name="ville_id" id="ville_id">
                                                @foreach($villes as $ville)
                                                    <option value="{{ $ville->id}}">{{ $ville->nom_ville}}</option>
                                                @endforeach
                                            </select>
                        </div>
                    </div>
                    
                          <div class="col-lg-3">
                        <div class="form-group">
                            <label for="secteur_id">Secteurs <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                              <select type="text" class="form-control" name="secteur_id" id="secteur_id">
                                                @foreach($secteurs as $secteur)
                                                    <option value="{{ $secteur->id}}">{{ $secteur->nom_secteur}}</option>
                                                @endforeach
                                            </select>
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                            <label for="user_id">User <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                              <select type="text" class="form-control" name="user_id" id="user_id">
                                                @foreach($users as $user)
                                                    <option value="{{ $user->user_id}}">{{ $user->username}}</option>
                                                @endforeach
                                            </select>
                        </div>
                    </div>
                
                     <div class="col-lg-3 d-flex align-items-center pt-4">
                        <div class="form-group  ">
                            <label class="form-control-label">Approuver &nbsp; &nbsp; &nbsp; &nbsp;</label>
                            <input type="checkbox" name="approuver" checked value="1" >
                        </div>
                     </div>  
                </div>
            
             
              
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary width-150" >Submit</button>
                    <button type="reset" class="btn btn-warning width-150" >Reset</button>
                    <a href="{{ url('admin')}}"  class="btn btn-default">Cancel</a>
                </div>
			{!! Form::close() !!}
            </div>
 
        </div>
    </div>
</section>

<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
<script>
    $(function () {

        // Datatables
        $('#example1').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25,50, 100, 200, "All"]],
            responsive: true,
            "autoWidth": false
        });

    })
</script>
<!-- END: page scripts -->
<!-- END: page scripts -->
<!-- START: page scripts -->
<script>
    $( function() {
		$("#m_section_name").html("Pages");
        ///////////////////////////////////////////////////////////
        // tooltips
        $("[data-toggle=tooltip]").tooltip();

        ///////////////////////////////////////////////////////////
        // chart1
        new Chartist.Line(".chart-line", {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            series: [
                [5, 0, 7, 8, 12],
                [2, 1, 3.5, 7, 3],
                [1, 3, 4, 5, 6]
            ]
        }, {
            fullWidth: !0,
            chartPadding: {
                right: 40
            },
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });

        ///////////////////////////////////////////////////////////
        // chart 2
        var overlappingData = {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    series: [
                        [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                        [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                    ]
                },
                overlappingOptions = {
                    seriesBarDistance: 10,
                    plugins: [
                        Chartist.plugins.tooltip()
                    ]
                },
                overlappingResponsiveOptions = [
                    ["", {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0]
                            }
                        }
                    }]
                ];

        new Chartist.Bar(".chart-overlapping-bar", overlappingData, overlappingOptions, overlappingResponsiveOptions);

        ///////////////////////////////////////////////////////////
        // custom scroll
        if (!('ontouchstart' in document.documentElement) && jQuery().jScrollPane) {
            $('.custom-scroll').each(function() {
                $(this).jScrollPane({
                    contentWidth: '100%',
                    autoReinitialise: true,
                    autoReinitialiseDelay: 100
                });
                var api = $(this).data('jsp'),
                        throttleTimeout;
                $(window).bind('resize', function() {
                    if (!throttleTimeout) {
                        throttleTimeout = setTimeout(function() {
                            api.reinitialise();
                            throttleTimeout = null;
                        }, 50);
                    }
                });
            });
        }

    } );
</script>
<script>
    $(function() {

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

       
    });
</script>
<!-- END: page scripts -->
@include('components/footer')
