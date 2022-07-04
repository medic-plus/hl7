<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class antecedentes_heredofamiliares_paciente {
    private string $descripcion;
    private bool $presenciaHipertension;
    private bool $presenciaDislipidemias;
    private bool $presenciaDiabetes;

    public function __construct(string $descripcion, bool $presenciaHipertension, bool $presenciaDislipidemias, bool $presenciaDiabetes) {
        $this->descripcion = $descripcion;
        $this->presenciaHipertension = $presenciaHipertension;
        $this->presenciaDislipidemias = $presenciaDislipidemias;
        $this->presenciaDiabetes = $presenciaDiabetes;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getPresenciaHipertension() {
        return $this->presenciaHipertension;
    }

    public function setPresenciaHipertension(bool $presenciaHipertension) {
        $this->presenciaHipertension = $presenciaHipertension;
    }

    public function getPresenciaDislipidemias() {
        return $this->presenciaDislipidemias;
    }

    public function setPresenciaDislipidemias(bool $presenciaDislipidemias) {
        $this->presenciaDislipidemias = $presenciaDislipidemias;
    }

    public function getPresenciaDiabetes() {
        return $this->presenciaDiabetes;
    }

    public function setPresenciaDiabetes(bool $presenciaDiabetes) {
        $this->presenciaDiabetes = $presenciaDiabetes;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("descripcion", $this->descripcion);
        $documento->appendChild($segmento);
    }

    public static function heredofamiliaresXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Antecedentes Heredo-Familiares');
        $documentoElement3 = $documento->createElement('text', '');
        $documentoElement4 = $documento->createElement('Table', '');
        $documentoElement5 = $documento->createElement('thead', '');
        $documentoElement6 = $documento->createElement('tr', '');
        $documentoElement7 = $documento->createElement('th', 'Hipertension');
        $documentoElement8 = $documento->createElement('th', 'Dislipidemias');
        $documentoElement9 = $documento->createElement('th', 'Diabetes');
        $documentoElement10 = $documento->createElement('tbody', '');
        $documentoElement11 = $documento->createElement('tr', '');
        $documentoElement12 = $documento->createElement('td', 'Si/No/Sin informacion');
        $documentoElement13 = $documento->createElement('td', 'Si/No/Sin informacion');
        $documentoElement14 = $documento->createElement('td', 'Si/No/Sin informacion');
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

antecedentes_heredofamiliares_paciente::heredofamiliaresXML();
