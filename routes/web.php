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

Route::get('/', function () {
    return view('welcome');
});




/*----------------Start Admin Route List----------------------------- */
Route::group(['prefix' => 'landlord'], function () {
    /*------- Auth------- */
    Route::get('/signin', 'Auth\AdminLoginController@showLoginForm')->name('host.login');
    Route::post('/login', 'Auth\AdminLoginController@login');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('host.logout');

    /*------- Registration------- */
    Route::get('/signup', 'Auth\AdminRegisterController@showRegistrationForm')->name('host.register');
    Route::post('/register', 'Auth\AdminRegisterController@register');
    
    /*------- Password reset------- */
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('host.password.request');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('host.password.email');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('host.password.reset');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');

    /*------- Dashboard ------- */
    Route::get('/dashboard', 'AdminController@index')->name('host.dashboard');
    Route::get('/guest-statistics', 'AdminController@guest')->name('host.guest.statistics');
    Route::get('/property-statistics', 'AdminController@property')->name('host.property.statistics');
    Route::get('/payment-statistics', 'AdminController@payment')->name('host.payment.statistics');

    /*------- Notifications ------- */
    Route::get('/message-count', 'AdminController@messageCount')->name('host.message.count');
    Route::get('/message-notification', 'AdminController@messageNotification')->name('host.message.notification');
    Route::get('/notification-count', 'AdminController@notificationCount')->name('host.notification.count');
    Route::get('/notifications', 'AdminController@notification')->name('host.notifications');

    /*------- Account and Profile ------- */
    Route::get('/account', 'AdminProfileController@index')->name('host.account');
    Route::post('/account/dob', 'AdminProfileController@updateDob')->name('host.account.dob');
    Route::post('/account/city', 'AdminProfileController@updateCity')->name('host.account.city');
    Route::post('/account/occupation', 'AdminProfileController@updateOccupation')->name('host.account.occupation');
    Route::post('/account/business', 'AdminProfileController@updateBusiness')->name('host.account.business');
    Route::post('/account/description', 'AdminProfileController@updateDescription')->name('host.account.description');
    Route::post('/change-password', 'AdminProfileController@updatePassword')->name('host.password.change');
    Route::post('/change-photo', 'AdminProfileController@uploadProfilePhoto')->name('host.profile.photo');

    /*------- Nav actions ------- */
    Route::get('/saved', 'AdminController@saved')->name('host.saved');
    Route::get('/saved/{propertyList}/remove', 'AdminController@removeSaved')->name('host.saved.remove');
    Route::get('/wallet', 'AdminWalletController@index')->name('host.wallet');

    /*------- Listing Properties ------- */
    Route::get('/properties', 'PropertyController@index')->name('host.property');
    Route::get('/properties/new', 'PropertyController@addNewListing')->name('host.property.add');
    Route::get('/properties/start', 'PropertyController@startNew')->name('host.property.start');
    Route::get('/properties/start/{property}/create', 'PropertyController@createNewListing')->name('host.property.create');
    Route::get('/properties/start/{property}/preview', 'PropertyController@previewCreatedListing')->name('host.property.preview');

    Route::post('/properties/add/block', 'PropertyController@addBlock')->name('host.property.block.submit');
    Route::get('/properties/block/{property}/show', 'PropertyController@showBlock')->name('host.property.block.show');
    Route::get('/properties/block/{propertyHostelBlock}/delete', 'PropertyController@deleteBlock')->name('host.property.block.delete');

    Route::post('/properties/photos/upload', 'PropertyController@uploadPropertyPhoto')->name('host.property.photos.submit');
    Route::get('/properties/photos/{property}/show', 'PropertyController@showPropertyPhoto')->name('host.property.photos.show');
    Route::get('/properties/photos/{propertyImage}/delete', 'PropertyController@deletePropertyPhoto')->name('host.property.photos.delete');
    Route::post('/properties/photos/caption', 'PropertyController@propertyPhotoCaption')->name('host.property.caption.submit');

    Route::post('/properties/rule/add', 'PropertyController@addOwnRule')->name('host.property.rule.submit');
    Route::get('/properties/rule/{property}/show', 'PropertyController@showOwnRule')->name('host.property.rule.show');
    Route::get('/properties/rule/{propertyOwnRule}/delete', 'PropertyController@deleteOwnRule')->name('host.property.rule.delete');

    Route::post('/properties/block-price/add', 'PropertyController@addHostelBlockPrice')->name('host.property.blockprice.submit');
    Route::get('/properties/block-price/{property}/show', 'PropertyController@showHostelBlockPrice')->name('host.property.blockprice.show');
    Route::get('/properties/block-price/{propertyHostelPrice}/delete', 'PropertyController@deleteHostelBlockPrice')->name('host.property.blockprice.delete');
    
    Route::post('/properties/new/store', 'PropertyController@store')->name('host.property.store');

    Route::get('/properties/{property}/edit', 'PropertyController@editListing')->name('host.property.edit');
    Route::post('/properties/{property}/edit', 'PropertyController@updateListing')->name('host.property.update');
    
    Route::post('/properties/{property}/visibility', 'PropertyController@togglePublishVisibility')->name('host.property.visibility');

    Route::get('/properties/{property}/delete', 'PropertyController@confirmDelete')->name('host.property.confirmdelete');
    Route::post('/properties/{property}/delete', 'PropertyController@deleteListing')->name('host.property.delete');

    Route::get('/manage-properties', 'PropertyController@manageProperty')->name('host.property.manage');

    /*------- Listing TeamPlayers ------- */
    Route::get('/tenants', 'TeamPlayerController@tenant')->name('host.tenant');
    Route::get('/tenants/{user}/properties-rented', 'TeamPlayerController@tenantProperty')->name('host.tenant.rented');
    Route::get('/buyers', 'TeamPlayerController@buyer')->name('host.buyer');
    Route::get('/bidders', 'TeamPlayerController@bidder')->name('host.bidder');

    /*------- Messages ------- */
    Route::get('/messages', 'MessageController@index')->name('host.messages');
    Route::post('/messages/reply', 'MessageController@reply')->name('host.messages.reply');
    Route::get('/messages/{message}/read', 'MessageController@read')->name('host.messages.read');
    Route::post('/messages/delete', 'MessageController@delete')->name('host.messages.delete');

    /*------- Support ------- */
    Route::get('/new-ticket', 'TicketController@create')->name('host.ticket');
    Route::post('/ticket', 'TicketController@store')->name('host.ticket.submit');

    Route::get('/view-tickets', 'TicketController@index')->name('host.ticket.view');
    Route::get('/view-tickets/{ticket}/read', 'TicketController@read')->name('host.ticket.read');
    Route::post('/ticket/reply', 'TicketController@reply')->name('host.ticket.reply');
    Route::get('/ticket/{ticket}/close', 'TicketController@close')->name('host.ticket.close');

    /*------- Activities ------- */


    /*Route::get('/subscription', 'SubscriptionController@index')->name('host.subscription');
    Route::get('/pricing-plan', 'SubscriptionController@pricing')->name('host.pricing');
    Route::get('/invoices', 'SubscriptionController@invoices')->name('host.invoice');
    Route::get('/invoices/{invoice}', 'SubscriptionController@getInvoice')->name('host.getinvoice');

    Route::get('/cart', 'CartController@index')->name('host.cart');
    Route::post('/pricing-plan', 'CartController@store')->name('host.cart.submit');
    Route::get('/pricing-plan/delete', 'CartController@destroy')->name('host.cart.destroy');
    Route::get('/pricing-plan/{cart}/payment', 'CartController@choosePayment')->name('host.payment');
    Route::get('/pay-point/{cart}/{pay}/{user}', 'CartController@makePayment')->name('host.makepayment');
  
    
    Route::get('/logs', 'UserLogController@index')->name('host.log');*/
});





