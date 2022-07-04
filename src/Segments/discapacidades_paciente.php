<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\Discapacidad;

class discapacidad_paciente {
    private string $descripcion;
    private int $identificadorUnicoDiscapacidad;
    private ?Discapacidad $discapacidad;

    public function __construct(string $descripcion, int $identificadorUnicoDiscapacidad, Discapacidad $discapacidad = null) {
        $this->descripcion = $descripcion;
        $this->identificadorUnicoDiscapacidad = $identificadorUnicoDiscapacidad;
        $this->discapacidad = $discapacidad;
    }

    public function getDescripcionDiscapacidades() {
        return $this->descripcion;
    }

    public function setDescripcionDiscapacidades(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getIdentificadorUnicoDiscapacidad() {
        return $this->identificadorUnicoDiscapacidad;
    }

    public function setIdentificadorUnicoDiscapacidad(int $identificadorUnicoDiscapacidad) {
        $this->identificadorUnicoDiscapacidad = $identificadorUnicoDiscapacidad;
    }

    public function getDiscapacidad() {
        return $this->discapacidad;
    }

    public function setDiscapacidad(Discapacidad $discapacidad) {
        $this->discapacidad = $discapacidad;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Descripcion", $this->descripcion);
        $documento->appendChild($segmento);
    }

    public static function discapacidadXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Discapacidades');
        $documentoElement3 = $documento->createElement('text', 'Descripcion de discapacidades y estado del funcionamiento');
        $documento->appendChild($documentoElement);
        $documento->appendChild($documentoElement1);
        $documento->appendChild($documentoElement2);
        $documento->appendChild($documentoElement3);
    }
}

discapacidad_paciente::discapacidadXML();