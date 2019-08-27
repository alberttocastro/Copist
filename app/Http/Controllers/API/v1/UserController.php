<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Retorna todos os usuários cadastrados e aprovados
     */
    public function users()
    {
        $data = array();
        foreach (\App\User::approved_users() as $user) {
            $user->publisher = $user->publisher;
            $data[] = $user;
        }
        return [
            'data' => $data
        ];
    }

    /**
     * Retorna todos os usuários que ainda não foram designados para um cartão
     */
    public function users_for_card(Request $request, $id)
    {
        $data = array();
        foreach (\App\User::approved_users() as $user) {
            if (\App\Assignment::where('card_id', $id)->where('user_id', $user->id)->whereNull('completion_date')->get()->count() == 0) {
                $user->publisher = $user->publisher;
                $data[] = $user;
            }
        }

        return [
            'data' => $data
        ];
    }

    public function create_user(Request $request)
    {
        //TODO: Salvar senha criptografada
        return \App\User::create($request->toArray());
    }

    public function update_user($id, Request $request)
    {
        //TODO: Verificar se é um administrador, ou se é o próprio usuário
        return \App\User::find($id)->update($request->toArray());
    }

    public function destroy_user($id)
    {
        \App\User::find($id)->delete();
    }
}
