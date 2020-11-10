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
Route::get('/oshelter/callback', 'WebsiteController@callback')->name('callback');
Route::get('/own-property', 'WebsiteController@ownProperty')->name('own.property');
Route::get('/property-status/{status}', 'WebsiteController@propertyStatus')->name('status.property');
Route::get('/property-types/{type}', 'WebsiteController@propertyType')->name('type.property');
Route::get('/single-property/{property}/details', 'WebsiteController@singleProperty')->name('single.property');
Route::get('/properties', 'WebsiteController@property')->name('browse.property');
Route::get('/map-properties', 'WebsiteController@mapProperty')->name('browse.property_map');

Route::get('/properties/search', 'WebsiteController@searchProperty')->name('browse.property.search');
Route::get('/map-search-properties', 'WebsiteController@mapSearchProperty')->name('browse.search_property_map');
Route::get('/property-status/{status}/search', 'WebsiteController@propertyStatus')->name('status.property.search');
Route::get('/property-types/{type}/search', 'WebsiteController@propertyType')->name('type.property.search');
Route::get('/map-property-types', 'WebsiteController@mapPropertyType')->name('browse.property_types_map');

Route::get('/why-choose-us/{title}', 'WebsiteController@whyChooseUs')->name('why.choose');
Route::get('/help/property-owners', 'WebsiteController@ownerHelp')->name('help.owner');
Route::get('/help/booking-and-travellers', 'WebsiteController@bookingHelp')->name('help.booking');
Route::get('/contact-us', 'WebsiteController@contact')->name('contact');
Route::get('/account-deactivated', 'WebsiteController@accountDeactivated')->name('account.deactivated');


/*----------------Start User Route List----------------------------- */
Auth::routes();

