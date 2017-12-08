<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/signup', function () {
//     return view('signup');
// });

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('token','Controller@csrf_token');

/*FACEBOOK PLUGINS*/
Route::get('fb',function(){
    return view('fb');
});

Route::controllers(['webhooks'=> 'WebhooksController']);

//FOR THE SAKE OF SETUP -  ENABLE THIS SHIT!!!!!
Route::group(['middleware' => ['auth']], function(){
    Route::post('locations/storesetup','LocationsController@postStoresetup');
    Route::get('locations/datatablesetup','LocationsController@getDatatablesetup');

    Route::post('posusers/storesetup','PosusersController@postStoresetup');
    Route::post('posusers/storesetup','PosusersController@postStoresetup');
    Route::get('posusers/datatablesetup','PosusersController@getDatatablesetup');

    Route::post('products/fileupload','ProductsController@postFileupload');
    Route::post('products/import','ProductsController@postImport');
    Route::post('products/errorimport','ProductsController@postErrorimport');
    Route::get('products/errorimport','ProductsController@getErrorimport');
    Route::controllers(['settings' => 'SettingsController']);
});

Route::group(['middleware'=>['auth','authSetup:4']],function(){
    Route::controllers([
        'users'     => 'UsersController',
        'clients'     => 'ClientsController',
        'suppliers'     => 'SuppliersController',
        'locations'     => 'LocationsController',
        'zones'     => 'ZonesController',
        'products'     => 'ProductsController',
        'attributes'     => 'AttributesController',
        'categories'     => 'CategoriesController',
        // 'settings'     => 'SettingsController',
        'positions'     => 'PositionsController',
        'inventories'     => 'InventoriesController',
        'posusers'     => 'PosusersController',
        'pricechannels'     => 'PriceChannelsController',
        'distributors'     => 'DistributorsController',
        'companies'     => 'CompaniesController',
        'discounttypes'     => 'DiscounttypesController',
        'departments'     => 'DepartmentsController',
        'brands'     => 'BrandsController',
        'accesstypes'     => 'AccessTypesController',
        'purchaseorders'     => 'PurchaseOrdersController',
        'postransactions'     => 'PosTransactionsController',
        'employees'     => 'EmployeesController',
        'invoicedetails'     => 'InvoiceDetailsController',
        'returndetails'     => 'ReturnDetailsController',
        'reports'     => 'ReportsController',
        'productbundles'     => 'ProductBundlesController',
        'merchantusers'     => 'MerchantUsersController',
        'merchantlocations'     => 'MerchantLocationsController',
        'merchantinventories'     => 'MerchantInventoriesController',
        'deliveries'         => 'DeliveriesController',
        // 'internaldeliveries'         => 'InternalDeliveriesController',
        'received'         => 'ReceivedController',
        'subscribers'         => 'SubscribersController',
        'usersubscribers'         => 'UserSubscribersController',
        'locationsubscribers'         => 'LocationSubscribersController',
        'posmanager'         => 'PosManagerController',
        // 'returns'         => 'ReturnsController'
        'returns'         => 'ReturnsController',
        'receivinghistories'         => 'ReceivingHistoriesController',
        'subscriptions'         => 'SubscriptionsController',
        'userdetails'         => 'UserDetailsController',

        // 'api'     => 'ApiController',
    ]);
    
    Route::get('/', 'DashboardController@index');
    Route::get('/check', 'DashboardController@getCheck');

});

 Route::controllers([
        'auth'     => 'Auth\AuthController',
        'setup'     => 'SetupController',
        ]);

Route::get('api/v1/validatescode','ApiController@validateStoreCode');
Route::get('api/v1/products','ApiController@storeProducts');
Route::get('api/v1/paginatedproducts','ApiController@paginatedProducts');
Route::post('api/v1/ping','ApiController@ping');
Route::post('api/v1/postrans','ApiController@POStrans');
Route::get('api/v1/employees','ApiController@getEmployees');
Route::post('api/v1/validatesubscriber','ApiController@validateSubscriber');
// Route::get('api/v1/test','ApiController@test');


/*METROMART*/
Route::any('api/v1/metromart/Login','ApiController@MetroMartLogin');
Route::any('api/v1/metromart/Locations','ApiController@MetroMartLocations');
Route::any('api/v1/metromart/Products','ApiController@MetroMartProducts');
Route::any('api/v1/metromart/UserDetails','ApiController@MetroMartUserDetails');
Route::any('api/v1/metromart/Categories','ApiController@MetroMartCategories');
Route::any('api/v1/metromart/ProductLocations','ApiController@MetroMartProductLocations');


/*VM*/
Route::any('api/v1/VMLogin','ApiController@VMLogin');
Route::any('api/v1/VMLocations','ApiController@VMLocations');
Route::any('api/v1/VMProducts','ApiController@VMProducts');
Route::any('api/v1/VMUserDetails','ApiController@VMUserDetails');
Route::any('api/v1/VMCategories','ApiController@VMCategories');
Route::any('api/v1/VMCategoryModels','ApiController@VMCategoryModels');
Route::any('api/v1/VMBrands','ApiController@VMBrands');
Route::any('api/v1/VMDepartments','ApiController@VMDepartments');
Route::any('api/v1/VMAccessRights','ApiController@VMAccessRights');

/*merch*/
Route::any('api/v1/MerchLogin','ApiController@MerchLogin');
Route::any('api/v1/MerchProducts','ApiController@MerchProducts');
Route::any('api/v1/MerchSyncInventories','ApiController@MerchSyncInventories');
Route::any('api/v1/MerchPingUpdates','ApiController@MerchPingUpdates');

/*UNAHCO*/
Route::any('api/v1/UNAHCOProducts','ApiController@UNAHCOProducts');
Route::any('api/v1/UNAHCODepartments','ApiController@UNAHCODepartments');
Route::any('api/v1/UNAHCODivisions','ApiController@UNAHCODivisions');
Route::any('api/v1/UNAHCOBrands','ApiController@UNAHCOBrands');


/*BEER*/
Route::any('api/v1/BeerProducts','ApiController@BeerProducts');
Route::any('api/v1/BeerDepartments','ApiController@BeerDepartments');
Route::any('api/v1/BeerDivisions','ApiController@BeerDivisions');
Route::any('api/v1/BeerBrands','ApiController@BeerBrands');

/*POS*/
Route::any('api/v1/ReceiptHeaderFooter', 'ApiController@Posheaderfooter');

Route::auth();

