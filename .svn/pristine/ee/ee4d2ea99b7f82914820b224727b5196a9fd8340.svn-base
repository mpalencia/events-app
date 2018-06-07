/**
 * @apiDefine CursorPreviousParam
 * @apiParam {Number} [cursor] Optional cursor where to start fetching the result
 * @apiParam {Number} [prev] Optional previous is the last cursor value of the fetch result
 */

/**
 * @apiDefine GetDataSuccess
 * @apiSuccess {Object[]} data List of data
 * @apiSuccess {Object[]} meta Contains cursor,previous, that indicates where to fetch the result
 */

/**
 * @apiDefine PostDataSuccess
 * @apiSuccess {String} message The response message
 */

/**
 * @apiDefine LoginSuccess
 * @apiSuccess {String} token The oauth token
 * @apiSuccess {String} token_type The type of oauth token
 * @apiSuccess {Number} expires_in The token expiration
 */

/**
 * @apiDefine ValidatorError
 * @apiError (Error 422) {String} message The error response message
 * @apiError (Error 422) {Object[]} errors The list of given error
 *
 * @apiErrorExample {json} Error 422-Response:
 * HTTP/1.1 422 Unprocessable Entity
 * {
 *   "message": "The given data was invalid.",
 *   "errors": {
 *      "param1": [
 *          "The given param1 is invalid."
 *      ]
 *   }
 * }
 *
 * @apiError (Error 500) {String} message The error response message
 *
 * @apiErrorExample {json} Error 500-Response:
 * HTTP/1.1 500 Server Error
 * {
 *   "message": "Something went wrong...",
 * }
 */

/**
 * @apiDefine ApiLoginHeader
 * @apiHeader {String} Accept advertises which content types to be returned
 * @apiHeader {String} Authorization contains the credentials to authenticate a user agent with a server <br>
 *                                   It prefixes with <b>Bearer </b> following the auth key
 * @apiHeaderExample {json} Header-Example
 * {
 *      "Accept": "application/json"
 *      "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMC4zLjMyLjIwMjo4MDAxXC9hcGlcL3YxXC9sb2dpbiIsImlhdCI6MTUyNTY2NjIyNiwiZXhwIjoxNTI1NzUyNjI2LCJuYmYiOjE1MjU2NjYyMjYsImp0aSI6Im90bjhpUXRYbFpTZ3VsNU0iLCJzdWIiOjEzLCJwcnYiOiJmNmI3MTU0OWRiOGMyYzQyYjc1ODI3YWE0NGYwMmI3ZWU1MjlkMjRkIn0.1ua2jMfV-nYOkF0A6UwaKmtCNUk03HfyoHCRXJrisNU"
 * }
 *
 * @apiError (Unauthorized 401) {String} message The error response message
 *
 * @apiErrorExample {json} Unauthorized 401-Response:
 * HTTP/1.1 401 Unauthorized
 * {
 *   "message": "Unauthenticated.",
 * }
 */

/**
 * @apiDefine PutHeader
 * @apiHeader {String} Content-Type indicate what media type resource
 * @apiHeaderExample {json} PutHeader-Example
 * {
 *      "Content-Type": "application/x-www-form-urlencoded"
 * }
 */

/**
 * @apiDefine ApiLogoutHeader
 * @apiHeader {String} Accept advertises which content types to be returned
 * @apiHeader {String} Authorization contains the credentials to authenticate a user agent with a server <br>
 *                                   It prefixes with <b>Bearer </b> following the auth key
 * @apiHeaderExample {json} Header-Example
 * {
 *      "Accept": "application/json"
 *      "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMC4zLjMyLjIwMjo4MDAxXC9hcGlcL3YxXC9sb2dpbiIsImlhdCI6MTUyNTY2NjIyNiwiZXhwIjoxNTI1NzUyNjI2LCJuYmYiOjE1MjU2NjYyMjYsImp0aSI6Im90bjhpUXRYbFpTZ3VsNU0iLCJzdWIiOjEzLCJwcnYiOiJmNmI3MTU0OWRiOGMyYzQyYjc1ODI3YWE0NGYwMmI3ZWU1MjlkMjRkIn0.1ua2jMfV-nYOkF0A6UwaKmtCNUk03HfyoHCRXJrisNU"
 * }
 */

