<?php
class MarcaDAO
{
    public function registrarMarca(MarcaDTO $marcaDTO)
    {
        $conexion = Conexion::conectar();
        $mensaje = "";

        $sql = "insert into marca (nombre) values(?)";

        try {
            $nombre = $marcaDTO->getNombre();
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $nombre);

            if ($stmt->execute()) {
                $mensaje = "Marca registrada correctamente";
            } else {
                $mensaje = "Error al registrar la marca";
            }
        } catch (PDOException $e) {
            $mensaje = "Error: " . $e->getMessage();
        } finally {
            $conexion = null;
        }
        return $mensaje;
    }

    public function consultarMarcas()
    {
        $conexion = Conexion::conectar();

        $sql = "select * from marca";

        try {
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        } finally {
            $conexion = null;
        }
    }

    public function editarMarca(MarcaDTO $marcaDTO)
    {
        $conexion = Conexion::conectar();
        $mensaje = "";
        $sql = "update marca set nombre=? where id=?";

        try {
            $id = $marcaDTO->getId();
            $nombre = $marcaDTO->getNombre();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $id);

            if ($stmt->execute()) {
                $mensaje = "Marca actualizada correctamente.";
            } else {
                $mensaje = "Error al actualizar la marca.";
            }
        } catch (PDOException $e) {
            $mensaje = "Error: " . $e->getMessage();
        } finally {
            $conexion = null;
        }
        return $mensaje;
    }

    public function eliminarMarca($id)
    {
        $conexion = Conexion::conectar();
        $mensaje = "";
        $sql = "delete from marca where id=?";

        try {
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $id);

            if ($stmt->execute()) {
                $mensaje = "Marca eliminada correctamente.";
            } else {
                $mensaje = "Error al eliminar la marca.";
            }
        } catch (PDOException $e) {
            $mensaje = "Error: " . $e->getMessage();
        } finally {
            $conexion = null;
        }

        return $mensaje;
    }

    public function buscarMarca($id)
    {
        $conexion = Conexion::conectar();
        $sql = "select * from marca where id=?";
        try {
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        } finally {
            $conexion = null;
        }
    }

    public function listarTodas()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT id, nombre FROM marca ORDER BY nombre ASC";

        try {
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        } finally {
            $conexion = null;
        }
    }
}
?>