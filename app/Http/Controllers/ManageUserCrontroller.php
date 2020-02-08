<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Activitylog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class ManageUserCrontroller extends Controller
{

    public function index()
    {
        return view('user.manage_user');
    }

    public function create()
    {
        return view('user.add_user');
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $hashed = Hash::make($request->password);
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $hashed,

        ]);
        $user->save();
   
        return redirect()->route('user.index')
                        ->with('success','created successfully.');   
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::where('users.id', '=', $id)
            ->first();
        if ($user ->status == 1 ) {
            $user ->status = 'Active';
        }else{
            $user ->status = 'InActive';
        }

        $data = array(
            'user' => $user,
        );
        //dd($data);
        return view('user.view_user', $data);
    }

    public function update(Request $request, Customer $id)
    {
       
    }

    public function delete($id)
    {

        User::where('users.id','=',$id)->delete($id);
        

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
      }
       


    public function activeAdmin($id,$active)
    {
        //dd($id,$active);
        if($active == 1 ){
            $status = 2;
        }else {
            $status = 1;
        }
        User::Where('users.id', '=', $id)
            ->update([
                'type' => $status , 
            ]);

        return redirect()->route('user.index')
            ->with('success', 'Edit successfully');
    }

    public function activeStatus($id,$active)
    {
        //dd($id,$active);
        if($active == 1 ){
            $status = 2;
        }else {
            $status = 1;
        }
        User::Where('users.id', '=', $id)
            ->update([
                'status' => $status , 
            ]);

        return redirect()->route('user.index')
            ->with('success', 'Edit successfully');
    }

    public function getTable(Request $request)
    {
        $queryEmail = $request->get('Email');
        $query = User::select(
            'users.id AS users_id',
            'users.name',
            'users.email',
            'users.type',
            'users.status',
            'role.role_name'
            )      
            ->join('role', 'users.type', '=', 'role.id')
            ->where('email', 'LIKE', '%' . $queryEmail . '%')
            ->get();
    
        return DataTables()->of($query)
            ->addColumn('buttondelete', function ($query) {
                return 
                '<a class="btn btn-danger fa fa-eraser" style="padding:6px 12px" id="btnDelete" onclick="btnDelete(' . $query->users_id . ')"></a>';
            })
            ->addColumn('status', function ($query) {
                $buttons="";
                if($query->status == 1){
                 $buttons = '<a class="btn btn-success" type="button" style="padding:6px 12px" id="btnActive" href="user/activestatus/'.$query->users_id.'/1">Active</a>';
                }else{
                 $buttons = '<a class="btn btn-danger" type="button" style="padding:6px 12px" id="btnActive" href="user/activestatus/'.$query->users_id.'/2">In Active</a>';  
                }
                return $buttons;
             })
            ->addColumn('type', function ($query) {
                $buttons="";
                if($query->type == 1){
                 $buttons = '<a class="btn btn-success" type="button" style="padding:6px 12px" id="btnActive" href="user/activeadmin/'.$query->users_id.'/1">'.$query->role_name.'</a>';
                }else{
                 $buttons = '<a class="btn btn-danger" type="button" style="padding:6px 12px" id="btnActive" href="user/activeadmin/'.$query->users_id.'/2">'.$query->role_name.'</a>';  
                }
                return $buttons;
            })
            ->rawColumns(['buttondelete','status','type'])
            ->toJson();
    }
}