/**
 * @apiDefine ApiHeader
 * @apiHeader {String} Accept advertises which content types to be returned
 * @apiHeaderExample {json} Header-Example:
 * {
 *      "Accept": "application/json"
 * }
 */

/**
 * Event Group
 */
/**
 * @api {get} /event Get event list
 * @apiName GetEventList
 * @apiVersion 0.1.0
 * @apiGroup Event
 *
 * @apiUse ApiLoginHeader
 * @apiUse CursorPreviousParam
 * @apiParam {Number} [tag_id] Filter the event result by tags
 * @apiUse GetDataSuccess
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "data": [
            {
            "id": 21,
            "name": "Voluptatibus consectetur consequatur velit quas vitae. Event",
            "description": "Itaque at provident ad repellendus rem possimus.",
            "image": "events/default_event.jpg",
            "price": "1828.00",
            "ticket_max": 365,
            "status": "O",
            "tags": [
                {
                    "title": "Tech"
                }
            ],
            "location": [
                {
                    "name": "Tempora vel laborum et.",
                    "address": "20204 Delfina Pine Suite 592\nEast Barneyshire, MT 01436",
                    "lat": "92.838870",
                    "lng": "97.848740"
                },
                {
                    "name": "Officia id aliquam cumque nostrum eveniet accusamus.",
                    "address": "6149 Hailie Wall Apt. 266\nNorth Victormouth, MA 48758",
                    "lat": "94.851160",
                    "lng": "55.540500"
                }
            ],
            "timestamp": [
                {
                    "timestamp_start": "2018-04-19 16:25:32",
                    "timestamp_end": "2018-04-22 16:25:32"
                },
                {
                    "timestamp_start": "2018-04-22 16:25:32",
                    "timestamp_end": "2018-04-25 16:25:32"
                },
                {
                    "timestamp_start": "2018-04-19 16:25:32",
                    "timestamp_end": "2018-04-24 16:25:32"
                },
                {
                    "timestamp_start": "2018-04-23 16:25:32",
                    "timestamp_end": "2018-04-25 16:25:32"
                }
            ],
            "contact": [
                {
                    "contacts": "Quod odio dolorum quibusdam sed quae."
                },
                {
                    "contacts": "Expedita unde provident et tempora."
                },
                {
                    "contacts": "Qui sed sunt expedita deserunt."
                }
            ],
            "organizer": {
                "name": "Williamson Inc",
                "email": "wilderman.josh@marks.biz",
                "description": "organizers/default_organizer.jpg",
                "address": "24584 Jackson Manors Suite 827\nLake Erinton, CO 33446",
                "contact": "1-617-780-5416 x1100",
                "image": "organizers/default_organizer.jpg",
                "tags": [
                    {
                        "id": 1,
                        "title": "Entertainment"
                    }
                ]
            },
            "liked": false,
            "reserve": false
        },
 *          "meta": {
 *              "cursor": {
 *              "current": "30",
 *              "prev": null,
 *              "next": 40,
 *              "count": 10
 *              }
 *          }
 *        ],
 *     }
 */

