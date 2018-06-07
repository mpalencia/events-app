<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * |--------------------------------------------------------------------------
 * | Table of Contents
 * | --------------------------------------------------------------------------
 * | v1
 * |    Event
 * |        *api/v1/event - List of event api
 * |        *api/v1/event/liked - list of the liked events by the user
 * |        *api/v1/event/liked/save - Save the user liked event
 * |        *api/v1/event/reserve - Reserve event ticket
 * |        *api/v1/event/{event_id}/unlike - Unlike the users save event
 * |    Ticket
 * |        *api/v1/ticket - get the list of user ticket
 * |    Interest
 * |        *api/v1/interest - list of user interest api
 * |        *api/v1/interest/save - save the user interest
 * |        *api/v1/interest/{id}/remove - remove the saved user interest
 * |    Organizer
 * |        *api/v1/organizer/event - list of event of the organizer
 * |        *api/v1/organizer/event/create - add an event by organizer.
 * |        *api/v1/organizer/event/{event_id}/remove - remove the event by organizer
 * |        *api/v1/organizer/event/{event_id}/attendees - list all the event attendees
 * |        *api/v1/organizer/event/{event_id}/attendees/{attendee_id}/mark-as-attended-or-unattended - mark the attendees
 * |        *api/v1/organizer/event/{event_id}/locations - list all the event locations
 * |        *api/v1/organizer/event/{event_id}/locations/create - create event locations
 * |        *api/v1/organizer/event/{event_id}/locations/{id}/edit- edit event location
 * |        *api/v1/organizer/event/{event_id}/locations/{id}/remove - remove event location
 * |        *api/v1/organizer/event/{event_id}/locations/{id}/update - update event location
 * |        *api/v1/organizer/event/{event_id}/date-time - list all event date&time
 * |        *api/v1/organizer/event/{event_id}/date-time/create - create event date & time
 * |        *api/v1/organizer/event/{event_id}/date-time/{id}/edit - edit event date & time
 * |        *api/v1/organizer/event/{event_id}/date-time/{id}/remove - remove event date & time
 * |        *api/v1/organizer/event/{event_id}/date-time/{id}/update - update event date & time
 * |        *api/v1/organizer/login - organizer login
 * |    Tags
 * |        *api/v1/tags - get list of tags
 * |    Image
 * |        *api/v1/image - get the image
 * |    Login
 * |        *api/v1/login - user login
 * |
 * |        *api/v1/update-profile - user update profile
 * |
 */

Route::group([], function () {
    /*
    *
    * api/v1
    */
    Route::group(['prefix' => 'v1'], function () {
        /**
         * api/v1/event
         */
        Route::group(['prefix' => 'event'], function () {
            Route::get('/', 'EventController@getEvent');
            /**
             * api/v1/event/liked
             */
            Route::group(['prefix' => 'liked'], function () {
                Route::get('/', 'UserController@getLikedEvent');
                Route::post('save', 'EventController@userSaveLikedEvent');
            });


            Route::post('reserve', 'EventController@reserveEvent');
            Route::delete('{event_id}/unlike', 'EventController@userUnlikedEvent');
        });

        /**
         * api/v1/interest
         */
        Route::group(['prefix' => 'interest'], function () {
            Route::get('/', 'UserInterestController@getInterest');
            Route::post('/save', 'UserInterestController@saveInterest');
            /**
             * api/v1/interest/{id}
             */
            Route::group(['prefix' => '{id}'], function () {
                Route::delete('/remove', 'UserInterestController@removeInterest');
            });
        });

        /**
         * api/v1/organizer
         */
        Route::group(['prefix' => 'organizer'], function () {
            /**
             * api/v1/organizer/event
             */
            Route::group(['prefix' => 'event'], function () {
                Route::get('/', 'OrganizerController@getEvent');
                Route::post('/create', 'OrganizerController@createEvent');

                /**
                 * api/v1/organizer/event/{event_id}
                 */
                Route::group(['prefix' => '{event_id}'], function () {
                    Route::delete('/remove', 'OrganizerController@removeEvent');
                    /**
                     * api/v1/organizer/event/{event_id}/attendees
                     */
                    Route::group(['prefix' => '/attendees'], function () {
                        Route::get('/', 'OrganizerController@eventAttendees');
                        Route::put('/{attendee_id}/mark-as-attended-or-unattended', 'OrganizerController@markAttendee');
                    });

                    Route::get('/edit', 'OrganizerController@editEvent'); // used by web
                    Route::put('/update', 'OrganizerController@updateEvent'); // used by web
                    /**
                     * api/v1/organizer/event/{event_id}/locations
                     */
                    Route::group(['prefix' => 'locations'], function () {
                        Route::get('/', 'OrganizerController@eventLocations'); //used by // not yet documented. Get event locations
                        /**
                         * api/v1/organizer/event/{event_id}/locations/{id}
                         */
                        Route::group(['prefix' => '{id}'], function () {
                            Route::get('/edit', 'OrganizerController@getEventLocationEdit'); // used by // not yet documented
                            Route::put('/update', 'OrganizerController@updateEventLocation'); // used by // not yet documented
                            Route::delete('/remove', 'OrganizerController@removeEventLocation'); //used by web not yet documented

                        });
                        Route::post('/create', 'OrganizerController@createEventLocation'); //used by web not yet documented;
                    });

                    /**
                     * api/v1/organizer/event/{event_id}/date-time
                     */
                    Route::group(['prefix' => 'date-time'], function () {
                        Route::get('/', 'OrganizerController@getEventDateTime'); // used by web // not yet documented
                        Route::post('/create', 'OrganizerController@createEventDateTime'); // used by web // not yet documented
                        /**
                         * api/v1/organizer/event/{event_id}/date-time/{id}
                         */
                        Route::group(['prefix' => '{id}'], function () {
                            Route::get('/edit', 'OrganizerController@getEventDateTimeEdit'); // used by // not yet documented
                            Route::delete('/remove', 'OrganizerController@removeEventDateTime'); //used by web // not yet documented
                            Route::put('/update', 'OrganizerController@updateEventDateTime'); // used by web // not yet documented
                        });

                    });

                });
            });
            Route::put('save-firebase-id', 'OrganizerController@saveFirebaseId');
            Route::put('update-profile', 'OrganizerController@updateProfile');
            Route::post('login', 'AuthOrganizer\LoginController@login');
            Route::post('logout', 'AuthOrganizer\LoginController@logout');

        });

        Route::put('update-profile', 'UserController@updateProfile');
        Route::put('save-firebase-id', 'UserController@saveFirebaseId');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout');
        Route::post('register', 'Auth\RegisterController@register');
        Route::get('tags', 'TagController@getTags');
        Route::get('/image', 'ImageController@image');
        Route::get('/ticket', 'UserController@getTicket');

    });
});

Route::group(['middleware' => 'guest:api'], function () {

    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');

});
