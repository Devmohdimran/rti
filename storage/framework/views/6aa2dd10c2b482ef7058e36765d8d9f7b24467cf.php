
<?php $__env->startSection('title', 'Admit Card'); ?>
<?php $__env->startSection('main'); ?>

<!-- <?php 
echo '<pre>';
print_r($data_stu);
echo '</pre>';
?> -->

<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admit Card </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Print Admit Card</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="http://127.0.0.1:8000/admin/list-enquiry" class="btn btn-primary">List Enquiry</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
        <div class="table-responsive">
            <form action="<?php echo e(route('branchAdmitCardPrint')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="submit" value="Print Admit Card" class="btn btn-primary btn-md pull-left mb-1">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Reg No</th>
                            <th width="10%">Class</th>
                            <th>Name</th>
                            <th>Father</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Mobile No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data_stu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stuData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <input type="checkbox" name="_reg_no[]" value="<?php echo e($stuData['stu_reg_no']); ?>"> </td>
                                <td><?php echo e($stuData['stu_reg_no']); ?></td>
                                <td><?php echo e($stuData['stu_admin_with_student'][0]['class']); ?></td>
                                <td><?php echo e($stuData['stu_admin_with_student'][0]['name']); ?></td>
                                <td><?php echo e($stuData['stu_admin_with_student'][0]['father']); ?></td>
                                <td><?php echo e($stuData['stu_admin_with_student'][0]['gender']); ?></td>
                                <td><?php echo e($stuData['stu_admin_with_student'][0]['dob']); ?></td>
                                <td><?php echo e($stuData['stu_admin_with_student'][0]['mob']); ?></td>
                                <td> 
                                    <?php if($stuData['marksheet_status'] == 0): ?>
                                        <a href="<?php echo e(url('branch/create-marksheet').'/'.$stuData['stu_admin_with_student'][0]['reg']); ?>" class="btn btn-sm btn-outline-primary"><i class="bx bx-plus" ></i>Marksheet</a>
                                    <?php elseif($stuData['marksheet_status'] == 1): ?>
                                        <a href="<?php echo e(url('branch/edit-marksheet').'/'.$stuData['stu_admin_with_student'][0]['reg']); ?>" class="btn btn-sm btn-outline-primary"><i class="bx bx-pencil" ></i>Edit Marksheet</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Select</th>
                            <th>Reg No</th>
                            <th width="10%">Class</th>
                            <th>Name</th>
                            <th>Father</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Mobile No</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('branch.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RTI\merazrti\resources\views/branch/admit_card_result/Admit_Card_Details.blade.php ENDPATH**/ ?>