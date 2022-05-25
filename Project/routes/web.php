<?php

    use App\Http\Controllers\BoletinController;
    use App\Http\Controllers\PageController;
    use App\Http\Controllers\ProfileUpdate;
    use Illuminate\Support\Facades\Route;
    use App\Models\boletin;

    Route::get('/', [PageController::class, 'welcome'])->name( name: 'welcome');

    /*--------------------------------------------------------------------------
    | Routes Profile
    --------------------------------------------------------------------------*/
    Route::group( attributes: ['middleware' => 'auth'], routes: function(){
        Route::get( uri: '/profile', action: [PageController::class, 'profile'])->name( name: 'profile');
        Route::put( uri: '', action: [ProfileUpdate::class, 'update'])->name( name: 'profile.update');
    });


    /*--------------------------------------------------------------------------
    | Pag Login
    --------------------------------------------------------------------------*/
    Route::group( attributes: ['middleware' => 'auth'], routes: function(){
        Route::get( uri: '/profile', action: [PageController::class, 'profile'])->name( name: 'profile');
        Route::get( uri: '/register', action: [PageController::class, 'register'])->name( name: 'register');
        Route::get( uri: '/login', action: [PageController::class, 'login'])->name( name: 'login');   
    });


    /*--------------------------------------------------------------------------
    | Routes Search
    --------------------------------------------------------------------------*/
    Route::group( attributes: ['middleware' => 'auth'], routes: function(){
        Route::get( uri: '/query', action: [BoletinController::class, 'search'])->name( name: 'search');  
    });

    
    /*--------------------------------------------------------------------------
    | Web Routes Boletin
    --------------------------------------------------------------------------*/
    Route::group( attributes: ['middleware' => 'auth'], routes: function(){
        Route::get( uri: '/dashboard', action: [BoletinController::class, 'index'])->name( name: 'dashboard');
        Route::get( uri: '/create', action: [BoletinController::class, 'create'])->name( name: 'create');
        Route::post( uri: '/create', action: [BoletinController::class, 'store'])->name( name: 'registro_aluno');
        Route::get( uri: '/Pagdestroy/{id}', action: [BoletinController::class, 'show'])->name( name: 'Pagdestroy');
        Route::get( uri: '/{id}', action: [BoletinController::class, 'destroy'])->name( name: 'destroy');
        Route::get( uri: '/edit/{id}', action: [BoletinController::class, 'edit'])->name( name: 'edit');
        Route::put( uri: '/{id}', action: [BoletinController::class, 'update'])->name( name: 'update');
    });
    
    require __DIR__.'/auth.php';

?>