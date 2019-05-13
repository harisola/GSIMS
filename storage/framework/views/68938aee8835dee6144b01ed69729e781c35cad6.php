<?php 
$Abridged_name = '';
$Student_id=0;
$Photo_id='';
$Grade_name='';
$Section_name='';
$Status_='';
$Concession_Type_id='';
$Concession_Type='';
$Installment_1='';
$Installment_2='';
$Installment_3='';
$Installment_4='';
$Installment_5='';
$Gs_id ='';
$Gf_id ='';
$Academic_session=0;
$House_name='';
$Is_Concession=0;
$Concession_id=0;
#var_dump( $concession_info ); exit;
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
//$Is_Concession=$concession_info[0]->Is_Concession;
if( $concession_info[0]->Is_Concession == 1 ) 
{ 
    $Concession_id=$concession_info[0]->Concession_id; 
}

$Concession_Type_id=$concession_info[0]->Concession_Type_id;
$Concession_Type=$concession_info[0]->Concession_Type;
$Installment_1=$concession_info[0]->Installment_1;
$Installment_2=$concession_info[0]->Installment_2;
$Installment_3=$concession_info[0]->Installment_3;
$Installment_4=$concession_info[0]->Installment_4;
$Installment_5=$concession_info[0]->Installment_5;
endif; ?>    



<div class="table-scrollable table-scrollable-borderless" id="Student_info_div_m">
<table>
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
                <span class="StuStatus tooltips" data-placement="top" data-original-title="Status: <?=$House_name;?>" data-pin-nopin="true"><?=$House_name;?></span>
            </span>
        </div>
    </div>
    </td>
</tr>
</table>
<hr />

<form action="#" class="horizontal-form" id="Form_add_concession">
<input type="hidden" value="<?=$Student_id;?>" id="Student_id" name="Student_id" />

<input type="hidden" value="<?=$Concession_id;?>" id="Concession_id" name="Concession_id" />


<input type="hidden" value="<?=$Academic_session;?>" id="Academic_session_id" name="Academic_session_id" />

<input type="hidden" value="<?=$Gs_id;?>" id="Gs_id" name="Gs_id" />


<div class="form-body">
    <?php if($Is_Concession==0): ?>
        <input type="hidden" value="1" id="Operation" name="Operation" />
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Concession Type</label>
                <select name="concession_type" class="form-control" id="concession_type">
                  <option value="1">Teacher Child</option>
                  <option value="2">Need Based</option>
                  <option value="3">Friends &amp; Family</option>
                  <option value="4">Single Parent</option>
                  <option value="5">Resourceful</option>
                  <option value="6">Other Concession</option>
                  <!--option value="7">Scholarship - Academic</option>
                  <option value="8">Sholarship - Non-Academic</option-->
                  <option value="9">South Campus</option>
                  <option value="10">Provisional Concession</option>
                  <option value="11">Staff Exception</option>

                   <option value="12">Differential Concession</option>
 <option value="111">Scholarship Academic</option>
                  <option value="122">Scholarship Non Academic </option>

                </select>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #1</label>
                 <i class="fa"></i>
                <input type="text" name="Installment_1" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #2</label>
                <input type="text" name="Installment_2" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #3</label>
                <input type="text" name="Installment_3" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #4</label>
                <input type="text" name="Installment_4" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #5</label>
                <input type="text" name="Installment_5" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #6</label>
                <input type="text" name="Installment_6" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #7</label>
                <input type="text" name="Installment_7" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #8</label>
                <input type="text" name="Installment_8" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #9</label>
                <input type="text" name="Installment_9" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #10</label>
                <input type="text" name="Installment_10" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #11</label>
                <input type="text" name="Installment_11" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #12</label>
                <input type="text" name="Installment_12" class="form-control" placeholder="" value="" />
            </div>
        </div>
        <!--/span-->



    </div>
    <!--/row-->
    <?php else : ?>
        <input type="hidden" value="0" id="Operation" name="Operation" />
        <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Concession Type</label>
                <select name="concession_type" class="form-control">
                  <option value="1" <?php if($Concession_Type_id == 1){ echo 'selected'; } ?> >Teacher Child</option>
                  <option value="2" <?php if( $Concession_Type_id == 2){ echo "selected"; } ?> >Need Based</option>
                  <option value="3" <?php if( $Concession_Type_id == 3){ echo "selected"; } ?> >Friends &amp; Family</option>
                  <option value="4" <?php if( $Concession_Type_id == 4){ echo "selected"; } ?> >Single Parent</option>
                  <option value="5" <?php if( $Concession_Type_id == 5){ echo "selected"; } ?> >Resourceful</option>
                  <option value="6" <?php if( $Concession_Type_id == 6){ echo "selected"; } ?> >Other Concession</option>

                  <!-- <option value="7" <php if( $Concession_Type_id == 7){ echo "selected"; } ?> >Scholarship - Academic</option>
                  <option value="8" <php if( $Concession_Type_id == 8){ echo "selected"; } ?> >Sholarship - Non-Academic</option> -->

                  <option value="9" <?php if( $Concession_Type_id == 9){ echo "selected"; } ?> >South Campus</option>
                  <option value="10" <?php if( $Concession_Type_id == 10){ echo "selected"; } ?> >Provisional Concession</option>


                  <option value="11" <?php if( $Concession_Type_id == 11){ echo "selected"; } ?> >Staff Exception</option>


                   <option value="12" <?php if( $Concession_Type_id == 12){ echo "selected"; } ?> >Differential Concession</option>
                  

                   <option value="111">Scholarship Academic</option>
                  <option value="122">Scholarship Non Academic </option>
                </select>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #1</label>
                 <i class="fa"></i>
                <input type="text" name="Installment_1" class="form-control" placeholder="" value="<?=$Installment_1;?>" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #2</label>
                <input type="text" name="Installment_2" class="form-control" placeholder="" value="<?=$Installment_2;?>" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #3</label>
                <input type="text" name="Installment_3" class="form-control" placeholder="" value="<?=$Installment_3;?>" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #4</label>
                <input type="text" name="Installment_4" class="form-control" placeholder="" value="<?=$Installment_4;?>" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #5</label>
                <input type="text" name="Installment_5" class="form-control" placeholder="" value="<?=$Installment_5;?>" />
            </div>
        </div>
        <!--/span-->
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Installment #6</label>
                <input type="text" name="Installment_6" class="form-control" placeholder="" value="<?=$Installment_6;?>" />
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->

<?php endif;?>
</div>

<div class="form-actions right">
    <button type="button" class="btn default">Cancel</button>
    <?php $freeze=App\Models\Accounts\billing_cycle_definition::freezeBlocks(); ?>
    <button type="submit" <?php if ($freeze=="Yes"){ echo"disabled"; } ?> class="btn blue" id="Create_Installment">
        <i class="fa fa-check"></i>Save</button>
</div>
</form>
</div>

