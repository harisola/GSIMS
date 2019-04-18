<!-- <?php echo e(dump($personalInfo[0])); ?> -->
<div class="modal-body" style="float:left;width:100%;">
                        <div class="tabbable-line">
                             <ul class="nav nav-tabs ">
                                <li class="active">
                                   <a href="#tab_basic_edit" data-toggle="tab"> <span aria-hidden="true" class="icon-info"></span> Basics </a>
                                </li>
                                <li>
                                   <a href="#tab_education_edit" data-toggle="tab"> <span aria-hidden="true" class="icon-graduation"></span> Education </a>
                                </li>
                                <li>
                                   <a href="#tab_employment_edit" data-toggle="tab"> <span aria-hidden="true" class="icon-briefcase"></span> Employments </a>
                                </li>
                                <li class="">
                                   <a href="#tab_parent_edit" data-toggle="tab"> <span aria-hidden="true" class="icon-users"></span> Parent / Spouse </a>
                                </li>
                                <li>
                                   <a href="#tab_alternate_edit" data-toggle="tab"> <i class="fa fa-phone"></i> Alternate Contacts </a>
                                </li>
                                <li>
                                   <a href="#tab_other_edit" data-toggle="tab"> <span aria-hidden="true" class="icon-plus"></span> Other </a>
                                </li>
                             </ul>
                             <!-- nav -->
                             <div class="tab-content">
                                 <!-- tab_basic_edit Start -->
                                  <?php echo $__env->make('master_layout.staff.staff_modal_tab_basic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                 <!-- tab_basic_edit End -->

                                 <!-- tab_education_edit Start -->
                                  <?php echo $__env->make('master_layout.staff.staff_modal_tab_education', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                 <!-- tab_education_edit End -->

                                 <!-- tab_employment_edit Start --> 
                                  <?php echo $__env->make('master_layout.staff.staff_modal_tab_employment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                 <!-- tab_employment_edit End -->

                                 <!-- tab_parent_edit Start --> 
                                  <?php echo $__env->make('master_layout.staff.staff_modal_tab_parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                 <!-- tab_parent_edit End -->

                                 <!-- tab_alternate_edit Start --> 
                                  <?php echo $__env->make('master_layout.staff.staff_modal_tab_alternate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                 <!-- tab_alternate_edit End -->

                                 <!-- tab_other_edit Start --> 
                                  <?php echo $__env->make('master_layout.staff.staff_modal_tab_other', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                 <!-- tab_other_edit End -->
                             </div>
                             <!-- tab-content -->
                          </div>
                          <!-- tabbable-line -->
                     </div>