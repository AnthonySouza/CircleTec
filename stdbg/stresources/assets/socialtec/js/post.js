$('.s-likes').click(function() {

    var button = $(this);
    var iurl = location.href;
    iurl = 'http://' + iurl.split("/")[2];

    $.ajax({
        type: "POST",
        url: iurl + "/feed/like.php",
        data: "Action=LIKE_POST_ACTION&post_id=" + button.attr('post-id'),
        dataType: 'html',
        beforeSend: function() {
            
            button.css('color', '#00366f');

        }
    })
    .done(function(msg) {
        
        if(msg !== '') {

            if(msg === 'SUCCEFULL_ACTION') {

                button.css('color', '#007bff');
                button.children('i').removeClass();
                button.children('i').addClass('icon-heart-4');

                //reflesh_post_actions_info(button);

            } else if(msg === 'SUCCEFULL_REMOVE_ACTION') {

                button.css('color', '#7b7b7b');
                button.children('i').removeClass();
                button.children('i').addClass('icon-heart-5');

                //reflesh_post_actions_info(button);

            } else {

                alert('Ocorreu um erro interno. Tente novamente mais tarde.')

            }

        }

    })
    .fail(function (jqXHR, textStatus, msg) {
        console.error("Request failed: " + textStatus);
    });

});

$('.s-comments').click(function() {

    var button = $(this);
    var content = button.closest('.post-contend').children('.post-bottom');
    var input;

    if(content.children('.new-post-comment').length === 0) {
        var iurl = location.href;
        iurl = 'http://' + iurl.split("/")[2];
    
        $.ajax({
            type: "POST",
            url: iurl + "/feed/like.php",
            data: "Action=COMMENT_POST_ACTION&post_id=" + button.attr('post-id'),
            dataType: 'html',
            beforeSend: function() {
                
                button.css('color', '#00366f');
    
            }
        })
        .done(function(msga) {
            
            if(msga !== '') {
    
                button.css('color', '#007bff');
                input = msga;

                $(input).appendTo(content);

                content.closest('.new-comment-input').focus();

                $('button.scov-button').click(function() {
                        var button = $(this);
                        var iurl = location.href;
                        iurl = 'http://' + iurl.split("/")[2];
                    
                        $.ajax({
                            type: "POST",
                            url: iurl + "/feed/comment.php",
                            data: "Action=SEND_COMMENT_POST_ACTION&post_id=" + button.attr('pid') + "&data=" + emojione.toShort(button.closest('.new-comment-contend').children('textarea').val()),
                            dataType: 'html',
                            beforeSend: function() {
                                
                                button.css('color', '#00366f');
                    
                            }
                        })
                        .done(function(msgb) {
                            
                            if(msgb === 'SUCCEFULL') {
                    
                                button.val('');

                                var iurl = location.href;
                                iurl = 'http://' + iurl.split("/")[2];
                            
                                $.ajax({
                                    type: "POST",
                                    url: iurl + "/feed/comment.php",
                                    data: "Action=REFLESH_COMMENT_POST_ACTION&post_id=" + button.attr('pid'),
                                    dataType: 'html',
                                    beforeSend: function() {
                                        
                                        button.css('color', '#00366f');
                            
                                    }
                                })
                                .done(function(msgc) {
                                    
                                    if(msgc !== null) {
                            
                                        content.empty();
                                        $(input).appendTo(content);

                                        content.closest('textarea.new-comment-input').focus();

                                        $(msgc).appendTo(content);

                                    }
                            
                                })
                                .fail(function (jqXHR, textStatus, msg) {
                                    console.error("Request failed: " + textStatus);
                                });
                    
                            } else {
                    
                                button.css('color', '#7b7b7b');
                    
                            }
                    
                        })
                        .fail(function (jqXHR, textStatus, msg) {
                            console.error("Request failed: " + textStatus);
                        });
                    
                    });
    
            } else {
    
                button.css('color', '#7b7b7b');
    
            }
    
        })
        .fail(function (jqXHR, textStatus, msg) {
            console.error("Request failed: " + textStatus);
        });
    }

});


/*
function reflesh_post_actions_info(post) {

    var content = $($(post).parents('.post-contend').children().siblings()[2]);
    //content_a = content.siblings()[2];

    if(content.children('post-actions-info').length) {
        content =  content.find('post-actions-info');
    }

    var loading_display = $('<div class="content"><div class="processing-dots-panel"><div class="content"><div class="dots-container" id="processing-event-dots-container"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div></div></div></div>');
    var iurl = location.href;
    iurl = 'http://' + iurl.split("/")[2];

    //content.empty();

    $.ajax({
        type: "POST",
        url: iurl + "/feed/like.php",
        data: "Action=GET_POST_ACTIONS_INFO",
        dataType: 'html',
        beforeSend: function() {
            
            loading_display.appendTo(content);

        }
    })
    .done(function(msg) {
        
        if(msg !== '') {

            content.empty();

            $(msg).appendTo(content);

        }

    })
    .fail(function (jqXHR, textStatus, msg) {
        console.error("Request failed: " + textStatus);
    });

}
*/