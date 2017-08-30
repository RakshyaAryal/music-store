<?php


namespace App\Libraries;

use App\Models\AdminUserAccess;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class   AccessListLibrary
{

    public static function accessList()
    {
        return [
            /*'dashboard' => 'Dashboard',*/
            'generes' => 'Generes',
        ];
    }

    public static function haveAccess($urlSegment2)
    {
        $urlSegment1 =  Request::segment(1);
        if ($urlSegment1 == "users"){
            $user_id = Auth::user()->id;
            $accessListByUser = AdminUserAccess::where('admin_user_id',$user_id)->get();
            $arr = [];
            foreach ($accessListByUser as $item){
                $arr[] =$item->module;
            }
            if(in_array($urlSegment2,$arr)){
                return true;
            }
            return false;


        }
    }
}
