<?php

class UsuarioController extends BaseController
{
    public function getLogin()
    {
        return Redirect::to('/');
    }

    public function postLogin()
    {
        $cedula = Input::get('cedula');
        $clave = Input::get('clave');

        $credenciales = array(
            'id' => $cedula,
            'password' => $clave
        );

        if (Auth::attempt($credenciales)) {

            return Redirect::to('estado-de-mi-cuenta');

        } else {

            return Redirect::back();

        }

    } #postLogin

    public function getLogout()
    {
        Auth::logout();
        Session::flush();

        return Redirect::to('/');

    } #getLogout

    public function estadoCuenta()
    {
        return View::make('users.cuenta');

    } #estadoCuenta

    public function getCambiarClave()
    {
        return View::make('users.cambiarClave');

    } #getCambiarClave

    public function postCambiarClave()
    {
        $input = Input::all();

        $reglas = array(
            'clave' => 'required',
            'clave2' => 'confirmed|min:5|max:100'
        );

        $mensajes = array(
            'required' => 'Este campo es obligatorio.',
            'clave2.confirmed' => 'La nueva clave no coincide.',
            'clave2.min' => 'La nueva clave debe tener al menos 5 caracteres.'
        );

        $validador = Validator::make($input, $reglas, $mensajes);

        if($validador->passes())
        {
            $usuario = Auth::user();
            $chequeo = Hash::check($input['clave'], $usuario->clave);

            if($chequeo)
            {
                $usuario->clave = Hash::make($input['clave2']);
                $usuario->save();

                Session::flash('mensajeOk', 'Has cambiado tu clave con éxito.');

                return Redirect::to('usuarios/cambiar-clave');

            } else {

                Session::flash('mensajeError', 'La clave actual no es válida.');

                return Redirect::to('usuarios/cambiar-clave');
            }

        } else {

            return Redirect::to('usuarios/cambiar-clave')->withErrors($validador);
        }

    } #postCambiarClave

} #UsuarioController