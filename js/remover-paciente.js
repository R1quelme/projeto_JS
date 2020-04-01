var tabela = document.querySelector("table");

tabela.addEventListener("dblclick",function(event){
    let alvoEvento = event.target;
    let paiDoAlvo = alvoEvento.parentNode; //TR = paceinte = remover
    paiDoAlvo.classList.add("fadeOut");

    setTimeout(function(){
        paiDoAlvo.remove(); // event.target.parentNode.remove(); //Esse comando é o mesmo que esse, porem com variaveis para entender melhor
    },500);    
});

// pacientes.forEach(function(paciente){
//     paciente.addEventListener("dblclick", function(){
//         console.log("Fui clicado com um duplo click");
//         this.remove();
//     });
// });