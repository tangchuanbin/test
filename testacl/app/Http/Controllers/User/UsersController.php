<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware("auth",["only"=>"index"]);
    }
    public function index()
    {
        $users=User::paginate(10);
        return view("admin.user.index",['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password='test';
        $user->save();
        $users=User::paginate(10);
        return view("admin.user.index",['users' => $users]);
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
        $user=User::findOrFail($id);
        $user->delete();
        session()->flash('success',"删除成功");
        return back();
    }
    public function grant($id){
        $roles=Role::get();
        $roles=$roles->filter(function($item){
            return $item->id > 1;
        });
        $user=User::findOrFail($id);
        return view('admin.user.grant',compact('roles','user'));
    }
    public function storeGrant(Request $request,$id){
        $user=User::findOrFail($id);
        $has=$user->roles;
        $now=$request->roles;

        if(count($now)==0){
            $user->roles()->detach();
        }else{        
            foreach ($now as $key => $value) {
                if(!$has->contains('id',$value)){
                    $user->roles()->attach($value);
                }
            }
            foreach ($has as $key => $value) {
                if(!collect($now)->contains($value->id)){
                    $user->roles()->detach($value->id);
                }
            }
        }

        $users=User::paginate(10);
        return view("admin.user.index",['users' => $users]);

    }
}
