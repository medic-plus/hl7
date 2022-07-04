<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\TipoEstudio;
use Medicplus\HL7\Segments\Catalogos\TipoResultado;

class resultados_estudios_laboratorios {

    private string $descripcion;
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

    public function __construct(string $descripcion, string $identificadorEstudios, string $nombreEstudios, string $identificadorResultados, string $nombreResultados, DateTime $fechaHoraResultado = null, string $valorResultado, string $unidadResultado, string $rangoResultado, TipoEstudio $tipoEstudio = null, TipoResultado $tipoResultado = null) {
        $this->descripcion = $descripcion;
        $this->identificadorEstudios = $identificadorEstudios;
        $this->nombreEstudios = $nombreEstudios;
        $this->identificadorResultados = $identificadorResultados;
        $this->nombreResultados = $nombreResultados;
        $this->fechaHoraResultado = $fechaHoraResultado;
        $this->valorResultado = $valorResultado;
        $this->unidadResultado = $unidadResultado;
        $this->rangoResultado = $rangoResultado;
        $this->tipoEstudio = $tipoEstudio;
        $this->tipoResultado = $tipoResultado;
    }

    public function getDescripcionEstudios() {
        return $this->descripcion;
    }

    public function setDescripcionEstudios(string $descripcion) {
        $this->descripcion = $descripcion;
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

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Descripcion", $this->descripcion);
        $documento->appendChild($segmento);
    }

    public static function resultadosXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Estudios de laboratorios');
        $documentoElement3 = $documento->createElement('text', '');
        $documentoElement4 = $documento->createElement('paragraph', 'Identificacion de la bateria de pruebas o estudios de laboratorio realizados');
        $documentoElement5 = $documento->createElement('tr', '');
        $documentoElement6 = $documento->createElement('th', 'Prueba');
        $documentoElement7 = $documento->createElement('th', 'Fecha de resultado');
        $documentoElement8 = $documento->createElement('th', 'Resultado');
        $documentoElement9 = $documento->createElement('th', 'Rango');
        $documentoElement10 = $documento->createElement('tr', '');
        $documentoElement11 = $documento->createElement('td', 'Nombre de la prueba o analito');
        $documentoElement12 = $documento->createElement('td', 'Fecha y hora del resultado');
        $documentoElement13 = $documento->createElement('td', 'Valor y unidad del resultado');
        $documentoElement14 = $documento->createElement('td', 'Rango de referencia para el resultado de acuerdo al perfil del paciente');
        $documento->appendChild($documentoElement);
        $documento->appendChild($documentoElement1);
        $documento->appendChild($documentoElement2);
        $documento->appendChild($documentoElement3);
        $documento->appendChild($documentoElement4);
        $documento->appendChild($documentoElement5);
        $documento->appendChild($documentoElement6);
        $documento->appendChild($documentoElement7);
        $documento->appendChild($documentoElement8);
        $documento->appendChild($documentoElement9);
        $documento->appendChild($documentoElement10);
        $documento->appendChild($documentoElement11);
        $documento->appendChild($documentoElement12);
        $documento->appendChild($documentoElement13);
        $documento->appendChild($documentoElement14);
    }
}

resultados_estudios_laboratorios::resultadosXML();