<?php
require_once '../modelos/MotoDAO.php';
require_once '../modelos/MotoDTO.php';
require_once '../modelos/conexion.php';

if (isset($_POST['btnRegistrar'])) {
    $moto = new MotoDTO();

    $moto->setModelo($_POST['modelo']);
    $moto->setAño($_POST['año']);
    $moto->setCilindraje($_POST['cilindraje']);
    $moto->setColor($_POST['color']);
    $moto->setNumeroChasis($_POST['numero_chasis']);
    $moto->setPrecio($_POST['precio']);
    $moto->setStock($_POST['stock']);
    $moto->setTipo($_POST['tipo']);
    $moto->setMarcaId((int) $_POST['marca_id']);

    $motoDAO = new MotoDAO();
    $mensaje = $motoDAO->registrarMoto($moto);
    header("Location: ../resources/views/formMotos.php?mensaje=" . urlencode($mensaje));
    exit;
}

if (isset($_POST['btnEditar'])) {
    $moto = new MotoDTO();

    $moto->setId((int) $_POST['id_moto']);
    $moto->setModelo($_POST['modelo']);
    $moto->setAño($_POST['año']);
    $moto->setCilindraje($_POST['cilindraje']);
    $moto->setColor($_POST['color']);
    $moto->setNumeroChasis($_POST['numero_chasis']);
    $moto->setPrecio($_POST['precio']);
    $moto->setStock($_POST['stock']);
    $moto->setTipo($_POST['tipo']);
    $moto->setMarcaId((int) $_POST['marca_id']);

    $motoDAO = new MotoDAO();
    $mensaje = $motoDAO->editarMoto($moto);
    $id_moto = $moto->getId();
    header("Location: ../resources/views/editarMoto.php?id=$id_moto&mensaje=" . urlencode($mensaje));
    exit;
}

if (isset($_POST['btnEliminar'])) {

    if (!isset($_POST['id_moto_eliminar'])) {
        header("Location: ../motos.php?error=id_faltante");
        exit;
    }

    $id = (int) $_POST['id_moto_eliminar'];

    $motoDAO = new MotoDAO();
    $mensaje = $motoDAO->eliminarMoto($id);

    header("Location: ../resources/views/motos.php?id=" . $id . "&mensaje=" . urlencode($mensaje));
    exit;
}
?>