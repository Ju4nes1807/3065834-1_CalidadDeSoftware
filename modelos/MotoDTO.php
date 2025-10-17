<?php
class MotoDTO
{
    private $id;
    private $modelo;
    private $año;
    private $cilindraje;
    private $color;
    private $numeroChasis;
    private $precio;
    private $stock;
    private $tipo;
    private $marcaId;

    public function getId()
    {
        return $this->id;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getAño()
    {
        return $this->año;
    }

    public function getCilindraje()
    {
        return $this->cilindraje;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getNumeroChasis()
    {
        return $this->numeroChasis;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getMarcaId()
    {
        return $this->marcaId;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setAño($año)
    {
        $this->año = $año;
    }

    public function setCilindraje($cilindraje)
    {
        $this->cilindraje = $cilindraje;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setNumeroChasis($numeroChasis)
    {
        $this->numeroChasis = $numeroChasis;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setMarcaId($marcaId)
    {
        $this->marcaId = $marcaId;
    }
}
?>