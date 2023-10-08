<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?php echo e(asset('web/assets/images/lite-logo.png')); ?>" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">RTI Branch </h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Enquiry Zone </div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('branchNewEnquiry')); ?>"><i class="bx bx-right-arrow-alt"></i>Add New Enquiry </a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchlistEnquiry')); ?>"><i class="bx bx-right-arrow-alt"></i>List Enquiry</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-book-reader"></i>
                </div>
                <div class="menu-title">Students</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('branchnewStudent')); ?>"><i class="bx bx-right-arrow-alt"></i>New Admission</a>
                </li>
                <li> 
                    <a href="<?php echo e(route('branchstudentList')); ?>"><i class="bx bx-right-arrow-alt"></i>Student List</a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchstudentDay')); ?>"><i class="bx bx-right-arrow-alt"></i>Student Bday</a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchstudentListprint')); ?>"><i class="bx bx-right-arrow-alt"></i>Print Student List</a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchcourseManage')); ?>"><i class="bx bx-right-arrow-alt"></i>Course Management</a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchstudentIdcard')); ?>"><i class="bx bx-right-arrow-alt"></i>Head Office ID Card</a>
                </li>
                <li>
                    <a href="#"><i class="bx bx-right-arrow-alt"></i>Branch ID Card</a>
                </li>
            </ul>
        </li>

        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-receipt"></i>
                </div>
                <div class="menu-title">Blogs</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('addblog')); ?>"><i class="bx bx-right-arrow-alt"></i>Add Blog</a>
                </li>
                <li>
                    <a href="<?php echo e(route('bloglist')); ?>"><i class="bx bx-right-arrow-alt"></i>Blog List</a>
                </li>
            </ul>
        </li> -->

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-id-card"></i>
                </div>
                <div class="menu-title">Admit Card</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('branchcreateAdmitCard')); ?>"><i class="bx bx-right-arrow-alt"></i>Create Admit Card</a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchadmitCardDtails')); ?>"><i class="bx bx-right-arrow-alt"></i>Admit Card Details</a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchviewMarksheet')); ?>"><i class="bx bx-right-arrow-alt"></i>Result</a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchhAdmitCard')); ?>"><i class="bx bx-right-arrow-alt"></i>Branch Admit Card</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-rupee"></i>
                </div>
                <div class="menu-title">Fee Management</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('branchfeeSubmission')); ?>"><i class="bx bx-right-arrow-alt"></i>Fee Submission</a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchFeeDetails')); ?>"><i class="bx bx-right-arrow-alt"></i>Fee Details</a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchtodayFeeCollection')); ?>"><i class="bx bx-right-arrow-alt"></i>Today Fee Collection</a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchdueFeeReport')); ?>"><i class="bx bx-right-arrow-alt"></i>Due Fee Report</a>
                </li>
                <li>
                    <a href="<?php echo e(route('branchFeeReminder')); ?>"><i class="bx bx-right-arrow-alt"></i>Fee Reminder</a>
                </li>
            </ul>
        </li>

        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Employee Management</div>
            </a>
            <ul>
                <li><a href="<?php echo e(route('AddDepartment')); ?>">
                        <i class="bx bx-right-arrow-alt"></i> Add Department</a>
                </li>
                <li><a href="<?php echo e(route('AddEmployee')); ?>">
                        <i class="bx bx-right-arrow-alt"></i> Add Employee</a>
                </li>
                <li><a href="<?php echo e(route('EmployeeDetails')); ?>"><i class="bx bx-right-arrow-alt"></i>
                        Employee Details</a>
                </li>
                <li><a href="<?php echo e(route('Attendance')); ?>"><i class="bx bx-right-arrow-alt"></i>
                        Attendance</a>
                </li>
                <li><a href="<?php echo e(route('AttendanceDetails')); ?>"><i class="bx bx-right-arrow-alt"></i>
                        Attendance Details</a>
                </li>
                <li><a href="<?php echo e(route('LeaveType')); ?>"><i class="bx bx-right-arrow-alt"></i>
                        Leave Type</a>
                </li>
            </ul>
        </li> -->

        <!-- <li>
            <a href="<?php echo e(route('NewsUpdate')); ?>" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-pen"></i>
                </div>
                <div class="menu-title">News Update</div>
            </a>
        </li> -->

        <!-- <li>
            <a href="<?php echo e(route('EnquiryDetails')); ?>" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-book"></i>
                </div>
                <div class="menu-title">Enquiry Details </div>
            </a>
        </li> -->

        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-spreadsheet"></i>
                </div>
                <div class="menu-title">Website Course Add</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('AddCourse')); ?>"><i class="bx bx-right-arrow-alt"></i>Add Course</a>
                </li>
                <li>
                    <a href="<?php echo e(route('CourseDetails')); ?>"><i class="bx bx-right-arrow-alt"></i>Course Details</a>
                </li>
            </ul>
        </li> -->

        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-cloud"></i>
                </div>
                <div class="menu-title">Create Marksheet New</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('DirectMarksheetCreate')); ?>"><i class="bx bx-right-arrow-alt"></i>Direct Marksheet Create</a>
                </li>
                <li>
                    <a href="<?php echo e(route('MarksheetDetails')); ?>"><i class="bx bx-right-arrow-alt"></i>Marksheet Details</a>
                </li>
                <li>
                    <a href="<?php echo e(route('MarksheetPending')); ?>"><i class="bx bx-right-arrow-alt"></i>Marksheet Pending</a>
                </li>
                <li>
                    <a href="<?php echo e(route('CertificateDetails')); ?>"><i class="bx bx-right-arrow-alt"></i>Certificate Details</a>
                </li>
            </ul>
        </li> -->

        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-image"></i>
                </div>
                <div class="menu-title">Teacher Image Upload</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('NewTeacherImageupload')); ?>"><i class="bx bx-right-arrow-alt"></i>New Teacher Image upload</a>
                </li>
                <li>
                    <a href="<?php echo e(route('TeacherImageDetails')); ?>"><i class="bx bx-right-arrow-alt"></i>Teacher Image Details</a>
                </li>
            </ul>
        </li> -->

        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-image-alt"></i>
                </div>
                <div class="menu-title">Gallery Image Upload</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('NewImageUploadGallery')); ?>"><i class="bx bx-right-arrow-alt"></i>New Image Upload Gallery</a>
                </li>
                <li>
                    <a href="<?php echo e(route('GalleryImageDetails')); ?>"><i class="bx bx-right-arrow-alt"></i>Gallery Image Details</a>
                </li>
            </ul>
        </li> -->

        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-image"></i>
                </div>
                <div class="menu-title">Student Image Upload</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('NewStudentImageupload')); ?>"><i class="bx bx-right-arrow-alt"></i>New Student Image upload</a>
                </li>
                <li>
                    <a href="<?php echo e(route('StudentImageDetails')); ?>"><i class="bx bx-right-arrow-alt"></i>Student Image Details</a>
                </li>
            </ul>
        </li> -->

        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-git-branch"></i>
                </div>
                <div class="menu-title">Branch Website Add</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('NewBranchAdd')); ?>"><i class="bx bx-right-arrow-alt"></i>New Branch Add</a>
                </li>
                <li>
                    <a href="<?php echo e(route('BranchDetails')); ?>"><i class="bx bx-right-arrow-alt"></i>Branch Details</a>
                </li>
            </ul>
        </li> -->

        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Account/Finance</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('ExtraExpenese')); ?>"><i class="bx bx-right-arrow-alt"></i>Extra Expenese</a>
                </li>
                <li>
                    <a href="<?php echo e(route('ExpeneseDetails')); ?>"><i class="bx bx-right-arrow-alt"></i>Expenese Details</a>
                </li>
                <li>
                    <a href="<?php echo e(route('AccountBalance')); ?>"><i class="bx bx-right-arrow-alt"></i>Account Balance</a>
                </li>
            </ul>
        </li> -->

        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-pie-chart"></i>
                </div>
                <div class="menu-title">Report</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('FeeCollectionReport')); ?>"><i class="bx bx-right-arrow-alt"></i>Fee Collection Report</a>
                </li>
            </ul>
        </li> -->
