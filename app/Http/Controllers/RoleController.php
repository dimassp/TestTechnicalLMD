<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    public function index()
    {
        return view('role.index');
    }

    public function edit($id)
    {
        $item = Role::find($id);
        return view('role.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $model = Role::find($id);
        
        $access_control = $request->access_control;
        $access_control_list = [];
        foreach ($access_control as $key => $on) {
            $access_control_list[] = $key;
        }
        $model->access_control = json_encode($access_control_list);
        $model->name = $request->name;
        $model->code = $request->code;
        if($model->save()){
            return redirect()->route('role.index');
        } else {
            return redirect()->route('role.index')->with('error', 'Terjadi kesalahan saat mengupdate data');
        }
        
    }

    public function search(Request $request)
    {
        $query = Role::query();

        $role_list_count = $query->count();

        $role_list = $query
            ->get();

        $data = array();

        foreach ($role_list as $key => $value) {

            $subAction = "";
            $subAction = $subAction . '' . '<li><a class="dropdown-item" href="' . route('role.edit', $value->id) . '">Edit</a></li>';
            $action = "";
            if ($subAction != "") {
                $action =
                    '
                <div class="dropdown">
                    <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu">
                    ' . $subAction . '                    
                    </ul>
                </div>
                ';
            }
            array_push($data, array(
                $value->name,
                $value->code,
                ($action != "") ? $action : null
            ));
        }

        return array(
            "draw"              => $request->get('draw', 0),
            "data"              => $data,
            "recordsTotal"      => $role_list_count,
            "recordsFiltered"   => $role_list_count
        );
    }
}
