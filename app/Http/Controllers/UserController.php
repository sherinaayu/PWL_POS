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
        $user = UserModel::where('username','manager9')->firstOrFail(); //ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }
}