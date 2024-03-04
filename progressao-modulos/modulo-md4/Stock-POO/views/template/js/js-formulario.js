$(document).ready(function() {

    //-- Click on terms and conditions
    $(".term").click(function() {
        var ctrl = $(this).find("i");
        if (ctrl.hasClass("fa-check-square-o")) {
            ctrl.attr("class", "fa fa-square-o");
        } else {
            ctrl.attr("class", "fa fa-check-square-o");
        }
    })

    $("input").blur(function() {
        if ($(this).val() != "") {
            $(this).parent().css({
                "color": "black"
            });
            $(this).css({
                "border-bottom": "1px solid silver",
                "color": "gray"
            });
        }
    })

    //--- CONTINUE ---
    $("form > p > a").click(function() {
        //-- Detect terms and conditions
        var term = false;
        if ($(".term > i").hasClass('fa-check-square-o')) {
            term = true;
        }

        //-- only example
        var user = {};
        user.name = $("input[name='name']").val();
        user.id = $("input[name='id']").val();
        user.phone = $("input[name='phone']").val();
        user.email = $("input[name='email']").val();
        user.term = term;

        //-- Validator
        $("input").each(function(e, valor) {
            var error = false;
            if ($(this).val() == "") {
                error = true;
            }
            if (error === true) {
                //-- with errors
                $(this).parent().css({
                    "color": "red"
                });
                $(this).css({
                    "border-bottom": "1px solid red"
                });
            } else {
                //-- without errors
                $(this).parent().css({
                    "color": "black"
                });
                $(this).css({
                    "border-bottom": "1px solid silver",
                    "color": "gray"
                });
            }
        })

        //-- msg example
        $("body").append(JSON.stringify(user) + "<br>");
    })
})


function validarSenhas(){
    
    var senha = document.querySelector('#senha').value
    var confirmarSenha = document.getElementById("confirmarSenha").value

    
    if (senha.length > 0 && confirmarSenha.length > 0){

        if (senha != confirmarSenha){
            
            window.alert("[ ATENÇÃO ] - As senha não conferem, tente novamente!")
            document.querySelector('#senha').value = ""
            document.getElementById("confirmarSenha").value = ""
        }
    }
}

function validarEmail(){

    var email = document.getElementById("email").value
    var confirmarEmail = document.getElementById("confirmarEmail").value

    if ( email.length > 0 && confirmarEmail.length > 0 ){
        if ( email != confirmarEmail ){
            window.alert("[ ATENÇÃO ] - Os Emails não conferem, tente novamente!")
            document.getElementById('email').value = ""
            document.getElementById("confirmarEmail").value = ""
        }
    }
}
