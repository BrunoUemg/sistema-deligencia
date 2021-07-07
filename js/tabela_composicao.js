function cadPessoa(Nome, renda, parentesco){

    var tb = document.getElementById("basic-datatables");
    var qtdLinha = tb.rows.length;
    var linha = tb.insertInput(qtdLinha);
    
    var cellCodigo = linha.insertCell(0);
    var cellNome = linha.insertCell(1);
    var cellrenda = linha.insertCell(2);
    var cellparentescp = linha.insertCell(3);

    cellCodigo.innerHTML = qtdLinha;
    cellNome.innerHTML = Nome;
    cellrenda.innerHTML = renda;
    cellparentescp.innerHTML = parentesco;


}