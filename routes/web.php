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
Route::group(['middleware' => ['verify-email']], function() {
    Route::get('/', 'WebsiteController@index')->name('index');
    Route::get('/oshelter/callback', 'WebsiteController@callback')->name('callback');
    Route::get('/own-property', 'WebsiteController@ownProperty')->name('own.property');

    Route::group(['prefix' => 'properties'], function () {
        Route::get('/', 'WebsiteController@property')->name('browse.property');
        Route::get('/search', 'WebsiteController@searchProperty')->name('browse.property.search');
        Route::get('/status/{status}', 'WebsiteController@propertyStatus')->name('status.property');
        Route::get('/status/{status}/search', 'WebsiteController@propertyStatus')->name('status.property.search');
        Route::get('/types/{type}', 'WebsiteController@propertyType')->name('type.property');
        Route::get('/types/{type}/search', 'WebsiteController@propertyType')->name('type.property.search');
        Route::get('/{property}/details', 'WebsiteController@singleProperty')->name('single.property');
        Route::get('/map-properties', 'WebsiteController@mapProperty')->name('browse.property_map');
        Route::get('/map-properties/search', 'WebsiteController@mapSearchProperty')->name('browse.search_property_map');
        Route::get('/map-property/types', 'WebsiteController@mapPropertyType')->name('browse.property_types_map');
    });


    Route::get('/why-choose-us/{title}', 'WebsiteController@whyChooseUs')->name('why.choose');

    Route::group(['prefix' => 'help'], function () {
        Route::get('/', 'WebsiteController@help')->name('help');
        Route::get('/{slug}', 'WebsiteController@otherHelp')->name('help.owner');
        Route::get('/search/{search}', 'WebsiteController@search')->name('help.search');
        Route::get('/title/{helpCategory}/{title}', 'WebsiteController@helpCategory')->name('help.title');
        Route::get('/topic/{helpTopic}/{topic}', 'WebsiteController@helpTopic')->name('help.topic');
        Route::get('/read/{helpQuestion}/{question}', 'WebsiteController@readQuestion')->name('help.read');
    });
    Route::get('/contact-us', 'WebsiteController@contact')->name('contact');
    Route::post('/contact-us', 'WebsiteController@submitContact')->name('contact.submit');
    Route::get('/account-deactivated', 'WebsiteController@accountDeactivated')->name('account.deactivated');
    // Route::get('/email', 'WebsiteController@email');
});

/*----------------Start User Route List----------------------------- */
Auth::routes();

Route::group(['prefix' => 'user'], function () {
    Route::get('verify-email', 'Auth\VerifyController@verfiyEmail')->name('verify.email');
    Route::post('verify-email', 'Auth\VerifyController@verify')->name('verify.email.submit');
    Route::post('verify-email/{user}/resend', 'Auth\VerifyController@resendCode')->name('verify.email.resend');
});

