function add_user_in_event(e) {

    var iurl = location.href;
    iurl = 'http://' + iurl.split("/")[2];
    
    var request = $.ajax({
        
                    //
                    // A propriedade `url` é local, arquivo, script, alvo de sua requisição.
                    //
                    url: iurl + "/events/ev_user_comp.php",
        
                    //
                    // A propriedade `type` é o verbo HTTP (GET, POST, HEAD, etc...)
                    //
                    type: "POST",
        
                    //
                    // A propriedade `data` são os dados de sua aplicação.
                    //
                    data: "uid=" + $(e).user_id,
        
                    //
                    // A propriedade `dataType` refere-se ao tipo de dado que o servidor deve retornar a requisição.
                    //
                    dataType: "html"
                });
        
                //
                // O método `done()` recebe uma função de callback
                // que será executada caso a requisição tenha sucesso.
                //
                request.done(function(resposta) {
                    console.log(resposta)
                });
        
                //
                // O método `fail()`recebe uma função de callback
                // que será executada caso a requisição falhe.
                //
                request.fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
        
                //
                // O método `always()` recebe uma função de callback
                // que será executada quando a requisição de sucesso estiver completa.
                //
                request.always(function() {
                    
                });

}