<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Validator;
use Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::paginate(10);
      return view('users.index')
              ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $rules = array(
          'name' => 'required',
          'address' => 'required',
          'phone' => 'required'
        );
        // custom message
        $messages = array(
          'name.required' => 'Masukkan nama lengkap anda',
          'address.required' => 'Masukkan alamat anda',
          'phone.required' => 'Masukkan nomor telepon anda'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('users/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
          // store data
          $user = new User;
          $user->name = Input::get('name');
          $user->address = Input::get('address');
          $user->phone = Input::get('phone');
          $user->save();

          // redirect
          \Session::flash('message', 'Successfully created user!');
          return redirect('users');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        // redirect
        return view('users.show')
                ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        // redirect
        return view('users.edit')
                ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
          'name' => 'required',
          'address' => 'required',
          'phone' => 'required'
        );
        // custom message
        $messages = array(
          'name.required' => 'Masukkan nama lengkap anda',
          'address.required' => 'Masukkan alamat anda',
          'phone.required' => 'Masukkan nomor telepon anda'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('users/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
          $user = User::find($id);
          $user->name = Input::get('name');
          $user->address = Input::get('address');
          $user->phone = Input::get('phone');
          $user->save();

          // redirect
          \Session::flash('message', 'Successfully updated user!');
          return redirect('users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        // redirect
        \Session::flash('message', 'Successfully deleted user!');
        return redirect('users');
    }
}