Route::group(['prefix' => 'user'], function () {
    /*------- Dashboard ------- */
    Route::get('/dashboard', 'UserController@index')->name('dashboard');

    /*------- Notifications ------- */
    Route::get('/message-count', 'UserController@messageCount')->name('message.count');
    Route::get('/message-notification', 'UserController@messageNotification')->name('message.notification');
    Route::get('/notification-count', 'UserController@notificationCount')->name('notification.count');
    Route::get('/notifications', 'UserController@notification')->name('notifications');

    /*------- Nav actions ------- */
    Route::get('/wishlist', 'UserSavedPropertyController@wishList')->name('saved');
    Route::post('/wishlist', 'UserSavedPropertyController@store')->name('saved.submit');
    Route::get('/wishlist/{userSavedProperty}/remove', 'UserSavedPropertyController@removeWishList')->name('saved.remove');
    Route::get('/requests', 'UserController@requests')->name('requests');
    Route::get('/requests/{booking}/detail', 'UserController@requestDetail')->name('requests.detail');
    Route::get('/requests/{booking}/confirm', 'UserController@requestConfirm')->name('requests.comfirm');
    Route::get('/requests/{booking}/cancel', 'UserController@requestCancel')->name('requests.cancel');
    Route::get('/requests/{booking}/payment', 'UserController@requestPayment')->name('requests.payment');

    /*------- Payments ------- */
    Route::post('/requests/{booking}/payment/mobile', 'BookingController@mobilePayment')->name('requests.payment.mobile');
    Route::get('/payments/mobile/{transactionId}/{user}/{operator}', 'BookingController@mobileResponse')->name('payment.mobile.response');
    // Route::post('/properties/bookings/payment/mobile', 'BookingController@mobilePayment')->name('property.bookings.mobilepayment');
    // Route::get('/wallet', 'UserWalletController@index')->name('wallet');
    // Route::get('/activities', 'UserActivityController@index')->name('activities');

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
        
    // Route::get('/get-vat', 'VatController@getVat')->name('profile.vat');
    // Route::post('/vat', 'VatController@store')->name('profile.vat.submit');

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

    Route::post('/properties/photos/{property}/upload', 'PropertyController@uploadPropertyPhoto')->name('property.photos.submit');
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
    Route::post('/properties/new/prev', 'PropertyController@goPrevious')->name('property.back');

    Route::get('/properties/{property}/edit', 'PropertyController@editListing')->name('property.edit');
    Route::post('/properties/{property}/edit', 'PropertyController@updateListing')->name('property.update');
    
    Route::post('/properties/{property}/visibility', 'PropertyController@togglePublishVisibility')->name('property.visibility');

    Route::get('/properties/{property}/delete', 'PropertyController@confirmDelete')->name('property.confirmdelete');
    Route::post('/properties/{property}/delete', 'PropertyController@deleteListing')->name('property.delete');

    Route::get('/manage-properties', 'PropertyController@manageProperty')->name('property.manage');
    // Route::get('/manage-properties/{property}/utilities', 'PropertyUtilityController@index')->name('property.utilities');
    // Route::get('/manage-properties/{property}/utilities-list', 'PropertyUtilityController@show')->name('property.utilities.list');
    // Route::post('/manage-properties/create/utilities', 'PropertyUtilityController@store')->name('property.utilities.submit');
    // Route::post('/manage-properties/switch/utilities', 'PropertyUtilityController@switch')->name('property.utilities.switch');
    // Route::post('/manage-properties/update/utilities', 'PropertyUtilityController@update')->name('property.utilities.update');
    // Route::get('/manage-properties/{propertyUtility}/remove', 'PropertyUtilityController@remove')->name('property.utilities.remove');

    
    /*------- Booking a Properties ------- */
    Route::post('/properties/get/block-room-number', 'BookingController@getRoomTypeNumber')->name('property.get.roomnumber');
    Route::post('/properties/check/block-room-type', 'BookingController@checkRoomTypeAvailability')->name('property.check.roomtype');
    Route::post('/properties/bookings', 'BookingController@book')->name('property.bookings.submit');
    Route::post('/properties/hostel/bookings', 'BookingController@hostelBook')->name('property.bookings.hostel.submit');
    Route::get('/properties/{property}/{checkin}/{checkout}/{guest}/{children}/{infant}/{filter_id}/bookings', 'BookingController@index')->name('property.bookings.index');
    Route::get('/properties/{property}/{checkin}/{checkout}/{block_id}/{gender}/{room_type}/{room_number}/{filter_id}/bookings', 'BookingController@hostelIndex')->name('property.bookings.hostel.index');
    Route::post('/properties/bookings/movenext', 'BookingController@moveNext')->name('property.bookings.movenext');
    Route::post('/properties/bookings/smsverification', 'BookingController@sendSmsVerification')->name('property.bookings.smsverification');
    Route::post('/properties/bookings/verify', 'BookingController@verify')->name('property.bookings.verify');
    Route::post('/properties/bookings/request', 'BookingController@bookingRequest')->name('property.bookings.request');
   

    /*------- Visitors Visit ------- */
    Route::get('/visits', 'VisitorController@index')->name('visits');
    Route::get('/visits/all', 'VisitorController@all')->name('visits.all');
    Route::get('/visits/upcoming', 'VisitorController@upcoming')->name('visits.upcoming');
    Route::get('/visits/current', 'VisitorController@current')->name('visits.current');
    Route::post('/visits/current/extend', 'VisitorController@extendStay')->name('visits.current.extend');
    Route::get('/visits/extension/{userExtensionRequest}/request', 'VisitorController@extensionRequest')->name('visits.extension.request');
    Route::post('/visits/extension/{userExtensionRequest}/approve', 'VisitorController@approveExtendStay')->name('visits.extension.request.approve');
    Route::post('/visits/extension/{userExtensionRequest}/decline', 'VisitorController@declineExtendStay')->name('visits.extension.request.decline');
    Route::get('/visits/past', 'VisitorController@past')->name('visits.past');
    Route::get('/visits/{property}/detail', 'VisitorController@showVisitedProperty')->name('visits.property');
    Route::get('/visits/hostel', 'VisitorController@hostel')->name('visits.hostel');
    Route::get('/visits/hostel/upcoming', 'VisitorController@hostelUpcoming')->name('visits.hostel.upcoming');
    Route::get('/visits/hostel/current', 'VisitorController@hostelCurrent')->name('visits.hostel.current');
    Route::get('/visits/hostel/past', 'VisitorController@hostelPast')->name('visits.hostel.past');
    // Route::get('/visits/{name}/types', 'VisitorController@types')->name('visits.types');
   
    
    /*------- Listing Guests ------- */
    Route::get('/tenants', 'TenantController@index')->name('tenants');
    Route::get('/tenants/current', 'TenantController@currentTenant')->name('tenants.current');
    Route::get('/tenants/{user}/visited-properties', 'TenantController@showVisitedProperty')->name('tenant.visited');
    Route::get('/buyers', 'TenantsController@buyer')->name('buyers');
    Route::get('/bidders', 'TenantsController@bidder')->name('bidders');

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

    /*------- Report Listing ------- */
    Route::get('/listing/{property}/report', 'ReportPropertyController@index')->name('report-listing');
    Route::post('/report-listing', 'ReportPropertyController@store')->name('report-listing.submit');


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
