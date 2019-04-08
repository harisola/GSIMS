<?php
namespace App\Models\Accounts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class fee_bill_mis extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    public function Call_Mis_Sp( $BillCycleNo, $ASID_From, $ASID_To )
    {
        return DB::connection('mysql_Career_fee_bill')->select('call sp_get_regular_mis_all_(?,?,?)',array($BillCycleNo,$ASID_From,$ASID_To));
    }

    public function Call_Mis_Sp_adm( $BillDated )
    {
        return DB::connection('mysql_Career_fee_bill')->select('call sp_get_admission_mis_(?)',array($BillDated));
    }

    public function get_Academic_Session_id()
    {
        $query ="select  sa.id as ASID from atif._academic_session as sa where sa.is_lock=0 and sa.is_active=1";
        return DB::connection('mysql_Career_fee_bill')->select($query);

    }


    


} 