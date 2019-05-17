<?php if( !empty( $stories ) ){ ?>

<?php $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


	<?php if($login_user != $student->user_id): ?>
	
	<li class="in">
		<img class="avatar" alt="" src="<?php echo e($student->photo150); ?>">
		<div class="message"><span class="arrow"> </span>
			<div class="CommentInfo">
				<a href="javascript:;" class="name"> <strong><?php echo e($student->staff_name); ?></strong> </a>
				<span class="studentInfoCom"><span class="grayish">Student Name:</span> <?php echo e($student->abridged_name); ?> </span>
				<span class="studentInfoCom"><span class="grayish">GS-ID:</span> <?php echo e($student->gs_id); ?> </span>
				<span class="body"><span class="grayish">Comment:</span> <?php echo e($student->comments); ?> <br> </span>
				<?php $tags =  explode(',', $student->tag); $c_tags =  explode(',', $student->communication_tag); ?>
					<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<span class="commentCat TPA Confirmed "> <?php echo e($tag); ?> </span>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<!-- <?php $__currentLoopData = $c_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> -->
					<?php /*if($tag != '') {*/ ?>
						<!-- <span class="commentCat communicationCat TPA Confirmed "> <?php echo e($tag); ?> </span> -->
					<?php /*}*/ ?>
					<!-- <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
				<br>                                            
				<span class="commentDate"> <?php echo e($student->date_time); ?> </span>
			</div>
		</div>
	</li>


	<?php else: ?>

	<li class="out" data-filters="User Generated" data-category="Accounts">
		<img class="avatar" alt="" src="<?php echo e($student->photo150); ?>">
		<div class="message"><span class="arrow"> </span>
			<div class="CommentInfo">
				<a href="javascript:;" class="name"> <strong><?php echo e($student->staff_name); ?></strong> </a>
				<span class="studentInfoCom"><span class="grayish">Student Name:</span> <?php echo e($student->abridged_name); ?> </span>
				<span class="studentInfoCom"><span class="grayish">GS-ID:</span> <?php echo e($student->gs_id); ?> </span>
				<span class="body"> <?php echo e($student->comments); ?> <br> </span>
				<?php $tags =  explode(',', $student->tag); $c_tags =  explode(',', $student->communication_tag); ?>
					<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<span class="commentCat TPA Confirmed "> <?php echo e($tag); ?> </span>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php $__currentLoopData = $c_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($tag != '') { ?>
						<span class="commentCat communicationCat TPA Confirmed "> <?php echo e($tag); ?> </span>
					<?php } ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<br> 
				<span class="commentDate"> <?php echo e($student->date_time); ?> </span>
			</div>
		</div>
	</li>
	<?php endif; ?>
	
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php } ?>
