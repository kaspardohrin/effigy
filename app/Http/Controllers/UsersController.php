<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, $id)
    {
        $admin = auth()->user()->admin;
        if (!$admin) return redirect('/posts');

        $user = User::where('id', $id)->
            update([
                'admin' => !User::find($id)->admin,
            ]);

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $admin = auth()->user()->admin;

        if (!$admin) return redirect('/posts');

        $u = User::find($id);

        $u->delete();

        return back();
    }
}
