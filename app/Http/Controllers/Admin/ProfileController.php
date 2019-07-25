<?php

namespace App\Http\Controllers\Admin;

use App\Plan;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $current_user = User::find(Auth::id());
        $data = array(
            'user_plans' => $current_user->plan->name,
            'all_plans' => Plan::all(),
        );
        return view('backend.profile.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $plans = User::find(Auth::id());
        dd($plans->plan->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $user_id = Auth::id();
        if ($request->input('update_plan') == 'update') {
            $data = array(
                'plan_id' => $request->input('plan'),
            );
        } elseif ($request->input('update_info') == 'update-info') {
            $data = array(
                'first_name' => $request->input('first-name'),
                'last_name' => $request->input('last-name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'fax' => $request->input('fax'),
                'address' => $request->input('address'),
            );
        }
        $user = User::where('id', $user_id)->update($data);
        return redirect(route('profile.index'))->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
