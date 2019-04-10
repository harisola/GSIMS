<?php

namespace App\Models\Staff\Staff_Information;

use Illuminate\Database\Eloquent\Model;

class hr_forms_log extends Model
{
    
    protected $primaryKey = 'id';
    protected $connection = 'mysql_gsEvents';
    public $timestamps = true;


    public function getInformation($table_name,$table_row_id)
    {
        $data=hr_forms_log::where(
             [
                ['effected_entry_table',$table_name],
                ['effected_table_id',$table_row_id],
             ]
            )
        ->Orderby('id','desc')->first();
        return $data;

    }

    

   

        

    


    


}
