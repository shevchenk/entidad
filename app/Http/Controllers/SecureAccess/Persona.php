<?php
namespace App\Http\Controllers\SecureAccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Persona extends Controller
{
    use AuthenticatesUsers;

    protected $loginView = 'secureaccess.login';

    public function authenticated(Request $r)
    {
        $result['rst']=1;
        //$r->session()->set('dni',$r->dni);
        return response()->json($result);
    }

    public function username()
    {
        return "dni";
    }

    
}
