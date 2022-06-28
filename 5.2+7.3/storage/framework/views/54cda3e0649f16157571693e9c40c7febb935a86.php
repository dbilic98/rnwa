<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="float-md-start">Employees</h2>
                <a class="btn btn-sm btn-success float-md-end" href="<?php echo e(route('employee.create')); ?>"
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
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Title</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Department</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($employee->id); ?></th>
                                    <td><?php echo e($employee->first_name); ?></td>
                                    <td><?php echo e($employee->last_name); ?></td>
                                    <td><?php echo e($employee->start_date); ?></td>
                                    <td><?php echo e($employee->end_date); ?></td>
                                    <td><?php echo e($employee->title); ?></td>
                                    <?php if($employee->branches!=null): ?>
                                        <td><?php echo e($employee->branches->name); ?></td>
                                    <?php else: ?>
                                        <td>-</td>
                                    <?php endif; ?>
                                    <?php if($employee->departments!=null): ?>
                                        <td><?php echo e($employee->departments->name); ?></td>
                                    <?php else: ?>
                                        <td>-</td>
                                    <?php endif; ?>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                           href="<?php echo e(route('employee.edit',$employee->id)); ?>" role="button">Edit</a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="event.preventDefault(); document.getElementById('delete-employee-<?php echo e($employee->id); ?>').submit()">
                                            Delete
                                        </button>
                                        <form id="delete-employee-<?php echo e($employee->id); ?>"
                                              action="<?php echo e(route('employee.destroy',$employee->id)); ?>" method="POST"
                                              style="display: none">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($employees->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\5.2\resources\views/employee/index.blade.php ENDPATH**/ ?>