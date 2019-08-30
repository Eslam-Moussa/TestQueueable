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
Route::group(['prefix' => 'admin', 'middleware' => 'isadmin'], function () {
//=================Dashboard-Route=====================//
Route::get('/', 'Admin\DashboardController@Index');
//=================Setting-Route=====================//
Route::get('/SiteSetting', 'Admin\SettingController@IndexSetting');
Route::post('/SiteSetting', 'Admin\SettingController@AddSettingSite');
Route::post('/EditSiteSetting', 'Admin\SettingController@EditSettingSite');
//=================Country-Route=====================//
Route::get('/SiteCountries', 'Admin\Country\CountriesController@Index');
Route::get('/AddNewCountry', 'Admin\Country\CountriesController@AddNewCountry');
Route::post('/AddNewCountry', 'Admin\Country\CountriesController@AddNewCountry');
Route::get('/EditNewCountry', 'Admin\Country\CountriesController@EditNewCountry');
Route::post('/EditNewCountry', 'Admin\Country\CountriesController@EditNewCountry');
Route::get('/DeleteCountry/{id}', 'Admin\Country\CountriesController@DeleteCountry');
Route::get('/UnActiveCountry/{id}', 'Admin\Country\CountriesController@UnActiveCountry');
Route::get('/ActiveCountry/{id}', 'Admin\Country\CountriesController@ActiveCountry');
//=================City-Route=====================//
Route::get('/SiteCities', 'Admin\Country\CitiesController@Index');
Route::get('/AddNewCity', 'Admin\Country\CitiesController@AddNewCity');
Route::post('/AddNewCity', 'Admin\Country\CitiesController@AddNewCity');
Route::get('/EditNewCity', 'Admin\Country\CitiesController@EditNewCity');
Route::post('/EditNewCity', 'Admin\Country\CitiesController@EditNewCity');
Route::get('/DeleteCity/{id}', 'Admin\Country\CitiesController@DeleteCity');
Route::get('/UnActiveCity/{id}', 'Admin\Country\CitiesController@UnActiveCity');
Route::get('/ActiveCity/{id}', 'Admin\Country\CitiesController@ActiveCity');
//=================Area-Route=====================//
Route::get('/SiteArea', 'Admin\Country\AreasController@Index');
Route::get('/AddNewArea', 'Admin\Country\AreasController@AddNewArea');
Route::post('/AddNewArea', 'Admin\Country\AreasController@AddNewArea');
Route::get('/EditNewArea', 'Admin\Country\AreasController@EditNewArea');
Route::post('/EditNewArea', 'Admin\Country\AreasController@EditNewArea');
Route::get('/DeleteArea/{id}', 'Admin\Country\AreasController@DeleteArea');
Route::get('/UnActiveArea/{id}', 'Admin\Country\AreasController@UnActiveArea');
Route::get('/ActiveArea/{id}', 'Admin\Country\AreasController@ActiveArea');

Route::post('ajax-city', ['as' => 'ajax-city', 'uses' => 'Admin\Country\AreasController@OpenCity']);

Route::post('ajax-area', ['as' => 'ajax-area', 'uses' => 'Admin\Country\AreasController@OpenArea']);
//=================Client-Route=====================//
Route::get('/SiteClient', 'Admin\Users\ClientController@IndexClient');
Route::get('/AddNewClient', 'Admin\Users\ClientController@AddNewClient');
Route::post('/AddNewClient', 'Admin\Users\ClientController@AddNewClient');
Route::get('/EditClientSite/{id}', 'Admin\Users\ClientController@EditClient');
Route::post('/EditClientSite/{id}', 'Admin\Users\ClientController@EditClient');
Route::get('/DeleteClientSite/{id}', 'Admin\Users\ClientController@DeleteClientUser');
Route::get('/UnActiveClientSite/{id}', 'Admin\Users\ClientController@UnActiveClientUser');
Route::get('/ActiveClientSite/{id}', 'Admin\Users\ClientController@ActiveClientUser');

Route::post('ajax-time', ['as' => 'ajax-time', 'uses' => 'Admin\Users\ClientController@OpenTime']);

Route::post('ajax-cart', ['as' => 'ajax-cart', 'uses' => 'Admin\Users\ClientController@OpenCart']);
//=================Admins-Route=====================//
Route::get('/SiteAdmin', 'Admin\Users\AdminsController@IndexAdmin');
Route::get('/AddNewAdmin', 'Admin\Users\AdminsController@AddNewAdmin');
Route::post('/AddNewAdmin', 'Admin\Users\AdminsController@AddNewAdmin');
Route::get('/EditAdminSite/{id}', 'Admin\Users\AdminsController@EditAdmin');
Route::post('/EditAdminSite/{id}', 'Admin\Users\AdminsController@EditAdmin');
Route::get('/DeleteAdminSite/{id}', 'Admin\Users\AdminsController@DeleteAdminUser');
Route::get('/UnActiveAdminSite/{id}', 'Admin\Users\AdminsController@UnActiveAdminUser');
Route::get('/ActiveAdminSite/{id}', 'Admin\Users\AdminsController@ActiveAdminUser');

//=================Slider-Route=====================//
Route::get('/SliderSite', 'Admin\Home\SliderController@GetSlider');
Route::get('/AddSlider', 'Admin\Home\SliderController@AddSlider');
Route::post('/AddSlider', 'Admin\Home\SliderController@AddSlider');
Route::get('/EditSlider/{id}', 'Admin\Home\SliderController@EditSlider');
Route::post('/EditSlider/{id}', 'Admin\Home\SliderController@EditSlider');
Route::get('/DeleteSlider/{id}', 'Admin\Home\SliderController@DeleteSlider');
Route::get('/unactivesilder/{id}', 'Admin\Home\SliderController@UnActiveSlider');
Route::get('/activesilder/{id}', 'Admin\Home\SliderController@ActiveSlider');

//=================OrderType-Route=====================//
Route::get('/SiteOrderTyp', 'Admin\Orders\OrderTypeController@Index');
Route::get('/AddNewOrderType', 'Admin\Orders\OrderTypeController@AddNewOrderType');
Route::post('/AddNewOrderType', 'Admin\Orders\OrderTypeController@AddNewOrderType');
Route::get('/EditOrderType', 'Admin\Orders\OrderTypeController@EditNewOrderType');
Route::post('/EditOrderType', 'Admin\Orders\OrderTypeController@EditNewOrderType');
Route::get('/DeleteOrderType/{id}', 'Admin\Orders\OrderTypeController@DeleteOrderType');
Route::get('/UnActiveOrderType/{id}', 'Admin\Orders\OrderTypeController@UnActiveOrderType');
Route::get('/ActiveOrderType/{id}', 'Admin\Orders\OrderTypeController@ActiveOrderType');

//=================OrderCosts-Route=====================//
Route::get('/OrderCosts', 'Admin\Orders\OrderCostController@IndexCost');
Route::get('/AddNewCost', 'Admin\Orders\OrderCostController@AddNewCosts');
Route::post('/AddNewCost', 'Admin\Orders\OrderCostController@AddNewCosts');
Route::get('/EditCosts', 'Admin\Orders\OrderCostController@EditCosts');
Route::post('/EditCosts', 'Admin\Orders\OrderCostController@EditCosts');
Route::get('/DeleteOrderCost/{id}', 'Admin\Orders\OrderCostController@DeleteOrderCosts');
Route::get('/UnActiveCost/{id}', 'Admin\Orders\OrderCostController@UnActiveOrderCosts');
Route::get('/ActiveCost/{id}', 'Admin\Orders\OrderCostController@ActiveOrderCosts');

//=================SettingStyle-Route=====================//
Route::get('/SiteProductStyle', 'Admin\SettingProduct\StyleController@Index');
Route::get('/AddSettingStyle', 'Admin\SettingProduct\StyleController@AddNewSettingStyle');
Route::post('/AddSettingStyle', 'Admin\SettingProduct\StyleController@AddNewSettingStyle');
Route::get('/EditSettingStyle', 'Admin\SettingProduct\StyleController@EditNewSettingStyle');
Route::post('/EditSettingStyle', 'Admin\SettingProduct\StyleController@EditNewSettingStyle');
Route::get('/DeleteSettingStyle/{id}', 'Admin\SettingProduct\StyleController@DeleteSettingStyle');
Route::get('/UnActiveSettingStyle/{id}', 'Admin\SettingProduct\StyleController@UnActiveSettingStyle');
Route::get('/ActiveSettingStyle/{id}', 'Admin\SettingProduct\StyleController@ActiveSettingStyle');

//=================SettingSize-Route=====================//
Route::get('/SiteProductSize', 'Admin\SettingProduct\SizeController@Index');
Route::get('/AddSettingSize', 'Admin\SettingProduct\SizeController@AddNewSettingSize');
Route::post('/AddSettingSize', 'Admin\SettingProduct\SizeController@AddNewSettingSize');
Route::get('/EditSettingSize', 'Admin\SettingProduct\SizeController@EditNewSettingSize');
Route::post('/EditSettingSize', 'Admin\SettingProduct\SizeController@EditNewSettingSize');
Route::get('/DeleteSettingSize/{id}', 'Admin\SettingProduct\SizeController@DeleteSettingSize');
Route::get('/UnActiveSettingSize/{id}', 'Admin\SettingProduct\SizeController@UnActiveSettingSize');
Route::get('/ActiveSettingSize/{id}', 'Admin\SettingProduct\SizeController@ActiveSettingSize');

//=================SettingColor-Route=====================//
Route::get('/SiteProductColor', 'Admin\SettingProduct\ColorController@Index');
Route::get('/AddSettingColor', 'Admin\SettingProduct\ColorController@AddNewSettingColor');
Route::post('/AddSettingColor', 'Admin\SettingProduct\ColorController@AddNewSettingColor');
Route::get('/EditSettingColor', 'Admin\SettingProduct\ColorController@EditNewSettingColor');
Route::post('/EditSettingColor', 'Admin\SettingProduct\ColorController@EditNewSettingColor');
Route::get('/DeleteSettingColor/{id}', 'Admin\SettingProduct\ColorController@DeleteSettingColor');
Route::get('/UnActiveSettingColor/{id}', 'Admin\SettingProduct\ColorController@UnActiveSettingColor');
Route::get('/ActiveSettingColor/{id}', 'Admin\SettingProduct\ColorController@ActiveSettingColor');

//=================MetroStations-Route=====================//
Route::get('/SiteMetroStations', 'Admin\MetroStations\StationsController@Index');
Route::get('/AddNewStations', 'Admin\MetroStations\StationsController@AddNewStations');
Route::post('/AddNewStations', 'Admin\MetroStations\StationsController@AddNewStations');
Route::get('/EditNewStations', 'Admin\MetroStations\StationsController@EditNewStations');
Route::post('/EditNewStations', 'Admin\MetroStations\StationsController@EditNewStations');
Route::get('/DeleteStations/{id}', 'Admin\MetroStations\StationsController@DeleteStations');
Route::get('/UnActiveStations/{id}', 'Admin\MetroStations\StationsController@UnActiveStations');
Route::get('/ActiveStations/{id}', 'Admin\MetroStations\StationsController@ActiveStations');

//=================ClientType-Route=====================//
Route::get('/SiteClienType', 'Admin\Users\ClientTypeController@Index');
Route::get('/AddNewClientType', 'Admin\Users\ClientTypeController@AddClientType');
Route::post('/AddNewClientType', 'Admin\Users\ClientTypeController@AddClientType');
Route::get('/EditClientType', 'Admin\Users\ClientTypeController@EditClientType');
Route::post('/EditClientType', 'Admin\Users\ClientTypeController@EditClientType');
Route::get('/DeleteClientType/{id}', 'Admin\Users\ClientTypeController@DeleteClientType');
Route::get('/UnActiveClientType/{id}', 'Admin\Users\ClientTypeController@UnActiveClientType');
Route::get('/ActiveClientType/{id}', 'Admin\Users\ClientTypeController@ActiveClientType');
//=================Owner-Route=====================//
Route::get('/SiteOwner', 'Admin\Users\OwnerController@IndexOwner');
Route::get('/AddNewOwner', 'Admin\Users\OwnerController@AddNewOwner');
//=================Cars-Route=====================//
Route::get('/SiteShowCar', 'Admin\Cars\CarController@IndexCar');
Route::get('/AddNewCar', 'Admin\Cars\CarController@AddNewCar');
//=================Category-Route=====================//
Route::get('/SiteCategory', 'Admin\Category\CatController@IndexCat');
Route::get('/AddCategorySite', 'Admin\Category\CatController@AddNewCategory');
Route::post('/AddCategorySite', 'Admin\Category\CatController@AddNewCategory');
Route::get('/EditCategorySite', 'Admin\Category\CatController@EditNewCategory');
Route::post('/EditCategorySite', 'Admin\Category\CatController@EditNewCategory');
Route::get('/deleteCategorySite/{id}', 'Admin\Category\CatController@DeleteCategory');
Route::get('/unactiveCategorySite/{id}', 'Admin\Category\CatController@UnActiveCategory');
Route::get('/activeCategorySite/{id}', 'Admin\Category\CatController@ActiveCategory');
//=================Gallery-Route=====================//
Route::get('/SiteGallery', 'Admin\Gallery\IndexController@IndexCat');
Route::get('/AddGallerySite', 'Admin\Gallery\IndexController@AddNewGallery');
Route::post('/AddGallerySite', 'Admin\Gallery\IndexController@AddNewGallery');
Route::get('/EditGallerySite', 'Admin\Gallery\IndexController@EditNewGallery');
Route::post('/EditGallerySite', 'Admin\Gallery\IndexController@EditNewGallery');
Route::get('/deleteGallerySite/{id}', 'Admin\Gallery\IndexController@DeleteGallery');
Route::get('/unactiveGallerySite/{id}', 'Admin\Gallery\IndexController@UnActiveGallery');
Route::get('/activeGallerySite/{id}', 'Admin\Gallery\IndexController@ActiveGallery');
//=================TeamWork-Route=====================//
Route::get('/SiteTeamWork', 'Admin\TeamWork\TeamController@Index');
Route::get('/AddTeamWork', 'Admin\TeamWork\TeamController@AddNewTeamWork');
Route::post('/AddTeamWork', 'Admin\TeamWork\TeamController@AddNewTeamWork');
Route::get('/EditTeamWork', 'Admin\TeamWork\TeamController@EditNewTeamWork');
Route::post('/EditTeamWork', 'Admin\TeamWork\TeamController@EditNewTeamWork');
Route::get('/DeleteTeamWork/{id}', 'Admin\TeamWork\TeamController@DeleteTeamWork');
Route::get('/UnActiveTeamWork/{id}', 'Admin\TeamWork\TeamController@UnActiveTeamWork');
Route::get('/ActiveTeamWork/{id}', 'Admin\TeamWork\TeamController@ActiveTeamWork');

//=================Shipping-Route=====================//
Route::get('/SiteShippingCompany', 'Admin\Shipping\ShippingCompanyController@ShippingCompany');
Route::get('/AddShippingCompany', 'Admin\Shipping\ShippingCompanyController@AddShippingCompany');
Route::post('/AddShippingCompany', 'Admin\Shipping\ShippingCompanyController@AddShippingCompany');
Route::get('/EditShippingCompany/{id}', 'Admin\Shipping\ShippingCompanyController@EditShippingCompany');
Route::post('/EditShippingCompany/{id}', 'Admin\Shipping\ShippingCompanyController@EditShippingCompany');
Route::get('/deleteShippingCompany/{id}', 'Admin\Shipping\ShippingCompanyController@DeleteShippingCompany');
Route::get('/unactiveShippingCompany/{id}', 'Admin\Shipping\ShippingCompanyController@UnActiveShippingCompany');
Route::get('/activeShippingCompany/{id}', 'Admin\Shipping\ShippingCompanyController@ActiveShippingCompany');
Route::get('/DeletePhoneShip/{id}', 'Admin\Shipping\ShippingCompanyController@DeleteShippingPhone');

//=================StoreMain-Route=====================//
Route::get('/SiteMainStore', 'Admin\Store\MainController@IndexStore');
Route::get('/AddMainStore', 'Admin\Store\MainController@AddStore');
Route::post('/AddMainStore', 'Admin\Store\MainController@AddStore');
Route::get('/EditMainStore/{id}', 'Admin\Store\MainController@EditStore');
Route::post('/EditMainStore/{id}', 'Admin\Store\MainController@EditStore');
Route::get('/DeleteMainStore/{id}', 'Admin\Store\MainController@DeleteStore');
Route::get('/UnActiveMainStore/{id}', 'Admin\Store\MainController@UnActiveStore');
Route::get('/ActiveMainStore/{id}', 'Admin\Store\MainController@ActiveStore');
Route::get('/DeletePhoneStore/{id}', 'Admin\Store\MainController@DeleteStorePhone');
//=================Bank-Route=====================//
Route::get('/SiteBank', 'Admin\BankSite\BankController@Index');
Route::get('/AddNewBank', 'Admin\BankSite\BankController@AddNewBank');
Route::post('/AddNewBank', 'Admin\BankSite\BankController@AddNewBank');
Route::get('/EditNewBank', 'Admin\BankSite\BankController@EditNewBank');
Route::post('/EditNewBank', 'Admin\BankSite\BankController@EditNewBank');
Route::get('/DeleteBank/{id}', 'Admin\BankSite\BankController@DeleteBank');
Route::get('/UnActiveBank/{id}', 'Admin\BankSite\BankController@UnActiveBank');
Route::get('/ActiveBank/{id}', 'Admin\BankSite\BankController@ActiveBank');
//=================About-Route=====================//
Route::get('/SiteAboutUs', 'Admin\Pages\AboutController@IndexAbout');
Route::post('/SiteAboutUs', 'Admin\Pages\AboutController@IndexAbout');
Route::get('/EditAboutUs', 'Admin\Pages\AboutController@EditAbout');
Route::post('/EditAboutUs', 'Admin\Pages\AboutController@EditAbout');
//=================Conditions-Route=====================//
Route::get('/SiteConditions', 'Admin\Pages\ConditionsController@IndexCondition');
Route::post('/SiteConditions', 'Admin\Pages\ConditionsController@IndexCondition');
Route::get('/EditCondition', 'Admin\Pages\ConditionsController@EditCondition');
Route::post('/EditCondition', 'Admin\Pages\ConditionsController@EditCondition');
//=================Policy-Route=====================//
Route::get('/SitePolicy', 'Admin\Pages\PolicyController@IndexPolicy');
Route::post('/SitePolicy', 'Admin\Pages\PolicyController@IndexPolicy');
Route::get('/EditPolicy', 'Admin\Pages\PolicyController@EditPolicy');
Route::post('/EditPolicy', 'Admin\Pages\PolicyController@EditPolicy');
//=================Blog-Route=====================//
Route::get('/SiteBlog', 'Admin\Blog\BlogController@AllBlog');
Route::get('/AddNewBlog', 'Admin\Blog\BlogController@AddBlog');
Route::post('/AddNewBlog', 'Admin\Blog\BlogController@AddBlog');
Route::get('/EditNewBlog/{id}', 'Admin\Blog\BlogController@EditBlog');
Route::post('/EditNewBlog/{id}', 'Admin\Blog\BlogController@EditBlog');
Route::get('/DeleteBlog/{id}', 'Admin\Blog\BlogController@DeleteBlog');
Route::get('/UnActiveBlog/{id}', 'Admin\Blog\BlogController@UnActiveBlog');
Route::get('/ActiveBlog/{id}', 'Admin\Blog\BlogController@ActiveBlog');
//=================Alerts-Route=====================//
Route::get('/SiteAlerts', 'Admin\AlertSite\AlertController@IndexAlerts');
Route::get('/AddNewAlerts', 'Admin\AlertSite\AlertController@AddNewAlerts');
Route::post('/AddNewAlerts', 'Admin\AlertSite\AlertController@AddNewAlerts');
Route::get('/EditNewAlerts', 'Admin\AlertSite\AlertController@EditNewAlerts');
Route::post('/EditNewAlerts', 'Admin\AlertSite\AlertController@EditNewAlerts');
Route::get('/DeleteAlerts/{id}', 'Admin\AlertSite\AlertController@DeleteAlerts');
Route::get('/UnActiveAlerts/{id}', 'Admin\AlertSite\AlertController@UnActiveAlerts');
Route::get('/ActiveAlerts/{id}', 'Admin\AlertSite\AlertController@ActiveAlerts');
//=================Complaints-Route=====================//
Route::get('/SiteComplaints', 'Admin\Complaints\ComplainController@GetComplain');
Route::get('/EditComplaints/{id}', 'Admin\Complaints\ComplainController@EditComplain');
Route::post('/EditComplaints/{id}', 'Admin\Complaints\ComplainController@EditComplain');
Route::get('/DeleteComplaints/{id}', 'Admin\Complaints\ComplainController@DeleteComplain');
Route::get('/UnActiveComplaints/{id}', 'Admin\Complaints\ComplainController@UnActiveComplain');
Route::get('/ActiveComplaints/{id}', 'Admin\Complaints\ComplainController@ActiveComplain');

//=================Product-Route=====================//
Route::get('/SiteProduct', 'Admin\ProductSite\ProductController@IndexProduct');
Route::get('/AddNewProduct', 'Admin\ProductSite\ProductController@AddProduct');
Route::post('/AddNewProduct', 'Admin\ProductSite\ProductController@AddProduct');
Route::get('/EditProduct/{id}', 'Admin\ProductSite\ProductController@EditProduct');
Route::post('/EditProduct/{id}', 'Admin\ProductSite\ProductController@EditProduct');
Route::get('/DeleteProduct/{id}', 'Admin\ProductSite\ProductController@DeleteProduct');
Route::get('/UnActiveProduct/{id}', 'Admin\ProductSite\ProductController@UnActiveProduct');
Route::get('/ActiveProduct/{id}', 'Admin\ProductSite\ProductController@ActiveProduct');
Route::get('/DeleteProductImage/{id}', 'Admin\ProductSite\ProductController@DeleteProductImages');

Route::get('/UpdateProduct/{id}', 'Admin\ProductSite\ProductController@EditDetails');
Route::post('/UpdateProduct/{id}', 'Admin\ProductSite\ProductController@EditDetails');
//=================ProductStore-Route=====================//
Route::get('/ProductStoreShow/{id}', 'Admin\ProductSite\StoreController@StoreProduct');
Route::get('/EditProductStore', 'Admin\ProductSite\StoreController@EditStoreProduct');
Route::post('/EditProductStore', 'Admin\ProductSite\StoreController@EditStoreProduct');
//=================Permissions-Route=====================//
Route::get('/SitePermissions', 'Admin\Users\PermissionsController@GetPermissions');
Route::get('/AddPermissions', 'Admin\Users\PermissionsController@AddPermissions');
Route::post('/AddPermissions', 'Admin\Users\PermissionsController@AddPermissions');
Route::get('/EditPermissions/{id}', 'Admin\Users\PermissionsController@EditPermissions');
Route::post('/EditPermissions/{id}', 'Admin\Users\PermissionsController@EditPermissions');
Route::get('/DeletePermissions/{id}', 'Admin\Users\PermissionsController@Deletepermission');
Route::get('/unactivePermissions/{id}', 'Admin\Users\PermissionsController@UnActivepermission');
Route::get('/activePermissions/{id}', 'Admin\Users\PermissionsController@Activepermission');
//=================OrderInternal-Route=====================//
Route::get('/OrderInternal', 'Admin\Orders\OrderInternalController@IndexOrderInternal');
Route::post('/CreateOrder', 'Admin\Orders\OrderInternalController@createNewOrder');
Route::get('/ShowOrder/{id}', 'Admin\Orders\OrderInternalController@ShowOrder');
Route::get('/AddOrderInternal/{id}', 'Admin\Orders\OrderInternalController@AddOrderInternal');
Route::post('/AddOrderInternal/{id}', 'Admin\Orders\OrderInternalController@AddOrderInternal');
Route::get('/EditOrderInternal/{id}', 'Admin\Orders\OrderInternalController@EditOrderInternal');
Route::post('/EditOrderInternal/{id}', 'Admin\Orders\OrderInternalController@EditOrderInternal');
Route::get('/DeleteOrderInternal/{id}', 'Admin\Orders\OrderInternalController@DeleteOrderInternal');
Route::get('/UnActiveOrderInternal/{id}', 'Admin\Orders\OrderInternalController@UnActiveOrderInternal');
Route::get('/ActiveOrderInternal/{id}', 'Admin\Orders\OrderInternalController@ActiveOrderInternal');
Route::get('/DeleteOrderDetails/{id}', 'Admin\Orders\OrderInternalController@DeleteOrderDetails');

Route::get('/DeleteOrderButton/{id}', 'Admin\Orders\OrderInternalController@DeleteOrderButton');
 
Route::post('ajax-store', ['as' => 'ajax-store', 'uses' => 'Admin\Orders\OrderInternalController@OpenStore']);
Route::post('ajax-store-two', ['as' => 'ajax-store-two', 'uses' => 'Admin\Orders\OrderInternalController@OpenStoreTwo']);
Route::post('ajax-color', ['as' => 'ajax-color', 'uses' => 'Admin\Orders\OrderInternalController@OpenColor']);
Route::post('ajax-color-two', ['as' => 'ajax-color-two', 'uses' => 'Admin\Orders\OrderInternalController@OpenColorTwo']);
Route::post('ajax-style', ['as' => 'ajax-style', 'uses' => 'Admin\Orders\OrderInternalController@OpenStyle']);
Route::post('ajax-style-two', ['as' => 'ajax-style-two', 'uses' => 'Admin\Orders\OrderInternalController@OpenStyleTwo']);
Route::post('ajax-size', ['as' => 'ajax-size', 'uses' => 'Admin\Orders\OrderInternalController@OpenSize']);
Route::post('ajax-size-two', ['as' => 'ajax-size-two', 'uses' => 'Admin\Orders\OrderInternalController@OpenSizeTwo']);
Route::post('ajax-number', ['as' => 'ajax-number', 'uses' => 'Admin\Orders\OrderInternalController@OpenNumber']);
Route::post('ajax-number-two', ['as' => 'ajax-number-two', 'uses' => 'Admin\Orders\OrderInternalController@OpenNumberTwo']);
Route::post('ajax-price', ['as' => 'ajax-price', 'uses' => 'Admin\Orders\OrderInternalController@OpenPrice']);

Route::post('ajax-checked', ['as' => 'ajax-checked', 'uses' => 'Admin\Orders\OrderInternalController@Openchecked']);

Route::post('ajax-adduser', ['as' => 'ajax-adduser', 'uses' => 'Admin\Orders\OrderInternalController@AddUserOrder']);

Route::post('ajax-addNewuser', ['as' => 'ajax-addNewuser', 'uses' => 'Admin\Orders\OrderInternalController@AddNewUserOrder']);

Route::post('ajax-code', ['as' => 'ajax-code', 'uses' => 'Admin\Orders\OrderInternalController@OpenCode']);
Route::post('ajax-store-pro', ['as' => 'ajax-store-pro', 'uses' => 'Admin\Orders\OrderInternalController@OpenStoreed']);
Route::post('ajax-deleted', ['as' => 'ajax-deleted', 'uses' => 'Admin\Orders\OrderInternalController@OpenDeleted']);
Route::get('/OrderInternalInvoice/{id}', 'Admin\Orders\OrderInternalController@ShowInvoiceAdmin');
Route::get('/UpdateCountOrder', 'Admin\Orders\OrderInternalController@UpdateCountOrder');
Route::post('/UpdateCountOrder', 'Admin\Orders\OrderInternalController@UpdateCountOrder');
Route::get('/CostInvoice/{id}', 'Admin\Orders\OrderInternalController@OrderCost');
Route::post('/CostInvoice/{id}', 'Admin\Orders\OrderInternalController@OrderCost');

Route::get('/deleteCostFrom/{id}', 'Admin\Orders\OrderInternalController@DeleteCostFrom');
//=================OrderInternal-Route=====================//
Route::get('/OrderSite', 'Admin\Orders\OrderSitController@IndexOrderSite');
Route::get('/EditOrderStatus', 'Admin\Orders\OrderSitController@OrderStatus');
Route::post('/EditOrderStatus', 'Admin\Orders\OrderSitController@OrderStatus');

Route::get('/OrderInvoice/{id}', 'Admin\Orders\OrderSitController@InvoiceSite');
Route::get('/UnActiveOrder/{id}', 'Admin\Orders\OrderSitController@UnActiveOrder');
Route::get('/ActiveOrder/{id}', 'Admin\Orders\OrderSitController@ActiveOrder');
//=================OfferProduct-Route=====================//
Route::get('/OfferProduct', 'Admin\ProductSite\OfferController@Index');
Route::get('/AddNewOffer', 'Admin\ProductSite\OfferController@AddNewOffer');
Route::post('/AddNewOffer', 'Admin\ProductSite\OfferController@AddNewOffer');
Route::get('/EditNewOffer', 'Admin\ProductSite\OfferController@EditNewOffer');
Route::post('/EditNewOffer', 'Admin\ProductSite\OfferController@EditNewOffer');
Route::get('/DeleteOffer/{id}', 'Admin\ProductSite\OfferController@DeleteOffer');
Route::get('/UnActiveOffer/{id}', 'Admin\ProductSite\OfferController@UnActiveOffer');
Route::get('/ActiveOffer/{id}', 'Admin\ProductSite\OfferController@ActiveOffer'); 
 //=======================Poster\Route====================//
 Route::get('/GetPosterSite', 'Admin\Home\PosterController@GetPoster');
 Route::post('/GetPosterSite', 'Admin\Home\PosterController@GetPoster');
 Route::post('/EditPosterSite', 'Admin\Home\PosterController@EditPoster');
//=================Meals-Route=====================//
Route::get('/SiteMeals', 'Admin\Meals\MealsController@IndexMeals');
Route::get('/AddNewMeals', 'Admin\Meals\MealsController@AddNewMeals');
//=================Additions-Route=====================//
Route::get('/MealsAdditions/{id}', 'Admin\Meals\AdditionsController@GetAdditions');
//=================Comments-Route=====================//
Route::get('/MealsComments/{id}', 'Admin\Meals\CommentsController@GetComments');
Route::get('/ShowComments/{id}', 'Admin\Meals\CommentsController@ShowComments');
//=================PaymentMethod-Route=====================//
Route::get('/SitePaymentMethod', 'Admin\PaymentMethod\PaymentController@GetPayment');
Route::get('/AddNewPaymentMethod', 'Admin\PaymentMethod\PaymentController@AddNewPayment');
//=================Invoices-Route=====================//
Route::get('/SiteInvoices', 'Admin\Invoices\InvoicesController@GetInvoices');

//=================Alerts-Route=====================//
Route::get('/SiteBankTransfer', 'Admin\Bank\BankTransferController@GetBankTransfer');
});   
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('facebookpage', function () {
    return view('facebookpage');
    });

