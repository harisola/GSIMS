<ul class="chats">
<?php if( !empty( $staffRecruiment ) ): ?>

<li class="statement">
	<div class="message">
		<span class="body"> <?=$staffRecruiment[0]->Form_Source; ?> </span>
	</div>
</li>
		
		
	<?php foreach( $staffRecruiment as $sr ) : ?>
	
		<?php ( $userID == $sr->Created_by || $sr->Created_by ==0 ) ? $Li_Class="out" : $Li_Class="in" ; ?>
		
		<?php if(!empty($sr->Comments)){ ?>
		<li class="<?=$Li_Class;?>">
		<?php  if( $sr->Photo_id == '' ) { $Photo = 'gs_logo.png'; } else{  $Photo = $sr->Photo_id.'.png'; } ?>
		
		
			<img class="avatar" alt="" src="http://10.10.10.70/gsims/public/assets/photos/hcm/150x150/staff/<?=$Photo;?>" />
			<div class="message">
				<span class="arrow"> </span>
				<a href="javascript:;" class="name"> <?=$sr->Register_by;?> </a>
				<span class="datetime"><?=$sr->Dated;?> </span>
				<span class="body"> <?=$sr->Comments;?> </span>
			</div>
		</li>
		<?php } ?>


	<?php endforeach; ?>

<?php endif; ?>




</ul>