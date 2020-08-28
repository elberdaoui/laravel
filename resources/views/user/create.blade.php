@section('title', 'Add User')
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
            <strong>Add User</strong>
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
            @if (session('succes'))
                <div class="alert alert-success col-sm-12 text-center text-monospace">
                    {{ session('succes') }}
                </div>
            @endif
            <div class="col-lg-12">
            <form action="{{ url('userstore') }}" method="post" name="form_add_user" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-username">User Name <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-username" class="form-control"  placeholder="Username"   name="user_name"  type="text" data-validation="[NOTEMPTY]" data-validation-message="User Name must not be empty!">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Password <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="password" class="form-control"  placeholder="password"   name="password"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Password must not be empty!">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">User Detail</label>
                    <textarea class="description" rows="4" id="l15" name="user_description" placeholder="User description"></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Email <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="email" class="form-control"  placeholder="Email"   name="email"  type="email" data-validation="[NOTEMPTY]" data-validation-message="Email must not be empty!">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image" style="margin-top:9px;">Profile Picture</label>
                            <input class="form-control"  placeholder="image"   name="picture_user"  type="file" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div> 
               </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary width-150" >Submit</button>
                    <button type="reset" class="btn btn-warning width-150" >Reset</button>
                    <a href="{{ url('userCreate')}}"  class="btn btn-default">Cancel</a>
                </div>
			</form>
            </div>
 
        </div>
    </div>
</section>

<script>
        $(document).ready(function() {
            $('.description').summernote();
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
