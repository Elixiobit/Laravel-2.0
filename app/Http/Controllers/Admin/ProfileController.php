<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminValidationUserForm;
use App\Models\User;
use Illuminate\Http\Request;
use function React\Promise\all;

class ProfileController extends Controller
{
    public function index()
    {
        $usersList = (new User())->getUsers();
        return view('admin.profile.listUser', [
            'usersList' => $usersList
        ]);
    }


    public function update(AdminValidationUserForm $request)
    {
        $userId = $request->get('id');
        $user = User::make()->getUser($userId);
        $errors = [];
        if ($request->isMethod('post')) {
            $password = $request->post('password');
            if (\Hash::check($request->post('current_password'), $user->password)) {
                if (!empty($password)) {
                    $user->password = \Hash::make($password);
                }
                $user->name = $request->post('name');
                $user->email = $request->post('email');
                $user->is_admin = $request->post('isAdmin');
                $user->save();
            } else {
                $errors['current_password'][] = 'Пароль указан неверно';
            }
            return redirect()->route('admin::profile::update', ['id' => $user])
                ->withErrors($errors)
                ->with('success', "Данные сохранены");
        }
        return view('admin.profile.update', ['user' => $user]);
    }


    public function showRegistrationForm()
    {
        return view('admin.profile.register');
    }


    public function register(AdminValidationUserForm $request)
    {
        $error = [];
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;
        if ($password === $password_confirmation) {
            $user = new User();
            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => \Hash::make($password),
                'is_admin' => $request->isAdmin,
            ])
                ->save();
            return redirect()->route('admin::profile::register')
                ->with('success', "Пользователь добавлен!");
        } else {
            $error['password'][] = 'Пароли не совподают';
            return redirect()->route('admin::profile::register')
                ->withErrors($error);
        }
    }

    public function delete($id)
    {
        User::destroy([$id]);
        return redirect()->route('admin::profile::userList');
    }
}
