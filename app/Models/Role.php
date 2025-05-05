<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model
{
    protected $table = 'roles';


    const ACCESS_ROLE_LIST = "ACCESS_ROLE_LIST";
    const ACCESS_USER_LIST = "ACCESS_USER_LIST";
    const ACCESS_DASHBOARD = "ACCESS_DASHBOARD";

    public static function getMenuAccess()
    {
        return [
            (object)[
                "key" => self::ACCESS_DASHBOARD,
                "label" => "Dashboard"
            ],
            (object)[
                "key" => self::ACCESS_ROLE_LIST,
                "label" => "Role"
            ],
            (object)[
                "key" => self::ACCESS_USER_LIST,
                "label" => "User"
            ],
        ];
    }

    public function checkAccess($check_access_control)
    {
        if (!Auth::user()) {
            return redirect('auth.logout');
        }

        $access_control_list = json_decode($this->access_control);
        if (!in_array($check_access_control, $access_control_list)) {
            return false;
        } else {
            return true;
        }
    }
}