<!-- 
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-git-branch"></i>
                </div>
                <div class="menu-title">Branch Manag</div>
            </a>
            <ul>
                <li>
                    <a href="#"><i class="bx bx-right-arrow-alt"></i>Add New Branch</a>
                </li>
                <li>
                    <a href="#"><i class="bx bx-right-arrow-alt"></i>Branch Details</a>
                </li>
                <li>
                    <a href="#"><i class="bx bx-right-arrow-alt"></i>All Student Of Branch Details</a>
                </li>
            </ul>
        </li> -->

        <!-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Administrator</div>
            </a>
            <ul>
                <li>
                    <a href="#"><i class="bx bx-right-arrow-alt"></i>Change Password</a>
                </li>
                <li>
                    <a href="#"><i class="bx bx-right-arrow-alt"></i>Service Tax</a>
                </li>
            </ul>
        </li> -->

        
    <li>
        <a href="#!" target="_blank">
            <div class="parent-icon"><i class="bx bx-log-out-circle"></i>
            </div>
            <div class="menu-title">Logout</div>
        </a>
    </li>
    </ul>
    <!--end navigation-->
</div><?php /**PATH C:\xampp\htdocs\RTI\merazrti\resources\views/branch/inc/left_sidebar.blade.php ENDPATH**/ ?>