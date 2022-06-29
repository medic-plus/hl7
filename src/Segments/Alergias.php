<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class Alergias {

    private string $alergias;

    public function __construct(string $alergias) {
        $this->alergias = $alergias;
    }

    public function getAlergias() {
        return $this->alergias;
    }

    public function setAlergias(string $alergias) {
        $this->alergias = $alergias;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Alergia", $this->alergias);
        $documento->appendChild($segmento);
    }

    public static function crearXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement2 = $documento->createElement('Section', '');
        $documentoElement3 = $documento->createElement('Title', 'Alergias y reacciones adversas');
        $documentoElement4 = $documento->createElement('Thead', '');
        $documentoElement5 = $documento->createElement('Tr', '');
        $documentoElement6 = $documento->createElement('Th', 'Alergeno');
        $documentoElement7 = $documento->createElement('Th', 'Fecha Inicial');
        $documentoElement8 = $documento->createElement('Th', 'Medico');
        $documentoElement9 = $documento->createElement('Th', 'Reaccion');
        $documentoElement10 = $documento->createElement('Th', 'Estado actual');
        $documentoElement11 = $documento->createElement('Th', 'Observacion');
        $documentoElement12 = $documento->createElement('Tbody', '');
        $documentoElement13 = $documento->createElement('Tr', '');
        $documentoElement14 = $documento->createElement('Td', 'Nombre del alergeno que tiene reaccion el paciente');
        $documentoElement15 = $documento->createElement('Td', 'Fecha y hora en el cual se realizo la deteccion en formato aaaammddhhiiss');
        $documentoElement16 = $documento->createElement('Td', 'Nombre del medico que realizo la deteccion');
        $documentoElement17 = $documento->createElement('Td', 'Descripcion de la reaccion producida por el alergeno en el paciente');
        $documentoElement18 = $documento->createElement('Td', 'Situacion actual de la alergia');
        $documentoElement19 = $documento->createElement('Td', 'Otros comentarios acerca de la reaccion que presenta el paciente');
        $documento->appendChild($documentoElement);
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
        $documento->appendChild($documentoElement15);
        $documento->appendChild($documentoElement16);
        $documento->appendChild($documentoElement17);
        $documento->appendChild($documentoElement18);
        $documento->appendChild($documentoElement19);
        echo $documento->saveXML();
    }
}

Alergias::crearXML();