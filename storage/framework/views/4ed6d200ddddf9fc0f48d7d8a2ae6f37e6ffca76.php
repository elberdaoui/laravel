<?php $__env->startSection('title', 'Add Sector'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

<section class="card">
   <div class="card-header">
        <div class="dropdown pull-right">
           <a href="<?php echo e(url('secteurCreate')); ?>" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Sector &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Edit Sector</strong>
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
            <form action="<?php echo e(url('sectorUpdate',$sector->id)); ?>" method="post" name="form_add_secteur" >
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-sector">Sector Name<span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                        <input id="validation-sector" value="<?php echo e($sector->nom_secteur); ?>" class="form-control"  placeholder="Sector Name"   name="sector_name"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Sector nae  must not be empty!">
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary width-150" >Submit</button>
                    <button type="reset" class="btn btn-warning width-150" >Reset</button>
                    <a href="<?php echo e(url('listSectors')); ?>"  class="btn btn-default">Cancel</a>
                </div>
			</form>
            </div>
 
        </div>
    </div>
</section>
<?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
