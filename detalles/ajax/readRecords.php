<?php
	// include Database connection file
	include("db_connection.php");

	// Design initial table header
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>ID</th>
							<th>IDENTIFICACION</th>
							<th>NOMBRE COMPLETO</th>
							<th>INGRESO</th>
							<th>SERVICIO</th>
							<th>Valoracion inicial</th>
							<th>Evolucion</th>
							<th>Traslados</th>
						</tr>';

	$query = "SELECT a.*,b.* FROM perfil a left join user b on a.id_perfil=b.id_perfil";

	if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows
    if(mysql_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysql_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['id_user'].'</td>
				<td>'.$row['nombre'].'</td>
				<td>'.$row['cuenta'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['nombre_perfil'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>
