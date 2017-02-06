<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Role;
use App\Permission;

class RolesController extends Controller
{


    public function __construct(){
        $this->middleware("auth",["only"=>"index"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $roles=Auth::user()->roles()->get();
        //多对多的查询
        // foreach ($roles as $role) {
        //     echo $role->name;
        // }

        //多对多的保存 创建一个新角色并立即分配给用户
        // $role=new Role();
        // $role->name="test";
        // $role->label="test";
        // Auth::user()->roles()->save($role);
        

        //操作中间表，找到角色名为文章编辑的角色并分配给用户
        // $roleid=Role::where('name','文章编辑')->first()->id;
        // Auth::user()->roles()->attach($roleid);
        //同理操作中间表，删除一条记录用detach
       // $users= User::with('roles')->get();
       // foreach ($users[1]->roles as $key => $value) {
       //     echo $value->name;
       // }

       // if(Auth::user()->roles()->get()->contains('name','超级管理员')){
       //      echo "string";
       // }

        // if(Auth::user()->isSuperAdmin()){
        //     $roles=Role::paginate(3);
        //     return view('admin.role.index',compact('roles'));
        // }else{
        //     $roles=Auth::user()->roles()->paginate(3);
        //     return view('admin.role.index',compact('roles'));
        // }

        $roles=Role::paginate(3);
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->authorize('destroy', $status);
        // if (Gate::allows('destroy', $post)) {
        //     abort(403);
        // }

       
    }

    /**
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

        // test_autoload();//测试自定义函数和类的autoload

        $role=Role::findOrFail($id);

        $permissions=Permission::get();
        return view('admin.role.edit',compact('role','permissions'));
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
        $role=Role::findOrFail($id);
        $role->name=$request->name;
        $role->label=$request->label;
        $role->description=$request->description;
        $role->save();        
        $permissions=$role->permissions;
        $arr=[];//之前拥有的权限
        foreach ($permissions as $key=>$permission) {
            $arr[$key]=$permission->id;
        }
        foreach ( collect($arr)->unique()->all() as $key => $value) {
            if(collect($request->permissions)->contains($value)){
            }else{
               $role->permissions()->detach($value); 
            }
         };
        
        foreach ($request->permissions as $key => $value) {
            if(!collect($arr)->unique()->contains($value)) {
                $role->permissions()->attach($value);
            }
        } 
        
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
