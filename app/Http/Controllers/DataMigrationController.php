<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\UserProfile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DataMigrationController extends Controller
{
    public function index(){
        return view('index');
    }
    public function migrateCustomer(){
        // get data from old database
        $customerData = DB::connection('mysql_2')->table('customers')->get();
        
        DB::beginTransaction();
        try {
            // clear existing data
            DB::table('user_profiles')->delete();
            DB::table('users')->delete();

        foreach ($customerData as $row){
           
            $userData = [
                'id'            => $row->id,
                'name'          => $row->name,
                'email'         => $row->email,
                'password'      => Hash::make(mt_rand(999, 99999)),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ];

            // insert name, email and password in users table
            $user = User::create($userData);

            $userProfileData = [
                'user_id'       => $user->id,
                'phone'        => $row->phone,
                'address'       => $row->address,
                'city'          => $row->city,
                'state'         => $row->state,
                'zip'           => $row->zip,
                'dob'           => $row->dob,
                'gender'        => $row->gender,
                'company_name'  => $row->company_name,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ];

            // remaining all data goes to user_profiles table
            UserProfile::create($userProfileData);
        }
        DB::commit();
        return back()->with('success', 'Customer Data migration is successful');
    }
        catch(\Throwable $th ){
            DB::rollBack();     
            return back()->with('error', $th->getMessage());  
        }
    }
}
