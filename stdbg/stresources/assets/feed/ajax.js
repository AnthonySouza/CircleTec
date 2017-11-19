/*

$(document).on('scroll', function () {
    $.ajax({
        type: "POST",
        url: 'test.php',
        success: function(data) {
            
            

        },
        beforeSend: function() {
            var loading_post_view_message = '<div id="e19djx" class="feed-post-content"><div class="post-content"><div class="post-loading-message"><div class="dots-container" id="dots-container"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div></div></div></div>';
            

            
            $('.news-feed-contend').append(loading_post_view_message);
        },
        complete: function() {
            $('.news-feed-contend').remove('#e19djx');
        }
    });
});

*/

function insert_loading_post_message_in_timeline(id, insert) {

    if(!$('#' + id).lenght) {
        var loading_post_view_message = '<div id="' + id + '" class="feed-post-content"><div class="post-content"><div class="post-loading-message"><div class="dots-container" id="dots-container"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div></div></div></div>';
        $(insert).append(loading_post_view_message);
    }

}

function remove_loading_post_message_in_timeline(id) {
    $('#' + id).remove();
}

$('#teste').click(function () {
    insert_loading_post_message_in_timeline('832hejd', 'news-feed-contend');
    animateDots();
});

