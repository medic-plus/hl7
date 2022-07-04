<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\AntecendentePatologico;

class antecedente_patologicos_paciente {
    private string $descripcion;
    private ?DateTime $fechaDiabetes;
    private ?DateTime $fechaHipertension;
    private ?DateTime $fechaHipertiroidismo;
    private string $antecedentePersonalPatologico;
    private ?AntecendentePatologico $antecedentePatologico;

    public function __construct(string $descripcion, string $antecedentePersonalPatologico, DateTime $fechaDiabetes = null, DateTime $fechaHipertension = null, DateTime $fechaHipertiroidismo = null, AntecendentePatologico $antecedentePatologico = null) {
        $this->descripcion = $descripcion;
        $this->fechaDiabetes = $fechaDiabetes;
        $this->fechaHipertension = $fechaHipertension;
        $this->fechaHipertiroidismo = $fechaHipertiroidismo;
        $this->antecedentePersonalPatologico = $antecedentePersonalPatologico;
        $this->antecedentePatologico = $antecedentePatologico;
    }

    public function getDescripcionAntecedente() {
        return $this->descripcion;
    }

    public function setDescripcionAntecedente(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getFechaDiabetes() {
        return $this->fechaDiabetes;
    }

    public function setFechaDiabetes(DateTime $fechaDiabetes) {
        $this->fechaDiabetes = $fechaDiabetes;
    }

    public function getFechaHipertension() {
        return $this->fechaHipertension;
    }

    public function setFechaHipertension(DateTime $fechaHipertension) {
        $this->fechaHipertension = $fechaHipertension;
    }
    public function getFechaHipertiroidismo() {
        return $this->fechaHipertiroidismo;
    }

    public function setFechaHipertiroidismo(DateTime $fechaHipertiroidismo) {
        $this->fechaHipertiroidismo = $fechaHipertiroidismo;
    }

    public function getAntecedentePersonalPatologico() {
        return $this->antecedentePersonalPatologico;
    }

    public function setAntecedentePersonalPatologico(string $antecedentePersonalPatologico) {
        $this->antecedentePersonalPatologico = $antecedentePersonalPatologico;
    }

    public function getAntecedentePatologico() {
        return $this->antecedentePatologico;
    }

    public function setAntecedentePatologico(AntecendentePatologico $antecedentePatologico) {
        $this->antecedentePatologico = $antecedentePatologico;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Antecendetes", $this->descripcion);
        $documento->appendChild($segmento);
    }

    public static function patologicosXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', 'Antecedentes personales patologicos');
        $documentoElement3 = $documento->createElement('text', '');
        $documentoElement4 = $documento->createElement('paragraph', 'relacion de antecedentes personales patologicos del paciente');
        $documentoElement5 = $documento->createElement('table', '');
        $documentoElement6 = $documento->createElement('tbody', '');
        $documentoElement7 = $documento->createElement('tr', '');
        $documentoElement8 = $documento->createElement('th', 'Tiempo que el paciente lleva con diabetes');
        $documentoElement9 = $documento->createElement('th', 'Tiempo que el paciente lleva con hipertension');
        $documentoElement10 = $documento->createElement('th', 'Tiempo que el paciente lleva con Hipertiroidismo');
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
    }
}

antecedente_patologicos_paciente::patologicosXML();