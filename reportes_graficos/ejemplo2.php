<?php

				require_once("conexion/conexion.php");

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {

    $('#container').highcharts({
        chart: {
            type: 'pyramid',
            marginRight: 200
        },
        title: {
            text: 'Sales pyramid',
            x: -50
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b> ({point.y:,.0f})',
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                    softConnector: true
                }
            }
        },
        legend: {
            enabled: false
        },
        series: [{
            name: 'Unique users',
            data: [
			
			<?php
			$sql=mysql_query("select * from deudas order by monto_deudor desc");
			while($res=mysql_fetch_array($sql)){
			?>			
			
['<?php echo $res['nom_deudor'].' '.$res['ape_deudor'] ?>', <?php echo $res['monto_deudor'] ?> ],

			<?php
			}
			?>

            ]
        }]
    });
});
		</script>
	</head>
	<body>
<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/funnel.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 410px; max-width: 600px; height: 400px; margin: 0 auto"></div>
<br><br>
<center><a href="ejemplo3.php">Ver ejemplo 3</a></center>
	</body>
</html>
