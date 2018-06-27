<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/contact',[
        'as' => 'contact',
        'uses'=>'HomeController@contact'
    ]);
    Route::get('/legal',[
        'as' => 'legal',
        'uses'=>'HomeController@legal'
    ]);
    Route::get('/',[
        'as' => 'welcome',
        'uses'=>'HomeController@welcome'
    ]);
    Route::group(['prefix' =>'customers','middleware'=>'auth'],function(){
        Route::get('/',[
            'as' => 'customers',
            'uses'=> 'CustomersController@index'
        ]);
        Route::get('/add',[
            'as'=>'customers.add',
            'uses'=>'CustomersController@addCustomer'
        ]);
        Route::post('/store',[
            'as'=>'customers.store',
            'uses' => 'CustomersController@storeCustomer'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'customers.delete',
            'uses'=>'CustomersController@deleteCustomer'
        ]);
        Route::get('/pdf',[
            'as'=>'customers.pdf',
            'uses'=>'CustomersController@pdf'
        ]);
        Route::group(['prefix'=>'edit/{id}'],function(){
            Route::get('/',[
                'as'=>'customers.edit',
                'uses'=>'CustomersController@editCustomer'
            ]);
            Route::post('/update',[
                'as'=>'customers.update',
                'uses'=>'CustomersController@updateCustomer'
            ]);
            Route::get('/customer',[
                'as'=>'customer.pdf',
                'uses'=>'CustomersController@pdfCustomer',
            ]);
        });
    
    });
    Route::group(['prefix' =>'services','middleware'=>'auth'],function(){
        Route::get('/',[
            'as' => 'services',
            'uses'=> 'ServicesController@index'
        ]);
        Route::get('/add',[
            'as'=>'services.add',
            'uses'=>'ServicesController@addService'
        ]);
        Route::post('/store',[
            'as'=>'services.store',
            'uses' => 'ServicesController@storeService'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'services.delete',
            'uses'=>'ServicesController@deleteService'
        ]);
        Route::get('/pdf',[
            'as'=>'services.pdf',
            'uses'=>'ServicesController@pdf'
        ]);
        Route::group(['prefix'=>'edit/{id}'],function(){
            Route::get('/',[
                'as'=>'services.edit',
                'uses'=>'ServicesController@editService'
            ]);
            Route::post('/update',[
                'as'=>'services.update',
                'uses'=>'ServicesController@updateService'
            ]);
            Route::get('/service',[
                'as'=>'service.pdf',
                'uses'=>'ServicesController@pdfService',
            ]);
        });
    
    });
    Route::group(['prefix' =>'products','middleware'=>'auth'],function(){
        Route::get('/',[
            'as' => 'products',
            'uses'=> 'ProductsController@index'
        ]);
        Route::get('/add',[
            'as'=>'products.add',
            'uses'=>'ProductsController@addProduct'
        ]);
        Route::post('/store',[
            'as'=>'products.store',
            'uses' => 'ProductsController@storeProduct'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'products.delete',
            'uses'=>'ProductsController@deleteProduct'
        ]);
        Route::get('/pdf',[
            'as'=>'products.pdf',
            'uses'=>'ProductsController@pdf'
        ]);
        Route::group(['prefix'=>'edit/{id}'],function(){
            Route::get('/',[
                'as'=>'products.edit',
                'uses'=>'ProductsController@editProduct'
            ]);
            Route::post('/update',[
                'as'=>'products.update',
                'uses'=>'ProductsController@updateProduct'
            ]);
            Route::get('/product',[
                'as'=>'product.pdf',
                'uses'=>'ProductsController@pdfProduct',
            ]);
        });
    
    });
    Route::group(['prefix' => 'providers','middleware'=>'auth'],function(){
        Route::get('/',[
            'as'=> 'providers',
            'uses' => 'ProvidersController@index'
        ]);
        Route::get('/add',[
            'as'=>'providers.add',
            'uses'=>'ProvidersController@addProvider'
        ]);
        Route::post('/store',[
            'as'=>'providers.store',
            'uses' => 'ProvidersController@storeProvider'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'providers.delete',
            'uses'=>'ProvidersController@deleteProvider'
        ]);
        Route::get('/pdf',[
            'as'=>'providers.pdf',
            'uses'=>'ProvidersController@pdf'
        ]);
        Route::group(['prefix'=>'edit/{id}'],function(){
            Route::get('/',[
                'as'=>'prodivers.edit',
                'uses'=>'ProvidersController@editProvider'
            ]);
            Route::post('/update',[
                'as'=>'providers.update',
                'uses'=>'ProvidersController@updateProvider'
            ]);
            Route::get('/provider',[
                'as'=>'provider.pdf',
                'uses'=>'ProvidersController@pdfProvider'
            ]);
        });
    });
    Route::group(['prefix' => 'invoices','middleware' =>'auth'],function(){
        Route::get('/',[
            'as'=> 'invoices',
            'uses' => 'InvoicesController@index'
        ]);
        Route::get('/add',[
            'as'=>'invoices.add',
            'uses'=>'InvoicesController@addInvoice'
        ]);
        Route::post('/store',[
            'as'=>'invoices.store',
            'uses' => 'InvoicesController@storeInvoice'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'invoices.delete',
            'uses'=>'InvoicesController@deleteInvoice'
        ]);
        Route::get('/pdf',[
            'as'=>'invoices.pdf',
            'uses'=>'InvoicesController@pdf'
        ]);
        Route::group(['prefix'=>'edit/{id}'],function(){
            Route::get('/',[
                'as'=>'invoices.edit',
                'uses'=>'InvoicesController@editInvoice'
            ]);
            Route::post('/update',[
                'as'=>'invoices.update',
                'uses'=>'InvoicesController@updateInvoice'
            ]);
            Route::get('/pdf',[
                'as'=>'invoice.pdf',
                'uses'=>'InvoicesController@pdfInvoice'
            ]);

        });
    });
    Route::group(['prefix'=> 'xhr','middleware'=>'auth'],function(){
        Route::get('/price',[
            'as'=>'xhr.price',
            'uses'=>'xhrController@getPrice'
        ]);
        Route::get('/customer',[
            'as'=>'xhr.customer',
            'uses'=>'xhrController@getCustomer'
        ]);
        Route::get('/numinvoice',[
            'as'=>'xhr.numinvoice',
            'uses'=>'xhrController@getNumInvoice'
        ]);
    });
    Route::group(['prefix'=>'accounting','middleware'=>'auth'],function(){
        Route::get('/',[
            'as'=>'accounting',
            'uses'=>'AccountingController@index',
        ]);
        Route::get('/pdf',[
            'as'=>'accounting.pdf',
            'uses'=>'AccountingController@pdf'
        ]);
    });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
