<?php

namespace App\Models\Core;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;





class SelectionList extends Model
{
    /**********************************************************************
    * Calling Staff Filter List
    * @input: Staff Column Name
    * @output: Unique Staff Filed
    ***********************************************************************/
    public function get_FieldList($tableName, $columnName, $where = null){
    	$Where = '';
    	if($where != null) {
    		$Where = 'where ' . $where;
    	}

	    $query = "select
	    ".$columnName."
	    from ".$tableName." ".$Where."
	    group by ".$columnName."
	    order by ".$columnName."
	    ";
	    $staff = DB::connection($this->dbCon)->select($query);
	    
		return $staff;
	}
}
