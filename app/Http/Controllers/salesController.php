<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function sales_personal(Request $request)
    {

      $time = new Carbon(Carbon::now());
      $year =  $time ->__get('year');
      $month = $time ->__get('month');


      if ($request->filled('keyword')) {
          $keyword = $request->input('keyword');
          $personallist = \DB::table('projectlists')->where('project_name', 'like', '%' . $keyword . '%')
          ->orWhere('project_name', 'like', '%' . $keyword . '%')
          ->get();
      } elseif ($request->filled('seach_user')){
          $seach_user = $request->input('seach_user');
          $personallist = \DB::table('projectlists')->where('author_name',$seach_user);
      }else{
          $personallist = \DB::table('projectlists');
        }





        return view('sales_personal', compact('personallist', 'year'));
    }



    public function sales_client(Request $request)
    {
      /*
      $sales_client[] = \DB::table('projectlists')->
      selectRaw('client_name,
      sum(if (date_format(created_at, "%Y%m")=202001, price, 0)) as 1月,
      sum(if (date_format(created_at, "%Y%m")=202002, price, 0)) as 2月,
      sum(if (date_format(created_at, "%Y%m")=202002, price, 0)) as 3月,
      sum(if (date_format(created_at, "%Y%m")=202002, price, 0)) as 4月,
      sum(if (date_format(created_at, "%Y%m")=202002, price, 0)) as 5月,
      sum(if (date_format(created_at, "%Y%m")=202002, price, 0)) as 6月,
      sum(if (date_format(created_at, "%Y%m")=202002, price, 0)) as 7月,
      sum(if (date_format(created_at, "%Y%m")=202002, price, 0)) as 8月,
      sum(if (date_format(created_at, "%Y%m")=202002, price, 0)) as 9月,
      sum(if (date_format(created_at, "%Y%m")=202002, price, 0)) as 10月,
      sum(if (date_format(created_at, "%Y%m")=202002, price, 0)) as 11月,
      sum(if (date_format(created_at, "%Y%m")=202002, price, 0)) as 12月')
      ->groupByRaw('client_name')->get()->toArray();
      */

      $time = new Carbon(Carbon::now());
      $year =  $time ->__get('year');
      $month = $time ->__get('month');

      if ($request->filled('seach_year') && $request->filled('seach_month')) {

          $keyword = $request->input('seach_year');
          $keyword2 = $request->input('seach_month');

        $sales_client = \DB::table('projectlists')->selectRaw('client_name , sum(price) as amount, updated_at')->whereYear('updated_at', $keyword)->whereMonth('updated_at', $keyword2)->groupByRaw('client_name')->get();

      }else if ($request->filled('seach_year')) {

        $keyword = $request->input('seach_year');

        $sales_client = \DB::table('projectlists')->selectRaw('client_name , sum(price) as amount, updated_at')->whereYear('updated_at', $keyword)->groupByRaw('client_name')->get();

      }else{
        $sales_client = \DB::table('projectlists')->selectRaw('client_name , sum(price) as amount, updated_at')->whereYear('updated_at', $year)->groupByRaw('client_name')->get();
        }

        $error_text = "検索結果がありません。";

  /*    SELECT 日時, 商品名, SUM(売上) FROM TABLE_A
      GROUP BY DATE_FORMAT(日時, '%Y%m')
            $sales_client = \DB::table('projectlists')->selectRaw('client_name , sum(price) as amount, updated_at')->groupByRaw('date_format(updated_at, "%Y%m"),client_name')->get();


            if ($request->filled('keyword')) {
                $keyword = $request->input('keyword');
                $projectlist = Projectlist::where('project_name', 'like', '%' . $keyword . '%')
                ->orWhere('project_name', 'like', '%' . $keyword . '%')
                ->get();
            } elseif ($request->filled('seach_user')){
                $seach_user = $request->input('seach_user');
                $projectlist = Projectlist::all()->where('author_name',$seach_user);
            }else{
                $projectlist = Projectlist::all();
              }





            */


        return view('sales_client', compact('sales_client', 'year', 'month', 'error_text'));
    }








}
