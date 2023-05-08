function avaliar() {
    // recupera as respostas do questionário
    const form = document.getElementById("questionario")
    const opt = form.querySelectorAll("option")
  
    
    let aguia = 0
    let lobo = 0
    let gato = 0
    let tubarao = 0
    
    
    
    // avalia as respostas e exibe o resultado
    const resultado = document.getElementById("resultado");
    let i = 0
    if (opt[i].selected && opt[i].value === "") {
        alert("Responda as questões")
        return false
    }
    for (i = 0; i < opt.length; i++) {
       
        if (opt[i].selected && opt[i].value === "i") {
            aguia++;
        }
        if (opt[i].selected && opt[i].value === "c") {
            gato++;
        }
        if (opt[i].selected && opt[i].value === "a") {
            tubarao++;
        }
        if (opt[i].selected && opt[i].value === "o") {
            lobo++;
        }
               
    }
    
    
            resultado.innerHTML = "<h3>Resultado</h3> <br> Águia: " +aguia*4+ "%" +"<br>Tubarão: " +tubarao*4+"% " + "<br>Gato: " +gato*4 +"%"+ "<br>Lobo: " +lobo*4 +"%" + '<br><img src="Imagem1.png" alt="resultados perfil comportamental">'
            
            
         
            

}

