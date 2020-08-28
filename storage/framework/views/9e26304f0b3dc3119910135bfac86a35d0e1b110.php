<?php $__env->startSection('title', 'Edit User'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

<section class="card">
   <div class="card-header">
        <div class="dropdown pull-right">
           <a href="<?php echo e(url('userCreate')); ?>" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add User &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Edit User</strong>
        </span>
    </div>
    <div class="card-body">
        <div class="row">
            <?php if(session('succes')): ?>
                <div class="alert alert-success col-sm-12 text-center text-monospace">
                    <?php echo e(session('succes')); ?>

                </div>
            <?php endif; ?>
            <div class="col-lg-12">
            <form action="<?php echo e(url('userUpdate',$user->user_id)); ?>" method="post" name="form_update_user" enctype="multipart/form-data">

				<div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-username">User Name <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-username" class="form-control" value="<?php echo e($user->username); ?>"  placeholder="Username"   name="user_name"  type="text" data-validation="[NOTEMPTY]" data-validation-message="User Name must not be empty!">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Password <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="password" class="form-control"   placeholder="password"   name="password"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Password must not be empty!">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">User Detail</label>
                    <textarea class="description"  rows="4" id="l15" name="user_description" placeholder="User description"><?php echo e($user->description); ?></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Email <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="email" class="form-control"  placeholder="Email" value="<?php echo e($user->email); ?>"   name="email"  type="email" data-validation="[NOTEMPTY]" data-validation-message="Email must not be empty!">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image" style="margin-top:9px;">Profile Picture</label>
                            <input class="form-control"  placeholder="image"   name="picture_user"  type="file" >
                            <div >
                                <img src="<?php echo e(asset('/storage/'.$user->profile_image)); ?>" alt="profile_image" style="width: 100%;height:200px" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="Admin" <?php if($user->role == 'Admin'): ?> selected <?php endif; ?>>Admin</option>
                                <option value="User" <?php if($user->role == 'User'): ?> selected <?php endif; ?>>User</option>
                            </select>
                        </div>
                    </div> 
               </div>
               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary width-150" >Submit</button>
                    <button type="reset" class="btn btn-warning width-150" >Reset</button>
                    <a href="<?php echo e(url('listUsers')); ?>"  class="btn btn-default">Cancel</a>
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
<?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
