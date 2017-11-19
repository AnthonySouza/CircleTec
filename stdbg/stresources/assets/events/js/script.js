$('#add-new-event-button').modal({
    keyboard: false,
    focus: true,
    show: false
});

$('#create-event-button').click(function () {

    const EVENT_CREATED_SUCCEFFULL_STATUS   = 1;
    const EVENT_CREATED_ERROR_STATUS        = 2;
    const EVENT_CREATED_ADD_COLAB_ERROR     = 3;

    var ev_name = $('#input-event-name').val();
    var ev_info = $('#input-event-info').val();
    var ev_date = $('#input-event-date').val();
    var ev_init = $('#input-event-start-time').val();
    var ev_end = $('#input-event-end-time').val();
    var ev_shift = $('#input-event-shift').val();
    var ev_local = $('#input-event-local').val();

    if (ev_name != null  ||
        ev_info != null  ||
        ev_date != null  ||
        ev_init != null  ||
        ev_end != null   ||
        ev_shift != null ||
        ev_local != null) {

        var iurl = location.href;
        iurl = 'http://' + iurl.split("/")[2];

        var post_data = 'ev_name=' + ev_name + '&ev_info=' + ev_info + '&ev_date=' + ev_date + '&ev_init=' + ev_init + '&ev_end=' + ev_end + '&ev_shift=' + ev_shift + '&ev_local=' + ev_local;

        var __ajax = $.ajax({
            url: iurl + "/events/w_n_events.php",
            type: "POST",
            data: post_data,
            dataType: "html"
        });

        __ajax.done(function (resposta) {

            obj = JSON.parse(resposta);

                switch (obj.status) {
                    case EVENT_CREATED_SUCCEFFULL_STATUS:

                        window.location.replace(iurl + '/events/?eid=' + obj.event_id);

                        break;
                    case EVENT_CREATED_ERROR_STATUS:



                        break;
                    case EVENT_CREATED_ADD_COLAB_ERROR:



                        break;
                }

        });

        __ajax.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

        __ajax.always(function () {

        });

        __ajax.beforeSend(function () {
            $('new-event-modal-content').append('<div class="processing-info-dots-panel"><div class="content"><div class="dots-container" id="processing-event-dots-container"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div></div></div>');
            animateDots();
        });

        __ajax.complete(function () {
            if($('.processing-info-dots-panel').length) {
                $('.processing-info-dots-panel').remove();
            }
        });

    }

});

$('.ev-settings > .add').click(function () {

    const THROW_EVENT_BUTTON_STATE_ADD_USER = 1;
    const THROW_EVENT_BUTTON_STATE_REM_USER = 2;
    const USER_REGISTERED_SUCCEFULL = 1;
    const USER_REGISTERED_ERROR = 2;

    if($(this).attr('event') != '' || $(this).attr('state') != '') {

        var event = $(this).attr('event');
        var state = $(this).attr('state');

        var iurl = location.href;
        iurl = 'http://' + iurl.split("/")[2];

        var post_data = 'event=' + event + '&state=' + state;
        var __ajax = $.ajax({
            url: iurl + "/events/ev_user_comp.php",
            type: "POST",
            data: post_data,
            dataType: "html"
        });

        __ajax.done(function (resposta) {

            obj = JSON.parse(resposta);

            $(this).toggleClass('on');
            $(this).find('i').removeClass();
            $(this).find('i').addClass('icon-ok-circle');

            switch (obj.status) {
                case USER_REGISTERED_SUCCEFULL:

                    

                    break;
                case USER_REGISTERED_ERROR:

                    

                    break;
            }

        });

        __ajax.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

        __ajax.always(function () {

        });
        
    }
});