/**
 * @api {get} /event/liked Get liked event list
 * @apiName GetEventLikedList
 * @apiVersion 0.1.0
 * @apiGroup Event
 *
 * @apiUse ApiLoginHeader
 * @apiUse GetDataSuccess
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "data": [
 *            {
            "id": 13,
            "name": "Laborum dicta et rerum. Event",
            "description": "Repudiandae voluptatem aut hic harum dolorum.",
            "image": "events/default_event.jpg",
            "price": "3836.00",
            "ticket_max": 151,
            "status": "O",
            "tags": [
                {
                    "id": 5,
                    "title": "Active"
                }
            ],
            "location": [
                {
                    "name": "Vel fugiat voluptatum accusamus aliquam.",
                    "address": "3842 Sanford Throughway\nPowlowskiport, MN 16246-5806",
                    "lat": "14.085720",
                    "lng": "78.630740"
                },
                {
                    "name": "Et facere eius consequuntur neque excepturi.",
                    "address": "12543 Maudie Walks\nWest Lucile, MA 99922-3765",
                    "lat": "79.493830",
                    "lng": "98.333780"
                },
                {
                    "name": "Eius maiores ad possimus hic labore sed.",
                    "address": "62970 Nora Corner Apt. 155\nClotildeside, FL 47451",
                    "lat": "17.928350",
                    "lng": "98.117540"
                }
            ],
            "timestamp": [
                {
                    "timestamp_start": "2018-04-30 15:24:55",
                    "timestamp_end": "2018-05-01 15:24:55"
                },
                {
                    "timestamp_start": "2018-04-28 15:24:55",
                    "timestamp_end": "2018-05-01 15:24:55"
                },
                {
                    "timestamp_start": "2018-04-27 15:24:55",
                    "timestamp_end": "2018-04-30 15:24:55"
                },
                {
                    "timestamp_start": "2018-04-28 15:24:55",
                    "timestamp_end": "2018-05-01 15:24:55"
                },
                {
                    "timestamp_start": "2018-04-30 15:24:55",
                    "timestamp_end": "2018-05-04 15:24:55"
                },
                {
                    "timestamp_start": "2018-04-27 15:24:55",
                    "timestamp_end": "2018-05-02 15:24:55"
                }
            ],
            "contact": [
                {
                    "contacts": "Doloribus distinctio sit sed reprehenderit."
                }
            ],
            "liked": true,
            "reserve": false
        }
 *        ],
 *     }
 */

/**
 * @api {post} /event/reserve User reserve for event ticket
 * @apiName PostEventReserve
 * @apiVersion 0.1.0
 * @apiGroup Event
 *
 * @apiParam {Number} event_id The event identifier. <br>
 *                    Must be unique with the user.
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse ValidatorError
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "message": "Successfully reserve the event."
 *     }
 */

/**
 * @api {post} /event/liked/save User liked the event
 * @apiName PostUserEventLike
 * @apiVersion 0.1.0
 * @apiGroup Event
 *
 * @apiParam {Number} event_id The event identifier. <br>
 *                    Must be unique with the user.
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse ValidatorError
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "message": "Successfully liked the event."
 *     }
 */

/**
 * @api {post} /event/{event_id}/unlike User unliked the event
 * @apiName PostUserEventUnlike
 * @apiVersion 0.1.0
 * @apiGroup Event
 *
 * @apiParam {Number} event_id The event identifier. <br>
 *                    Must be exists with the user.
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse ValidatorError
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "message": "Successfully unliked the event."
 *     }
 */

/**
 * Ticket Group
 */
/**
 * @api {get} /ticket Get user ticket list
 * @apiName GetUserTicketList
 * @apiVersion 0.1.0
 * @apiGroup Ticket
 *
 * @apiUse ApiLoginHeader
 * @apiUse GetDataSuccess
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "data": [
 *                  {
 *                      "id": 12,
 *                      "order_number": 9794839388101,
 *                      "description": "Quibusdam aut voluptatem ut.",
 *                      "seat": "Patron A",
 *                      "created_at": "2018-04-16 15:04:58",
 *                      "event": {
 *                          "name": "Ut aut quod laudantium distinctio veritatis qui corporis. Event",
 *                          "description": "Eligendi assumenda doloribus aliquid veniam expedita minima numquam.",
 *                          "image": "events/default_event.jpg",
 *                          "price": "7965.00",
 *                          "ticket_max": 167,
 *                          "status": "O"
 *                      }
 *                  }
 *              ]
 *    }
 */

/**
 * Interest Group
 */
