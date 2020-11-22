<?php

namespace App\Http\Controllers;

use App\Models\Projectlist;
use App\Models\Creators;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $users = \DB::table('users')->pluck('name');

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
        return view('show', compact('projectlist', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectlist = new Projectlist;

        $categories = \DB::table('categories')->pluck('category_name');

        $users = \DB::table('users')->pluck('name');

        $departments = \DB::table('departments')->pluck('department_name');

        $status = \DB::table('status')->pluck('status_name');

        $clients = \DB::table('clients')->pluck('client_name');

        return view('new', compact('projectlist', 'categories', 'users', 'departments', 'status', 'clients'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projectlist = new Projectlist;
        $user = \Auth::user();

        $projectlist->project_name = request('project_name');
        $projectlist->department_name = request('department_name');
        $projectlist->sales_name = request('sales_name');
        $projectlist->client_name = request('client_name');
        $projectlist->price = request('price');
        $projectlist->status = request('status');
        $projectlist->author_name = $user->name;
        $projectlist->save();

        $data = [];

        for ($i=0; $i < count(request('creator_name')); $i++) {

          $data[]= array ('creator_name'=>$request['creator_name'][$i],
                          'id'=>$projectlist->id,
                          'creator_price'=>$request['creator_price'][$i],
                          'creator_category'=>$request['creator_category'][$i]);

        }

        DB::table('creators')->insert($data);

        return redirect()->route('projectlist.detail', ['id' => $projectlist->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ifrojectlist  $projectlist
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectlist = Projectlist::find($id);
        $user = \Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = "";
        }

        return view('detail', ['projectlist' => $projectlist, 'login_user_id' => $login_user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projectlist  $projectlist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectlist = Projectlist::find($id);
        $creators = Creators::all()->where('id',$id);

        $users = \DB::table('users')->pluck('name');

        $categories = \DB::table('categories')->pluck('category_name');

        $departments = \DB::table('departments')->pluck('department_name');

        $status = \DB::table('status')->pluck('status_name');

        $clients = \DB::table('clients')->pluck('client_name');

        return view('edit', compact('projectlist', 'creators', 'users', 'categories', 'departments', 'status', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projectlist  $Projectlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Projectlist $projectlist)
    {
        $projectlist= Projectlist::find($id);
        $projectlist->project_name = request('project_name');
        $projectlist->department_name = request('department_name');
        $projectlist->sales_name = request('sales_name');
        $projectlist->client_name = request('client_name');
        $projectlist->price = request('price');
        $projectlist->status = request('status');
        $projectlist->save();

        $old_creators = Creators::find($id);
        $old_creators->delete();

        $data = [];

        for ($i=0; $i < count(request('creator_name')); $i++) {

          $data[]= array ('creator_name'=>$request['creator_name'][$i],
                          'id'=>$projectlist->id,
                          'creator_price'=>$request['creator_price'][$i],
                          'creator_category'=>$request['creator_category'][$i]);

        }

        DB::table('creators')->insert($data);

        return redirect()->route('projectlist.detail', ['id' => $projectlist->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projectlist  $projectlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectlist = Projectlist::find($id);
        $creators = Creators::find($id);

        $projectlist->delete();
        $creators->delete();
        return redirect('/projectlist');
    }
}
