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
        require_once("../models/reserva.php");
        $reserva = new Reserva();

        $body  = json_decode(file_get_contents("php://input"), true);

        switch($_GET["opc"]){
            case "GetReservas":
                $datos=$reserva->get_reservas();
                echo json_encode($datos);
            break;

            case "GetReserva":
                $datos=$reserva->get_reserva($body["idReservacion"]);
                echo json_encode($datos);
            break;

            case "InsertReserva":
                $datos=$reserva->insert_reserva($body["idReservacion"],$body["CodigoVuelo"],$body["CodigoPasajero"],$body["NombrePasajero"], $body["CiudadDestino"], $body["FechaVuelo"],$body["PrecioVuelo"]);
                echo json_encode("Registro de Reservacion Ingresado Corectamente");
            break;
            case "UpdateReserva":
                $datos=$reserva->update_reserva($body["idReservacion"],$body["CodigoVuelo"],$body["CodigoPasajero"],$body["NombrePasajero"], $body["CiudadDestino"], $body["FechaVuelo"],$body["PrecioVuelo"]);
                echo json_encode("Registro de Reservacion Actualizado Corectamente");
            break;
            case "DeleteReserva":
                $datos=$reserva->delete_reserva($body["idReservacion"]);
                echo json_encode("Registro de Reservacion Eliminado Corectamente");
            break;
           


        }
?>