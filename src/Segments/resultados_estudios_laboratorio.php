<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use Medicplus\HL7\Catalogos\TipoEstudio;
use Medicplus\HL7\Catalogos\TipoResultado;

class resultados_estudios_laboratorios {

    private string $descripcionEstudios;
    private string $identificadorEstudios;
    private string $nombreEstudios;
    private string $identificadorResultados;
    private string $nombreResultados;
    private ?DateTime $fechaHoraResultado;
    private string $valorResultado;
    private string $unidadResultado;
    private string $rangoResultado;
    private ?TipoEstudio $tipoEstudio;
    private ?TipoResultado $tipoResultado;

    public function getDescripcionEstudios() {
        return $this->descripcionEstudios;
    }

    public function setDescripcionEstudios(string $descripcionEstudios) {
        $this->descripcionEstudios = $descripcionEstudios;
    }

    public function getIdentificadorEstudios() {
        return $this->identificadorEstudios;
    }

    public function setIdentificadorEstudios(string $identificadorEstudios) {
        $this->identificadorEstudios = $identificadorEstudios;
    }

    public function getNombreEstudios() {
        return $this->nombreEstudios;
    }

    public function setNombreEstudios(string $nombreEstudios) {
        $this->nombreEstudios = $nombreEstudios;
    }

    public function getIdentificadorResultados() {
        return $this->identificadorResultados;
    }

    public function setIdentificadorResultados(string $identificadorResultados) {
        $this->identificadorResultados = $identificadorResultados;
    }

    public function getNombreResultados() {
        return $this->nombreResultados;
    }

    public function setNombreResultados(string $nombreResultados) {
        $this->nombreResultados = $nombreResultados;
    }

    public function getFechaHoraResultado() {
        return $this->fechaHoraResultado;
    }

    public function setFechaHoraResultado(DateTime $fechaHoraResultado) {
        $this->fechaHoraResultado = $fechaHoraResultado;
    }

    public function getValorResultado() {
        return $this->valorResultado;
    }

    public function setValorResultado(string $valorResultado) {
        $this->valorResultado = $valorResultado;
    }

    public function getUnidadResultado() {
        return $this->unidadResultado;
    }

    public function setUnidadResultado(string $unidadResultado) {
        $this->unidadResultado = $unidadResultado;
    }

    public function getRangoResultado() {
        return $this->rangoResultado;
    }

    public function setRangoResultado(string $rangoResultado) {
        $this->rangoResultado = $rangoResultado;
    }

    public function getTipoEstudio() {
        return $this->tipoEstudio;
    }

    public function setTipoEstudio(TipoEstudio $tipoEstudio) {
        $this->tipoEstudio = $tipoEstudio;
    }

    public function getTipoResultado() {
        return $this->tipoResultado;
    }

    public function setTipoResultado(TipoResultado $tipoResultado) {
        $this->tipoResultado = $tipoResultado;
    }
}
