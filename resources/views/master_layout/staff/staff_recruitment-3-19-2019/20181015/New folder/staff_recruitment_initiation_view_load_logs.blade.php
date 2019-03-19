<div class="col-md-12 col-sm-12">
<!-- BEGIN PORTLET-->
<div class="portlet light bordered">
<div class="portlet-title">
<div class="actions">
<div class="portlet-input input-inline">
<div class="input-icon right">
	<i class="icon-magnifier"></i>
	<input type="text" class="form-control input" placeholder="search..."> </div>
</div>
</div>
</div>
<div class="portlet-body" id="chats">
<div class="scroller" style="height: 525px;" data-always-visible="1" data-rail-visible1="1">
<ul class="chats">
<?php if( !empty( $staffRecruiment ) ): ?>

<li class="statement">
	<div class="message">
		<span class="body"> <?=$staffRecruiment[0]->Form_Source; ?> </span>
	</div>
</li>
		
		
	<?php foreach( $staffRecruiment as $sr ) : ?>
	
		<?php ( $userID == $sr->Created_by || $sr->Created_by ==0 ) ? $Li_Class="out" : $Li_Class="in" ; ?>
		
		
		<li class="<?=$Li_Class;?>">
		<?php  if( $sr->Photo_id == '' ) { $Photo = 'gs_logo.png'; } else{  $Photo = $sr->Photo_id.'.png'; } ?>
		
		
			<img class="avatar" alt="" src="http://10.10.10.70/gsims/public/assets/photos/hcm/150x150/staff/<?=$Photo;?>" />
			<div class="message">
				<span class="arrow"> </span>
				<a href="javascript:;" class="name"> <?=$sr->Register_by;?> </a>
				<span class="datetime"><?=$sr->Dated;?> </span>
				<span class="body"> <?=$sr->Applicat_name;?> </span>
			</div>
		</li>
		


	<?php endforeach; ?>

<?php endif; ?>




</ul>
</div>
</div>
</div>
<!-- END PORTLET-->
</div>