<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Constructor del controlador.
     *
     * Este constructor asegura que los usuarios no autenticados puedan acceder solo a las
     * rutas definidas en la excepción de 'logout'.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirige al usuario después de la autenticación basada en su rol.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard'); // Redirige a la ruta del dashboard del administrador
        } elseif ($user->isSeller()) {
            return redirect()->route('seller.dashboard'); // Redirige a la ruta del dashboard del vendedor
        } else {
            return redirect()->route('home'); // Redirige a la ruta por defecto para otros usuarios
        }
    }
}
