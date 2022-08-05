<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\AntecendentePatologico;

class AntecedentesPatologicos {
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

    public static function parseXML(DOMDocument $DOM, array $descripcion) {
        if (sizeof($descripcion) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.20');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '11348-0');
        $code->setAttribute('displayName', 'Antecedentes patológicos');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Antecedentes Persolanes patologicos');
        $section->appendChild($title);

        $descripcionPatologicosContent = array_map(function ($descripcionPatologico) {
            return $descripcionPatologico->getDescripcionAntecedente();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionPatologicosContent));
        $section->appendChild($text);

        return $DOM;
    }
}