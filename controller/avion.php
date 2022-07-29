<?php
if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
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
require_once("../models/avion.php");
$aviones = new Aviones();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["opc"]){
    case "GetAviones":
        $datos=$aviones->get_aviones();
        echo json_encode($datos);
    break;

    case "GetAvion":
        $datos=$aviones->get_avion($body["NumeroAvion"]);
        echo json_encode($datos);
    break;

    case "InsertAvion":
        $datos=$aviones->insert_avion($body["NumeroAvion"],$body["TipoAvion"],$body["HorasVuelo"],$body["CapacidadPasajeros"],$body["FechaPrimerVuelo"],$body["PaisConstruccion"],$body["CantidadVuelos"]);
        echo json_encode("¡Avion Agregado!");
    break;
    
    case "DeleteAvion":
        $datos=$aviones->delete_avion($body["NumeroAvion"]);
        echo json_encode("¡Avion Eliminado!");
    break;

    case "UpdateAvion":
        $datos=$aviones->update_Avion($body["NumeroAvion"],$body["TipoAvion"],$body["HorasVuelo"],$body["CapacidadPasajeros"],$body["FechaPrimerVuelo"],$body["PaisConstruccion"],$body["CantidadVuelos"]);
        echo json_encode("¡Avion Actualizado!");
    break;
}

?>