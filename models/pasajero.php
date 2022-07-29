<?php
 class Pasajeros extends Conectar{

    public function get_pasajeros(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM PASAJERO ";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_pasajero($CodigoPasajero){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM pasajero WHERE CodigoPasajero = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $CodigoPasajero);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_pasajero($CodigoPasajero, $Nombres, $Apellidos, $Fecha_Registro, $Nacionalidad, $Numero_Telefonico, $Email){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO pasajero(CodigoPasajero, Nombres, Apellidos, Fecha_Registro, Nacionalidad, Numero_Telefonico, Email)
        VALUES (?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $CodigoPasajero);
        $sql->bindValue(2, $Nombres);
        $sql->bindValue(3, $Apellidos);
        $sql->bindValue(4, $Fecha_Registro);
        $sql->bindValue(5, $Nacionalidad);
        $sql->bindValue(6, $Numero_Telefonico);
        $sql->bindValue(7, $Email);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function update_pasajero($CodigoPasajero, $Nombres, $Apellidos, $Fecha_Registro, $Nacionalidad, $Numero_Telefonico, $Email){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE pasajero SET Nombres= ?, Apellidos= ?, Fecha_Registro= ?, Nacionalidad= ?, Numero_Telefonico= ?, Email= ? WHERE CodigoPasajero= ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(7, $CodigoPasajero);
        $sql->bindValue(1, $Nombres);
        $sql->bindValue(2, $Apellidos);
        $sql->bindValue(3, $Fecha_Registro);
        $sql->bindValue(4, $Nacionalidad);
        $sql->bindValue(5, $Numero_Telefonico);
        $sql->bindValue(6, $Email);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
    }
     
    public function delete_pasajero($CodigoPasajero){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" DELETE FROM pasajero WHERE CodigoPasajero= ? ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $CodigoPasajero);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); 
    }
}
?>