Route::group(['middleware' => ['verify-email']], function() {
    Route::group(['prefix' => 'user'], function () {
        /*------- Dashboard ------- */
        // Route::get('/dashboard', 'UserController@index')->name('dashboard');

        /*------- Notifications ------- */
        Route::get('/message-count', 'UserController@messageCount')->name('message.count');
        // Route::get('/message-notification', 'UserController@messageNotification')->name('message.notification');
        Route::get('/notification-count', 'UserController@notificationCount')->name('notification.count');
        Route::get('/notifications', 'UserController@notification')->name('notifications');

        /*------- WishList ------- */
        Route::group(['prefix' => 'wishlist'], function () {
            Route::get('', 'UserSavedPropertyController@wishList')->name('saved');
            Route::post('', 'UserSavedPropertyController@store')->name('saved.submit');
            Route::get('/{userSavedProperty}/remove', 'UserSavedPropertyController@removeWishList')->name('saved.remove');
        });

        /*------- Requests ------- */
        Route::group(['prefix' => 'requests'], function () {
            // Route::get('/requests', 'UserController@requests')->name('requests');
            Route::get('/{booking}/detail', 'UserController@requestDetail')->name('requests.detail');
            Route::get('/{booking}/confirm', 'UserController@requestConfirm')->name('requests.comfirm');
            Route::get('/{booking}/cancel', 'UserController@requestCancel')->name('requests.cancel');
            Route::get('/{booking}/payment', 'UserController@requestPayment')->name('requests.payment');
            // Route::get('/{booking}/invoice', 'UserController@requestInvoice')->name('requests.invoice');

             /*------- Hostel Requests ------- */
            // Route::get('/requests/hostel', 'UserController@hostelRequests')->name('requests.hostel');
            Route::get('/{hostelBooking}/hostel/detail', 'UserController@hostelRequestDetail')->name('requests.detail.hostel');
            Route::get('/{hostelBooking}/hostel/confirm', 'UserController@hostelRequestConfirm')->name('requests.comfirm.hostel');
            Route::get('/{hostelBooking}/hostel/cancel', 'UserController@hostelRequestCancel')->name('requests.cancel.hostel');
            Route::get('/{hostelBooking}/hostel/payment', 'UserController@hostelRequestPayment')->name('requests.payment.hostel');
            // Route::get('/{booking}/invoice', 'UserController@hostelRequestInvoice')->name('requests.invoice.hostel');

            /*------- Extensions ------- */
            // Route::get('/extensions', 'VisitorController@extensionRequests')->name('requests.extension');
            Route::get('/extensions/{userExtensionRequest}/detail', 'VisitorController@extensionDetail')->name('requests.extension.detail');
            Route::get('/extensions/{userExtensionRequest}/confirm', 'VisitorController@confirmExtendStay')->name('requests.extension.confirm');
            Route::get('/extensions/{userExtensionRequest}/cancel', 'VisitorController@cancelExtendStay')->name('requests.extension.cancel');
            Route::get('/extensions/{userExtensionRequest}/payment', 'VisitorController@extensionPayment')->name('requests.extension.payment');

        });
       
        /*------- Payments ------- */
        Route::group(['prefix' => 'payments'], function () {
            Route::post('/verify', 'PaymentController@verifyPayment')->name('payments.verify');
            Route::get('/transaction/success', 'PaymentController@successTrasaction')->name('payment.success');
            // Route::get('/wallet', 'UserWalletController@index')->name('wallet');
            // Route::get('/activities', 'UserActivityController@index')->name('activities');
        });

        /*------- Account and Profile ------- */
        Route::group(['prefix' => 'account'], function () {
            Route::get('', 'UserProfileController@index')->name('account');
            Route::get('/info', 'UserProfileController@accountInfo')->name('account.info');
            Route::post('/update', 'UserProfileController@updateAccountInfo')->name('account.update');
            Route::post('/change-photo', 'UserProfileController@uploadProfilePhoto')->name('profile.photo');
            Route::get('/change-password', 'UserProfileController@changePasswordView')->name('account.changepwd');
            Route::post('/change-password', 'UserProfileController@updatePassword')->name('password.change');
            Route::get('/logins', 'UserProfileController@loginsView')->name('account.logins');
            Route::get('/payments', 'UserProfileController@paymentView')->name('account.payments');
            Route::post('/payments/currency', 'UserProfileController@changeCurrency')->name('account.payments.currency');
            Route::get('/notifications', 'UserProfileController@notificationView')->name('account.notifications');
            Route::post('/change-front-card', 'UserProfileController@uploadFrontCard')->name('profile.front.card');
            Route::post('/change-back-card', 'UserProfileController@uploadBackCard')->name('profile.back.card');
            Route::post('/check-message-notify', 'UserNotificationController@checkMessage')->name('profile.message.notify');
            Route::post('/check-support-notify', 'UserNotificationController@checkSupport')->name('profile.support.notify');
            Route::post('/check-reminder-notify', 'UserNotificationController@checkReminder')->name('profile.reminder.notify');
            Route::post('/check-policy-notify', 'UserNotificationController@checkPolicy')->name('profile.policy.notify');
            Route::post('/check-unsubscribe-notify', 'UserNotificationController@checkToggleSubscribe')->name('profile.unsubscribe.notify');
            Route::get('/deactivate', 'DeactivateUserController@index')->name('profile.deactivate');
            Route::post('/deactivate', 'DeactivateUserController@submitDeactivate')->name('profile.deactivate.submit');
    
            // Route::get('/get-vat', 'VatController@getVat')->name('profile.vat');
            // Route::post('/vat', 'VatController@store')->name('profile.vat.submit');
        });

        /*------- Properties ------- */
        Route::group(['prefix' => 'properties'], function () {
            Route::get('/listings', 'PropertyController@index')->name('property');
            Route::get('/new', 'PropertyController@addNewListing')->name('property.add');
            Route::get('/start', 'PropertyController@startNew')->name('property.start');
            Route::get('/start/{property}/create', 'PropertyController@createNewListing')->name('property.create');
            Route::get('/start/{property}/preview', 'PropertyController@previewCreatedListing')->name('property.preview');
            Route::get('/start/{property}/checks', 'PropertyController@getChecks')->name('property.get.checks');
            
            Route::post('/add/block', 'PropertyController@addBlock')->name('property.block.submit');
            Route::get('/block/{property}/show', 'PropertyController@showBlock')->name('property.block.show');
            Route::get('/block/{propertyHostelBlock}/delete', 'PropertyController@deleteBlock')->name('property.block.delete');

            Route::post('/add/block-rooms', 'PropertyController@addBlockRoom')->name('property.blockroom.submit');
            Route::get('/block-rooms/{property}/show', 'PropertyController@showBlockRoom')->name('property.blockroom.show');
            Route::get('/block-rooms/{hostelBlockRoom}/delete', 'PropertyController@deleteBlockRoom')->name('property.blockroom.delete');

            Route::post('/get/block-room-type', 'PropertyController@getRoomType')->name('property.get.roomtype');
            Route::post('/add/room-amenities', 'PropertyController@addBlockRoomAmenities')->name('property.room.amenities.submit');
            Route::get('/room-amenities/{property}/show', 'PropertyController@showBlockRoomAmenities')->name('property.room.amenities.show');
            Route::get('/room-amenities/{hostelRoomAmenity}/delete', 'PropertyController@deleteBlockRoomAmenities')->name('property.room.amenities.delete');

            Route::post('/photos/{property}/upload', 'PropertyController@uploadPropertyPhoto')->name('property.photos.submit');
            Route::get('/photos/{property}/show', 'PropertyController@showPropertyPhoto')->name('property.photos.show');
            Route::get('/photos/{propertyImage}/delete', 'PropertyController@deletePropertyPhoto')->name('property.photos.delete');
            Route::post('/photos/caption', 'PropertyController@propertyPhotoCaption')->name('property.caption.submit');
    
            Route::post('/rule/add', 'PropertyController@addOwnRule')->name('property.rule.submit');
            Route::get('/rule/{property}/show', 'PropertyController@showOwnRule')->name('property.rule.show');
            Route::get('/rule/{propertyOwnRule}/delete', 'PropertyController@deleteOwnRule')->name('property.rule.delete');
    
            Route::post('/block-price/add', 'PropertyController@addHostelBlockPrice')->name('property.blockprice.submit');
            Route::get('/block-price/{property}/show', 'PropertyController@showHostelBlockPrice')->name('property.blockprice.show');
            Route::get('/block-price/{propertyHostelPrice}/delete', 'PropertyController@deleteHostelBlockPrice')->name('property.blockprice.delete');
            
            Route::post('/new/store', 'PropertyController@store')->name('property.store');
            Route::post('/new/{property}/prev', 'PropertyController@previousStep')->name('property.back');
            Route::post('/new/save-exit', 'PropertyController@saveAndExit')->name('property.save.exit');
    
            Route::get('/{property}/edit', 'PropertyController@editListing')->name('property.edit');
            Route::post('/{property}/edit', 'PropertyController@updateListing')->name('property.update');
            
            Route::post('/{property}/visibility', 'PropertyController@togglePublishVisibility')->name('property.visibility');
    
            Route::get('/{property}/remove', 'PropertyController@confirmDelete')->name('property.confirmdelete');
            Route::post('/{property}/remove', 'PropertyController@deleteListing')->name('property.delete');
    
            // Route::get('/my-properties', 'PropertyController@manageProperty')->name('property.manage');
            // Route::get('/my-properties/{property}/details', 'PropertyController@managePropertyDetail')->name('property.manage.detail');
            // Route::get('/manage-properties/{property}/utilities', 'PropertyUtilityController@index')->name('property.utilities');
            // Route::get('/manage-properties/{property}/utilities-list', 'PropertyUtilityController@show')->name('property.utilities.list');
            // Route::post('/manage-properties/create/utilities', 'PropertyUtilityController@store')->name('property.utilities.submit');
            // Route::post('/manage-properties/switch/utilities', 'PropertyUtilityController@switch')->name('property.utilities.switch');
            // Route::post('/manage-properties/update/utilities', 'PropertyUtilityController@update')->name('property.utilities.update');
            // Route::get('/manage-properties/{propertyUtility}/remove', 'PropertyUtilityController@remove')->name('property.utilities.remove');
            
            /*------- Booking a Properties ------- */
            Route::post('/get/block-room-number', 'BookingController@getRoomTypeNumber')->name('property.get.roomnumber');
            Route::post('/check/block-room-type', 'BookingController@checkRoomTypeAvailability')->name('property.check.roomtype');
            Route::post('/bookings', 'BookingController@book')->name('property.bookings.submit');
            // Route::post('/hostel/bookings', 'BookingController@hostelBook')->name('property.bookings.hostel.submit');
            Route::get('/{property}/{checkin}/{checkout}/{guest}/{filter_id}/bookings', 'BookingController@index')->name('property.bookings.index');
            // Route::get('/{property}/{checkin}/{checkout}/{block_id}/{gender}/{room_type}/{room_number}/{filter_id}/bookings', 'BookingController@hostelIndex')->name('property.bookings.hostel.index');
            Route::post('/bookings/movenext', 'BookingController@moveNext')->name('property.bookings.movenext');
            Route::post('/bookings/smsverification', 'BookingController@sendSmsVerification')->name('property.bookings.smsverification');
            Route::post('/bookings/verify', 'BookingController@verifySmsNumber')->name('property.bookings.verify');
            Route::post('/bookings/request', 'BookingController@bookingRequest')->name('property.bookings.request');
        });

        /*------- Visitors Visit ------- */
        Route::group(['prefix' => 'visits'], function () {
            Route::get('', 'VisitorController@index')->name('visits');
            Route::get('/residence/upcoming', 'VisitorController@residenceUpcoming')->name('visits.upcoming');
            Route::get('/residence/past', 'VisitorController@residencePast')->name('visits.past');
            Route::post('/past/extend', 'VisitorController@extendStay')->name('visits.past.extend');
            Route::get('/hostel/upcoming', 'VisitorController@hostelUpcoming')->name('visits.hostel.upcoming');
            Route::get('/hostel/past', 'VisitorController@hostelPast')->name('visits.hostel.past');
            Route::get('/{visit}/ratings', 'VisitorController@rateProperty')->name('visits.property.rating');
            Route::post('/{visit}/ratings', 'VisitorController@submitRating')->name('visits.property.rating.submit');
            // Route::get('/{name}/types', 'VisitorController@types')->name('visits.types');
        });
        
        /*------- Listing Guests ------- */
        // Route::get('/tenants', 'TenantController@index')->name('tenants');
        // Route::get('/tenants/current', 'TenantController@currentTenant')->name('tenants.current');
        // Route::get('/tenants/{user}/visited-properties', 'TenantController@showVisitedProperty')->name('tenant.visited');
        // Route::get('/buyers', 'TenantsController@buyer')->name('buyers');
        // Route::get('/bidders', 'TenantsController@bidder')->name('bidders');

        /*------- Messages ------- */
        Route::group(['prefix' => 'messages'], function () {
            Route::get('', 'MessageController@index')->name('messages');
            Route::get('/{user}/compose', 'MessageController@composeMessage')->name('messages.compose');
            Route::post('/submit', 'MessageController@sendMessage')->name('messages.compose.submit');
            Route::post('/reply', 'MessageController@reply')->name('messages.reply');
            Route::get('/{message}/read', 'MessageController@read')->name('messages.read');
            Route::post('/delete', 'MessageController@delete')->name('messages.delete');
        });

        /*------- Report Listing ------- */
        Route::group(['prefix' => 'report'], function () {
            Route::get('/{property}/listing', 'ReportPropertyController@index')->name('report-listing');
            Route::post('/submit', 'ReportPropertyController@store')->name('report-listing.submit');
        });

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
});
