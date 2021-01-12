<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Attendance;
use App\Models\Worker;
use Auth;
use Hash;

require_once '../vendor/autoload.php';
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function addNewUser(){

        if(Auth::user()->userType==0){
            return view("worker",["layout"=>"addNewUser"]);
        }
        else{
            return redirect()->back();
        }

    }

    public function addNewUserPOST(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user1=new User();
        $user1->name=$request->name;
        $user1->email=$request->email;
        $user1->password=Hash::make($request->password);
        $user1->save();
        return redirect('/');
    }
    

    public function index(){
        return view('home');
    }

    public function users(){
        if(Auth::user()->userType==0){
            $users=User::all();
            return view("worker",['users'=>$users,"layout"=>"users"]);
        }
        else{
            return redirect()->back();
        }
        //$roles=$user->roles;

        /*$dt= new Carbon();
        //dd($dt->format('H:i'));
        //$dt->format('Y-m-d');
        //echo $dt->toTimeString();
        $attend= Attendance::find(1) ;
        //$attend->date=$dt->toDateString();
        //$attend->arriveTime=$dt->toTimeString();
        //$attend->leaveTime=$dt->toTimeString();
        //$attend->save();
        //dd($attend->arriveTime);
        dd($dt->diffForHumans($attend->arriveTime));*/

        /*$dt=date('H:i:s');
        //dd($dt);
        $attend2=new Attendance();
        $attend2->date=date('Y-m-d');
        $attend2->arriveTime=date('H:i:s');
        $attend2->leaveTime=date('H:i:s');
        $attend2->save();
        dd($attend2);*/
    }

    public function addRoleToUser($id){
        if(Auth::user()->userType==0){

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
        else{
            return redirect()->back();
        }
    }

    public function addRoleToUser2(Request $request, $id){
        if(Auth::user()->userType==0){

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
        else{
            return redirect()->back();
        }
    }

    public function access(){
        if(Auth::user()->userType==0){

            /*$permission= Permission::where("name","admination")->first();
            $a=explode(" ",$permission->functions);
            dd($a);*/
            $permissions=Permission::all();
            return view("worker",['permissions'=>$permissions,"layout"=>"access"]);

        }
        else{
            return redirect()->back();
        }
    }

    public function accessDetails($id){
        if(Auth::user()->userType==0){

            $permissions=Permission::all();
            $permission = Permission::find($id); 
            $functions=explode(",",$permission->functions);
            $permissionName=$permission->name;
            return view("worker",['permissions'=>$permissions, "permissionName"=>$permissionName,'functions'=>$functions,"layout"=>"newAccessDetails"]);

        }
        else{
            return redirect()->back();
        }
    }

    public function toAddPermission(){
        if(Auth::user()->userType==0){

            $permissions=Permission::all();
            $permission= Permission::where("name","admination")->first();
            $functions=explode(",",$permission->functions);
            $permissionName=$permission->name;
            return view("worker",['permissions'=>$permissions, "permissionName"=>$permissionName,'functions'=>$functions,"layout"=>"addNewAccess"]);
        }
        else{
            return redirect()->back();
        }

    }

    public function toAddRole(){

        if(Auth::user()->userType==0){
            $roles=Role::all();
            //$permission= Permission::where("name","admination")->first();
            //$functions=explode(" ",$permission->functions);
            //$permissionName=$permission->name;
            return view("worker",['roles'=>$roles, "layout"=>"addNewRole"]);
        }
        else{
            return redirect()->back();
        }


    }

    public function addNewAccess(Request $request){
        $request->validate([
            'accessName' => ['required'],
        ]);

        if(Auth::user()->userType==0){

            //dd($request->input("accessName"),$request->input("functions"));
            $newPermission= new Permission();
            $newPermission->name=$request->input("accessName");
            $newPermission->save();
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }


    }

    public function toAddFunction($permissionName){
        if(Auth::user()->userType==0){

            $adminPermissions = Permission::where('name','admination')->first();
            $adminFunctions=explode(",",$adminPermissions->functions);

            $permission = Permission::where('name',$permissionName)->first();
            //dd($permission);
            $permissionFunctions=explode(",",$permission->functions); ;

            $permissions=Permission::all();

            
            return view("worker",['permissions'=>$permissions,'permission'=>$permission,"adminFunctions"=>$adminFunctions, "permissionFunctions"=>$permissionFunctions,"layout"=>"addFunctionToPermission"]);
        }
        else{
            return redirect()->back();
        }

    }

    public function addFunction(Request $request,$id){
        if(Auth::user()->userType==0){

            //$permission = Permission::where('name',$permissionName)->first();
            $permission = Permission::find($id);

            $newFunctions=$request->input("newFunctions");
            $newFunctionsString= implode(",",$newFunctions);

            $permission->functions=$newFunctionsString;
            $permission->save();

            return redirect()->back();
        }
        else{
            return redirect()->back();
        }

    }

    public function deleteFunctionFromPermission($permissionName,$function){
        if(Auth::user()->userType==0){

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
        else{
            return redirect()->back();
        }
    }

    public function removePermission($permissionName){
        if(Auth::user()->userType==0){

            $permission = Permission::where('name',$permissionName)->first();
            //dd($permission);
            $permission->delete();
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }

    }

    public function roles(){
        if(Auth::user()->userType==0){

            $roles=Role::all();
            return view("worker",['roles'=>$roles,"layout"=>"roles"]);
        }
        else{
            return redirect()->back();
        }


    }

    public function addNewRole(Request $request){
        $request->validate([
            'roleName' => ['required'],
        ]);

        if(Auth::user()->userType==0){
            //dd($request->input("accessName"),$request->input("functions"));
            $newRole= new Role();
            $newRole->name=$request->input("roleName");
            $newRole->save();
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }

    }


    public function rolesDetails($id){

        if(Auth::user()->userType==0){

            $roles=Role::all();
            $role = Role::find($id); 
            //$functions=explode(" ",$permission->functions);
            $roleName=$role->name;
            //dd($role->permissions);
            return view("worker",['roles'=>$roles,'role'=>$role,"layout"=>"rolesDetails"]);
        }
        else{
            return redirect()->back();
        }


    }

    public function addPermissionToRole($id){

        if(Auth::user()->userType==0){

            $roles=Role::all();
            $role = Role::find($id); 

            $permissions=Permission::all();

            $rolePermissions=$role->permissions;
            
            $rolePermissionsNames=array();
            foreach($rolePermissions as $rolePermission){
                //$userRolesNames.push($role->name);
                array_push($rolePermissionsNames,$rolePermission->name);
            }

            return view("worker",['roles'=>$roles,'permissions'=>$permissions,'role'=>$role, 'rolePermissionsNames'=>$rolePermissionsNames, "layout"=>"addRolePermission"]);

        }
        else{
            return redirect()->back();
        }
    }

    public function addPermissionToRolePost(Request $request, $id){

        if(Auth::user()->userType==0){

            //dd($request->input("rolePermissions2"));
            /*$role = Role::find($id);
            $permissionName=$request->input("permissionName");
            $permission= Permission::where('name',$permissionName)->first();
            $role->permissions()->attach($permission);
            //$role->save();
            //dd($role->permissions); */

            $chosenPermissions=$request->input("rolePermissions2");
            $role = Role::find($id);

            $rolePermissions=$role->permissions()->get();
            foreach($rolePermissions as $permission){
                $role->permissions()->detach($permission);
            }

            if(!$chosenPermissions==null){
                foreach($chosenPermissions as $chosenPermission){
                    $xPermission=Permission::where("name",$chosenPermission)->first();

                    $role->permissions()->attach($xPermission);
                }
            }

            return redirect()->back();
        }
        else{
            return redirect()->back();
        }


    }

    public function deletePermissionFromRole($permissionName,$roleID){

        if(Auth::user()->userType==0){
            //dd($permissionName);
            $role = Role::find($roleID);
            $permission= Permission::where('name',$permissionName)->first();
            $role->permissions()->detach($permission);
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }


    }

    public function removeRole($id){

        if(Auth::user()->userType==0){
            $role = Role::find($id);
            //dd($role);
            $role->delete();
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }


    }

    public function changePassword(){
        if(Auth::user()->userType==0){
            $users=User::all();
            return view("worker", ["users"=>$users,"layout"=>"changePassword"]);
        }
        else{
            return redirect()->back();
        }
    }

    public function changePasswordForUserPOST(Request $request, $id){
        $request->validate([
            'newPassword' => ['required'],
        ]);

        if(Auth::user()->userType==0){
            $user=User::find($id);
            $newPassword=$request->input("newPassword");
            $user->password=Hash::make($newPassword);
            $user->save();
            return redirect('/');
        }
        else{
            return redirect()->back();
        }
    }

    public function changePasswordForUser($id){
        if(Auth::user()->userType==0){
            $user=User::find($id);
            return view("worker", ["user"=>$user,"layout"=>"changePasswordForm"]);
        }
        else{
            return redirect()->back();
        }
    }

}