/**
 * @api {get} /interest Get user interest list
 * @apiName GetUserInterestList
 * @apiVersion 0.1.0
 * @apiGroup Interest
 *
 * @apiUse ApiLoginHeader
 * @apiUse GetDataSuccess
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *      data:[
 *          {
 *              "id": 4
 *              "title": "Fitness"
 *          }
 *      ]
 * }
 */

/**
 * @api {post} /interest/save User save the interest
 * @apiName PostUserInterestSave
 * @apiVersion 0.1.0
 * @apiGroup Interest
 *
 * @apiParam {Number} tag_id The tag identifier. <br>
 *                    Must be unique with the user.
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse ValidatorError
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "message": "Successfully save interest."
 *     }
 */

/**
 * @api {delete} /interest/:id/remove Remove the user's interest
 * @apiName DeleteUserInterestRemove
 * @apiVersion 0.1.0
 * @apiGroup Interest
 *
 * @apiParam {Number} id The user interest identifier. <br>
 *                    Must be exists with the user.
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse ValidatorError
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "message": "Successfully removed interest."
 *     }
 */

/**
 * Organizer Group
 */
/**
 * @api {get} /organizer/event Get organizer's events
 * @apiName GetOrganizerEventList
 * @apiVersion 0.1.0
 * @apiGroup Organizer
 *
 * @apiUse ApiLoginHeader
 * @apiUse CursorPreviousParam
 * @apiUse GetDataSuccess
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
     "data": [
            {
                "id": 5,
                "name": "Dolor in voluptas necessitatibus sed. Event",
                "description": "Ut inventore ut cupiditate sequi similique minus.",
                "image": "events/default_event.jpg",
                "price": "534.00",
                "ticket_max": 256,
                "status": "O",
                "location": [
                    {
                        "name": "Sunt molestiae sit ipsam et corrupti itaque.",
                        "address": "87564 Renner Gateway\nWest Erinfort, OH 94002-2635",
                        "lat": "60.459770",
                        "lng": "94.761700"
                    },
                    {
                        "name": "Dolorum voluptates amet quo id deleniti deserunt rerum.",
                        "address": "83719 Howe Ramp Apt. 875\nStreichstad, IL 37909",
                        "lat": "28.577670",
                        "lng": "97.870330"
                    },
                    {
                        "name": "Quod aut incidunt totam voluptas.",
                        "address": "247 Corine Inlet\nEast Freeman, ME 54993-4928",
                        "lat": "47.195360",
                        "lng": "59.498430"
                    }
                ],
                "timestamp": [
                    {
                        "timestamp_start": "2018-04-22 10:43:40",
                        "timestamp_end": "2018-04-26 10:43:40"
                    },
                    {
                        "timestamp_start": "2018-04-20 10:43:40",
                        "timestamp_end": "2018-04-21 10:43:40"
                    },
                    {
                        "timestamp_start": "2018-04-20 10:43:40",
                        "timestamp_end": "2018-04-24 10:43:40"
                    }
                ],
                "contact": [
                    {
                        "contacts": "Asperiores alias et quis consequuntur est sint."
                    },
                    {
                        "contacts": "Neque soluta quia recusandae libero magnam enim."
                    },
                    {
                        "contacts": "Voluptates officiis distinctio omnis."
                    }
                ]
            },
            "totalLikes": 4
        ],
        "meta": {
            "cursor": {
                "current": null,
                "prev": null,
                "next": 5,
                "count": 1
            }
        }
 * }
 */

/**
 * @api {post} /organizer/event/create Create event by organizer
 * @apiName PostOrganizerEventSave
 * @apiVersion 0.1.0
 * @apiGroup Organizer
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse ValidatorError
 *
 * @apiParam {String} name the event name
 * @apiParam {String} description the event summary/description
 * @apiParam {Numeric} price the price of the event if free or not
 * @apiParam {Numeric} ticket_max the max ticket in event
 * @apiParam {Numeric[]} tags the tag identifier
 * @apiParam {String} contact the event contact.
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
     "message": "Successfully created an event."
 * }
 */

