
$("#cep").focusout(function(){
    // console.log(this);

    $.ajax({
        url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
        dataType: 'json',

        success: function(resposta){
            $("#address").val(resposta.logradouro);
            // $("#complemento").val(resposta.complemento);
            // $("#bairro").val(resposta.bairro);
            // $("#cidade").val(resposta.localidade);
            // $("#uf").val(resposta.uf);
            $("#number").val(resposta.complemento).focus();
        }
    });
});
