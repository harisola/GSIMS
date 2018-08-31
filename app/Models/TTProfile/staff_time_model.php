<?php

namespace App\Models\TTProfile;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class staff_time_model extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'tt_profile_time_staff';
    protected $dbCon = 'mysql_gsEvents';
}