//exemplos que tiveram no começo do curso:
console.log("Fui carregado de um arquivo externo");
var titulo = document.querySelector(".titulo"); //se puxou pela class, para que o codigo que nao fique dependente do h1, que algum outro programoador poderia mudar e daria erro aqui
// console.log(titulo); //aparece todo o corpo, com as tags
// console.log(titulo.textContent); //aparece só a mensagem de dentro
titulo.textContent = "Aparecida Nutricionista"; //esta alterando meu titulo 


// let total = document.getElementById("info-total").value //dessa maneira seria com o exemplo1
var pacientes = document.querySelectorAll(".paciente");

for(var i = 0; i < pacientes.length ; i++)
{
    var paciente = pacientes[i];
    var tdPeso = paciente.querySelector(".info-peso");
    var tdAltura = paciente.querySelector(".info-altura");

    var tdImc = paciente.querySelector(".info-imc");

    var peso = tdPeso.textContent;
    var altura = tdAltura.textContent;

    var alturaEhValida = validaAltura(altura); //true ou false
    var pesoEhValido = validaPeso(peso); //true ou false

    if(!pesoEhValido){
        console.log("Peso inválido");
        pesoEhValido = false;
        tdImc.textContent = "Peso Inválido!";
        paciente.classList.add("paciente-invalido");
    }

    if(!alturaEhValida){
        console.log("Altura inválida");
        alturaEhValida = false;
        tdImc.textContent = "Altura inválida!";
        paciente.classList.add("paciente-invalido");
    }

    if(alturaEhValida && pesoEhValido){
        var imc = calculaImc(peso, altura);
        tdImc.textContent = imc;
    }
}

function validaPeso(peso){
    if(peso >= 0 && peso < 1000){
        return true;
    }else{
        return false;
    }
}

function validaAltura(altura){
    if(altura <= 3.00 && altura >= 0){
        return true;
    } else{
        return false;
    }
}

function calculaImc(peso,altura)
{
    let imc = 0;
    imc = peso / (altura * altura);
    return imc.toFixed(2);
}
// titulo.addEventListener("click", mostraMensagem);

// function mostraMensagem(){
//     console.log("Olá eu fui clicado!");
// }
