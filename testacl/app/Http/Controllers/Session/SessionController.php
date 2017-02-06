<?php

namespace App\Http\Controllers\Session;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Auth;
class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth',['only'=>['index']]);
    }
    public function index()
    {

        $data['tasks'] = [
                    [
                        'name' => 'Design New Dashboard',
                        'progress' => '87',
                        'color' => 'danger'
                    ],
                    [
                        'name' => 'Create Home Page',
                        'progress' => '76',
                        'color' => 'warning'
                    ],
                    [
                        'name' => 'Some Other Task',
                        'progress' => '32',
                        'color' => 'success'
                    ],
                    [
                        'name' => 'Start Building Website',
                        'progress' => '56',
                        'color' => 'info'
                    ],
                    [
                        'name' => 'Develop an Awesome Algorithm',
                        'progress' => '10',
                        'color' => 'success'
                    ]
            ];
            // $data["users"]=User::get();//get()方法取出所有数据
            $data["users"]=DB::table('users')->get();
            /*上面两个方法可以取出表中的所有数据*/

            return view("admin.index",$data);
    }

    public function test(){

        // $users=User::simplePaginate(10);
        // $jsondata=User::all()->toJson();
        // var_dump($jsondata);
        // echo $jsondata;

        // return view("admin.test",['users'=>$users]);
        return view('admin.test.child');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.session.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'email' => 'required|email|max:255',
           'password' => 'required'
       ]);
        
        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($credentials)) {
            return redirect()->intended(route('index'));
        }else {
            session()->flash("danger","很抱歉,邮箱和密码不正确");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
