$('#formulario').submit(function(e){
    e.preventDefault();

    var nome = $('#nome').val();
    var valor = $('#valor').val();

    $.ajax({
        url: `http://localhost/api_php/MyApi/api/consorcio/create/${nome}/${valor}`,
        method: "POST",
        data: {nome: nome, valor: valor},
        dataType: "json"
    }).done(function (result){
        $("#nome").val('');
        $("#valor").val('');
        console.log(result)
        getConsorcios()
    })

    
})

function deletar(){
    var id = event.target.id;

    
    $.ajax({
        url: `http://localhost/api_php/MyApi/api/consorcio/delete/${id}`,
        method: "DELETE",
        dataType: "json"
    }).done(function(result){
        getConsorcios();
    })


} 

function getConsorcios(){
    $.ajax({
        url: "http://localhost/api_php/MyApi/api/consorcio/mostrar/",
        method: "GET",
        dataType: "json"
    }).done(function(result){
        console.log(result);

        for(var i = 0; i < result.length; i++){
            
            $('.box_comment').prepend('<div class="b_comm"><h4>' + result[i].pessoa + '</h4><p>' + result[i].valor + '</p> <button onclick="deletar()" class="delete" id="' + result[i].consorcio_id +  '">Delete</button> </div>')
        }
    })
}


getConsorcios();

