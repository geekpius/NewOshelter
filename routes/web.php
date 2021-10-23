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
    Route::get('/becoming-an-owner', 'WebsiteController@becomeOwner')->name('become.owner');
    Route::get('/becoming-a-visitor', 'WebsiteController@becomeVisitor')->name('become.visitor');

    Route::group(['prefix' => 'properties'], function () {
        Route::get('/search', 'WebsiteController@searchProperty')->name('browse.property.search');
        Route::get('/status/{status}', 'WebsiteController@propertyStatus')->name('status.property');
        Route::get('/status/{status}/search', 'WebsiteController@propertyStatus')->name('status.property.search');
        Route::get('/types/{type}', 'WebsiteController@propertyType')->name('type.property');
        Route::get('/types/{type}/search', 'WebsiteController@propertyType')->name('type.property.search');
        Route::get('/{property}/details', 'WebsiteController@singleProperty')->name('single.property');
        Route::get('/map-properties', 'WebsiteController@mapProperty')->name('browse.property_map');
        Route::get('/map-properties/search', 'WebsiteController@mapSearchProperty')->name('browse.search_property_map');
        Route::get('/map-properties/types', 'WebsiteController@mapPropertyType')->name('browse.property_types_map');
        Route::get('/map-properties/status', 'WebsiteController@mapPropertyStatus')->name('browse.property_status_map');
    });

    Route::get('/why-choose-us/{title}', 'WebsiteController@whyChooseUs')->name('why.choose');
    Route::get('/cron', 'WebsiteController@cron')->name('cron');

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
    Route::get('/about-us', 'WebsiteController@about')->name('about');
    Route::post('/show-interest', 'WebsiteController@showInterest')->name('show.interest');
    // Route::get('/email', 'WebsiteController@email');
});

/*----------------Start User Route List----------------------------- */
Auth::routes();

Route::group(['prefix' => 'user'], function () {
    Route::get('verify-email', 'Auth\VerifyController@verfiyEmail')->name('verify.email');
    Route::post('verify-email', 'Auth\VerifyController@verify')->name('verify.email.submit');
    Route::post('verify-email/{user}/resend', 'Auth\VerifyController@resendCode')->name('verify.email.resend');
    Route::get('activate-email/{token}', 'Auth\VerifyController@activateEmail')->name('verify.email.activate');
});

