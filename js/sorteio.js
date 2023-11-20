document.addEventListener("DOMContentLoaded", function () {
    // ...

    // Bolinha com ícone do WhatsApp
    var compartilharWhatsapp = document.getElementById("compartilharWhatsapp");
    compartilharWhatsapp.addEventListener("click", function (event) {
        event.preventDefault();

        // Montar a mensagem do WhatsApp
        var mensagemWhatsapp = "Hoje o cardápio de " + "<?php echo $_SESSION['nome_membro_1']; ?>" + " e " + "<?php echo $_SESSION['nome_membro_2']; ?>" + " será:%0A";
        mensagemWhatsapp += "Entrada: " + "<?php echo $entradaSorteio; ?>" + "%0A";
        mensagemWhatsapp += "Prato principal: " + "<?php echo $pratoPrincipalSorteio; ?>" + "%0A";
        mensagemWhatsapp += "Sobremesa: " + "<?php echo $sobremesaSorteio; ?>" + "%0A";
        mensagemWhatsapp += "Bebida: " + "<?php echo $bebidaSorteio; ?>" + "%0A";
        mensagemWhatsapp += "%0ASorteio feito com: Dateduo%0ABom apetite! ❤️";

        // Criar o link do WhatsApp
        var linkWhatsapp = "https://api.whatsapp.com/send?text=" + mensagemWhatsapp;

        // Abrir a janela de compartilhamento do WhatsApp
        window.open(linkWhatsapp, "_blank");