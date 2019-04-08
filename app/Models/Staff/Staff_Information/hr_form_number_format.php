<?php

namespace App\Models\Staff\Staff_Information;

use Illuminate\Database\Eloquent\Model;

class hr_form_number_format extends Model
{
    
    protected $primaryKey = 'id';
    protected $connection = 'mysql_gsEvents';
    public $timestamps = true;


    public static function getFormNumberFormat($id)
    {
        //1 for 
        $data=hr_form_number_format::select('number_format')->where('id',$id)->first();
        return $data['number_format'];
    }

    

   

        

    


    


}
