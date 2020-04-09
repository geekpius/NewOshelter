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


/*----------------Website Route List----------------------------- */
Route::get('/', 'WebsiteController@index')->name('index');
Route::get('/category-properties/{category}/all', 'WebsiteController@categoryProperty')->name('category.property');
Route::get('/single-property/{property}/details', 'WebsiteController@singleProperty')->name('single.property');
Route::get('/properties', 'WebsiteController@property')->name('browse.property');
Route::get('/contact-us', 'WebsiteController@contact')->name('contact');


/*----------------Start User Route List----------------------------- */
Auth::routes();
Route::group(['prefix' => 'user'], function () {
    /*------- Dashboard ------- */
    Route::get('/dashboard', 'UserController@index')->name('dashboard');
    Route::get('/guest-statistics', 'UserController@guest')->name('guest.statistics');
    Route::get('/property-statistics', 'UserController@property')->name('property.statistics');
    Route::get('/payment-statistics', 'UserController@payment')->name('payment.statistics');

    /*------- Notifications ------- */
    Route::get('/message-count', 'UserController@messageCount')->name('message.count');
    Route::get('/message-notification', 'UserController@messageNotification')->name('message.notification');
    Route::get('/notification-count', 'UserController@notificationCount')->name('notification.count');
    Route::get('/notifications', 'UserController@notification')->name('notifications');

    /*------- Nav actions ------- */
    Route::get('/saved', 'UserSavedPropertyController@index')->name('saved');
    Route::get('/saved/{propertyList}/remove', 'UserSavedPropertyController@removeSaved')->name('saved.remove');
    Route::get('/wallet', 'UserWalletController@index')->name('wallet');

    /*------- Account and Profile ------- */
    Route::get('/account', 'UserProfileController@index')->name('account');
    Route::post('/account/gender', 'UserProfileController@updateGender')->name('account.gender');
    Route::post('/account/dob', 'UserProfileController@updateDob')->name('account.dob');
    Route::post('/account/marital-status', 'UserProfileController@updateMaritalStatus')->name('account.marital');
    Route::post('/account/children', 'UserProfileController@updateChildren')->name('account.children');
    Route::post('/account/city', 'UserProfileController@updateCity')->name('account.city');
    Route::post('/account/occupation', 'UserProfileController@updateOccupation')->name('account.occupation');
    Route::post('/change-password', 'UserProfileController@updatePassword')->name('password.change');
    Route::post('/change-photo', 'UserProfileController@uploadProfilePhoto')->name('profile.photo');

    /*------- Listing Properties ------- */
    Route::get('/properties', 'PropertyController@index')->name('property');
    Route::get('/properties/new', 'PropertyController@addNewListing')->name('property.add');
    Route::get('/properties/start', 'PropertyController@startNew')->name('property.start');
    Route::get('/properties/start/{property}/create', 'PropertyController@createNewListing')->name('property.create');
    Route::get('/properties/start/{property}/preview', 'PropertyController@previewCreatedListing')->name('property.preview');

    Route::post('/properties/add/block', 'PropertyController@addBlock')->name('property.block.submit');
    Route::get('/properties/block/{property}/show', 'PropertyController@showBlock')->name('property.block.show');
    Route::get('/properties/block/{propertyHostelBlock}/delete', 'PropertyController@deleteBlock')->name('property.block.delete');

    Route::post('/properties/photos/upload', 'PropertyController@uploadPropertyPhoto')->name('property.photos.submit');
    Route::get('/properties/photos/{property}/show', 'PropertyController@showPropertyPhoto')->name('property.photos.show');
    Route::get('/properties/photos/{propertyImage}/delete', 'PropertyController@deletePropertyPhoto')->name('property.photos.delete');
    Route::post('/properties/photos/caption', 'PropertyController@propertyPhotoCaption')->name('property.caption.submit');

    Route::post('/properties/rule/add', 'PropertyController@addOwnRule')->name('property.rule.submit');
    Route::get('/properties/rule/{property}/show', 'PropertyController@showOwnRule')->name('property.rule.show');
    Route::get('/properties/rule/{propertyOwnRule}/delete', 'PropertyController@deleteOwnRule')->name('property.rule.delete');

    Route::post('/properties/block-price/add', 'PropertyController@addHostelBlockPrice')->name('property.blockprice.submit');
    Route::get('/properties/block-price/{property}/show', 'PropertyController@showHostelBlockPrice')->name('property.blockprice.show');
    Route::get('/properties/block-price/{propertyHostelPrice}/delete', 'PropertyController@deleteHostelBlockPrice')->name('property.blockprice.delete');
    
    Route::post('/properties/new/store', 'PropertyController@store')->name('property.store');

    Route::get('/properties/{property}/edit', 'PropertyController@editListing')->name('property.edit');
    Route::post('/properties/{property}/edit', 'PropertyController@updateListing')->name('property.update');
    
    Route::post('/properties/{property}/visibility', 'PropertyController@togglePublishVisibility')->name('property.visibility');

    Route::get('/properties/{property}/delete', 'PropertyController@confirmDelete')->name('property.confirmdelete');
    Route::post('/properties/{property}/delete', 'PropertyController@deleteListing')->name('property.delete');

    Route::get('/manage-properties', 'PropertyController@manageProperty')->name('property.manage');

    /*------- Listing TeamPlayers ------- */
    Route::get('/tenants', 'GuestController@tenant')->name('tenant');
    Route::get('/tenants/{user}/properties-rented', 'GuestController@tenantProperty')->name('tenant.rented');
    Route::get('/buyers', 'GuestController@buyer')->name('buyer');
    Route::get('/bidders', 'GuestController@bidder')->name('bidder');

    /*------- Messages ------- */
    Route::get('/messages/{user}/compose', 'MessageController@composeMessage')->name('messages.compose');
    Route::post('/messages/submit', 'MessageController@sendMessage')->name('messages.compose.submit');
    Route::get('/messages', 'MessageController@index')->name('messages');
    Route::post('/messages/reply', 'MessageController@reply')->name('messages.reply');
    Route::get('/messages/{message}/read', 'MessageController@read')->name('messages.read');
    Route::post('/messages/delete', 'MessageController@delete')->name('messages.delete');

    /*------- Support ------- */
    Route::get('/new-ticket', 'TicketController@create')->name('ticket');
    Route::post('/ticket', 'TicketController@store')->name('ticket.submit');

    Route::get('/view-tickets', 'TicketController@index')->name('ticket.view');
    Route::get('/view-tickets/{ticket}/read', 'TicketController@read')->name('ticket.read');
    Route::post('/ticket/reply', 'TicketController@reply')->name('ticket.reply');
    Route::get('/ticket/{ticket}/close', 'TicketController@close')->name('ticket.close');

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
