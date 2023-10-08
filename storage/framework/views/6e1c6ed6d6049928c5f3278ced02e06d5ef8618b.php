
<?php $__env->startSection('title', 'Result'); ?>
<?php $__env->startSection('main'); ?>
        <?php if(session('status')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Success!</strong> <?php echo e(session('status')); ?>

            </div>
        <?php elseif(session('failed')): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Success!</strong> <?php echo e(session('failed')); ?>

            </div>
        <?php endif; ?>


        <form action="<?php echo e(route('dispStudmarksheet')); ?>" target="_blank" method="post" id="marksheet_print">
        <?php echo csrf_field(); ?>                    

        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Admit Card </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Result</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-print-none" style="margin: 0 5em;"> 
                    <button type="submit" name="submit" class="btn btn-outline-primary btn-md pull-left">
                        <i class="bx bx-printer"></i>
                        Print
                    </button>
                </div> 
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="http://127.0.0.1:8000/admin/list-enquiry" class="btn btn-primary">List Enquiry</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Print</th>
                                <th scope="col">Roll No</th>
                                <th scope="col">Exam Name</th>
                                <th scope="col">Student</th>
                                <th scope="col">Total Mark</th>
                                <th scope="col">Total Obtain</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $marksheetDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marksheetData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="msheetId-<?php echo e($marksheetData->id); ?>">
                            <td><input type="checkbox" name="admit_card[]" value="<?php echo e($marksheetData->reg_no); ?>"></td>
                            <td><?php echo e($marksheetData->reg_no); ?></td>
                            <td><?php echo e($marksheetData->exam_name); ?></td>
                            <td><?php echo e($marksheetData->stud_name); ?></td>
                            <td><?php echo e($marksheetData->total_mark); ?></td>
                            <td><?php echo e($marksheetData->total_obt); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                   
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

<?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
    <script>
        $("#marksheet_print").submit(function(e) {
            if($('input[name="admit_card[]"]:checked').length == 0){
                alert('Please checked the option');
                return false;
            }
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RTI\merazrti\resources\views/admin/admit_card_result/result.blade.php ENDPATH**/ ?>