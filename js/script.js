var form = $("#cad_projeto");
form.validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        confirm: {
            equalTo: "#password"
        }
    }
});
form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    stepsOrientation: "vertical",
    onStepChanging: function (event, currentIndex, newIndex)
    {
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {
        form.submit();
        alert("Cadastro Enviado!");
    }
});

$(function(){
            $('#areas_projeto_id').change(function(){
                if( $(this).val() ) {
                    $('#id_sub_categoria').hide();
                    $('.carregando').show();
                    $.getJSON('subcategoria.php?search=',{areas_projeto_id: $(this).val(), ajax: 'true'}, function(j){
                        var options = '<option value="">Escolha Subárea</option>'; 
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].nome_subarea + '</option>';
                        }   
                        $('#id_sub_categoria').html(options).show();
                        $('.carregando').hide();
                    });
                } else {
                    $('#id_sub_categoria').html('<option value="">– Escolha Subárea –</option>');
                }
            });
        });

function duplicarCampos(){

    var clone = document.getElementById('coautor').cloneNode(true);
    var destino = document.getElementById('coautor2');
  var t = document.querySelectorAll(".coautor_cloned").length;
  clone.querySelector("label").innerHTML = 'Nome Coautor: '+ parseInt(t+1);
    destino.appendChild (clone);
    var camposClonados = clone.getElementsByTagName('input');
    for(i=0; i<camposClonados.length;i++){
        if(i==1)
        camposClonados[i].value = parseInt(t+1);
    else
        camposClonados[i].value = '';
    }
  t++;
}
function removerCampos(id){
  var t = document.querySelectorAll(".coautor_cloned").length;
    var node1 = document.getElementById('coautor2');
    node1.removeChild(node1.lastChild);
   t--;
 node1.lastChild.querySelector("label").innerHTML = 'Nome Coautor: '+ parseInt(t);

}