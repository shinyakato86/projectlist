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

      if ($request->filled('seach_year') && $request->filled('seach_month')) {

        $keyword = $request->input('seach_year');
        $keyword2 = $request->input('seach_month');

        $sales_personal  = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_name , sum(creator_price) as amount, updated_at')->whereYear('updated_at', $keyword)->whereMonth('updated_at', $keyword2)->groupByRaw('creator_name')->get();
      }else if ($request->filled('seach_year')) {

        $keyword = $request->input('seach_year');

        $sales_personal  = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_name , sum(creator_price) as amount, updated_at')->whereYear('updated_at', $keyword)->groupByRaw('creator_name')->get();

      }else{

        $sales_personal = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_name , sum(creator_price) as amount, updated_at')->whereYear('updated_at', $year)->whereMonth('updated_at', $month)->groupByRaw('creator_name')->get();

        }

        $error_text = "検索結果がありません。";

        return view('sales_personal', compact('sales_personal', 'year', 'month', 'error_text'));

    }



    public function sales_client(Request $request)
    {

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

        $sales_client = \DB::table('projectlists')->selectRaw('client_name , sum(price) as amount, updated_at')->whereYear('updated_at', $year)->whereMonth('updated_at', $month)->groupByRaw('client_name')->get();

      }

        $error_text = "検索結果がありません。";

        return view('sales_client', compact('sales_client', 'year', 'month', 'error_text'));
    }



    public function sales_category(Request $request)
    {

      $time = new Carbon(Carbon::now());
      $year =  $time ->__get('year');
      $month = $time ->__get('month');

      if ($request->filled('seach_year') && $request->filled('seach_month')) {

        $keyword = $request->input('seach_year');
        $keyword2 = $request->input('seach_month');

        $sales_category = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_category , sum(creator_price) as amount, updated_at')->whereYear('updated_at', $keyword)->whereMonth('updated_at', $keyword2)->groupByRaw('creator_category')->get();
      }else if ($request->filled('seach_year')) {

        $keyword = $request->input('seach_year');

        $sales_category = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_category , sum(creator_price) as amount, updated_at')->whereYear('updated_at', $keyword)->groupByRaw('creator_category')->get();

      }else{

        $sales_category = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_category , sum(creator_price) as amount, updated_at')->whereYear('updated_at', $year)->whereMonth('updated_at', $month)->groupByRaw('creator_category')->get();

        }

        $error_text = "検索結果がありません。";

        return view('sales_category', compact('sales_category', 'year', 'month', 'error_text'));

    }



    public function sales_department(Request $request)
    {

      $time = new Carbon(Carbon::now());
      $year =  $time ->__get('year');
      $month = $time ->__get('month');

      if ($request->filled('seach_year') && $request->filled('seach_month')) {

        $keyword = $request->input('seach_year');
        $keyword2 = $request->input('seach_month');

        $sales_department = \DB::table('projectlists')->selectRaw('department_name , sum(price) as amount, updated_at')->whereYear('updated_at', $keyword)->whereMonth('updated_at', $keyword2)->groupByRaw('department_name')->get();
      }else if ($request->filled('seach_year')) {

        $keyword = $request->input('seach_year');

        $sales_department = \DB::table('projectlists')->selectRaw('department_name , sum(price) as amount, updated_at')->whereYear('updated_at', $keyword)->groupByRaw('department_name')->get();

      }else{

        $sales_department = \DB::table('projectlists')->selectRaw('department_name , sum(price) as amount, updated_at')->whereYear('updated_at', $year)->whereMonth('updated_at', $month)->groupByRaw('department_name')->get();

        }

        $error_text = "検索結果がありません。";

        return view('sales_department', compact('sales_department', 'year', 'month', 'error_text'));

    }


}
