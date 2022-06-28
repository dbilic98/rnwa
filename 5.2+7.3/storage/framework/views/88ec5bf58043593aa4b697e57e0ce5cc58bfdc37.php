<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="float-md-start">Branches</h2>
                <a class="btn btn-sm btn-success float-md-end" href="<?php echo e(route('branch.create')); ?>"
                   role="button">Create</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table mt-5">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">Name</th>
                                <th scope="col">State</th>
                                <th scope="col">Zip code</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($branch->id); ?></th>
                                    <td><?php echo e($branch->address); ?></td>
                                    <td><?php echo e($branch->city); ?></td>
                                    <td><?php echo e($branch->name); ?></td>
                                    <td><?php echo e($branch->state); ?></td>
                                    <td><?php echo e($branch->zip_code); ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                           href="<?php echo e(route('branch.edit',$branch->id)); ?>" role="button">Edit</a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="event.preventDefault(); document.getElementById('delete-branch-<?php echo e($branch->id); ?>').submit()">
                                            Delete
                                        </button>
                                        <form id="delete-branch-<?php echo e($branch->id); ?>"
                                              action="<?php echo e(route('branch.destroy',$branch->id)); ?>" method="POST"
                                              style="display: none">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>
                                </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\5.2\resources\views/branch/index.blade.php ENDPATH**/ ?>