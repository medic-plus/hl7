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

    public function getAntecedentesPatologicos() {
        return $this->descripcion;
    }

    public function setAntecedentesPatologicos(string $descripcion) {
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
        $DOM->getElementsByTagName('ClinicalDocument')[0]->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '22.16.840.1.113883.10.20.22.2.20');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '11348-0');
        $code->setAttribute('displayName', 'Antecedentes patológicos');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Antecendentes personales patologicos');
        $section->appendChild($title);

        $descripcionPatologicosContent = array_map(function ($antecedentePatologico) {
            return $antecedentePatologico->getAntecedentesPatologicos();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionPatologicosContent));
        $section->appendChild($text);

        $entry = $DOM->createElement('entry', '');
        $section->appendChild($entry);

        $observation = $DOM->createElement('observation', '');
        $observation->setAttribute('classCode', 'OBS');
        $observation->setAttribute('moodCode', 'ENV');
        $entry->appendChild($observation);

        $code1 = $DOM->createElement('code', '');
        $code1->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code1->setAttribute('codeSystemName', 'SNOMED CT');
        $code1->setAttribute('code', '282291009');
        $code1->setAttribute('displayName', 'Diagnóstico');
        $observation->appendChild($code1);

        $statusCode = $DOM->createElement('statusCode', '');
        $statusCode->setAttribute('code', 'completed');
        $observation->appendChild($statusCode);

        $effectiveTime = $DOM->createElement('effectiveTime', '');
        $observation->appendChild($effectiveTime);

        $low = $DOM->createElement('low', '');
        $low->setAttribute('value', '--aaaa--');
        $effectiveTime->appendChild($low);

        $value = $DOM->createElement('value', '');
        $value->setAttribute('xsi:type', 'CE');
        $value->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value->setAttribute('codeSystemName', 'ICD-10');
        $value->setAttribute('code', 'E14');
        $value->setAttribute('displayName', 'Diabetes');
        $observation->appendChild($value);

        $entry1 = $DOM->createElement('entry', '');
        $section->appendChild($entry1);

        $observation1 = $DOM->createElement('observation', '');
        $observation1->setAttribute('classCode', 'OBS');
        $observation1->setAttribute('moodCode', 'ENV');
        $entry1->appendChild($observation1);

        $code2 = $DOM->createElement('code', '');
        $code2->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code2->setAttribute('codeSystemName', 'SNOMED CT');
        $code2->setAttribute('code', '282291009');
        $code2->setAttribute('displayName', 'Diagnóstico');
        $observation1->appendChild($code2);

        $statusCode1 = $DOM->createElement('statusCode', '');
        $statusCode1->setAttribute('code', 'completed');
        $observation1->appendChild($statusCode1);

        $effectiveTime1 = $DOM->createElement('effectiveTime', '');
        $observation1->appendChild($effectiveTime1);

        $low1 = $DOM->createElement('low', '');
        $low1->setAttribute('value', '--aaaa--');
        $effectiveTime1->appendChild($low1);

        $value1 = $DOM->createElement('value', '');
        $value1->setAttribute('xsi:type', 'CE');
        $value1->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value1->setAttribute('codeSystemName', 'ICD-10');
        $value1->setAttribute('code', 'E14');
        $value1->setAttribute('displayName', 'Hipertension');
        $observation1->appendChild($value1);

        $entry2 = $DOM->createElement('entry', '');
        $section->appendChild($entry2);

        $observation2 = $DOM->createElement('observation', '');
        $observation2->setAttribute('classCode', 'OBS');
        $observation2->setAttribute('moodCode', 'ENV');
        $entry2->appendChild($observation2);

        $code3 = $DOM->createElement('code', '');
        $code3->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code3->setAttribute('codeSystemName', 'SNOMED CT');
        $code3->setAttribute('code', '282291009');
        $code3->setAttribute('displayName', 'Diagnóstico');
        $observation2->appendChild($code3);

        $statusCode2 = $DOM->createElement('statusCode', '');
        $statusCode2->setAttribute('code', 'completed');
        $observation2->appendChild($statusCode2);

        $effectiveTime2 = $DOM->createElement('effectiveTime', '');
        $observation2->appendChild($effectiveTime2);

        $low2 = $DOM->createElement('low', '');
        $low2->setAttribute('value', '--aaaa--');
        $effectiveTime2->appendChild($low2);

        $value2 = $DOM->createElement('value', '');
        $value2->setAttribute('xsi:type', 'CE');
        $value2->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value2->setAttribute('codeSystemName', 'ICD-10');
        $value2->setAttribute('code', 'E14');
        $value2->setAttribute('displayName', 'Hipertiroidismo');
        $observation2->appendChild($value2);

        $entry3 = $DOM->createElement('entry', '');
        $section->appendChild($entry3);

        $observation3 = $DOM->createElement('observation', '');
        $observation3->setAttribute('classCode', 'OBS');
        $observation3->setAttribute('moodCode', 'ENV');
        $entry3->appendChild($observation3);

        $code4 = $DOM->createElement('code', '');
        $code4->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code4->setAttribute('codeSystemName', 'SNOMED CT');
        $code4->setAttribute('code', '282291009');
        $code4->setAttribute('displayName', 'Diagnóstico');
        $observation3->appendChild($code4);

        $text1 = $DOM->createElement('text', '--Registro de diagnostico en texto libre--');
        $observation3->appendChild($text1);

        $statusCode3 = $DOM->createElement('statusCode', '');
        $statusCode3->setAttribute('code', 'completed');
        $observation3->appendChild($statusCode3);

        $effectiveTime3 = $DOM->createElement('effectiveTime', '');
        $observation3->appendChild($effectiveTime3);

        $low3 = $DOM->createElement('low', '');
        $low3->setAttribute('value', '-aaaammddhhiiss-');
        $effectiveTime3->appendChild($low3);

        $value3 = $DOM->createElement('value', '');
        $value3->setAttribute('xsi:type', 'CE');
        $value3->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value3->setAttribute('codeSystemName', 'ICD-10');
        $value3->setAttribute('code', '--Valor del identificador del diagnóstico de acuerdo a catálogo--');
        $value3->setAttribute('displayName', '--Nombre del diagnóstico de acuerdo a catálogo--');
        $observation3->appendChild($value3);

        return $DOM;
    }
}