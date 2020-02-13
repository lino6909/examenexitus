<?php
//Clase donde se genera el CRUD para hacer todas las funciones de Lista,ver registro, actualizar,eliminar y insertar//
class cliente{

//Variables de acuerdo a la tabla para facilitar el el analisis de informacion//
  public $id;
  public $dni;
  public $Nombre;
  public $Apellido;
  public $Correo;
  public $Telefono;

public function __contruct(){}

//Funcion que nos ayudara hacer la consulta a la tabla y asi poder consultar los registros//
public function Listar(){
  try{
    //conexion de base de datos//
    $db=Database::StartUp();
    $result=array();
    $stm=$db->prepare("SELECT * from cliente");
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_OBJ);
  }
  catch(Exception $e){
    die($e->getMessage());
  }
}

//Funcion que obtendra el ID de cada registro o mostratlo en el formulario para poderlo ver y/o editar//
public function Obtener($id){
  try {
      $db=Database::StartUp();
    $stm=$db->prepare("SELECT * from cliente where id=?");
    $stm->execute(array($id));
    return $stm->fetch(PDO::FETCH_OBJ);
  }

  catch(Exception $e){
    die($e->getMessage());
  }
}

//Funcion que elimnara el resgitro por ID //
public function Eliminar ($id){
  try{
    $db=Database::StartUp();
    $stm=$db->prepare("DELETE FROM cliente WHERE id=?");
    $stm->execute(array($id));
  }
  catch(Execption $e){
    die($e->getMessage());
  }
}

//Funcion que edita el registro seleccionado que se mostrar en el formulario, edita de avuerod al ID seleccionado//
public function Actualizar($data){
  try{
      $db=Database::StartUp();
    $sql="UPDATE cliente SET dni=?,Nombre=?,Apellido=?,Correo=?,Telefono=? WHERE id=?";
    $db->prepare($sql)->execute(array($data->dni,$data->Nombre,$data->Apellido,$data->Correo,$data->Telefono,$data->id));

  }
  catch(Exception $e){
    die($e->getMessage());
  }
}

//Funcion que permitira la insercion de los datos capturados en el formulario//
public function Registrar(cliente $data){
  try{
      $db=Database::StartUp();
    $sql="INSERT INTO cliente (dni,Nombre,Apellido,Correo,Telefono) values (?,?,?,?,?)";
    $db->prepare($sql)->execute(array($data->dni,$data->Nombre,$data->Apellido,$data->Correo,$data->Telefono));
  }catch(Exception $e){
die($e->getMessage());

    }

}

}

?>
