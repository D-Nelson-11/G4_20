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
    require_once("../models/vuelo.php");
    $vuelos= new vuelos();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["opc"]) {

        case "GetVuelos":
            $datos=$vuelos->get_vuelos();
            echo json_encode($datos);
        break;

        case "GetVuelo":
            $datos=$vuelos->get_vuelo($body["CodigoVuelo"]);
            echo json_encode($datos);
        break;
        
        case "InsertVuelo":
            $datos=$vuelos->insert_vuelo($body["CodigoVuelo"],$body["CiudadOrigen"],$body["CiudadDestino"],$body["FechaVuelo"],
                                         $body["CantidadPasajeros"],$body["TipoAvion"],$body["DistanciaKm"]);

            echo json_encode("Registros de Vuelo Ingresados Correctamente");
        break;

        case "UpdateVuelo":
            $datos=$vuelos->update_vuelo($body["CodigoVuelo"],$body["CiudadOrigen"],$body["CiudadDestino"],$body["FechaVuelo"],
                                         $body["CantidadPasajeros"],$body["TipoAvion"],$body["DistanciaKm"]);
                                         
            echo json_encode("¡Registro Actualizado Correctamente!");
        break;

        
        case "DeleteVuelo":
            $datos=$vuelos->delete_vuelo($body["CodigoVuelo"]);
                                         
            echo json_encode("¡Registro Eliminado Correctamente!");
        break;
        
        default:
            # code...
            break;
    }
?>