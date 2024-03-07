<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        //$data =[
        //    'level_id'=>2,
        //    'username'=>'manager_tiga',
        //    'nama'=>'Manager 3',
        //    'password'=>Hash::make('12345')
        //];
        //UserModel::insert($data);
        //tambah data user dengan Eloquent Model
        //$data = [
           //'nama' => 'Pelanggan Pertama',
       //];
       // UserModel::where('username', 'customer-1')->update($data); //tambahkan data ke tabel m_user

        //coba akses model UserModel
        $user = UserModel::create(
            [
                'username'=>'manager11',
                'nama'=>'Manager11',
                'password'=>Hash::make('12345'),
                'level_id'=>2
            ],
        ); 
        $user->username='manager12';
        $user->save();
        $user->wasChanged();//true
        $user->wasChanged('username');//true
        $user->wasChanged(['username','level_id']);//true
        $user->wasChanged('nama');//false
        dd($user->wasChanged(['nama','username']));//true

        //$user->isDirty();//true
        //$user->isDirty('username');//true
        //$user->isDirty('nama');//false
        //$user->isDirty(['nama','username']);//true

        //$user->isClean();//false
        //$user->isClean('username');//false
        //$user->isClean('nama');//true
        //$user->isClean(['nama','username']);//false


        //$user->isDirty();//false
        //$user->isClean();//true
        //dd($user->isDirty());

        
        //$user = UserModel::where('level_id',2)->count(); 
        //dd($user);
        return view('user', ['data' => $user]);
    }
}