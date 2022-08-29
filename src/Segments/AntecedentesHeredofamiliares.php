<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class AntecedentesHeredofamiliares {
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

    public function getAntecedentesHeredofamiliares() {
        return $this->descripcion;
    }

    public function setAntecedentesHeredofamiliares(string $descripcion) {
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
        $DOM->getElementsByTagName('ClinicalDocument')[0]->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.1.4');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '10157-6');
        $code->setAttribute('displayName', 'Antecedentes Familiares');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Antecedentes Heredo-Familiares');
        $section->appendChild($title);

        $descripcionContent = array_map(function ($antecedente) {
            return $antecedente->getAntecedentesHeredofamiliares();
        }, $descripcion);

        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);

        $entry = $DOM->createElement('entry', '');
        $entry->setAttribute('typeCode', 'DRIV');
        $section->appendChild($entry);

        $organizer = $DOM->createElement('organizer', '');
        $organizer->setAttribute('moodCode', 'EVN');
        $organizer->setAttribute('classCode', 'CLUSTER');
        $entry->appendChild($organizer);

        $statusCode = $DOM->createElement('statusCode', '');
        $statusCode->setAttribute('code', 'completed');
        $organizer->appendChild($statusCode);

        $subject = $DOM->createElement('subject', '');
        $organizer->appendChild($subject);

        $relatedSubject = $DOM->createElement('relatedSubject', '');
        $relatedSubject->setAttribute('classCode', 'PRS');
        $subject->appendChild($relatedSubject);

        $code1 = $DOM->createElement('code', '');
        $code1->setAttribute('codeSystem', '2.16.840.1.113883.5.111');
        $code1->setAttribute('codeSystemName', 'HL7 FamilyMember');
        $code1->setAttribute('code', 'FAMMEMB');
        $code1->setAttribute('displayName', 'Familiar');
        $relatedSubject->appendChild($code1);

        $component1 = $DOM->createElement('component', '');
        $organizer->appendChild($component1);

        $observation = $DOM->createElement('observation', '');
        $observation->setAttribute('classCode', 'OBS');
        $observation->setAttribute('moodCode', 'EVN');
        $component1->appendChild($observation);

        $code2 = $DOM->createElement('code', '');
        $code2->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code2->setAttribute('codeSystemName', 'SNOMED CT');
        $code2->setAttribute('code', '64572001');
        $code2->setAttribute('displayName', 'Condition');
        $observation->appendChild($code2);

        $statusCode = $DOM->createElement('statusCode', '');
        $statusCode->setAttribute('code', 'completed');
        $observation->appendChild($statusCode);

        $value = $DOM->createElement('value', '');
        $value->setAttribute('xsi:type', 'CD');
        $value->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value->setAttribute('codeSystemName', 'ICD-10');
        $value->setAttribute('code', 'I10X');
        $value->setAttribute('displayName', 'Hipertensión');
        $observation->appendChild($value);

        $observation1 = $DOM->createElement('observation', '');
        $observation1->setAttribute('classCode', 'OBS');
        $observation1->setAttribute('moodCode', 'EVN');
        $observation1->setAttribute('negationInd', 'true');
        $component1->appendChild($observation1);

        $code3 = $DOM->createElement('code', '');
        $code3->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code3->setAttribute('codeSystemName', 'SNOMED CT');
        $code3->setAttribute('code', '64572001');
        $code3->setAttribute('displayName', 'Condition');
        $observation1->appendChild($code3);

        $statusCode1 = $DOM->createElement('statusCode', '');
        $statusCode1->setAttribute('code', 'completed');
        $observation1->appendChild($statusCode1);

        $value1 = $DOM->createElement('value', '');
        $value1->setAttribute('xsi:type', 'CD');
        $value1->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value1->setAttribute('codeSystemName', 'ICD-10');
        $value1->setAttribute('code', 'I10X');
        $value1->setAttribute('displayName', 'Hipertensión');
        $observation1->appendChild($value1);

        $observation2 = $DOM->createElement('observation', '');
        $observation2->setAttribute('classCode', 'OBS');
        $observation2->setAttribute('moodCode', 'EVN');
        $observation2->setAttribute('nullFlavor', 'NI');
        $component1->appendChild($observation2);

        $code4 = $DOM->createElement('code', '');
        $code4->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code4->setAttribute('codeSystemName', 'SNOMED CT');
        $code4->setAttribute('code', '64572001');
        $code4->setAttribute('displayName', 'Condition');
        $observation2->appendChild($code4);

        $statusCode2 = $DOM->createElement('statusCode', '');
        $statusCode2->setAttribute('code', 'completed');
        $observation2->appendChild($statusCode2);

        $value2 = $DOM->createElement('value', '');
        $value2->setAttribute('xsi:type', 'CD');
        $value2->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value2->setAttribute('codeSystemName', 'ICD-10');
        $value2->setAttribute('code', 'I10X');
        $value2->setAttribute('displayName', 'Hipertensión');
        $observation2->appendChild($value2);

        $observation3 = $DOM->createElement('observation', '');
        $observation3->setAttribute('classCode', 'OBS');
        $observation3->setAttribute('moodCode', 'EVN');
        $component1->appendChild($observation3);

        $code5 = $DOM->createElement('code', '');
        $code5->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code5->setAttribute('codeSystemName', 'SNOMED CT');
        $code5->setAttribute('code', '64572001');
        $code5->setAttribute('displayName', 'Condition');
        $observation3->appendChild($code5);

        $statusCode3 = $DOM->createElement('statusCode', '');
        $statusCode3->setAttribute('code', 'completed');
        $observation3->appendChild($statusCode3);

        $value3 = $DOM->createElement('value', '');
        $value3->setAttribute('xsi:type', 'CD');
        $value3->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value3->setAttribute('codeSystemName', 'ICD-10');
        $value3->setAttribute('code', 'E78');
        $value3->setAttribute('displayName', 'Dislipidemias');
        $observation3->appendChild($value3);

        $observation4 = $DOM->createElement('observation', '');
        $observation4->setAttribute('classCode', 'OBS');
        $observation4->setAttribute('moodCode', 'EVN');
        $observation4->setAttribute('negationInd', 'true');
        $component1->appendChild($observation4);

        $code6 = $DOM->createElement('code', '');
        $code6->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code6->setAttribute('codeSystemName', 'SNOMED CT');
        $code6->setAttribute('code', '64572001');
        $code6->setAttribute('displayName', 'Condition');
        $observation4->appendChild($code6);

        $statusCode4 = $DOM->createElement('statusCode', '');
        $statusCode4->setAttribute('code', 'completed');
        $observation4->appendChild($statusCode4);

        $value4 = $DOM->createElement('value', '');
        $value4->setAttribute('xsi:type', 'CD');
        $value4->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value4->setAttribute('codeSystemName', 'ICD-10');
        $value4->setAttribute('code', 'E78');
        $value4->setAttribute('displayName', 'Dislipidemias');
        $observation4->appendChild($value4);

        $observation5 = $DOM->createElement('observation', '');
        $observation5->setAttribute('classCode', 'OBS');
        $observation5->setAttribute('moodCode', 'EVN');
        $observation5->setAttribute('nullFlavor', 'NI');
        $component1->appendChild($observation5);

        $code7 = $DOM->createElement('code', '');
        $code7->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code7->setAttribute('codeSystemName', 'SNOMED CT');
        $code7->setAttribute('code', '64572001');
        $code7->setAttribute('displayName', 'Condition');
        $observation5->appendChild($code7);

        $statusCode5 = $DOM->createElement('statusCode', '');
        $statusCode5->setAttribute('code', 'completed');
        $observation5->appendChild($statusCode5);

        $value5 = $DOM->createElement('value', '');
        $value5->setAttribute('xsi:type', 'CD');
        $value5->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value5->setAttribute('codeSystemName', 'ICD-10');
        $value5->setAttribute('code', 'E78');
        $value5->setAttribute('displayName', 'Dislipidemias');
        $observation5->appendChild($value5);

        $observation6 = $DOM->createElement('observation', '');
        $observation6->setAttribute('classCode', 'OBS');
        $observation6->setAttribute('moodCode', 'EVN');
        $component1->appendChild($observation6);

        $code8 = $DOM->createElement('code', '');
        $code8->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code8->setAttribute('codeSystemName', 'SNOMED CT');
        $code8->setAttribute('code', '64572001');
        $code8->setAttribute('displayName', 'Condition');
        $observation6->appendChild($code8);

        $statusCode6 = $DOM->createElement('statusCode', '');
        $statusCode6->setAttribute('code', 'completed');
        $observation6->appendChild($statusCode6);

        $value6 = $DOM->createElement('value', '');
        $value6->setAttribute('xsi:type', 'CD');
        $value6->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value6->setAttribute('codeSystemName', 'ICD-10');
        $value6->setAttribute('code', 'E14');
        $value6->setAttribute('displayName', 'Diabetes');
        $observation6->appendChild($value6);

        $observation7 = $DOM->createElement('observation', '');
        $observation7->setAttribute('classCode', 'OBS');
        $observation7->setAttribute('moodCode', 'EVN');
        $observation7->setAttribute('negationInd', 'true');
        $component1->appendChild($observation7);

        $code9 = $DOM->createElement('code', '');
        $code9->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code9->setAttribute('codeSystemName', 'SNOMED CT');
        $code9->setAttribute('code', '64572001');
        $code9->setAttribute('displayName', 'Condition');
        $observation7->appendChild($code9);

        $statusCode7 = $DOM->createElement('statusCode', '');
        $statusCode7->setAttribute('code', 'completed');
        $observation7->appendChild($statusCode7);

        $value7 = $DOM->createElement('value', '');
        $value7->setAttribute('xsi:type', 'CD');
        $value7->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value7->setAttribute('codeSystemName', 'ICD-10');
        $value7->setAttribute('code', 'E14');
        $value7->setAttribute('displayName', 'Diabetes');
        $observation7->appendChild($value7);

        $observation8 = $DOM->createElement('observation', '');
        $observation8->setAttribute('classCode', 'OBS');
        $observation8->setAttribute('moodCode', 'EVN');
        $observation8->setAttribute('nullFlavor', 'NI');
        $component1->appendChild($observation8);

        $code10 = $DOM->createElement('code', '');
        $code10->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code10->setAttribute('codeSystemName', 'SNOMED CT');
        $code10->setAttribute('code', '64572001');
        $code10->setAttribute('displayName', 'Condition');
        $observation8->appendChild($code10);

        $statusCode8 = $DOM->createElement('statusCode', '');
        $statusCode8->setAttribute('code', 'completed');
        $observation8->appendChild($statusCode8);

        $value8 = $DOM->createElement('value', '');
        $value8->setAttribute('xsi:type', 'CD');
        $value8->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value8->setAttribute('codeSystemName', 'ICD-10');
        $value8->setAttribute('code', 'E14');
        $value8->setAttribute('displayName', 'Diabetes');
        $observation8->appendChild($value8);

        $organizer1 = $DOM->createElement('organizer', '');
        $organizer1->setAttribute('moodCode', 'EVN');
        $organizer1->setAttribute('classCode', 'CLUSTER');
        $component1->appendChild($organizer1);

        $templateId1 = $DOM->createElement('templateId', '');
        $templateId1->setAttribute('root', '2.16.840.1.113883.10.20.22.4.45');
        $organizer1->appendChild($templateId1);

        $statusCode9 = $DOM->createElement('statusCode', '');
        $statusCode9->setAttribute('code', 'completed');
        $organizer1->appendChild($statusCode9);

        $subject1 = $DOM->createElement('subject', '');
        $organizer1->appendChild($subject1);

        $relatedSubject1 = $DOM->createElement('relatedSubject', '');
        $relatedSubject1->setAttribute('classCode', 'PRS');
        $subject1->appendChild($relatedSubject1);

        $code11 = $DOM->createElement('code', '');
        $code11->setAttribute('codeSystem', '2.16.840.1.113883.5.111');
        $code11->setAttribute('codeSystemName', 'HL7 FamilyMember');
        $code11->setAttribute('code', '--Valor del identificador de la relación familiar con el paciente--');
        $code11->setAttribute('displayName', '--Nombre de la relación familiar con el paciente--');
        $relatedSubject1->appendChild($code11);

        $component2 = $DOM->createElement('component', '');
        $organizer1->appendChild($component2);

        $observation9 = $DOM->createElement('observation', '');
        $observation9->setAttribute('classCode', 'OBS');
        $observation9->setAttribute('moodCode', 'EVN');
        $component2->appendChild($observation9);

        $code12 = $DOM->createElement('code', '');
        $code12->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code12->setAttribute('codeSystemName', 'SNOMED CT');
        $code12->setAttribute('code', '64572001');
        $code12->setAttribute('displayName', 'Condition');
        $observation9->appendChild($code12);

        $value9 = $DOM->createElement('value', '');
        $value9->setAttribute('xsi:type', 'CD');
        $value9->setAttribute('codeSystem', '2.16.840.1.113883.6.3');
        $value9->setAttribute('codeSystemName', 'ICD-10');
        $value9->setAttribute('code', '--Valor del identificador de diagnóstico de acuerdo a catálogo, codificado a 4 dígitos--');
        $value9->setAttribute('displayName', '--Nombre de diagnóstico de acuerdo a catálogo--');
        $observation9->appendChild($value9);

        $entryRelationship = $DOM->createElement('entryRelationship', '');
        $entryRelationship->setAttribute('typeCode', 'CAUS');
        $observation9->appendChild($entryRelationship);

        $observation10 = $DOM->createElement('observation', '');
        $observation10->setAttribute('classCode', 'OBS');
        $observation10->setAttribute('moodCode', 'EVN');
        $entryRelationship->appendChild($observation10);

        $code13 = $DOM->createElement('code', '');
        $code13->setAttribute('codeSystem', '2.16.840.1.113883.5.4');
        $code13->setAttribute('codeSystemName', 'HL7ActCode');
        $code13->setAttribute('code', 'ASSERTION');
        $observation10->appendChild($code13);

        $statusCode10 = $DOM->createElement('statusCode', '');
        $statusCode10->setAttribute('code', 'completed');
        $observation10->appendChild($statusCode10);

        $value10 = $DOM->createElement('value', '');
        $value10->setAttribute('xsi:type', 'CD');
        $value10->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $value10->setAttribute('codeSystemName', 'SNOMED CT');
        $value10->setAttribute('code', '419099009');
        $value10->setAttribute('displayName', 'Muerte');
        $observation10->appendChild($value10);

        $entryRelationship1 = $DOM->createElement('entryRelationship', '');
        $entryRelationship1->setAttribute('typeCode', 'SUBJ');
        $entryRelationship1->setAttribute('inversionInd', 'true');
        $observation9->appendChild($entryRelationship1);

        $observation11 = $DOM->createElement('observation', '');
        $observation11->setAttribute('classCode', 'OBS');
        $observation11->setAttribute('moodCode', 'EVN');
        $entryRelationship1->appendChild($observation11);

        $code14 = $DOM->createElement('code', '');
        $code14->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code14->setAttribute('codeSystemName', 'SNOMED CT');
        $code14->setAttribute('code', '397659008');
        $code14->setAttribute('displayName', 'Edad');
        $observation11->appendChild($code14);

        $statusCode11 = $DOM->createElement('statusCode', '');
        $statusCode11->setAttribute('code', 'completed');
        $observation11->appendChild($statusCode11);

        $value11 = $DOM->createElement('value', '');
        $value11->setAttribute('xsi:type', 'PQ');
        $value11->setAttribute('value', '--Edad en años--');
        $value11->setAttribute('unit', 'a');
        $observation11->appendChild($value11);

        return $DOM;
    }
}
