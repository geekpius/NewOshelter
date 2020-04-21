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
Route::get('/own-property', 'WebsiteController@ownProperty')->name('own.property');
Route::get('/property-types/{type}', 'WebsiteController@propertyType')->name('type.property');
Route::get('/property-types/{type}/search', 'WebsiteController@propertyType')->name('type.property.search');
Route::get('/single-property/{property}/details', 'WebsiteController@singleProperty')->name('single.property');
Route::get('/properties', 'WebsiteController@property')->name('browse.property');
Route::get('/properties/search', 'WebsiteController@property')->name('browse.property.search');
Route::get('/why-choose-us/{title}', 'WebsiteController@whyChooseUs')->name('why.choose');
Route::get('/help/property-owners', 'WebsiteController@ownerHelp')->name('help.owner');
Route::get('/help/booking-and-travellers', 'WebsiteController@bookingHelp')->name('help.booking');
Route::get('/contact-us', 'WebsiteController@contact')->name('contact');
Route::get('/account-deactivated', 'WebsiteController@accountDeactivated')->name('account.deactivated');
Route::get('/reactivate-account', 'WebsiteController@reactivateAccount')->name('account.reactivate');
Route::post('/reactivate-account', 'WebsiteController@sendReactivateEmail')->name('account.reactivate.submit');


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
    Route::get('/wishlist', 'UserSavedPropertyController@index')->name('saved');
    Route::post('/wishlist', 'UserSavedPropertyController@store')->name('saved.submit');
    Route::get('/wishlist/{userSavedProperty}/remove', 'UserSavedPropertyController@removeSaved')->name('saved.remove');
    Route::get('/wallet', 'UserWalletController@index')->name('wallet');
    Route::get('/activities', 'UserActivityController@index')->name('activities');

    /*------- Account and Profile ------- */
    Route::get('/account', 'UserProfileController@index')->name('account');
    Route::post('/account/name', 'UserProfileController@updateName')->name('account.name');
    Route::post('/account/gender', 'UserProfileController@updateGender')->name('account.gender');
    Route::post('/account/dob', 'UserProfileController@updateDob')->name('account.dob');
    Route::post('/account/marital-status', 'UserProfileController@updateMaritalStatus')->name('account.marital');
    Route::post('/account/children', 'UserProfileController@updateChildren')->name('account.children');
    Route::post('/account/city', 'UserProfileController@updateCity')->name('account.city');
    Route::post('/account/occupation', 'UserProfileController@updateOccupation')->name('account.occupation');
    Route::post('/account/emergency', 'UserProfileController@updateEmergency')->name('account.emergency');
    Route::post('/change-password', 'UserProfileController@updatePassword')->name('password.change');
    Route::post('/change-photo', 'UserProfileController@uploadProfilePhoto')->name('profile.photo');
    Route::post('/change-front-card', 'UserProfileController@uploadFrontCard')->name('profile.front.card');
    Route::post('/change-back-card', 'UserProfileController@uploadBackCard')->name('profile.back.card');
        
    Route::get('/get-vat', 'VatController@getVat')->name('profile.vat');
    Route::post('/vat', 'VatController@store')->name('profile.vat.submit');

    Route::post('/check-message-notify', 'UserNotificationController@checkMessage')->name('profile.message.notify');
    Route::post('/check-support-notify', 'UserNotificationController@checkSupport')->name('profile.support.notify');
    Route::post('/check-reminder-notify', 'UserNotificationController@checkReminder')->name('profile.reminder.notify');
    Route::post('/check-policy-notify', 'UserNotificationController@checkPolicy')->name('profile.policy.notify');
    Route::post('/check-unsubscribe-notify', 'UserNotificationController@checkToggleSubscribe')->name('profile.unsubscribe.notify');

    Route::get('/deactivate-account', 'DeactivateUserController@index')->name('profile.deactivate');
    Route::post('/deactivate-account', 'DeactivateUserController@submitDeactivate')->name('profile.deactivate.submit');

    /*------- Listing Properties ------- */
    Route::get('/properties', 'PropertyController@index')->name('property');
    Route::get('/properties/new', 'PropertyController@addNewListing')->name('property.add');
    Route::get('/properties/start', 'PropertyController@startNew')->name('property.start');
    Route::get('/properties/start/{property}/create', 'PropertyController@createNewListing')->name('property.create');
    Route::get('/properties/start/{property}/preview', 'PropertyController@previewCreatedListing')->name('property.preview');

    Route::post('/properties/add/block', 'PropertyController@addBlock')->name('property.block.submit');
    Route::get('/properties/block/{property}/show', 'PropertyController@showBlock')->name('property.block.show');
    Route::get('/properties/block/{propertyHostelBlock}/delete', 'PropertyController@deleteBlock')->name('property.block.delete');

    Route::post('/properties/add/block-rooms', 'PropertyController@addBlockRoom')->name('property.blockroom.submit');
    Route::get('/properties/block-rooms/{property}/show', 'PropertyController@showBlockRoom')->name('property.blockroom.show');
    Route::get('/properties/block-rooms/{hostelBlockRoom}/delete', 'PropertyController@deleteBlockRoom')->name('property.blockroom.delete');

    Route::post('/properties/get/block-room-type', 'PropertyController@getRoomType')->name('property.get.roomtype');
    Route::post('/properties/add/room-amenities', 'PropertyController@addBlockRoomAmenities')->name('property.room.amenities.submit');
    Route::get('/properties/room-amenities/{property}/show', 'PropertyController@showBlockRoomAmenities')->name('property.room.amenities.show');
    Route::get('/properties/room-amenities/{hostelRoomAmenity}/delete', 'PropertyController@deleteBlockRoomAmenities')->name('property.room.amenities.delete');

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
