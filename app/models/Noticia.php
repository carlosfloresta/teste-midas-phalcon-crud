<?php

use Phalcon\Mvc\Model;

class Noticia extends Model
{
    private $id;
    private $titulo;
    private $texto;
    private $dataUlt;
    private $dataCad;
    private $categoria;
    private $publicado;
    private $dataP;

    public function initialize()
    {
        $this->setSource("noticia");
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getPublicado()
    {
        return $this->publicado;
    }

    public function setPublicado($publicado)
    {
        $this->publicado = $publicado;

        return $this;
    }

    public function getDataP()
    {
        return $this->dataP;
    }

    public function setDataP($dataP)
    {
        $this->dataP = $dataP;

        return $this;
    }

    public function getDataUlt()
    {
        return $this->dataUlt;
    }

    public function setDataUlt($dataUlt)
    {
        $this->dataUlt = $dataUlt;

        return $this;
    }

    public function getDataCad()
    {
        return $this->dataCad;
    }

    public function setDataCad($dataCad)
    {
        $this->dataCad = $dataCad;

        return $this;
    }
}
