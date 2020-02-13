<?php

//Controlador que hara llamar las funciones de la ruta /model/cliente.php , para poder asi ejecutar lo que se solicito//
require_once ('model/cliente.php');

class clienteController{
  private $model;

//Se llama la clase cliente para que se ejecute en toda la clase clienteController//
  public function __construct(){
    $this->model=new cliente();
  }

//Funcion que nos permitira poner los .php en todas nuetras vistas (paginas)//
  public function Index(){
    require_once "view/header.php";
    require_once "view/cliente/cliente.php";
  }

//funcion que se hara llamar para traer el resgitro seleccionado para ver y/o editar//
  public function Crud(){
    $cliente=new cliente();
    if(isset($_REQUEST['id'])){
      $cliente=$this->model->Obtener($_REQUEST['id']);
    }
    require_once('view/header.php');
    require_once('view/cliente/cliente-editar.php');
  }

  //Funcion para el boton Guardar y asi se ejecuten los cambios hechos en el formulario//
  public function Guardar(){
    $cliente=new cliente();

    $cliente->id=$_REQUEST['id'];
    $cliente->dni=$_REQUEST['dni'];
    $cliente->Nombre=$_REQUEST['Nombre'];
    $cliente->Apellido=$_REQUEST['Apellido'];
    $cliente->Correo=$_REQUEST['Correo'];
    $cliente->Telefono=$_REQUEST['Telefono'];

    $cliente->id > 0
    ?$this->model->Actualizar($cliente)
    :$this->model->Registrar($cliente);
    header('Location:index.php');
  }

//Elimina el registro seleccionado///
  public function Eliminar(){
    $this->model->Eliminar($_REQUEST['id']);
    header('Location: index.php');
  }
}
?>
