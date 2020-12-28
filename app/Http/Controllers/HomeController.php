<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home');
    }

    public function users(){
        $users=User::all();
        //$roles=$user->roles;
        
        return view("worker",['users'=>$users,"layout"=>"users"]);
    }

    public function addRoleToUser($id){
        $users=User::all();
        $user = User::find($id);
        $allRoles=Role::all();
        $role1=Role::all()->first();
        $userRoles=$user->roles()->get();
        $userRolesNames=array();
        foreach($userRoles as $role){
            //$userRolesNames.push($role->name);
            array_push($userRolesNames,$role->name);
        }
        //dd($userRolesNames);

        //dd(in_array($role1,$allRoles));
        //dd($role1);
        return view("worker",['users'=>$users,'user'=>$user, 'userRolesNames'=>$userRolesNames, 'allRoles'=>$allRoles,"layout"=>"addRoleToUser"]);
    }

    public function addRoleToUser2(Request $request, $id){
        $user = User::find($id);
        $userRoles=$user->roles;
        //dd($request->input("userRoles"));
        $chosenRoles=$request->input("userRoles");
        $counter=0;
        //dd($user->roles()->get()[0]->name);
        $userRoles=$user->roles()->get();
        foreach($userRoles as $role){
            $user->roles()->detach($role);
        }
        //dd($user->roles()->get());

        if(!$chosenRoles==null){
            foreach($chosenRoles as $chosenRole){
                $xRole=Role::where("name",$chosenRole)->first();
                $user->roles()->attach($xRole);
            }
        }
        //dd($user->roles()->get());


        //$xRole=Role::where("name",$chosenRoles[0])->first();
        //dd($user->hasRole($xRole->name));

        return redirect()->back();
    }

    public function access(){
        /*$permission= Permission::where("name","admination")->first();
        $a=explode(" ",$permission->functions);
        dd($a);*/
        $permissions=Permission::all();
        return view("worker",['permissions'=>$permissions,"layout"=>"newAccess"]);
    }

    public function accessDetails($id){
        $permissions=Permission::all();
        $permission = Permission::find($id); 
        $functions=explode(" ",$permission->functions);
        $permissionName=$permission->name;
        return view("worker",['permissions'=>$permissions, "permissionName"=>$permissionName,'functions'=>$functions,"layout"=>"newAccessDetails"]);
    }

    public function toAdd(){
        $permissions=Permission::all();
        $permission= Permission::where("name","admination")->first();
        $functions=explode(" ",$permission->functions);
        $permissionName=$permission->name;
        return view("worker",['permissions'=>$permissions, "permissionName"=>$permissionName,'functions'=>$functions,"layout"=>"addNewAccess"]);


    }

    public function addNewAccess(Request $request){
        //dd($request->input("accessName"),$request->input("functions"));
        $newPermission= new Permission();
        $newPermission->name=$request->input("accessName");
        $newPermission->functions=$request->input("functions");
        $newPermission->save();
        return redirect()->back();
    }

    public function toAddFunction($permissionName){
        $permission = Permission::where('name',$permissionName)->first();
        $permissions=Permission::all();
        return view("worker",['permissions'=>$permissions,'permission'=>$permission,"layout"=>"addFunctionToPermission"]);;
    }

    public function addFunction($permissionName){
        $permission = Permission::where('name',$permissionName)->first();
        return redirect()->back();
    }

    public function deleteFunctionFromPermission($permissionName,$function){
        $permission = Permission::where('name',$permissionName)->first();
        //dd($permission->name);
        $functions=explode(" ",$permission->functions);
        for($i=0;$i<count($functions);$i=$i+1){
            if($functions[$i] == $function){
                array_splice($functions, $i, 1);
            }
        }
        $permission->functions=implode(" ",$functions);
        $permission->save();
        return redirect()->back();
    }

    public function removePermission($permissionName){
        $permission = Permission::where('name',$permissionName)->first();
        //dd($permission);
        $permission->delete();
        return redirect()->back();
    }


    public function roles(){
        $roles=Role::all();
        return view("worker",['roles'=>$roles,"layout"=>"roles"]);
    }


    public function toAdd2(){
        $roles=Role::all();
        //$permission= Permission::where("name","admination")->first();
        //$functions=explode(" ",$permission->functions);
        //$permissionName=$permission->name;
        return view("worker",['roles'=>$roles, "layout"=>"addNewRole"]);


    }

    public function addNewRole(Request $request){
        //dd($request->input("accessName"),$request->input("functions"));
        $newRole= new Role();
        $newRole->name=$request->input("roleName");
        $newRole->save();
        return redirect()->back();
    }


    public function rolesDetails($id){
        $roles=Role::all();
        $role = Role::find($id); 
        //$functions=explode(" ",$permission->functions);
        $roleName=$role->name;
        //dd($role->permissions);
        return view("worker",['roles'=>$roles,'role'=>$role,"layout"=>"rolesDetails"]);
    }

    public function addPermissionToRole($id){
        $roles=Role::all();
        $role = Role::find($id); 
        return view("worker",['roles'=>$roles,'role'=>$role,"layout"=>"addRolePermission"]);
    }

    public function addPermissionToRolePost(Request $request, $id){
        $role = Role::find($id);
        $permissionName=$request->input("permissionName");
        $permission= Permission::where('name',$permissionName)->first();
        $role->permissions()->attach($permission);
        //$role->save();
        //dd($role->permissions);
        return redirect()->back();
    }

    public function deletePermissionFromRole($permissionName,$roleID){
        //dd($permissionName);
        $role = Role::find($roleID);
        $permission= Permission::where('name',$permissionName)->first();
        $role->permissions()->detach($permission);
        return redirect()->back();
    }
    public function removeRole($id){
        $role = Role::find($id);
        //dd($role);
        $role->delete();
        return redirect()->back();
    }

}
