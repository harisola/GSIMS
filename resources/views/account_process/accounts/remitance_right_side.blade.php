
    

    <table class="table table-bordered table-hover " width="100%" id="sample_4">
        <thead>
            <tr>
                <th class="">GS-ID</th>
                <th class="">GF-ID</th>
                <th class="">Abridged Name</th>
                <th class="">Status</th>
                <th class="">Father Name<br /><small>Mobile</small></th>
                <th class="">Remmitance Check by</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($AS)): ?>
         <?php foreach($AS as $a ): ?>

              <tr>
                <td><?=$a->Gs_id;?></td>
                <td><?=$a->Gf_id;?></td>
                <td><?=$a->Abridged_name;?></td>
                <td><?=$a->Status_;?></td>
                <td><?=$a->Father_name;?><br /><small><?=$a->Father_Mobile;?></small></td>
                <td><?=$a->Name_code;?><small><?=$a->Dated;?></small></td>

            </tr>
        <?php endforeach; ?>
       <?php endif;?>

          
            

            
        </tbody>
    </table>                        
