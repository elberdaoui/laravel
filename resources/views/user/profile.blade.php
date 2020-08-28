@section('title', 'My Profile')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<!-- START: apps/profile -->
<nav class="cat__core__top-sidebar cat__core__top-sidebar--bg">
    <div class="row">
        <div class="col-xl-8 offset-xl-4">
            <h2>
			     <span class="text-black">
					<strong>{{ Auth::user()->name }}</strong>
				</span>
			    <small class="text-muted">{{ Auth::user()->email }}</small>
            </h2>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-xl-4">
        <section class="card cat__apps__profile__card" style="background-image: url({!! asset('/dist/modules/dummy-assets/common/img/photos/4.jpeg') !!}">
            <div class="card-body text-center">
                 <?php
                    if(isset(Auth::user()->user_id) && isset(Auth::user()->profile_image) && !empty(Auth::user()->profile_image))
                    {
                        $profileimage=Auth::user();
                   ?>   
                    <a class="cat__core__avatar cat__core__avatar--border-white cat__core__avatar--110" href="javascript:void(0);">
                        <img src="{{asset('/storage/'.$profileimage->profile_image)}}" alt="Alternative text to the image">
                    </a>   
                   <?php }else{ ?>
                          <a class="cat__core__avatar cat__core__avatar--border-white cat__core__avatar--110" href="javascript:void(0);">
                             <img src="{{asset('/upload/profileimage/profile.jpg') }}" alt="Alternative text to the image">
                           </a>
                   <?php } ?>
                
                <br />
                <br />
                <div class="btn-group btn-group-justified" aria-label="" role="group">
                    <div class="btn-group">
                        <button type="button" class="btn width-150 swal-btn-success">Follow</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn width-150 swal-btn-success-2">Add to Friend</button>
                    </div>
                </div>
                <br />
                <p class="text-white">
                    Last activity: {{date('d-M-y -  H:i', strtotime(Auth::user()->created_at))}}
                </p>
            </div>
        </section>
    </div>
    <div class="col-xl-8">
        <section class="card">
            <div class="card-body">
                <div class="nav-tabs-horizontal">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript: void(0);" data-toggle="tab" data-target="#posts" role="tab">
                                <i class="icmn-eye"></i>
                                View Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#messaging" role="tab">
                                <i class="icmn-pencil2"></i>
                                Edit Detail
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content py-4">
                        <div class="tab-pane active" id="posts" role="tabcard">
                            <h5 class="text-black mt-4">
                                <strong>Personal Information</strong>
                            </h5>
                             @if ($message = Session::get('error'))
                                <div class="alert alert-danger" role="alert" id="id">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Oh snap! </strong> {{ $message }}
                                </div>
                            @endif
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert" id="id">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Well done! </strong>&nbsp; {{ $message }} !
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group"><br>
                                        <label class="form-control-label" for="l6"><b>Profile Image</b></label><br><br>
                                        <img src="{{asset('/storage/'.$profileimage->profile_image)}}" style="height: 300px;"><br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l0"><b>Name</b></label>
                                        <p>{{ Auth::user()->username }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l0"><b>Role</b></label>
                                        <p>{{ Auth::user()->role }}</p>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l1"><b>Email</b></label>
                                        <p>{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group"><br>
                                        <label class="form-control-label" for="l6"><b>Description</b></label><br><br>
                                        <p>{{ Auth::user()->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="messaging" role="tabcard">
                            <h5 class="text-black mt-4">
                                <strong>Edit Information</strong>
                            </h5><br>
                           {!! Form::open(array('url' => ['/update/'.$profileimage->user_id],'method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group"><br>
                                        <label class="form-control-label" for="l6"><b>Profile Image</b></label><br><br>
                                        <img src="{{asset('/storage/'.$profileimage->profile_image)}}" style="height: 300px;">&nbsp; &nbsp;&nbsp; &nbsp;
                                        <input type="hidden" name="profile_image" value="{{ Auth::user()->profile_image }}">
                                        <input type="file" name="picture_user">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l0"><b>Name</b></label>
                                        <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l1"><b>Role</b></label>
                                        <select name="role" class="form-control" >
                                            <option value="Admin" @if(Auth::user()->role == 'Admin') selected @endif>Admin</option>
                                            <option value="User" @if(Auth::user()->role == 'User') selected @endif>User</option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l3"><b>Email</b></label>
                                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l6"><b>Description</b></label>
                                        <textarea name="user_description" class="form-control" cols="10" rows="5">{{ Auth::user()->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="form-group">
                                    <button type="submit" class="btn width-200 btn-primary">Update Profile</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- END: apps/profile -->
<script>
    $('#id').delay(3000).fadeOut('fast');
</script>
<!-- START: page scripts -->
<script>
    $(function() {
		$("#m_section_name").html("Our Profile");
        ///////////////////////////////////////////////////////////
        // ADJUSTABLE TEXTAREA
        autosize($('.adjustable-textarea'));

        ///////////////////////////////////////////////////////////
        // CALENDAR
        $('.example-calendar-block').fullCalendar({
            //aspectRatio: 2,
            height: 450,
            header: {
                left: 'prev, next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            buttonIcons: {
                prev: 'none fa fa-arrow-left',
                next: 'none fa fa-arrow-right',
                prevYear: 'none fa fa-arrow-left',
                nextYear: 'none fa fa-arrow-right'
            },
            Actionable: true,
            eventLimit: true, // allow "more" link when too many events
            viewRender: function(view, element) {
                if (!(/Mobi/.test(navigator.userAgent)) && jQuery().jScrollPane) {
                    $('.fc-scroller').jScrollPane({
                        autoReinitialise: true,
                        autoReinitialiseDelay: 100
                    });
                }
            },
            eventClick: function(calEvent, jsEvent, view) {
                if (!$(this).hasClass('event-clicked')) {
                    $('.fc-event').removeClass('event-clicked');
                    $(this).addClass('event-clicked');
                }
            },
            defaultDate: '2016-05-12',
            events: [
                {
                    title: 'All Day Event',
                    start: '2016-05-01',
                    className: 'fc-event-success'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2016-05-09T16:00:00',
                    className: 'fc-event-default'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2016-05-16T16:00:00',
                    className: 'fc-event-success'
                },
                {
                    title: 'Conference',
                    start: '2016-05-11',
                    end: '2016-05-14',
                    className: 'fc-event-danger'
                }
            ]
        });

        ///////////////////////////////////////////////////////////
        // SWAL ALERTS
        $('.swal-btn-success').click(function(e){
            e.preventDefault();
            swal({
                title: "Following",
                text: "Now you are following Artour Scott",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok"
            });
        });

        $('.swal-btn-success-2').click(function(e){
            e.preventDefault();
            swal({
                title: "Friends request",
                text: "Friends request was succesfully sent to Artour Scott",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok"
            });
        });

    });
</script>
<!-- END: page scripts -->
@include('components/footer')
