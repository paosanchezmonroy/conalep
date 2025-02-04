<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        // Valida los datos del formulario
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Busca el usuario por email
        $user = User::where('email', $credentials['email'])->first();
    
        if ($user) {
            // Verifica si la contraseña no está hasheada y corrige
            if (!Hash::info($user->password)['algoName']) {
                $user->password = Hash::make($credentials['password']);
                $user->save();
            }
            
    
            // Verifica la contraseña hasheada
            if (Hash::check($credentials['password'], $user->password)) {
                // Inicia sesión al usuario
                Auth::login($user);
    
                // Redirige según el rol
                if ($user->role === 'admin') {
                    return redirect('/dashboard')->with('success', 'Bienvenido, administrador');
                } elseif ($user->rol === 'user') {
                    return redirect('/dashboardUser')->with('success', 'Bienvenido');
                }
                
    
                // Redirección predeterminada (por si no hay rol definido)
                return redirect('/')->with('success', 'Inicio de sesión exitoso');
            }
        }
    
        // Si las credenciales no son correctas, regresa al login con error
        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }
    

}