/**
 * @api {delete} /organizer/event/:event_id/remove Remove Event
 * @apiName DeleteOrganizerEventRemove
 * @apiVersion 0.1.0
 * @apiGroup Organizer
 *
 * @apiParam {Number} event_id The event identifier. <br>
 *                    Must be exists with the organizer.
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse ValidatorError
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "message": "Successfully removed event."
 *     }
 */

/**
 * @api {get} /organizer/event/:event_id/attendees Get event attendees
 * @apiName GetOrganizerEventAttendees
 * @apiVersion 0.1.0
 * @apiGroup Organizer
 *
 * @apiUse ApiLoginHeader
 *
 * @apiParam {Number} event_id The event identifier. <br>
 *                    Must be exists with the organizer.
 *
 * @apiParam {Number} [cursor] Optional cursor where to start fetching the result
 * @apiParam {Number} [prev] Optional previous is the last cursor value of the fetch result
 *
 * @apiSuccess {Object[]} data List of data
 * @apiSuccess {Object[]} meta Contains cursor,previous, that indicates where to fetch the result. //Please ignore this this is not included yet.
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
     "data": [
        {
            "id": 15,
            "order_number": 9712349869070,
            "user_id": 47,
            "first_name": "Joannie",
            "last_name": "Abernathy",
            "email": "ila15@lowe.com",
            "contact": "803-261-8156",
            "birthday": "1983-09-19",
            "address": "6169 Baumbach Walks Apt. 796\nNorth Jackson, NC 32476-8302",
            "image": "users/default_user.jpg",
            "attended": 1
        },
        {
            "id": 15,
            "user_id": 48,
            "first_name": "Christopher",
            "last_name": "Hodkiewicz",
            "email": "laury.homenick@moen.org",
            "contact": "1-810-830-4371",
            "birthday": "2000-03-11",
            "address": "43624 Nikolaus Plains\nNew Alejandrin, OR 75140-4979",
            "image": "users/default_user.jpg"
            "attended": 0
        },
        {
            "id": 15,
            "user_id": 49,
            "first_name": "Uriel",
            "last_name": "Krajcik",
            "email": "eloy.hauck@hotmail.com",
            "contact": "1-493-927-4351 x721",
            "birthday": "1974-03-21",
            "address": "36970 Tyson Way\nGloriaberg, AL 89396",
            "image": "users/default_user.jpg"
            "attended": 1
        }
        ],
        "meta": {
            "cursor": {
                "current": null,
                "prev": null,
                "next": 5,
                "count": 1
            }
        }
 * }
 */

/**
 * @api {get} /organizer/event/:event_id/edit Get Event Details For Edit
 * @apiName GetEventDetailsForEdit
 * @apiVersion 0.1.0
 * @apiGroup Organizer
 *
 * @apiParam {Number} event_id The event identifier. <br>
 *                    Must be exists with the organizer.
 *
 * @apiUse ApiLoginHeader
 * @apiUse GetDataSuccess
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
     "data": {
        "id": 5,
        "name": "Quia cupiditate aut nam perferendis reiciendis. Event",
        "description": "Temporibus in et nihil sunt molestiae autem.",
        "image": "events/default_event.jpg",
        "price": "9434.00",
        "ticket_max": 940,
        "status": "O",
        "tags": [
            {
                "title": "Music"
            }
        ],
        "location": [
            {
                "name": "Laboriosam nihil et quia officia aspernatur voluptatem.",
                "address": "94560 Halvorson Expressway Suite 377\nDaisyhaven, MD 06582-0886",
                "lat": "37.823540",
                "lng": "79.087090"
            },
            {
                "name": "Eligendi dolores molestiae nam est quia rem aut.",
                "address": "59051 Hadley Mountains Apt. 850\nRaeview, SD 74261-6514",
                "lat": "98.608740",
                "lng": "56.983460"
            },
            {
                "name": "Iure ut rerum corporis ea nihil eum.",
                "address": "99707 Hegmann Valleys Suite 959\nSchillerchester, DE 82886-3937",
                "lat": "76.723760",
                "lng": "34.757550"
            }
        ],
        "timestamp": [
            {
                "timestamp_start": "2018-04-23 11:57:49",
                "timestamp_end": "2018-04-24 11:57:49"
            },
            {
                "timestamp_start": "2018-04-25 11:57:49",
                "timestamp_end": "2018-04-28 11:57:49"
            }
        ],
        "contact": [
            {
                "contacts": "Error itaque doloribus tenetur tempore est quam."
            }
        ]
    }
 * }
 */

