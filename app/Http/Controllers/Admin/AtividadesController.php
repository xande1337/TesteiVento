<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 19/05/2017
 * Time: 22:00
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AtividadesController extends Controller
{

    public function index(Request $request){

        return view('admin.Atividades.index');

    }

}