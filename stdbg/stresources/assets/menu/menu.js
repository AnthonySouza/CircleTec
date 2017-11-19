var user_picture_account_settings_popover_contents = '<ul aria-labelledby="dLabel"><a href="/config/account/"><li class="tt-socialtec-userex-button"><i class="icon-cog"></i>Configurações</li></a><a href="/exit/account/"><li class="tt-socialtec-userex-button"><i class="icon-logout-2"></i>Sair</li></a></ul>';

$(function () {
    $('#user_account_settings_button').popover({placement: 'bottom', content: user_picture_account_settings_popover_contents, html: true, trigger: 'click focus'});
});

$(function () {
    $('#user_local_notifications_button').popover({placement: 'bottom', content: user_picture_account_settings_popover_contents, html: true, trigger: 'click focus'});
});

$(function () {
    $('#user_local_messages_button').popover({placement: 'bottom', content: user_picture_account_settings_popover_contents, html: true, trigger: 'click focus'});
});

$(function () {
    $('#user_local_events_button').popover({placement: 'bottom', content: user_picture_account_settings_popover_contents, html: true, trigger: 'click focus'});
});

var p1, p2, p3 = false;

$('#user_local_notifications_button').on('shown.bs.popover', function () {
    p1 = true;
})

$('#user_local_messages_button').on('shown.bs.popover', function () {
    p2 = true;
})

$('#user_local_events_button').on('shown.bs.popover', function () {
    p3 = true;
})

$('#user_local_notifications_button').on('hidden.bs.popover', function () {
    p1 = false;
})

$('#user_local_messages_button').on('hidden.bs.popover', function () {
    p2 = false;
})

$('#user_local_events_button').on('hidden.bs.popover', function () {
    p3 = false;
})

$('#user_local_notifications_button').on('show.bs.popover', function () {
    if(p2) {
        $('#user_local_messages_button').popover('hide');
    }
    
    if(p3) {
        $('#user_local_events_button').popover('hide');
    }  
})

$('#user_local_messages_button').on('show.bs.popover', function () {
    if(p1) {
        $('#user_local_notifications_button').popover('hide');
    }
    
    if(p3) {
        $('#user_local_events_button').popover('hide');
    }  
})

$('#user_local_events_button').on('show.bs.popover', function () {
    if(p3) {
        $('#user_local_notifications_button').popover('hide');
    }
    
    if(p2) {
        $('#user_local_messages_button').popover('hide');
    }  
})