/**
 * @api {put} /organizer/event/:event_id/attendees/:attendee_id/mark-as-attended-or-unattended Mark attendee in event
 * @apiName PutEventAttendeesAttended
 * @apiVersion 0.1.0
 * @apiGroup Organizer
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse ValidatorError
 *
 * @apiParam {Number} event_id The event identifier. <br>
 *                    Must be exists with the organizer.
 * @apiParam {Number} attendee_id The user id. <br>
 *                    The user must exists in the said event
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
      "message": "Successfully mark the attendee as attended"
 * }
 */

/**
 * @api {post} /organizer/login Login
 * @apiName PostOrganizerLogin
 * @apiVersion 0.1.0
 * @apiGroup Organizer
 *
 * @apiUse LoginSuccess
 * @apiUse ValidatorError
 *
 * @apiParam {String} email The organizer email
 * @apiParam {String} password The organizer password
 * @apiParamExample {json} Request-Example:
 * {
 *      "email": "dgts@tip.edu.ph",
 *      "password": "secret"
 * }
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "organizer": {
        "id": 28,
        "name": "Technological Institute of the Phils. ",
        "email": "dgts@tip.edu.ph",
        "description": "Lorem ipsum",
        "address": "938 Aurora Blvd., Cubao, Quezon City",
        "contact": "7330961",
        "image": "organizers/default_organizer.jpg",
        "tags": [
            {
                "id": 1,
                "title": "Entertainment"
            }
        ]
     },
     "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMC4zLjMyLjIwMjo4MDAxXC9hcGlcL3YxXC9vcmdhbml6ZXJcL2xvZ2luIiwiaWF0IjoxNTI1Njc5NjEyLCJleHAiOjE1MjU3NjYwMTIsIm5iZiI6MTUyNTY3OTYxMiwianRpIjoiR2Ywb1FWdHJUMWdIYkxrYiIsInN1YiI6MjgsInBydiI6ImE0NzM4MzJmY2UxMGVlMDVmZjBkZTgyMTdlZTU1MmIzNzQxZjBiN2IifQ.HlNqMllN3NOQZIKSmeNLBG2e3exkx23k3XWurqB3944",
     "token_type": "bearer",
     "expires_in": 86400
    }
 }
 */

/**
 * @api {post} /organizer/logout Organizer Logout
 * @apiName PostOrganizerLogout
 * @apiVersion 0.1.0
 * @apiGroup Organizer
 *
 * @apiUse ApiLogoutHeader
 * @apiUse PostDataSuccess
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "message": "Successfully logged out."
 }
 */

/**
 * @api {put} /organizer/update-profile Organizer Update Profile
 * @apiName PostOrganizerUpdateProfile
 * @apiVersion 0.1.0
 * @apiGroup Organizer
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse ValidatorError
 *
 * @apiParam (Profile) {String{..150}} name Organizer name.
 * @apiParam (Profile) {String{..150}} email Organizer email add. <br>
 *                                     Must be unique email.
 * @apiParam (Profile) {String} description Organizer description.
 * @apiParam (Profile) {String} address Organizer address.
 * @apiParam (Profile) {String{..30}} contact Organizer contact number.
 *
 *
 * @apiParamExample {json} Profile-Example:
 * {
 *  "name": "WTF",
    "email": "dgts@tip.edu.ph",
    "description": "lorem ipsum",
    "address": "938 Aurora Blvd., Cubao",
    "contact": "34560607",
 * }
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "message": "Profile successfully updated."
 }
 */

