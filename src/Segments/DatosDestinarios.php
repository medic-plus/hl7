<?php

namespace Medicplus\HL7\Segments;

use DOMDocument;

class DatosDestinarios {
    private string $datosDestinarios;

    public function __construct(string $datosDestinarios) {
        $this->datosDestinarios = $datosDestinarios;
    }

    public function getDatosDestinarios() {
        return $this->datosDestinarios;
    }

    public function setDatosDestinarios(string $datosDestinarios) {
        $this->datosDestinarios = $datosDestinarios;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Datos Destinarios", $this->datosDestinarios);
        $documento->appendChild($segmento);
    }

    public static function parseXML(DOMDocument $DOM, array $datosDestinarios = []) {
        if (sizeof($datosDestinarios) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->getElementsByTagName('ClinicalDocument')[0]->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.2.18');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '48768-6');
        $code->setAttribute('displayName', 'Pagador');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Afiliaciones / Planes de aseguramiento');
        $section->appendChild($title);

        $datosDestinariosContent = array_map(function ($datoDestinario) {
            return $datoDestinario->getDatosDestinarios();
        }, $datosDestinarios);
        $text = $DOM->createElement('text', implode("\n", $datosDestinariosContent));
        $section->appendChild($text);

        $entry = $DOM->createElement('entry', '');
        $section->appendChild($entry);

        $act = $DOM->createElement('act', '');
        $act->setAttribute('classCode', 'ACT');
        $act->setAttribute('moodCode', 'EVN');
        $entry->appendChild($act);

        $code1 = $DOM->createElement('code', '');
        $code1->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code1->setAttribute('codeSystemName', 'LOINC');
        $code1->setAttribute('code', '48768-6');
        $code1->setAttribute('displayName', 'Fuentes de financiamiento');
        $act->appendChild($code1);

        $status = $DOM->createElement('statusCode', '');
        $status->setAttribute('code', 'completed');
        $act->appendChild($status);

        $entryRelationship = $DOM->createElement('entryRelationship', '');
        $entryRelationship->setAttribute('typeCode', 'COMP');
        $act->appendChild($entryRelationship);

        $act1 = $DOM->createElement('act', '');
        $act1->setAttribute('classCode', 'ACT');
        $act1->setAttribute('moodCode', 'EVN');
        $entryRelationship->appendChild($act1);

        $code2 = $DOM->createElement('code', '');
        $code2->setAttribute('codeSystem', '2.16.840.1.113883.5.110');
        $code2->setAttribute('codeSystemName', 'RoleClass');
        $code2->setAttribute('code', '--Identificador/clave del programa--');
        $code2->setAttribute('displayName', '--Nombre del programa--');
        $act1->appendChild($code2);

        $status1 = $DOM->createElement('statusCode', '');
        $status1->setAttribute('code', 'completed');
        $act1->appendChild($status1);

        $performer = $DOM->createElement('performer', '');
        $performer->setAttribute('typeCode', 'PRF');
        $act1->appendChild($performer);

        $time = $DOM->createElement('time', '');
        $time->setAttribute('nullFlavor', 'NA');
        $performer->appendChild($time);

        $assingnedEntity = $DOM->createElement('assingnedEntity', '');
        $performer->appendChild($assingnedEntity);

        $id = $DOM->createElement('id', '');
        $id->setAttribute('root', '--OID de la dependencia--');
        $assingnedEntity->appendChild($id);

        $code3 = $DOM->createElement('code', '');
        $code3->setAttribute('code', 'PAYOR');
        $code3->setAttribute('codeSystem', '2.16.840.1.113883.5.110');
        $code3->setAttribute('codeSystemName', 'HL7 RoleCode');
        $assingnedEntity->appendChild($code3);

        $representedOrganization = $DOM->createElement('representedOrganization', '');
        $assingnedEntity->appendChild($representedOrganization);

        $name = $DOM->createElement('name', '--Nombre de la dependencia u organizacion aseguradora--');
        $representedOrganization->appendChild($name);

        $participant = $DOM->createElement('participant', '');
        $participant->setAttribute('typeCode', 'COV');
        $act1->appendChild($participant);

        $time1 = $DOM->createElement('time', '');
        $participant->appendChild($time1);

        $low = $DOM->createElement('low', '');
        $low->setAttribute('value', '--aaaammddhhiiss--');
        $time1->appendChild($low);

        $high = $DOM->createElement('high', '');
        $high->setAttribute('value', '--aaaammddhhiiss--');
        $time1->appendChild($high);

        $participantRole = $DOM->createElement('participantRole', '');
        $participant->appendChild($participantRole);

        $id2 = $DOM->createElement('id', '');
        $id2->setAttribute('root', '--OID del identificador de personas del programa dentro de la dependencia--');
        $id2->setAttribute('extension', '--Identificador único de la persona dentro del programa--');
        $participantRole->appendChild($id2);

        $code4 = $DOM->createElement('code', '');
        $code4->setAttribute('codeSystem', '2.16.840.1.113883.3.215.12.16');
        $code4->setAttribute('codeSystemName', 'Tipos de beneficario');
        $code4->setAttribute('code', '--Valor del identificador de tipo de beneficiario de acuerdo a catálogo--');
        $code4->setAttribute('displayName', '--Tipo de beneficiario de acuerdo a catálogo--');
        $participantRole->appendChild($code4);

        $participant2 = $DOM->createElement('participant', '');
        $participant2->setAttribute('typeCode', 'HLD');
        $act1->appendChild($participant2);

        $participantRole2 = $DOM->createElement('participantRole', '');
        $participant2->appendChild($participantRole2);

        $id3 = $DOM->createElement('id', '');
        $id3->setAttribute('root', '2.16.840.1.113883.3.215.1.2');
        $id3->setAttribute('extension', '--Identificador único de la persona dentro de la póliza--');
        $participantRole2->appendChild($id3);

        return $DOM;
    }
}
