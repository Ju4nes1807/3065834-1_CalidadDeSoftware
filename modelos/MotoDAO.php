<?php
class MotoDAO
{
    const ERROR = "Error: ";
    public function registrarMoto(MotoDTO $motoDTO)
    {
        $conexion = Conexion::conectar();
        $mensaje = "";

        $sql = "insert into motos (modelo, año, cilindraje, color, numero_chasis, precio, stock, tipo, marca_id) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $modelo = $motoDTO->getModelo();
            $año = $motoDTO->getAño();
            $cilindraje = $motoDTO->getCilindraje();
            $color = $motoDTO->getColor();
            $numeroChasis = $motoDTO->getNumeroChasis();
            $precio = $motoDTO->getPrecio();
            $stock = $motoDTO->getStock();
            $tipo = $motoDTO->getTipo();
            $marcaId = $motoDTO->getMarcaId();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(1, $modelo);
            $stmt->bindParam(2, $año);
            $stmt->bindParam(3, $cilindraje);
            $stmt->bindParam(4, $color);
            $stmt->bindParam(5, $numeroChasis);
            $stmt->bindParam(6, $precio);
            $stmt->bindParam(7, $stock);
            $stmt->bindParam(8, $tipo);
            $stmt->bindParam(9, $marcaId, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $mensaje = "Moto registrada correctamente";
            } else {
                $mensaje = "Error al registrar la moto";
            }
        } catch (PDOException $e) {
            $mensaje = self::ERROR . $e->getMessage();
        } finally {
            $conexion = null;
        }
        return $mensaje;
    }

    public function consultarMotos()
    {
        $conexion = Conexion::conectar();

        $sql = "SELECT m.*, ma.nombre AS marca_nombre FROM motos m JOIN marca ma ON m.marca_id = ma.id";

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

    public function editarMoto(MotoDTO $motoDTO)
    {
        $conexion = Conexion::conectar();
        $mensaje = "";
        $sql = "UPDATE motos SET modelo=?, año=?, cilindraje=?, color=?, numero_chasis=?, precio=?, stock=?, tipo=?, marca_id=? WHERE id=?";

        try {
            $id = $motoDTO->getId();
            $modelo = $motoDTO->getModelo();
            $año = $motoDTO->getAño();
            $cilindraje = $motoDTO->getCilindraje();
            $color = $motoDTO->getColor();
            $numeroChasis = $motoDTO->getNumeroChasis();
            $precio = $motoDTO->getPrecio();
            $stock = $motoDTO->getStock();
            $tipo = $motoDTO->getTipo();
            $marcaId = $motoDTO->getMarcaId();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(1, $modelo);
            $stmt->bindParam(2, $año);
            $stmt->bindParam(3, $cilindraje);
            $stmt->bindParam(4, $color);
            $stmt->bindParam(5, $numeroChasis);
            $stmt->bindParam(6, $precio);
            $stmt->bindParam(7, $stock);
            $stmt->bindParam(8, $tipo);
            $stmt->bindParam(9, $marcaId, PDO::PARAM_INT);
            $stmt->bindParam(10, $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $mensaje = "Moto editada correctamente";
                } else {
                    $mensaje = "No se realizaron cambios en la moto";
                }
            } else {
                $mensaje = "Error al editar la moto";
            }
        } catch (PDOException $e) {
            $mensaje = self::ERROR . $e->getMessage();
        } finally {
            $conexion = null;
        }
        return $mensaje;
    }

    public function buscarMoto($id)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM motos WHERE id = ?";
        try {
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        } finally {
            $conexion = null;
        }
    }

    public function eliminarMoto($id)
    {
        $conexion = Conexion::conectar();
        $mensaje = "";
        $sql = "DELETE FROM motos WHERE id = ?";

        try {
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $mensaje = "Moto eliminada correctamente";
                } else {
                    $mensaje = "No se encontró la moto para eliminar";
                }
            } else {
                $mensaje = "Error al eliminar la moto";
            }
        } catch (PDOException $e) {
            $mensaje = self::ERROR . $e->getMessage();
        } finally {
            $conexion = null;
        }
        return $mensaje;
    }
}
?>