/**
 * @api {put} /organizer/save-firebase-id Organizer Save Firebase Id
 * @apiName PostOrganizerSaveFirebaseId
 * @apiVersion 0.1.0
 * @apiGroup Organizer
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse PutHeader
 * @apiUse ValidatorError
 *
 * @apiParam (Form) {String} firebase_id Organizer firebase instance id.
 *
 * @apiParamExample {json} Form-Example:
 * {
 *  "firebase_id": "f7XNTReFoQE:APA91bHUEummntYvSZLwtUVKEJKS3uaO5hPRLhPv-qBbrynzG4OEOha9SavSWEAbj0muSkHFlgo5k56mtDJ7aP0g8LU3ZoI7rnBtGktSz715v0OMS-dtIV1cJCoUjXoQUPnmf2AGzbCF",
 * }
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "message": "Successfully save firebase instance id."
 }
 */

/**
 * Tags Group
 */
/**
 * @api {get} /tags Get Tags List
 * @apiName GetTagsList
 * @apiVersion 0.1.0
 * @apiGroup Tags
 *
 * @apiUse ApiLoginHeader
 * @apiSuccess {Object[]} data List of data
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
       "data": [
        {
            "id": 1,
            "title": "Entertainment"
        },
        {
            "id": 2,
            "title": "Music"
        },
        {
            "id": 3,
            "title": "Tech"
        },
        {
            "id": 4,
            "title": "Fitness"
        },
        {
            "id": 5,
            "title": "Active"
        },
        {
            "id": 6,
            "title": "Business"
        }
    ]
 * }
 */

/**
 * @api {get} /image Get image
 * @apiName GetImage
 * @apiVersion 0.1.0
 * @apiGroup Image
 *
 * @apiUse ApiLoginHeader
 * @apiParam {String} filename The name of the image to fetch
 * @apiParamExample {String} Request-Example:
 * {
 *      url_link?filename=events/default_event.jpg
 * }
 *
 *
 *
 * @apiHeader {String} Content-Type The response content
 * @apiHeaderExample {json} Header:Example:
 * {
 *      "Content-Type": "image/png"
 * }
 */

/**
 * User
 */

/**
 * @api {post} /login User Login
 * @apiName PostUserLogin
 * @apiVersion 0.1.0
 * @apiGroup User
 *
 * @apiUse LoginSuccess
 * @apiUse ValidatorError
 *
 * @apiParam {String} email The user email
 * @apiParam {String} password The user password
 *  @apiParamExample {json} Request-Example:
 * {
 *      "email": "johndoe@gmail.com",
 *      "password": "secret"
 * }
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
     "user": {
            "id": 13,
            "first_name": "John",
            "last_name": "Doe",
            "email": "johndoe@gmail.com",
            "contact": "7335412",
            "birthday": "2018-05-04",
            "address": "938 Aurora Blvd., Cubao, Quezon City",
            "image": "users/default_user.jpg"
      },
      "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMC4zLjMyLjIwMjo4MDAxXC9hcGlcL3YxXC9vcmdhbml6ZXJcL2xvZ2luIiwiaWF0IjoxNTI1Njc5NjEyLCJleHAiOjE1MjU3NjYwMTIsIm5iZiI6MTUyNTY3OTYxMiwianRpIjoiR2Ywb1FWdHJUMWdIYkxrYiIsInN1YiI6MjgsInBydiI6ImE0NzM4MzJmY2UxMGVlMDVmZjBkZTgyMTdlZTU1MmIzNzQxZjBiN2IifQ.HlNqMllN3NOQZIKSmeNLBG2e3exkx23k3XWurqB3944",
      "token_type": "bearer",
      "expires_in": 86400

 }
 */

