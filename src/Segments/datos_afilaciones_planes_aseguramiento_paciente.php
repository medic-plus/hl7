<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class datos_afiliaciones_planos_aseguramiento_paciente {
    private string $datosAfiliaciones;

    public function __construct(string $datosAfiliaciones) {
        $this->datosAfiliaciones = $datosAfiliaciones;
    }

    public function getDatosAfiliaciones() {
        return $this->datosAfiliaciones;
    }

    public function setDatosAfiliaciones(string $datosAfiliaciones) {
        $this->datosAfiliaciones = $datosAfiliaciones;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Datos", $this->datosAfiliaciones);
        $documento->appendChild($segmento);
    }

    public static function datosXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Afiliaciones/Planes de aseguramiento');
        $documentoElement3 = $documento->createElement('text', '');
        $documentoElement4 = $documento->createElement('table', '');
        $documentoElement5 = $documento->createElement('thead', '');
        $documentoElement6 = $documento->createElement('tr', 'Inicio');
        $documentoElement7 = $documento->createElement('th', 'Fin');
        $documentoElement8 = $documento->createElement('th', 'Programa');
        $documentoElement9 = $documento->createElement('th', 'Poliza');
        $documentoElement10 = $documento->createElement('th', 'Folio');
        $documentoElement11 = $documento->createElement('th', 'Tipo de beneficio');
        $documentoElement12 = $documento->createElement('tbody', '');
        $documentoElement13 = $documento->createElement('tr', 'Inicio de vigencia N');
        $documentoElement14 = $documento->createElement('td', 'Fin de vigencia N');
        $documentoElement15 = $documento->createElement('td', 'Nombre del programa N');
        $documentoElement16 = $documento->createElement('td', 'Valor del identificador de la poliza N');
        $documentoElement17 = $documento->createElement('td', 'Valor del identificador del beneficio N');
        $documentoElement18 = $documento->createElement('td', 'Valor del identificador del tipo de beneficio N');
        $documento->appendChild($documentoElement);
        $documento->appendChild($documentoElement1);
        $documento->appendChild($documentoElement2);
        $documento->appendChild($documentoElement3);
    }
}

datos_afiliaciones_planos_aseguramiento_paciente::datosXML();