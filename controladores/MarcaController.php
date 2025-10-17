<?php
require_once "../modelos/MarcaDTO.php";
require_once "../modelos/MarcaDAO.php";
require_once "../modelos/conexion.php";

if (isset($_POST['btnRegistrar'])) {
    $nombre = $_POST['nombre_marca'];

    $marcaDTO = new MarcaDTO();
    $marcaDTO->setNombre($nombre);

    $marcaDAO = new MarcaDAO();
    $mensaje = $marcaDAO->registrarMarca($marcaDTO);
    header("Location: ../resources/views/formMarca.php?mensaje=" . urlencode($mensaje));
    exit;
}

if (isset($_POST['btnEditar'])) {
    $id = (int) $_POST['id_marca'];
    $nombre = $_POST['nombre_marca'];

    $marcaDTO = new MarcaDTO();
    $marcaDTO->setId($id);
    $marcaDTO->setNombre($nombre);

    $marcaDAO = new MarcaDAO();
    $mensaje = $marcaDAO->editarMarca($marcaDTO);
    header("Location: ../resources/views/formEditarMarca.php?id=" . $id . "&mensaje=" . urlencode($mensaje));
    exit;
}

if (isset($_POST['btnEliminar'])) {

    if (!isset($_POST['id_marca_eliminar'])) {
        header("Location: ../marcas.php?error=id_faltante");
        exit;
    }

    $id = (int) $_POST['id_marca_eliminar'];

    $marcaDAO = new MarcaDAO();
    $mensaje = $marcaDAO->eliminarMarca($id);

    header("Location: ../resources/views/marcas.php?id=" . $id . "&mensaje=" . urlencode($mensaje));
    exit;
}
?>