/**
 * @api {post} /logout User Logout
 * @apiName PostUserLogout
 * @apiVersion 0.1.0
 * @apiGroup User
 *
 * @apiUse ApiLogoutHeader
 * @apiUse PostDataSuccess
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "message": "Successfully logged out."
 }
 */

/**
 * @api {post} /register User Registration
 * @apiName PostUserRegister
 * @apiVersion 0.1.0
 * @apiGroup User
 *
 * @apiUse ApiHeader
 * @apiUse PostDataSuccess
 * @apiUse ValidatorError
 *
 * @apiParam (Register) {String{..75}} first_name Users first name.
 * @apiParam (Register) {String{..75}} last_name Users last name.
 * @apiParam (Register) {String{..75}} email Users email add. <br>
 *                                     Must be unique email.
 * @apiParam (Register) {String{..30}} contact Users contact number.
 * @apiParam (Register) {Date} birthday Users birthday. <br>
 *                                      Must be a valid date from <b>strtotime</b> PHP function. <br>
 *                                      Date format must be PHP date "Y-m-d" format. E.g. 2017-05-01.
 * @apiParam (Register) {String} address Users address.
 * @apiParam (Register) {String{6..75}} password Users password. <br>
 *                                               Required with <password_confirmation> field. <br>
 *                                               Password and Password Confirmation field must match. <br>
 * @apiParam (Register) {String{6..75}} password_confirmation Users password confirmation. <br>
 *                                                            Password and Password Confirmation field must match. <br>
 * @apiParamExample {json} Register-Example:
 * {
 *  "first_name": "Gon"
    "last_name": "Freacks"
    "email": "gon_freacks123@gmail.com"
    "contact": "345-6067"
    "birthday": "2017-12-01"
    "address": "York New City"
    "password": "secret"
    "password_confirmation": "secret"
 * }
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "message": "User successfully registered."
 }
 */

/**
 * @api {put} /update-profile User Update Profile
 * @apiName PostUserUpdateProfile
 * @apiVersion 0.1.0
 * @apiGroup User
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse ValidatorError
 *
 * @apiParam (Profile) {String{..75}} first_name Users first name.
 * @apiParam (Profile) {String{..75}} last_name Users last name.
 * @apiParam (Profile) {String{..75}} email Users email add. <br>
 *                                     Must be unique email.
 * @apiParam (Profile) {String{..30}} contact Users contact number.
 * @apiParam (Profile) {Date} birthday Users birthday. <br>
 *                                      Must be a valid date from <b>strtotime</b> PHP function. <br>
 *                                      Date format must be PHP date "Y-m-d" format. E.g. 2017-05-01.
 * @apiParam (Profile) {String} address Users address.
 *
 * @apiParamExample {json} Profile-Example:
 * {
 *  "first_name": "Gon",
    "last_name": "Freacks",
    "email": "gon_freacks123@gmail.com",
    "contact": "345-6067",
    "birthday": "2017-12-01",
    "address": "York New City"
 * }
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "message": "Profile successfully updated."
 }
 */

/**
 * @api {put} /save-firebase-id User Save Firebase Id
 * @apiName PutUserSaveFirebaseId
 * @apiVersion 0.1.0
 * @apiGroup User
 *
 * @apiUse ApiLoginHeader
 * @apiUse PostDataSuccess
 * @apiUse PutHeader
 * @apiUse ValidatorError
 *
 * @apiParam (Form) {String} firebase_id User firebase instance id.
 *
 * @apiParamExample {json} Form-Example:
 * {
 *  "firebase_id": "f7XNTReFoQE:APA91bHUEummntYvSZLwtUVKEJKS3uaO5hPRLhPv-qBbrynzG4OEOha9SavSWEAbj0muSkHFlgo5k56mtDJ7aP0g8LU3ZoI7rnBtGktSz715v0OMS-dtIV1cJCoUjXoQUPnmf2AGzbCF",
 * }
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 {
    "message": "Successfully save firebase instance id."
 }
 */
