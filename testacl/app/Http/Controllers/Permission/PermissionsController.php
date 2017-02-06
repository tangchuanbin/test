<?php

namespace App\Http\Controllers\Permission;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Auth;
use App\Permission;
use DB;
class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //用with方法取出role的时候会取出关联的permission
        // $roles=Auth::user()->roles()->with('permissions')->get();        
        // foreach ($roles as $role) {
        //     foreach ($role->permissions as $key => $value) {
        //        echo $value->name."<br/>";
        //     }            
        // }

        //上述方法可行，但是不太好分页，所以也可以不用model里面提供的
        // 多对多的ORM操作方法，直接用DB门面的查询构造器会更加简单

        //下面代码是取出该用户对应的权限，但是这样设计好像不太好，
        //若是一个用户有权限管理的权限那么他应该可以看到所有的权限
        // $ids=[];
        // $role_ids=DB::table('role_user')
        //         ->select('role_id')
        //         ->where('user_id',Auth::user()->id)
        //         ->get();
        // foreach ($role_ids as $key=>$role_id) {
        //     $ids[$key]=$role_id->role_id;
        // }
       
       
        // $permissions=DB::table('permissions')
        //     ->distinct()
        //     ->join('permission_role','id','=','permission_id')
        //     ->whereIn('role_id',$ids)
        //     ->paginate(3);
        // return view('admin.permission.index',compact('permissions'));
        $permissions=Permission::paginate(3);
        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission=new Permission;
        $permission->name=$request->name;
        $permission->label=$request->label;
        $permission->description=$request->description;
        $permission->save();
        $permissions=Permission::paginate(3);
        // return redirect()->back();
        session()->flash('success', '权限已经创建成功！');
        return view("admin.permission.index",compact('permissions'));
    }

    /**4
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();
        session()->flash("success","权限已经删除成功");
        return redirect()->back();
    }
}
