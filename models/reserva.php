<?php
    class Reserva extends Conectar {

        public function get_reservas(){
            $conectar= parent::conexion();
            parent:: set_names();
            $sql="SELECT * FROM reserva "; 
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


        }
        public function get_reserva($idReservacion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM reserva WHERE IDRESERVACION = ?"; 
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idReservacion);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            

        }
        
        public function insert_reserva ($idReservacion, $CodigoVuelo, $CodigoPasajero, $NombrePasajero, $CiudadDestino, $FechaVuelo, $PrecioVuelo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO reserva(idReservacion,CodigoVuelo,CodigoPasajero,NombrePasajero,CiudadDestino,FechaVuelo,PrecioVuelo)
            VALUE (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idReservacion);
            $sql->bindValue(2, $CodigoVuelo);
            $sql->bindValue(3, $CodigoPasajero);
            $sql->bindValue(4, $NombrePasajero);
            $sql->bindValue(5, $CiudadDestino);
            $sql->bindValue(6, $FechaVuelo);
            $sql->bindValue(7, $PrecioVuelo);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function update_reserva ($idReservacion, $CodigoVuelo, $CodigoPasajero, $NombrePasajero, $CiudadDestino, $FechaVuelo, $PrecioVuelo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE reserva SET CodigoVuelo= ?,CodigoPasajero= ?,NombrePasajero= ?,CiudadDestino= ?,FechaVuelo= ?,PrecioVuelo= ? WHERE idReservacion= ? ";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(7, $idReservacion);
            $sql->bindValue(1, $CodigoVuelo);
            $sql->bindValue(2, $CodigoPasajero);
            $sql->bindValue(3, $NombrePasajero);
            $sql->bindValue(4, $CiudadDestino);
            $sql->bindValue(5, $FechaVuelo);
            $sql->bindValue(6, $PrecioVuelo);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function delete_reserva($idReservacion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM reserva WHERE idReservacion = ?"; 
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idReservacion);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            

        }

    
    }
?>