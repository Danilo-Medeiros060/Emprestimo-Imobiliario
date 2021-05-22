<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Simulação Financeira</title>
    </head>
    <body>
        <form method="POST">
            <h2>Simulação de Financiamento pela Tabela SAC</h2>
            Valor Financiado: <input type="text" name="valor"><br>
            Número de Meses: <input type="number" name="meses" min="0" max="360" step="12"><br>
            Taxa de Juros Mensal: <input type="number" name="taxa" min="0.1" max="20.0" step="0.2">
            <input type="submit" name="enviar" value="Simular">
        </form>
        <?php
            if(isset($_POST['enviar'])){
                $valor_financiado = $_POST['valor'];
                $prazo = $_POST['meses'];
                $juros = $_POST['taxa'];
                
                $amortizacao = $valor_financiado/$prazo;
                $saldo = $valor_financiado;
                echo '<table>',
                    '<tr>',
                    '<td width = "50">'."Mês".'</td>',
                    '<td width = "100">'."Amortização".'</td>',
                    '<td width = "100">'."Parcela".'</td>',
                    '<td width = "100">'."Saldo".'</td>',
                    '</tr>',
                    '</table>';
                $cont = 1;
                do {
                    $juros_mes = $juros*$saldo/100;
                    $parcela = $amortizacao+$juros_mes;
                    $saldo -= $amortizacao;
                    
                    echo '<table>',
                            '<tr>',
                            '<td width = "50">'.$cont.'</td>',
                            '<td width = "100">'. number_format($amortizacao,2,'.','').'</td>',
                            '<td width = "100">'. number_format($parcela,2,'.','').'</td>',
                            '<td width = "100">'. number_format($saldo,2,'.','').'</td>',
                            '</tr>',
                            '</table>';
                    $cont++;
                } while ($cont<=$prazo);
            }
        ?>
    </body>
</html>
