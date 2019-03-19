<style>
.scroller {
    padding: 0 12px 0 0;
    margin: 0;
    overflow: visible;
}
	
</style>
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
<div class="scroller">
<ul class="chats">
<?php if( !empty( $staffRecruiment ) ): ?>

<li class="statement">
	<div class="message">
		<span class="body"><?php 
		//var_dump($staffRecruiment);
		//echo $staffRecruiment[ count($staffRecruiment) -1  ]->Form_Source; 
		echo $staffRecruiment[0]->Form_Source; 
		?> </span>
	</div>
</li>
		
		
	<?php foreach( $staffRecruiment as $sr ) : ?>
	
		<?php ( $userID == $sr->Created_by || $sr->Created_by == 0 || $sr->Created_by ==null ) ? $Li_Class="out" : $Li_Class="in" ; ?>
		
		<?php  if( ($sr->Applicat_name != null)  ): ?>
		<li class="<?=$Li_Class;?>">
		<?php  if( $sr->Photo_id == '' ) { $Photo = 'gs_logo.png'; } else{  $Photo = $sr->Photo_id.'.png'; } ?>
		
		
			<img class="avatar" alt="" src="http://10.10.10.50/gsims/public/assets/photos/hcm/150x150/staff/<?=$Photo;?>" />

			<div class="message">
				<span class="arrow"> </span>
				<a href="javascript:;" class="name"> <?=$sr->Register_by;?> </a>
				<?php /* ?><span class="datetime"><?=$sr->Dated;?> </span><?php */ ?>
				<span class="body"> <?=$sr->Applicat_name;?> 
			</div>
		</li>
		<?php  endif; ?>


	<?php endforeach; ?>

<?php endif; ?>




</ul>
</div>
</div>
</div>
<!-- END PORTLET-->
</div>