Auth::routes();
 
// Route::get('/home', 'HomeController@index')->name('home');

//=================Index-Route=====================//
Route::get('/', 'Front\IndexController@SiteIndex');
//=================Product-Route=====================//
Route::get('/Show-Product', 'Front\ProductController@GetProduct');
Route::get('/details-Product/{id}/{slogen}', 'Front\ProductController@SingleProduct');
Route::get('/Products-Section/{slogen}', 'Front\ProductController@CatProduct');
Route::post('/Add-Comment', 'Front\ProductController@CommentProduct'); 
Route::get('/AddToFav/{id}', 'front\ProductController@AddToFav');

//=================Offers-Route=====================//
Route::get('/Offers', 'Front\ProductController@OfferProduct');
//=================Gallery-Route=====================//
Route::get('/Galleries', 'Front\GalleryController@GetGallery');
//=================Pages-Route=====================//
Route::get('/Contact-Us', 'Front\PagesController@Contact');
Route::post('/Contact-Us', 'Front\PagesController@Contact');
Route::get('/Privacy-policy', 'Front\PagesController@Privacypolicy');
Route::get('/Termsandconditions', 'Front\PagesController@Condition');
Route::get('/About-Us', 'Front\PagesController@AboutUs');
//=================AuthUser-Route=====================//
Route::get('/Site-login', 'Front\AuthUserController@Login'); 
Route::post('/Site-login', 'Front\AuthUserController@Login'); 
Route::get('/Site-register', 'Front\AuthUserController@Register'); 
Route::post('/Site-register', 'Front\AuthUserController@Register'); 
//=================AccountUser-Route=====================//
Route::get('/My-profile', 'Front\AccountUserController@Profile'); 
Route::post('/My-profile', 'Front\AccountUserController@Profile'); 
Route::get('/My-orders', 'Front\AccountUserController@Order');
Route::get('/My-invoices', 'Front\AccountUserController@Invoices');
Route::get('/My-favourites', 'Front\AccountUserController@FavUser');
Route::get('/RemoveFromFavourit/{id}', 'front\AccountUserController@DeleteFavUser');
//=================OrderUser-Route=====================//
Route::get('/details-myorder/{id}', 'Front\OrderUserController@SingleOrder'); 
Route::get('/Edit-myorder/{id}', 'Front\OrderUserController@EditOrder'); 
Route::post('/Edit-myorder/{id}', 'Front\OrderUserController@EditOrder'); 
//=================InvoUser-Route=====================//
Route::get('/details-myinvoice/{id}', 'Front\InvoicesUserController@SingleInvo');
Route::post('/details-myinvoice/{id}', 'Front\InvoicesUserController@SendInvocie');
//=================TicketsUser-Route=====================//
Route::get('/My-Tickets', 'Front\TicketsUserController@Ticket');
Route::get('/NewTicket', 'Front\TicketsUserController@NewTicket');
//=================FaceBook=====================//
Route::get('auth/facebook', 'Auth\FacebookloginController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookloginController@handleFacebookCallback');
//=================Cart=====================//
Route::post('/Shopping-Cart-Add/{id}', 'Front\CartController@AddToCart');
Route::get('/Shopping-Cart-Show', 'Front\CartController@CartShow');
Route::post('/Shopping-Cart-Edit/{id}', 'Front\CartController@EditQtyCart');
Route::get('/Cart-Checkout', 'Front\CartController@CheckOut');
Route::post('/Checkout-End', 'Front\CartController@AddOrder');

//=================Search=====================//
Route::get('/Product-Search', 'Front\IndexController@FilterHome');
Route::post('/Product-Search', 'Front\IndexController@FilterHome');
