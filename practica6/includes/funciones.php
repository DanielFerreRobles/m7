<?php
        

        function generarTablaProductos($productos) {
            echo '<table class="m-5 table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Disponibilidad</th>
                    <th>Categoria</th>

                </tr>
            </thead>
            <tbody>';
            foreach ($productos as $producto) {
                echo '<tr>
                        <td>' . ucfirst($producto['nombre']) . '</td>
                        <td>' . number_format($producto['precio']) . '</td>',
                        $producto['disponible'] ? '<td>EN STOCK</td>' : '<td class="bg-danger">AGOTADO</td>',
                        '<td>' . $producto['categoria'] . '</td>',


                      '</tr>';
            }   
            echo '</tbody>
                </table>';
        }
        


        function muestraInfoContacto($nombre, $telefono, $foto){
            echo '

                <div class="card my-5" style="20%">
                <img src="' . $foto . '" alt="img" width="100%" height="600">
                <div class="card-body bg-dark text-white ">
                <h5 class="card-title">' . $nombre . '</h5>
                <p>Tu telefono es' . $telefono . '</p>
                </div>
                </div>';                
                            
        }       

?>