<?php 
$Abridged_name = '';
$Student_id=0;
$Photo_id='';
$Grade_name='';
$Section_name='';
$Status_='';

$Gs_id ='';
$Gf_id ='';
$Academic_session=0;
$House_name='';
$Is_Concession=0;
$Status_code = '';
$Academic_session=0;
$Already =0;
#var_dump( $concession_info );
if( !empty($concession_info) ) : 
$Student_id=$concession_info[0]->Student_id;
$Photo_id=$concession_info[0]->photo150;
$Abridged_name = $concession_info[0]->Abridged_name;
$Gs_id = $concession_info[0]->Gs_id;
$Grade_name=$concession_info[0]->Grade_name;
$Section_name=$concession_info[0]->Section_name;
$Status_=$concession_info[0]->Status_;
$Academic_session=$concession_info[0]->Academic_session;
$House_name=$concession_info[0]->House_name;
$Status_code = $concession_info[0]->Status_code_;
$Academic_session=$concession_info[0]->Academic_session;
$Already=(int)$concession_info[0]->Already;

endif; ?>  
<?php if( !empty($concession_info) ) :  ?>
<table>
    <tbody>
        <tr>
            <td>
               <div id="Student_info_div">
                <div class="float-left" style="width: 60px;float: left;">
                <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="GF-ID: <?=$Gs_id;?>" src="<?=$Photo_id;?>" width="50">
                </div>
                <div class="text-left" style="float: left;">
                <span class="primary-link tooltips" data-container="body" data-placement="top" id="" data-original-title="GS-ID: <?=$Gs_id;?>"> <?=$Abridged_name;?> </span><br>

                <span class="class_Name GirlSta" style="margin-left:10px;">
                <span class="tooltips className" data-container="body" data-placement="top" data-original-title="">
                <?=$Grade_name;?>-<?=$Section_name;?></span>
                <span class="StuStatus tooltips" data-placement="top" data-original-title="Status: <?=$Status_code;?>" data-pin-nopin="true"><?=$House_name;?></span>
                </span>
                </div>
                </div>
               
            </td>
        </tr>
    </tbody>
</table>
<div class="form-actions right">
<input type="hidden" value="<?=$Student_id;?>" id="Student_id" name="Student_id" />
<input type="hidden" value="<?=$Academic_session;?>" id="Academic_session_id" name="Academic_session_id" />
<input type="hidden" value="<?=$Gs_id;?>" id="Gs_id" name="Gs_id" />
<?php if( $Already === 0 ) : ?>
    <button type="button" class="btn default">Cancel</button>
    <button type="submit" class="btn blue" id="Create_Installment">
    <i class="fa fa-check"></i> Expected Remittance</button>
<?php else : ?>
   <p class="font-red-mint"> <strong> Remittance Already Created!</strong> </p>
    <p class="text-error"> Please, Check out right side table content  </p>
<?php endif;?>    
</div>
<?php else : ?>
    <p class="text-error"> No record found! </p>
<?php endif;?>  