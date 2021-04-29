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

        $sales_personal  = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_name , sum(creator_price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->whereMonth('accounting_date', $keyword2)->groupByRaw('creator_name')->orderBy('amount', 'desc')->get();
      }else if ($request->filled('seach_year')) {

        $keyword = $request->input('seach_year');
        $keyword2 = null;

        $sales_personal  = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_name , sum(creator_price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->groupByRaw('creator_name')->orderBy('amount', 'desc')->get();

      }else{

        $keyword = $year;
        $keyword2 = $month;

        $sales_personal = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_name , sum(creator_price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->whereMonth('accounting_date', $keyword2)->groupByRaw('creator_name')->orderBy('amount', 'desc')->get();

        }

        $error_text = "検索結果がありません。";

        return view('sales_personal', compact('sales_personal', 'year', 'month', 'error_text', 'keyword', 'keyword2'));

    }



    public function sales_client(Request $request)
    {

      $time = new Carbon(Carbon::now());
      $year =  $time ->__get('year');
      $month = $time ->__get('month');

      if ($request->filled('seach_year') && $request->filled('seach_month')) {

        $keyword = $request->input('seach_year');
        $keyword2 = $request->input('seach_month');

        $sales_client = \DB::table('projectlists')->selectRaw('client_name , sum(price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->whereMonth('accounting_date', $keyword2)->groupByRaw('client_name')->orderBy('amount', 'desc')->get();
      }else if ($request->filled('seach_year')) {

        $keyword = $request->input('seach_year');
        $keyword2 = null;

        $sales_client = \DB::table('projectlists')->selectRaw('client_name , sum(price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->groupByRaw('client_name')->orderBy('amount', 'desc')->get();

      }else{

        $keyword = $year;
        $keyword2 = $month;

        $sales_client = \DB::table('projectlists')->selectRaw('client_name , sum(price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->whereMonth('accounting_date', $keyword2)->groupByRaw('client_name')->orderBy('amount', 'desc')->get();

      }

        $error_text = "検索結果がありません。";

        return view('sales_client', compact('sales_client', 'year', 'month', 'error_text', 'keyword', 'keyword2'));
    }



    public function sales_category(Request $request)
    {

      $time = new Carbon(Carbon::now());
      $year =  $time ->__get('year');
      $month = $time ->__get('month');

      if ($request->filled('seach_year') && $request->filled('seach_month')) {

        $keyword = $request->input('seach_year');
        $keyword2 = $request->input('seach_month');

        $sales_category = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_category , sum(creator_price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->whereMonth('accounting_date', $keyword2)->groupByRaw('creator_category')->orderBy('amount', 'desc')->get();
      }else if ($request->filled('seach_year')) {

        $keyword = $request->input('seach_year');
        $keyword2 = null;

        $sales_category = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_category , sum(creator_price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->groupByRaw('creator_category')->orderBy('amount', 'desc')->get();

      }else{

        $keyword = $year;
        $keyword2 = $month;

        $sales_category = \DB::table('projectlists')->join('creators', 'projectlists.id', '=', 'creators.id')->selectRaw('creator_category , sum(creator_price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->whereMonth('accounting_date', $keyword2)->groupByRaw('creator_category')->orderBy('amount', 'desc')->get();

        }

        $error_text = "検索結果がありません。";

        return view('sales_category', compact('sales_category', 'year', 'month', 'error_text', 'keyword', 'keyword2'));

    }



    public function sales_department(Request $request)
    {

      $time = new Carbon(Carbon::now());
      $year =  $time ->__get('year');
      $month = $time ->__get('month');

      if ($request->filled('seach_year') && $request->filled('seach_month')) {

        $keyword = $request->input('seach_year');
        $keyword2 = $request->input('seach_month');

        $sales_department = \DB::table('projectlists')->selectRaw('department_name , sum(price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->whereMonth('accounting_date', $keyword2)->groupByRaw('department_name')->orderBy('amount', 'desc')->get();
      }else if ($request->filled('seach_year')) {

        $keyword = $request->input('seach_year');
        $keyword2 = null;

        $sales_department = \DB::table('projectlists')->selectRaw('department_name , sum(price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->groupByRaw('department_name')->orderBy('amount', 'desc')->get();

      }else{

        $keyword = $year;
        $keyword2 = $month;

        $sales_department = \DB::table('projectlists')->selectRaw('department_name , sum(price) as amount, accounting_date')->whereYear('accounting_date', $keyword)->whereMonth('accounting_date', $keyword2)->groupByRaw('department_name')->orderBy('amount', 'desc')->get();

        }

        $error_text = "検索結果がありません。";

        return view('sales_department', compact('sales_department', 'year', 'month', 'error_text', 'keyword', 'keyword2'));

    }


}
