<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KycListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TreeViewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\TeamsController;


Route::get('reset-password', [UserController::class, 'resetPassword'])->name('user.reset-password');
Route::post('update-password', [UserController::class, 'updateResetPassword'])->name('password.update');
Route::post('forgot-password', [UserController::class, 'forgotPassword'])->name('password.forgotPassword');

Route::resource('/', HomeController::class);

//Route::resource('/contact', HomeController::class);
Route::get('/treeview', [TreeViewController::class, 'index']);
Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::get('/livechart', [HomeController::class,'livechart'])->name('livechart');
Route::get('/shoppage', [HomeController::class,'shoppage'])->name('shoppage');
Route::get('/historicalchart', [HomeController::class,'historicalchart'])->name('historicalchart');
//Mauritius
Route::get('/mauritius', [HomeController::class,'mauritius'])->name('mauritius');
Route::get('/mauritius_goldproducts', [HomeController::class,'mauritius_goldproducts'])->name('mauritius_goldproducts');
Route::get('/mauritius_silverproducts', [HomeController::class,'mauritius_silverproducts'])->name('mauritius_silverproducts');
//South Africa
Route::get('/southafrica', [HomeController::class,'southafrica'])->name('southafrica');
Route::get('/sa_goldproducts', [HomeController::class,'sa_goldproducts'])->name('sa_goldproducts');
Route::get('/sa_silverproducts', [HomeController::class,'sa_silverproducts'])->name('sa_silverproducts');
Route::get('/southafrica_graph', [HomeController::class,'southafrica_graph'])->name('southafrica_graph');

// Cart Features
Route::get('cart', [HomeController::class, 'showCartTable']);
Route::post('add-to-cart/', [HomeController::class, 'addToCart']);
Route::delete('remove-from-cart', [HomeController::class, 'removeCartItem']);
Route::get('clear-cart', [HomeController::class, 'clearCart']);

Route::post('checkout', [HomeController::class, 'checkout']);
Route::get('test',[PaymentController::class,'index']);
Route::post('make-payment', [PaymentController::class, 'makePayment']);
Route::get('success', [PaymentController::class, 'success'])->name('success');
Route::get('failure', [PaymentController::class, 'failure'])->name('failure');




Route::post('/treeview/update', [TreeViewController::class, 'update']);
Route::match(['get', 'post'], '/submit-form', [UserController::class, 'submitForm'])->name('submit-form');
Route::match(['get', 'post'], '/user-login', [UserController::class, 'userLogin']);
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/admin', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');

});

Route::group(['middleware' => 'auth'], function () {

Route::get('/kyc_list/{id}', [KycListController::class, 'kyc_list']);
Route::get('/userDetail', [KycListController::class, 'userDetail']);
Route::post('/update-user', [KycListController::class, 'updateUser']);
Route::post('/delete-user-detail', [KycListController::class, 'deleteUserDetail']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('slider_images', SliderController::class);
    Route::resource('header', HeaderController::class);
    Route::resource('news', NewsController::class);
    Route::resource('team', TeamsController::class);
    Route::post('/order-status/{id}', [OrderController::class, 'updateOrderStatus'])->name('updateOrderStatus');
    Route::get('/transactions', [PaymentController::class, 'showTransactions'])->name('admin.transactions');

});


Route::post('/update-order', [KycListController::class, 'updateOrder'])->name('update-order');

Route::post('/update-kyc-status', [KycListController::class, 'updateKycStatus']);


});


Route::post('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');
Route::middleware(['auth'])->group(function () {
    Route::get('user/dashboard/{id}', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('user/bank-details', [UserController::class, 'bankDetails'])->name('user.bank-details'); // Add this route
    Route::get('user/update-bank-details', [UserController::class, 'updateBank'])->name('user.update-bank-details'); // Add this route
    Route::match(['get', 'post'], 'user/updateBankDetails', [UserController::class, 'updateBankDetails'])->name('user.updateBankDetails');
    Route::post('user/updateProfile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::get('user/orderList', [OrderController::class, 'index'])->name('user.orderList');
    Route::get('user/wallet', [UserController::class, 'wallet'])->name('user.wallet');
    Route::post('user/addwallet', [UserController::class, 'addWallet'])->name('user.addwallet');
    Route::get('user/transactions', [UserController::class, 'showTransactions'])->name('user.transaction');
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
    Route::post('/change-password', [UserController::class, 'updatePassword'])->name('user.changePassword');

});

