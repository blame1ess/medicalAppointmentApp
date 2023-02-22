<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class
DashboardController extends Controller
{
    public function dashboard() {

        $type = Auth::user()->user_type;

        $messages = \App\Models\Message::query()
            ->where('user_id', Auth::user()->id)
            ->get()
            ->toArray();

        $user = User::query()->where('id', Auth::user()->id)->first();

        return view('dashboard', [
            'type' => $type,
            'messages' => $messages,
            'user' => $user,
        ]);


    }

    public function delete($id) {
        Message::query()->where('id', $id)->delete();

        return(redirect('dashboard'));
    }
}
