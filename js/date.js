document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("btnSubmit").addEventListener("click", function (event) {
        event.preventDefault(); // Impede o envio do formulário tradicional

        console.log("Botão clicado!");
        var formulario = document.getElementById("comidaBebidaForm");
        console.log("Formulário:", formulario);

        if (validarFormulario(formulario)) {
            console.log("Formulário válido.");

            // Submeter o formulário via AJAX
            $.ajax({
                type: "POST",
                url: "processa_date.php",
                data: $(formulario).serialize(),
                success: function (data) {
                    if (data === "success") {
                        // Redirecionar para a página de sorteio.php
                        window.location.href = "sorteio.php";
                    } else {
                        console.log("Erro ao processar o formulário");
                        alert("Erro ao processar o formulário. Tente novamente.");
                    }
                },
                error: function (error) {
                    console.error("Erro ao processar o formulário:", error);
                    alert("Erro ao processar o formulário. Tente novamente.");
                }
            });
        } else {
            console.log("Preencha todos os campos no formulário.");
            alert("Por favor, preencha todos os campos no formulário.");
        }
    });

    function validarFormulario(formulario) {
        var campos = formulario.querySelectorAll("input");
        for (var i = 0; i < campos.length; i++) {
            if (campos[i].value.trim() === "") {
                return false;
            }
        }
        return true;
    }
});
