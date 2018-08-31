<?php

namespace App\Http\Controllers\Account_Process\Accounts;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class RequestionController extends Controller
{
    public function index(){
        return view('account_process.accounts.requestionform');
    }

    public function storeRequestion(){
        return view('account_process.accounts.store_requestion_form');
    }
}
