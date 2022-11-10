<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordFormValidation;
use App\Http\Requests\UserEditFormValidation;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        return view('index');
    }
    public function customers() {
        $customers = Customer::orderBy('id','DESC')->paginate(20);
        return view('customers', compact('customers'));
    }
    public function search(Request $request,$field) {
        $search = $request->q;
        $fields = ['email','phone','name'];
        $customers = Customer::where($field, 'like', '%'.$search.'%')->orderBy('id','DESC')->limit(100)->get();
        return view('search', compact('customers','search','field','fields'));
    }
    public function editUsers(User $user) {
        return view('user.users-edit',compact('user'));
    }
    public function editSubmitUsers(UserEditFormValidation $request, User $user) {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        session()->flash('warning', 'Профайл збережено');
        return redirect()->route('admin-index');
    }
    public function editPassword(User $user) {
        return view('admin.user.editpassword', compact('user'));
    }
    public function updatePassword(ChangePasswordFormValidation $request, User $user) {
        $user->password = bcrypt($request->input('new_password'));
        $user->save();
        session()->flash('warning','Пароль змінено');
        return redirect()->route('admin-index');
    }
}
