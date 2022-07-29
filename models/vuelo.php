<?php
    class vuelos extends Conectar{

        public function get_vuelos(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql=" SELECT * FROM vuelo ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_vuelo($CodigoVuelo){
            $conectar = parent::conexion();
            parent::set_names();
            $sql=" SELECT * FROM vuelo WHERE CodigoVuelo= ? ";
            $sql=$conectar->prepare($sql);
            $sql-> bindValue(1,$CodigoVuelo);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_vuelo($CodigoVuelo, $CiudadOrigen, $CiudadDestino, $FechaVuelo, $CantidadPasajeros, $TipoAvion, $DistanciaKm){
            $conectar = parent::conexion();
            parent::set_names();
            $sql=" INSERT INTO vuelo (CodigoVuelo,CiudadOrigen,CiudadDestino,FechaVuelo,CantidadPasajeros,TipoAvion,DistanciaKm) 
            VALUES(?,?,?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql-> bindValue(1,$CodigoVuelo);
            $sql-> bindValue(2,$CiudadOrigen);
            $sql-> bindValue(3,$CiudadDestino);
            $sql-> bindValue(4,$FechaVuelo);
            $sql-> bindValue(5,$CantidadPasajeros);
            $sql-> bindValue(6,$TipoAvion);
            $sql-> bindValue(7,$DistanciaKm);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function update_vuelo($CodigoVuelo, $CiudadOrigen, $CiudadDestino, $FechaVuelo, $CantidadPasajeros, $TipoAvion, $DistanciaKm){
            $conectar = parent::conexion();
            parent::set_names();
            $sql=" UPDATE vuelo SET CiudadOrigen= ?,CiudadDestino= ?,FechaVuelo= ?,CantidadPasajeros= ?,TipoAvion= ?,DistanciaKm= ? WHERE CodigoVuelo= ? ";
            $sql=$conectar->prepare($sql);
            $sql-> bindValue(7,$CodigoVuelo);
            $sql-> bindValue(1,$CiudadOrigen);
            $sql-> bindValue(2,$CiudadDestino);
            $sql-> bindValue(3,$FechaVuelo);
            $sql-> bindValue(4,$CantidadPasajeros);
            $sql-> bindValue(5,$TipoAvion);
            $sql-> bindValue(6,$DistanciaKm);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function delete_vuelo($CodigoVuelo){
            $conectar = parent::conexion();
            parent::set_names();
            $sql=" DELETE FROM vuelo WHERE CodigoVuelo= ? ";
            $sql=$conectar->prepare($sql);
            $sql-> bindValue(1,$CodigoVuelo);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }
    }
?>

