<?php

namespace App\Http\Controllers\admin;
use auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
{
    return view('admin/mainadmin');
}

}
