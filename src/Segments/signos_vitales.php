<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\SignoVital;

class signos_vitales {
    private string $descripcion;
    private string $nombre;
    private ?DateTime $fechaSignoVital;
    private string $resultadoMedicion;
    private ?SignoVital $signoVital;

    public function __construct(string $descripcion, string $nombre, DateTime $fechaSignoVital = null, string $resultadoMedicion, SignoVital $signoVital = null) {
        $this->descripcion = $descripcion;
        $this->nombre = $nombre;
        $this->fechaSignoVital = $fechaSignoVital;
        $this->resultadoMedicion = $resultadoMedicion;
        $this->signoVital = $signoVital;
    }

    public function getDescripcionSignosVitales() {
        return $this->descripcion;
    }

    public function setDescripcionSignosVitales(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getNombreSignoVital() {
        return $this->nombre;
    }

    public function setNombreSignoVital(string $nombre) {
        $this->nombre = $nombre;
    }

    public function getFechaSignoVital() {
        return $this->fechaSignoVital;
    }

    public function setFechaSignoVital(DateTime $fechaSignoVital) {
        $this->fechaSignoVital = $fechaSignoVital;
    }

    public function getResultadoMedicionSignoVital() {
        return $this->resultadoMedicion;
    }

    public function setResultadoMedicionSignoVital(string $resultadoMedicion) {
        $this->resultadoMedicion = $resultadoMedicion;
    }

    public function getSignoVital() {
        return $this->signoVital;
    }

    public function setSignoVital(SignoVital $signoVital) {
        $this->signoVital = $signoVital;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Descripcion", $this->descripcion);
        $documento->appendChild($segmento);
    }

    public static function signosXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Signos Vitales');
        $documentoElement3 = $documento->createElement('text', '');
        $documentoElement4 = $documento->createElement('thead', '');
        $documentoElement5 = $documento->createElement('tr', '');
        $documentoElement6 = $documento->createElement('th', 'Fecha');
        $documentoElement7 = $documento->createElement('th', 'Signo');
        $documentoElement8 = $documento->createElement('th', 'Valor');
        $documentoElement9 = $documento->createElement('th', 'Observaciones');
        $documentoElement10 = $documento->createElement('tr', '');
        $documentoElement11 = $documento->createElement('td', 'Fecha y hora de la toma del signo vital en formato "aaaammddhhiiss"');
        $documentoElement12 = $documento->createElement('td', 'Nombre / descripcion del signo vital');
        $documentoElement13 = $documento->createElement('td', 'Valor / resultado del signo vital');
        $documentoElement14 = $documento->createElement('td', 'Observaciones generales acerca del resultado del signo vital');
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

signos_vitales::signosXML();