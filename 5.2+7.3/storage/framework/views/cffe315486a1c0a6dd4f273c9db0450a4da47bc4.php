<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md" >
                <h2 class="card-title mb-4">Create a new employee</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('employee.store')); ?>" class="form-control mx-auto border-0"  method="POST">
                            <?php echo csrf_field(); ?>
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" value="<?php echo e(old('first_name')); ?><?php if(isset($employee)): ?><?php echo e($employee->first_name); ?><?php endif; ?>">
                            <label for="last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" value="<?php echo e(old('last_name')); ?><?php if(isset($employee)): ?><?php echo e($employee->last_name); ?><?php endif; ?>">
                            <label for="start_date" class="form-label">Start date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter start date" value="<?php echo e(old('start_date')); ?><?php if(isset($employee)): ?><?php echo e($employee->start_date); ?><?php endif; ?>">
                            <label for="end_date" class="form-label">End date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Enter end date" value="<?php echo e(old('end_date')); ?><?php if(isset($employee)): ?><?php echo e($employee->end_date); ?><?php endif; ?>">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?php echo e(old('title')); ?><?php if(isset($employee)): ?><?php echo e($employee->title); ?><?php endif; ?>">
                            <label for="branch">Branch</label>
                            <select class="form-select" name="branch_id" >
                                <option value="<?php echo e(old('branch_id')); ?><?php if(isset($employee)): ?><?php echo e($employee->branch_id); ?><?php endif; ?>">Pick the branch</option>
                                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($branch->id); ?>"> <?php echo e($branch->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label for="department">Department</label>
                            <select class="form-select" name="department_id" >
                                <option value="<?php echo e(old('department_id')); ?><?php if(isset($employee)): ?><?php echo e($employee->department_id); ?><?php endif; ?>">Pick the department</option>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($department->id); ?>"> <?php echo e($department->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\5.2\resources\views/employee/create.blade.php ENDPATH**/ ?>