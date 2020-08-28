<?php $__env->startSection('title', 'Sector List'); ?>
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
            <strong>Sector list</strong>
        </span>
    </div>
    <?php if(session('succes')): ?>
                <div class="alert alert-success col-sm-12 text-center text-monospace">
                    <?php echo e(session('succes')); ?>

                </div>
    <?php endif; ?>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                      <th scope="col">Sector name</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php $__currentLoopData = $sectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($sector->nom_secteur); ?></td>
                                <td class="pt-2"><a href="<?php echo e(url('sectorEdit',$sector->id)); ?>" class="btn btn-sm  btn-outline-primary"><span class="icmn-pencil"></span></a></td>
                                <td class="pt-2">
                                <form action="<?php echo e(url('sectorDestroy/'.$sector->id)); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                    <button type="submit" class="btn btn-sm btn-outline-danger"><span class="icmn-bin"></span></button>
                                </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </tbody>
                </table>  
            </table>
          </div>
    </div>
</section>
<?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
