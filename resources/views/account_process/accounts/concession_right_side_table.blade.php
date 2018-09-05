<table class="table table-bordered table-hover " id="sample_1_kashif">
<thead>
<tr>
<th>Student Info</th>
<th class="text-center">Concession<br />Code</th>
<th class="text-center">Installment<br />#1</th>
<th class="text-center">Installment<br />#2</th>
<th class="text-center">Installment<br />#3</th>
<th class="text-center">Installment<br />#4</th>
<th class="text-center">Installment<br />#5</th>
<th class="text-center">By</th>
</tr>
</thead>
<tbody>
    <?php if(!empty($concession_info)) : ?>
        <?php foreach( $concession_info as $cf): ?>
<tr>
<td>


<div class="float-left" style="width: 60px;float: left;">
<img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="GF-ID: <?=$cf->Gf_id;?>" src="<?=$cf->photo150;?>" width="50">
</div>
<div class="text-left" style="float: left;">
<span class="primary-link tooltips Student_info_click" data-container="body" data-placement="top" id="<?=$cf->Concession_id;?>" data-original-title="GS-ID: <?=$cf->Gs_id;?>" data-tableType="<?=$cf->Table_type;?>">
 <?=$cf->Abridged_name;?> </span><br>

<span class="class_Name GirlSta" style="margin-left:10px;">
<span class="tooltips className" data-container="body" data-placement="top" data-original-title="Class Roll No: <?=$cf->Class_no;?>">
<?=$cf->Grade_name;?>-<?=$cf->Section_name;?></span>
<span class="StuStatus tooltips" data-placement="top" data-original-title="Status: <?=$cf->Status_code_;?>" data-pin-nopin="true"><?=$cf->Status_code;?></span>  <span style="visibility: hidden"> <?=$cf->Gs_id;?> </span>
</span>
</div>

</td>

<td class="text-center"><?=$cf->Concession_Type;?></td>
<td class="text-center">
    <?php 
        if( $cf->Installment_1 != '' && $cf->Concession_Type_id !=9)  
        {
        echo $cf->Installment_1.'%';
        }else 
        {
echo number_format($cf->Installment_1,0,'',',');
        }
    ?>
 </td>
<td class="text-center">

<?php 
        if( $cf->Installment_2 != '' && $cf->Concession_Type_id !=9 )  
        {
        echo $cf->Installment_2.'%';
        }else 
        {

echo number_format($cf->Installment_2,0,'',',');
        }
    ?>
</td>
<td class="text-center">
<?php 
        if( $cf->Installment_3 != '' && $cf->Concession_Type_id !=9)  
        {
        echo $cf->Installment_3.'%';
        }else 
        {

echo number_format($cf->Installment_3,0,'',',');
        }
    ?>
</td>
<td class="text-center">
    <?php 
        if( $cf->Installment_4 != '' && $cf->Concession_Type_id !=9)  
        {
        echo $cf->Installment_4.'%';
        }else 
        {
echo number_format($cf->Installment_4,0,'',',');
        }
    ?>
</td>
<td class="text-center">
    <?php 
        if( $cf->Installment_5 != '' && $cf->Concession_Type_id !=9)  
        {
        echo $cf->Installment_5.'%';
        }else 
        {
echo number_format($cf->Installment_5,0,'',',');
        }
    ?>
</td>
<td class="text-center">
    <?php 
        if( $cf->Name_code != '')
        {
            echo $cf->Name_code.' <br /><small>'.$cf->Dated.'</small>';
        }else 
        {

        }
    ?>
    
</td>
</tr>
<?php endforeach; ?>
<?php endif; ?>
</tbody>
</table>
