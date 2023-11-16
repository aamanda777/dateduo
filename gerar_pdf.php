<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Recuperar os dados do último sorteio (você já tem isso no seu código)
// ...

// Função para gerar o conteúdo HTML
function gerarConteudoHTML($entradaSorteio, $pratoPrincipalSorteio, $sobremesaSorteio, $bebidaSorteio)
{
    return "
        <h1 class='text-center mb-4'>Resultado do Sorteio</h1>
        <div class='row'>
            <div class='col-md-6 mb-4'>
                <h3 class='text-center mb-3'>Entrada:</h3>
                <p class='lead text-center'>$entradaSorteio</p>
            </div>
            <div class='col-md-6 mb-4'>
                <h3 class='text-center mb-3'>Prato Principal:</h3>
                <p class='lead text-center'>$pratoPrincipalSorteio</p>
            </div>
            <div class='col-md-6 mb-4'>
                <h3 class='text-center mb-3'>Sobremesa:</h3>
                <p class='lead text-center'>$sobremesaSorteio</p>
            </div>
            <div class='col-md-6 mb-4'>
                <h3 class='text-center mb-3'>Bebida:</h3>
                <p class='lead text-center'>$bebidaSorteio</p>
            </div>
        </div>
    ";
}

// Configurar Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);

// Carregar conteúdo HTML
$html = gerarConteudoHTML($entradaSorteio, $pratoPrincipalSorteio, $sobremesaSorteio, $bebidaSorteio);
$dompdf->loadHtml($html);

// Renderizar PDF
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Saída do PDF para o navegador
$dompdf->stream('cardapio.pdf', array('Attachment' => 0));
