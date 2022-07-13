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

    public static function ParseXML(DOMDocument $DOM, array $descripcion = []) {
        if (sizeof($descripcion) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.1.4');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '10157-6');
        $code->setAttribute('displayName', 'Antecendentes Familiares');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Antecedentes Heredo-Familiares');
        $section->appendChild($title);

        $descripcionContent = array_map(function ($descripcionHeredofamilia) {
            return $descripcionHeredofamilia->getDescripcion();
        }, $descripcion);

        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);
        return $DOM;
    }
}