var botaoAdicionar = document.querySelector("#buscar-pacientes");

botaoAdicionar.addEventListener("click", function () {
    console.log("Buscando pacientes...");

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://api-pacientes.herokuapp.com/pacientes");
    xhr.addEventListener("load", function() {

    var erroAjax = document.querySelector("#erro-ajax");
        if(xhr.status == 200){
        erroAjax.classList.add("invisivel");
        console.log(xhr.responseText);
        let xhr_array = JSON.parse(xhr.responseText);
        console.log(xhr_array);
        
        for(var i = 0; i< xhr_array.length; i++){
           var pacienteTr = montaTr(xhr_array[i]);
           var tabela = document.querySelector("#tabela-pacientes");
           tabela.appendChild(pacienteTr); 
        }
        }else{
            console.log("xhr.status");
            console.log(xhr.responseText);
        
            erroAjax.classList.remove("invisivel");
        }

    });
    xhr.send();
})