/*----------------Start User Route List----------------------------- */
Auth::routes();

Route::group(['prefix' => 'guest'], function () {
    /*------- Dashboard route------- */
    Route::get('/dashboard', 'UserController@index')->name('guest.dashboard');
    Route::get('/property-statistics', 'UserController@property')->name('guest.property.statistics');
    Route::get('/payment-statistics', 'UserController@payment')->name('guest.payment.statistics');

    /*------- Account and Profile ------- */
    Route::get('/account', 'UserProfileController@index')->name('guest.account');
    Route::post('/account/gender', 'UserProfileController@updateGender')->name('guest.account.gender');
    Route::post('/account/dob', 'UserProfileController@updateDob')->name('guest.account.dob');
    Route::post('/account/marital-status', 'UserProfileController@updateMaritalStatus')->name('guest.account.marital');
    Route::post('/account/children', 'UserProfileController@updateChildren')->name('guest.account.children');
    Route::post('/account/city', 'UserProfileController@updateCity')->name('guest.account.city');
    Route::post('/account/occupation', 'UserProfileController@updateOccupation')->name('guest.account.occupation');
    Route::post('/change-password', 'UserProfileController@updatePassword')->name('guest.password.change');
    Route::post('/change-photo', 'UserProfileController@uploadProfilePhoto')->name('guest.profile.photo');

    /*------- Nav actions ------- */
    Route::get('/saved', 'UserSavedPropertyController@index')->name('guest.saved');
    Route::get('/saved/{propertyList}/remove', 'UserSavedPropertyController@removeSaved')->name('guest.saved.remove');
    Route::get('/wallet', 'UserWalletController@index')->name('guest.wallet');

    /*------- Guest Properties ------- */
    Route::get('/rented-properties', 'PropertyRentController@index')->name('guest.property.rent');
    Route::get('/bought-properties', 'PropertyBuyController@index')->name('guest.property.buy');
    Route::get('/bidden-properties', 'PropertyBidController@index')->name('guest.property.bid');

    /*------- Messages ------- */
    Route::get('/messages/{admin}/compose', 'UserController@composeMessage')->name('guest.messages.compose');
    Route::post('/messages/submit', 'UserController@sendMessage')->name('guest.messages.compose.submit');
    Route::get('/messages', 'UserController@readMessage')->name('guest.messages');

    /*------- Support ------- */
    Route::get('/new-ticket', 'UserTicketController@create')->name('guest.ticket');
    Route::post('/ticket', 'UserTicketController@store')->name('guest.ticket.submit');

    Route::get('/view-tickets', 'UserTicketController@index')->name('guest.ticket.view');
    Route::get('/view-tickets/{userTicket}/read', 'UserTicketController@read')->name('guest.ticket.read');
    Route::post('/ticket/reply', 'UserTicketController@reply')->name('guest.ticket.reply');
    Route::get('/ticket/{userTicket}/close', 'UserTicketController@close')->name('guest.ticket.close');


});
