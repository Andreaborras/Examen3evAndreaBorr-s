<?php
class Lamp  {
    private $id;
    private $nombre;
    private $encendida;
    private $modelo;
    private $vatios;
    private $zona;

    public function __construct($id, $nombre, $encendida, $modelo, $vatios, $zona){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->encendida=$encendida;
        $this->modelo=$modelo;
        $this->vatios=$vatios;
        $this->zona=$zona;


    }
    
        
    
   
    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    
    public function getNombre()
    {
        return $this->nombre;
    }

    
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    
    public function getEncendida()
    {
        return $this->encendida;
    }

   
    public function setEncendida($encendida): self
    {
        $this->encendida = $encendida;

        return $this;
    }

   
    public function getModelo()
    {
        return $this->modelo;
    }

   
    public function setModelo($modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    
    public function getVatios()
    {
        return $this->vatios;
    }

    
    public function setVatios($vatios): self
    {
        $this->vatios = $vatios;

        return $this;
    }

   
    public function getZona()
    {
        return $this->zona;
    }

    
    public function setZona($zona): self
    {
        $this->zona = $zona;

        return $this;
    }
}