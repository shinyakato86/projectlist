<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function personal()
    {
        return view('/');
    }



    public function sales_client()
    {
      $sales_client = \DB::table('projectlists')->selectRaw('client_name, sum(price), created_at')->groupByRaw('client_name')->whereMonth('created_at', '11')
      ->get();

DD($sales_client);
  /*    SELECT 日時, 商品名, SUM(売上) FROM TABLE_A
      GROUP BY DATE_FORMAT(日時, '%Y%m')*/


        return view('sales_client', compact('sales_client'));
    }








}
