<?php

// DB::listen(function ($sql, $bindings, $times) {
//     echo $sql;
// });

Route::get('/', function()
{
	return View::make('inicio');
});

Route::get('historia', function()
{
    return View::make('informacion.historia');
});

Route::get('mision', function()
{
    return View::make('informacion.mision');
});

Route::get('vision', function()
{
    return View::make('informacion.vision');
});

Route::get('objetivos', function()
{
    return View::make('informacion.objetivos');
});

Route::get('tramites/solicitud-de-credito', function()
{
    return View::make('informacion.solicitudDeCredito');
});

Route::get('tramites/reestructuracion-de-credito', function()
{
    return View::make('informacion.reestructuracionDeCredito');
});

Route::get('tramites/desembolso-de-credito', function()
{
    return View::make('informacion.desembolsoDeCredito');
});

Route::get('tramites/constitucion-de-hipoteca', function()
{
    return View::make('informacion.constitucionDeHipoteca');
});

Route::get('tramites/cancelacion-de-hipoteca', function()
{
    return View::make('informacion.cancelacionDeHipoteca');
});

Route::group(array('before' => 'auth'), function(){
    Route::get('estado-de-mi-cuenta', 'UsuarioController@estadoCuenta');
    Route::get('usuarios/cambiar-clave', 'UsuarioController@getCambiarClave');
});

Route::controller('usuarios', 'UsuarioController');

/*
Route::get('cambiar-tipo-clave', function()
{
    $sql = "ALTER TABLE usuarios CHANGE clave clave VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'araucos123'";

    DB::statement($sql);

    return '<p>SQL ejecutado con éxito.</p>'. $sql;
});
*/

/*
Route::get('hashear-claves', function()
{
    Queue::push(function($job)
    {
        ini_set('memory_limit', '512M');
        set_time_limit(300);

        $usuarios = User::all();

        foreach ($usuarios as $usuario) {
            if ($usuario->clave == $usuario->id)
            {
                $usuario->clave = Hash::make($usuario->clave);
                $usuario->save();
            }
        }

        $job->delete();
    });

    return 'Claves hasheadas satisfactoriamente.';

});
*/
