
<?php $__env->startSection('title', 'Update Marksheet'); ?>
<?php $__env->startSection('main'); ?>

<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Create Marksheet </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Marksheet</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="#" class="btn btn-primary">Update Marksheet</a>
            </div>
        </div>
    </div>
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
    <div class="row">   
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="p-4 border rounded"> 
                        <form class="row g-3 needs-validation bv-form" method="post" id="enq_form" enctype="multipart/form-data" action="<?php echo e(route('updateMarksheet')); ?>" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-6">
                                <label for="_reg_no" class="form-label">Reg No *</label>
                                <input type="text" class="form-control" name="reg_no" id="_reg_no" value="<?php echo e($marksheet_data[0]['reg_no']); ?>" placeholder="Reg No" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="_stu_name" class="form-label">Student Name *</label>
                                <input type="text" class="form-control" name="stud_name" id="_stu_name" value="<?php echo e($marksheet_data[0]['stud_name']); ?>" placeholder="Student Name" readonly>
                            </div>

                            <div class="col-md-12">
                                <label for="_stu_name" class="form-label">Exam Name *</label>
                                <input type="text" class="form-control" name="exam_name" id="_stu_name" value="<?php echo e($marksheet_data[0]['exam_name']); ?>" placeholder="Exam Name" readonly>
                            </div>
                            
                            <hr style="border: 2px dashed #939393; border-style: none none dashed;">

                            <div class="col-md-6">
                                <label for="theory_mark" class="form-label">Theory Mark *</label>
                                <input type="text" class="form-control _mark" name="theory_mark" id="theory_mark" value="<?php echo e($marksheet_data[0]['theory_mark']); ?>" placeholder="Enter theory mark">
                            </div>

                            <div class="col-md-6">
                                <label for="theory_obt" class="form-label">Theory Obt *</label>
                                <input type="text" class="form-control _obt" name="theory_obt" id="theory_obt" value="<?php echo e($marksheet_data[0]['theory_obt']); ?>" placeholder="Enter theory obt">
                            </div>

                            <div class="col-md-6">
                                <label for="practical_mark" class="form-label">Practical Mark *</label>
                                <input type="text" class="form-control _mark" name="practical_mark" id="practical_mark" value="<?php echo e($marksheet_data[0]['prac_mark']); ?>" placeholder="Enter practical mark">
                            </div>

                            <div class="col-md-6">
                                <label for="practical_obt" class="form-label">Practical Obt *</label>
                                <input type="text" class="form-control _obt" name="practical_obt" id="practical_obt" value="<?php echo e($marksheet_data[0]['prac_obt']); ?>" placeholder="Enter practical obt">
                            </div>

                            <div class="col-md-6">
                                <label for="viba_mark" class="form-label">Viba Mark *</label>
                                <input type="text" class="form-control _mark" name="viba_mark" id="viba_mark" value="<?php echo e($marksheet_data[0]['viba_mark']); ?>" placeholder="Enter viba mark">
                            </div>

                            <div class="col-md-6">
                                <label for="viba_obt" class="form-label">Viba Obt *</label>
                                <input type="text" class="form-control _obt" name="viba_obt" id="viba_obt" value="<?php echo e($marksheet_data[0]['viba_obt']); ?>" placeholder="Enter viba obt">
                            </div>

                            <div class="col-md-6">
                                <label for="attnd_mark" class="form-label">Attnd Mark *</label>
                                <input type="text" class="form-control _mark" name="attnd_mark" id="attnd_mark" value="<?php echo e($marksheet_data[0]['attend_mark']); ?>" placeholder="Enter attnd mark">
                            </div>

                            <div class="col-md-6">
                                <label for="attnd_obt" class="form-label">Attnd Obt *</label>
                                <input type="text" class="form-control _obt" name="attnd_obt" id="attnd_obt" value="<?php echo e($marksheet_data[0]['attend_obt']); ?>" placeholder="Enter attnd obt">
                            </div>

                            <div class="col-md-6">
                                <label for="notebook_mark" class="form-label">Notebook Mark *</label>
                                <input type="text" class="form-control _mark" name="notebook_mark" id="notebook_mark" value="<?php echo e($marksheet_data[0]['book_mark']); ?>" placeholder="Enter notebook mark">
                            </div>

                            <div class="col-md-6">
                                <label for="notebook_obt" class="form-label">Notebook Obt *</label>
                                <input type="text" class="form-control _obt" name="notebook_obt" id="notebook_obt" value="<?php echo e($marksheet_data[0]['book_obt']); ?>" placeholder="Enter notebook obt">
                            </div>

                            <div class="col-md-6">
                                <label for="project_mark" class="form-label">Project Mark *</label>
                                <input type="text" class="form-control _mark" name="project_mark" id="project_mark" value="<?php echo e($marksheet_data[0]['pro_mark']); ?>" placeholder="Enter project mark">
                            </div>

                            <div class="col-md-6">
                                <label for="project_obt" class="form-label">Project Obt *</label>
                                <input type="text" class="form-control _obt" name="project_obt" id="project_obt" value="<?php echo e($marksheet_data[0]['pro_obt']); ?>" placeholder="Enter exam name">
                            </div>

                            <div class="col-md-6">
                                <label for="total_mark" class="form-label">Total Mark *</label>
                                <input type="text" class="form-control" name="total_mark" id="total_mark" value="<?php echo e($marksheet_data[0]['total_mark']); ?>" placeholder="Enter total mark">
                            </div>

                            <div class="col-md-6">
                                <label for="total_obt" class="form-label">Total Obt *</label>
                                <input type="text" class="form-control" name="total_obt" id="total_obt" value="<?php echo e($marksheet_data[0]['total_obt']); ?>" placeholder="Enter exam name">
                            </div>

                            <div class="col-md-12 text-end">
                                <button class="btn btn-primary btn-block" style="width:100%" type="submit">Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function(){
        var _total_mark=0;
        $("._mark").each(function(){
            if($(this).val() != "")
            _total_mark += parseInt($(this).val());   
        });
        $("#total_mark").val(_total_mark);

        $(document).on("keyup", "._mark", function() {
            var total_mark=0;
            $("._mark").each(function(){
                if($(this).val() != "")
                total_mark += parseInt($(this).val());   
            });
            $("#total_mark").val(total_mark);
        });


        var _total_obt=0;
        $("._obt").each(function(){
            if($(this).val() != "")
            _total_obt += parseInt($(this).val());   
        });
        $("#total_obt").val(_total_obt);

        $(document).on("keyup", "._obt", function() {
            var total_obt=0;
            $("._obt").each(function(){
                if($(this).val() != "")
                total_obt += parseInt($(this).val());   
            });
            $("#total_obt").val(total_obt);
        });

    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RTI\merazrti\resources\views/admin/admit_card_result/edit_marksheet.blade.php ENDPATH**/ ?>