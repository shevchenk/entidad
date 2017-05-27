<?php
namespace App\Http\Controllers\SecureAccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\SecureAccess\Persona;

class Persona extends Controller
{
    use AuthenticatesUsers;

    protected $loginView = 'secureaccess.login';

    public function authenticated(Request $r)
    {
        $result['rst']=1;
        $menu = Persona::Menu();
        $session= array(
            'menu'=>$menu,
            'dni'=>$r->dni
        );

        session($session);
        return response()->json($result);
    }

    public function username()
    {
        return "dni";
    }

    
}
