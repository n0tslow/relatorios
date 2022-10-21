$(document).ready(function(){
 
    $("#btn1").click(function(e){
    
        e.preventDefault();

        var DivTabela = document.getElementById('divTabela');
        var Dados = new Blob(['\ufeff'+ DivTabela.outerHTML], {type:'aplication/vnd.ms-excel'});
        var url = window.URL.createObjectURL(Dados);

        var a = document.createElement('a');

        a.href = url;
        
        a.download = 'Dados.xls'

        a.click();
    
    });    
    });
