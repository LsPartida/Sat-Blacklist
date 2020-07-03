<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancelado;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void

    public function __construct()
    {
        $this->middleware('auth');
    }
 */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        if (isset($request->rfc)){
            if (Cancelado::where('rfc', '=', $request->rfc)->exists()) {
                $response = 'CANCELADO';
            }else{
                $response = 'NO LISTADO';
            }
        }else{
           // dd($request);
		$response=null;
        }
        //dd($request);
        return view('welcome')->with('response',$response);
    }
}
