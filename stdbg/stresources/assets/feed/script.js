const POST_VISIBILITY_PUBLIC    = 0;
const POST_VISIBILITY_ROOM      = 1;
const POST_VISIBILITY_PRIVATE   = 2;

$('input')

$('#new-post-input').each(function () {
    this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
}).on('input', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

$(function(){
    
        var content = $('.pictures-content');
    
        $('.drag-object-content').click(function(){
           // $(this).parent().find('input').click();
           $('#upload-picture-data-input').click();
        });
    
        // Initialize the jQuery File Upload plugin
        $('#upload').fileupload({
    
            // This element will accept file drag/drop uploading
            dropZone: $('.drag-object-content'),
    
            // This function is called when a file is added to the queue;
            // either via the browse button, or via drag/drop:
            add: function (e, data) {
    
                var tpl = $('<div class="picture-object uploading-progress"><input type="text" value="0" data-width="48" data-height="48"'+
                ' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><button class="remove-picture-button"><i class=" icon-cancel-circled"></i></button><div class="object-content"><img src="#"></div></div>');
    
                if (data.files && data.files[0]) {
                    var reader = new FileReader();
                
                    reader.onload = function(e) {

                      tpl.find('img').attr('src', e.target.result);

                    }
                
                    reader.readAsDataURL(data.files[0]);
                  }

                  var generated_id = Id();

                  tpl.find('.picture-object').attr('id', generated_id);
                  tpl.find('.remove-picture-button').attr('remove', generated_id);


                // Add the HTML to the UL element
                data.context = tpl.appendTo(content);
    
                // Listen for clicks on the cancel icon
                tpl.find('.remove-picture-button').click(function(){
    
                    if(tpl.hasClass('uploading-progress')){
                        jqXHR.abort();
                    }
    
                    tpl.fadeOut(function(){
                        tpl.remove();
                    });
    
                });
    
                // Automatically upload the file once it is add

                var jqXHR = data.submit();
            },
    
            progress: function(e, data){
    
                var progress = parseInt(data.loaded / data.total * 100, 10);
                var processing_view = $('<div><div class="content"><div class="processing-dots-panel"><div class="content"><div class="dots-container" id="processing-event-dots-container"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div></div></div></div></div>');

                processing_view.appendTo(content);
    
                if(progress == 100){
                    
                    content.remove(".loading-events-display");

                }
            },
    
            fail:function(e, data){
                // Something has gone wrong!
                data.context.addClass('error');
            }
    
        });
    
    
        // Prevent the default action when a file is dropped on the window
        $(document).on('drop dragover', function (e) {
            e.preventDefault();
        });
    
        // Helper function that formats the file sizes
        function formatFileSize(bytes) {
            if (typeof bytes !== 'number') {
                return '';
            }
    
            if (bytes >= 1000000000) {
                return (bytes / 1000000000).toFixed(2) + ' GB';
            }
    
            if (bytes >= 1000000) {
                return (bytes / 1000000).toFixed(2) + ' MB';
            }
    
            return (bytes / 1000).toFixed(2) + ' KB';
        }
    
    });

function Id() {
    this.pass = "";
    
    this.generate = function(chars) {
        for (var i= 0; i<chars; i++) {
            this.pass += this.getRandomChar();
        }
        return this.pass;
    }
    
    this.getRandomChar = function() {
         /*
        *    matriz contendo em cada linha indices (inicial e final) da tabela ASCII para retornar alguns caracteres.
        *    [48, 57] = numeros;
        *    [64, 90] = "@" mais letras maiusculas;
        *    [97, 122] = letras minusculas;
        */
        var ascii = [[48, 57],[64,90],[97,122]];
        var i = Math.floor(Math.random()*ascii.length);
        return String.fromCharCode(Math.floor(Math.random()*(ascii[i][1]-ascii[i][0]))+ascii[i][0]);
    }
}

$(function(){

    $('.send-post-button').click(function(){
        var post_text_content = $('.input-content > #new-post-input').val();

        if(post_text_content != null) {

            var pictures_arr = get_uploaded_pictures();
            post_text_content = emojione.toShort(post_text_content);

             var visibility = '';

                switch(visibility = $('#post-visibility option:selected').index()) {
                    case POST_VISIBILITY_PUBLIC: 
                            visibility = 'public';
                        break;
                    case POST_VISIBILITY_PRIVATE: 
                            visibility = 'private';
                        break;
                    case POST_VISIBILITY_ROOM: 
                            visibility = 'room';
                        break;
                }

            if(pictures_arr.length > 0) {

                var data = {
                    "gravity": 0,
                    "post-visibility": visibility,
                    "post-user": get_user_logged_id(),
                    "json-type": "simple-post",
                    "hash": "",
                    "post-type": "[TEXT_AND_IMAGE]",
                    "post-text-data-lenght": sizeof(post_text_content),
                    "post-text-data": {
                        "type": "text",
                        "cod": document.characterSet,
                        "content":  post_text_content,
                        "font-size": "normal"
                    },
                    "post-picture-content-arr": {
                        "data": pictures_arr
                    }
                };

                send_ajax(data);

            } else {

                var data = {
                    "gravity": 0,
                    "post-visibility": visibility,
                    "post-user": get_user_logged_id(),
                    "json-type": "simple-post",
                    "hash": "",
                    "post-type": "[TEXT]",
                    "post-text-data-lenght": sizeof(post_text_content),
                    "post-text-data": {
                        "type": "text",
                        "cod": document.characterSet,
                        "content":  post_text_content,
                        "font-size": "normal"
                    }
                };

                send_ajax(data);

            }

        }

     });

     function get_uploaded_pictures() {

        var arr = new Array();

        var content = $('.pictures-content > .picture-object').each(function (index, value) {
            arr[index] = "" + $(this).find('.object-content > img').attr('src') + "";
        });

        return arr;

     }

});

function send_ajax( data ) {

    var iurl = location.href;
    iurl = 'http://' + iurl.split("/")[2];
    var loading_display = $('<div class="processing-dots-panel"><div class="content"><div class="dots-container" id="processing-event-dots-container"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div></div></div>');
    var new_post_content = $('.new-post-content .content');
    var news_feed_post_content = $('.news-feed-contend .feed-post-content');

    var request = $.ajax({
        
            url: iurl + "/feed/register.php",
            type: "POST",
            data: "data=" + JSON.stringify(data),
            dataType: "html",
            beforeSend: function() {

                loading_display.appendTo(new_post_content);
                animateDots();

            }
        });
        
        request.done(function(resposta) {
            
            new_post_content.remove();

            if(resposta === 'SUCCEFULL') {

                var request = $.ajax({
                    
                    url: iurl + "/feed/aj_feed.php",
                    type: "POST",
                    data: "get=GET_EMPTY_LOADING_POST",
                    dataType: "html"
                    });
                    
                    request.done(function(resposta) {
                        
                        if(resposta != 'null') {
            
                            $(resposta).prependTo(news_feed_post_content);
                            var empty_post = $('.post-contend > #000000000000000000');

                            if(empty_post.length) {
                                
                                loading_display.appendTo(empty_post);
                                animateDots();

                            } else {

                            }
                            
                        }
            
                    });
                    
                    request.fail(function(jqXHR, textStatus) {
                        console.log("Request failed: " + textStatus);
                    });
                    
                    request.always(function() {
                                
                    });
            }

        });
        
        request.fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
        
        request.always(function() {
                    
        });
}

function get_user_logged_id() {
    var iurl = location.href;
    iurl = 'http://' + iurl.split("/")[2];
    var resp = '';

    var request = $.ajax({
        
        url: iurl + "/utils/user.php",
        type: "POST",
        data: "get=get_logged_user_id",
        dataType: "text"
        });
        
        request.done(function(resposta) {
            resp = resposta;
        });
        
        request.fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    return resp;
}

function sizeof( object ) {

    var objectList = [];
    var stack = [ object ];
    var bytes = 0;

    while ( stack.length ) {
        var value = stack.pop();

        if ( typeof value === 'boolean' ) {
            bytes += 4;
        }
        else if ( typeof value === 'string' ) {
            bytes += value.length * 2;
        }
        else if ( typeof value === 'number' ) {
            bytes += 8;
        }
        else if
        (
            typeof value === 'object'
            && objectList.indexOf( value ) === -1
        )
        {
            objectList.push( value );

            for( var i in value ) {
                stack.push( value[ i ] );
            }
        }
    }
    return bytes;
}

/**
*
*  Base64 encode / decode
*  http://www.webtoolkit.info/
*
**/
var Base64 = {

// private property
_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

// public method for encoding
encode : function (input) {
    var output = "";
    var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
    var i = 0;

    input = Base64._utf8_encode(input);

    while (i < input.length) {

        chr1 = input.charCodeAt(i++);
        chr2 = input.charCodeAt(i++);
        chr3 = input.charCodeAt(i++);

        enc1 = chr1 >> 2;
        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
        enc4 = chr3 & 63;

        if (isNaN(chr2)) {
            enc3 = enc4 = 64;
        } else if (isNaN(chr3)) {
            enc4 = 64;
        }

        output = output +
        this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
        this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

    }

    return output;
},

// public method for decoding
decode : function (input) {
    var output = "";
    var chr1, chr2, chr3;
    var enc1, enc2, enc3, enc4;
    var i = 0;

    input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

    while (i < input.length) {

        enc1 = this._keyStr.indexOf(input.charAt(i++));
        enc2 = this._keyStr.indexOf(input.charAt(i++));
        enc3 = this._keyStr.indexOf(input.charAt(i++));
        enc4 = this._keyStr.indexOf(input.charAt(i++));

        chr1 = (enc1 << 2) | (enc2 >> 4);
        chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
        chr3 = ((enc3 & 3) << 6) | enc4;

        output = output + String.fromCharCode(chr1);

        if (enc3 != 64) {
            output = output + String.fromCharCode(chr2);
        }
        if (enc4 != 64) {
            output = output + String.fromCharCode(chr3);
        }

    }

    output = Base64._utf8_decode(output);

    return output;

},

// private method for UTF-8 encoding
_utf8_encode : function (string) {
    string = string.replace(/\r\n/g,"\n");
    var utftext = "";

    for (var n = 0; n < string.length; n++) {

        var c = string.charCodeAt(n);

        if (c < 128) {
            utftext += String.fromCharCode(c);
        }
        else if((c > 127) && (c < 2048)) {
            utftext += String.fromCharCode((c >> 6) | 192);
            utftext += String.fromCharCode((c & 63) | 128);
        }
        else {
            utftext += String.fromCharCode((c >> 12) | 224);
            utftext += String.fromCharCode(((c >> 6) & 63) | 128);
            utftext += String.fromCharCode((c & 63) | 128);
        }

    }

    return utftext;
},

// private method for UTF-8 decoding
_utf8_decode : function (utftext) {
    var string = "";
    var i = 0;
    var c = c1 = c2 = 0;

    while ( i < utftext.length ) {

        c = utftext.charCodeAt(i);

        if (c < 128) {
            string += String.fromCharCode(c);
            i++;
        }
        else if((c > 191) && (c < 224)) {
            c2 = utftext.charCodeAt(i+1);
            string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
            i += 2;
        }
        else {
            c2 = utftext.charCodeAt(i+1);
            c3 = utftext.charCodeAt(i+2);
            string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }

    }

    return string;
}

}

function animateDots() {
    
    var dots = document.querySelectorAll('.dot')
    var colors = ['rgba(0, 0, 0, 0.50);', 'rgba(0, 0, 0, 0.50);', 'rgba(0, 0, 0, 0.50);']
    
    for (var i = 0; i < dots.length; i++) {
            dynamics.animate(dots[i], {
            //translateY: -15,
            scale: 1.7,
            backgroundColor: colors[i]
        }, {
            type: dynamics.forceWithGravity,
            bounciness: 800,
            elasticity: 200,
            duration: 2000,
            delay: i * 150
        })
    }
      
        dynamics.setTimeout(animateDots, 2500)
    }