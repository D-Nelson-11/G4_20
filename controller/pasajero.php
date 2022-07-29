<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/pasajero.php");
    
    $pasajeros = new Pasajeros();
    
    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){

        case "GetPasajeros":
            $datos=$pasajeros->get_pasajeros();
            echo json_encode($datos);
        break;
        
        case "GetPasajero":
            $datos=$pasajeros->get_pasajero($body["CodigoPasajero"]);
            echo json_encode($datos);
        break;   
        
        case "InsertPasajero":
            $datos=$pasajeros->insert_pasajero($body["CodigoPasajero"],$body["Nombres"],$body["Apellidos"],$body["Fecha_Registro"],$body["Nacionalidad"],$body["Numero_Telefonico"],$body["Email"]);
            echo json_encode("Pasajero Agregado Correctamente");
        break;

        case "UpdatePasajero":
            $datos=$pasajeros->update_pasajero($body["CodigoPasajero"],$body["Nombres"],$body["Apellidos"],$body["Fecha_Registro"],$body["Nacionalidad"],$body["Numero_Telefonico"],$body["Email"]);
            echo json_encode("Pasajero Actualizado Correctamente");         
        break;

        case "DeletePasajero":
            $datos=$pasajeros->delete_pasajero($body["CodigoPasajero"]);
            echo json_encode("Pasajero Eliminado Correctamente");      
        break;

        
    }


?>