<?php 
ob_start();
?>

<h1>Relatório</h1>
<table border="1" width="100%">
	<tr>
		<th>Nome do Cliente</th>
		<th>Valor do pedido</th>
		<th>Data de entrega</th>		
	</tr>
	<tr>
		<th>Leonardo</th>
		<th>R$1250,00</th>
		<th>06/02/2019</th>		
	</tr>
	<tr>
		<th>João</th>
		<th>R$1500,00</th>
		<th>06/02/2019</th>		
	</tr>
</table>

<?php 
$html = ob_get_clean();

ob_end_clean();


require_once __DIR__ . '/vendor/autoload.php';

$arquivo = md5(time().rand(0,9999)).'.pdf'; //gera automaticamente o nome de um arquivo utilizando criptografia MD5

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output($arquivo, 'D');


?>