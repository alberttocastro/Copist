<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function update_permission(Request $request)
    {
        $permission = $request->permissions;
        foreach ($permission as $user_id => $value) {
            $user = \App\User::find($user_id);
            if ($user->publisher_id != $value) {
                $user->publisher_id = (int) $permission[$user->id];
                $user->save();
            }
        }
    }
}