Route::group(['middleware' => ['verify-email']], function() {
    Route::group(['prefix' => 'user'], function () {

        /*------- Notifications ------- */
        Route::get('/notification-count', 'UserController@notificationCount')->name('notification.count');
        Route::get('/notifications', 'UserController@notification')->name('notifications');
        Route::get('/notifications/{externalId}/show', 'UserController@show')->name('notifications.show');

        /*------- WishList ------- */
        Route::group(['prefix' => 'wishlist'], function () {
            Route::get('', 'UserSavedPropertyController@wishList')->name('saved');
            Route::post('', 'UserSavedPropertyController@store')->name('saved.submit');
            Route::get('/{userSavedProperty}/remove', 'UserSavedPropertyController@removeWishList')->name('saved.remove');
        });


        /*------- Payments ------- */
        Route::get('/subscription/packages', 'PaymentController@index')->name('payment.index');
        Route::get('/subscription/packages/{externalId}', 'PaymentController@show')->name('payment.show');
        Route::post('/verify', 'PaymentController@verifyPayment')->name('payments.verify');
        Route::get('/transaction/success', 'PaymentController@successTrasaction')->name('payment.success');
        Route::get('/account/requests/payments', 'PaymentController@payment')->name('payments');

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
            Route::get('/requests', 'UserProfileController@requestView')->name('account.requests');
            Route::get('/notifications', 'UserProfileController@notificationView')->name('account.notifications');
            Route::post('/change-front-card', 'UserProfileController@uploadFrontCard')->name('profile.front.card');
            Route::post('/change-card-info', 'UserProfileController@updateCardInfo')->name('profile.card.info');
            Route::post('/check-message-notify', 'UserNotificationController@checkMessage')->name('profile.message.notify');
            Route::post('/check-support-notify', 'UserNotificationController@checkSupport')->name('profile.support.notify');
            Route::post('/check-reminder-notify', 'UserNotificationController@checkReminder')->name('profile.reminder.notify');
            Route::post('/check-policy-notify', 'UserNotificationController@checkPolicy')->name('profile.policy.notify');
            Route::post('/check-unsubscribe-notify', 'UserNotificationController@checkToggleSubscribe')->name('profile.unsubscribe.notify');
            Route::get('/deactivate', 'DeactivateUserController@index')->name('profile.deactivate');
            Route::post('/deactivate', 'DeactivateUserController@submitDeactivate')->name('profile.deactivate.submit');
            Route::get('/requests/confirmations', 'ConfirmationController@index')->name('property.visitor.confirmations');
            Route::post('/requests/confirmations/{user}/confirm', 'ConfirmationController@confirmStay')->name('property.visitor.confirmations.yes');
            Route::post('/requests/confirmations/{user}/cancel', 'ConfirmationController@cancelStay')->name('property.visitor.confirmations.no');
        });

        /*------- Properties ------- */
        Route::get('/properties/start/{property}/preview', 'PropertyController@previewCreatedListing')->name('property.preview');
        Route::group(['middleware' => ['owner']], function() {
            Route::group(['prefix' => 'properties'], function () {
                Route::get('/listings', 'PropertyController@index')->name('property');

                Route::group(['middleware' => ['subscribe']], function() {
                    Route::get('/new', 'PropertyController@addNewListing')->name('property.add');
                    Route::get('/start', 'PropertyController@startNew')->name('property.start');
                    Route::get('/start/{property}/create', 'PropertyController@createNewListing')->name('property.create');
                    Route::get('/start/{property}/checks', 'PropertyController@getChecks')->name('property.get.checks');
                    Route::get('/start/{property}/check-rooms', 'PropertyController@getCountHostelRoom')->name('property.get.check.room');

                    Route::post('/add/block', 'PropertyController@addBlock')->name('property.block.submit');
                    Route::get('/block/{property}/show', 'PropertyController@showBlock')->name('property.block.show');
                    Route::get('/block/{propertyHostelBlock}/delete', 'PropertyController@deleteBlock')->name('property.block.delete');

                    Route::post('/add/block-rooms', 'PropertyController@addBlockRoom')->name('property.blockroom.submit');
                    Route::get('/block-rooms/{property}/show', 'PropertyController@showBlockRoom')->name('property.blockroom.show');
                    Route::get('/block-rooms/{hostelBlockRoom}/delete', 'PropertyController@deleteBlockRoom')->name('property.blockroom.delete');

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
                    Route::post('/new/store/auction', 'PropertyController@storeAuction')->name('property.store.auction');
                    Route::post('/new/{property}/prev', 'PropertyController@previousStep')->name('property.back');
                    Route::post('/new/save-exit', 'PropertyController@saveAndExit')->name('property.save.exit');

                    Route::get('/{property}/edit', 'PropertyController@editListing')->name('property.edit');
                    Route::post('/{property}/edit', 'PropertyController@updateListing')->name('property.update');

                    Route::get('/{property}/send-approval', 'PropertyController@sendApproval')->name('property.send.approval');

                    Route::post('/{property}/visibility', 'PropertyController@togglePublishVisibility')->name('property.visibility');

                    Route::get('/{property}/remove', 'PropertyController@confirmDelete')->name('property.confirmdelete');
                    Route::post('/{property}/remove', 'PropertyController@deleteListing')->name('property.delete');
                });

            });
        });

        /*------- Booking a Properties ------- */
        Route::post('/properties/get/block-room-type', 'PropertyController@getRoomType')->name('property.get.roomtype');
        Route::post('/properties/get/block-names', 'BookingController@getBlockNames')->name('property.get.block.names');
        Route::post('/properties/get/block-room-number', 'BookingController@getRoomTypeNumber')->name('property.get.roomnumber');
        Route::post('/properties/check/block-room-type', 'BookingController@checkRoomTypeAvailability')->name('property.check.roomtype');
        Route::post('/properties/bookings', 'BookingController@book')->name('property.bookings.submit');
        Route::get('/properties/{property}/{filter_id}/bookings', 'BookingController@index')->name('property.bookings.index');
        Route::get('/properties/{property}/bookings/exit', 'BookingController@exitBookingMode')->name('property.bookings.exit');
        Route::post('/properties/bookings/movenext', 'BookingController@moveNext')->name('property.bookings.movenext');
        Route::post('/properties/bookings/smsverification', 'BookingController@sendSmsVerification')->name('property.bookings.smsverification');
        Route::post('/properties/bookings/verify', 'BookingController@verifySmsNumber')->name('property.bookings.verify');

        /*------------ Requests ------------- */
        Route::post('/properties/requests/rent', 'RentRequestController@store')->name('property.request.rent');
        Route::post('/properties/requests/short-stay', 'ShortStayRequestController@store')->name('property.request.short.stay');
        Route::post('/properties/requests/sale', 'SaleRequestController@store')->name('property.request.sale');
        Route::post('/properties/requests/auction', 'AuctionRequestController@store')->name('property.request.auction');
        Route::post('/properties/requests/hostel', 'HostelRequestController@store')->name('property.request.hostel');



        /*------- Report Listing ------- */
        Route::group(['prefix' => 'report'], function () {
            Route::get('/{property}/listing', 'ReportPropertyController@index')->name('report-listing');
            Route::post('/submit', 'ReportPropertyController@store')->name('report-listing.submit');
        });

    });
});
