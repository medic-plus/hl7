<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\Padecimiento;
use Medicplus\HL7\Segments\Catalogos\ServicioProcedimiento;

class Procedimientos {
    private string $descripcionProcedimiento;
    private string $descripcionRealizado;
    private ?DateTime $fechaProcedimiento;
    private int $cedulaProfesionalMedico;
    private string $nombreMedicoResponsable;
    private string $apellidoPaternoMedicoResponsable;
    private string $apellidoMaternoMedicoResponsable;
    private string $nombreServicioRealizado;
    private ?Padecimiento $padecimiento;
    private ?ServicioProcedimiento $servicioProcedimiento;

    public function __construct(string $descripcion, string $descripcionRealizado, int $cedulaProfesionalMedico, string $nombreMedicoResponsable, string $apellidoPaternoMedicoResponsable, string $apellidoMaternoMedicoResponsable, string $nombreServicioRealizado, DateTime $fechaProcedimiento = null, Padecimiento $padecimiento = null, ServicioProcedimiento $servicioProcedimiento = null) {
        $this->descripcion = $descripcion;
        $this->descripcionRealizado = $descripcionRealizado;
        $this->fechaProcedimiento = $fechaProcedimiento;
        $this->cedulaProfesionalMedico = $cedulaProfesionalMedico;
        $this->nombreMedicoResponsable = $nombreMedicoResponsable;
        $this->apellidoPaternoMedicoResponsable = $apellidoPaternoMedicoResponsable;
        $this->apellidoMaternoMedicoResponsable = $apellidoMaternoMedicoResponsable;
        $this->nombreServicioRealizado = $nombreServicioRealizado;
        $this->padecimiento = $padecimiento;
        $this->servicioProcedimiento = $servicioProcedimiento;
    }

    public function getProcedimiento() {
        return $this->descripcion;
    }

    public function setProcedimiento(string $descripcionProcedimiento) {
        $this->descripcionProcedimiento = $descripcionProcedimiento;
    }

    public function getDescripcionRealizado() {
        return $this->descripcionRealizado;
    }

    public function setDescripcionRealizado(string $descripcionRealizado) {
        $this->descripcionRealizado = $descripcionRealizado;
    }

    public function getFechaProcedimiento() {
        return $this->fechaProcedimiento;
    }

    public function setFechaProcedimiento(DateTime $fechaProcedimiento) {
        $this->fechaProcedimiento = $fechaProcedimiento;
    }

    public function getCedulaProfesionalMedico() {
        return $this->cedulaProfesionalMedico;
    }

    public function setCedulaProfesionalMedico(int $cedulaProfesionalMedico) {
        $this->cedulaProfesionalMedico = $cedulaProfesionalMedico;
    }

    public function getNombreMedicoResponsable() {
        return $this->nombreMedicoResponsable;
    }

    public function setNombreMedicoResponsable(string $nombreMedicoResponsable) {
        $this->nombreMedicoResponsable = $nombreMedicoResponsable;
    }

    public function getApellidoPaternoMedicoResponsable() {
        return $this->apellidoPaternoMedicoResponsable;
    }

    public function setApellidoPaternoMedicoResponsable(string $apellidoPaternoMedicoResponsable) {
        $this->apellidoPaternoMedicoResponsable = $apellidoPaternoMedicoResponsable;
    }

    public function getApellidoMaternoMedicoResponsable() {
        return $this->apellidoMaternoMedicoResponsable;
    }

    public function setApellidoMaternoMedicoResponsable(string $apellidoMaternoMedicoResponsable) {
        $this->apellidoMaternoMedicoResponsable = $apellidoMaternoMedicoResponsable;
    }

    public function getNombreServicioRealizado() {
        return $this->nombreServicioRealizado;
    }

    public function setNombreServicioRealizado(string $nombreServicioRealizado) {
        $this->nombreServicioRealizado = $nombreServicioRealizado;
    }

    public function getPadecimiento() {
        return $this->padecimiento;
    }

    public function setPadecimiento(Padecimiento $padecimiento) {
        $this->padecimiento = $padecimiento;
    }

    public function getServicioProcedimiento() {
        return $this->servicioProcedimiento;
    }

    public function setServicioProcedimiento(ServicioProcedimiento $servicioProcedimiento) {
        $this->servicioProcedimiento = $servicioProcedimiento;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Descripcion", $this->descripcionProcedimiento);
        $documento->appendChild($segmento);
    }

    public static function parseXML(DOMDocument $DOM, array $descripcion = []) {
        if (sizeof($descripcion) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->getElementsByTagName('ClinicalDocument')[0]->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.1.12');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '47519-4');
        $code->setAttribute('displayName', 'Historial de procedimientos');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Procedimientos quirurgicos y terapeuticos');
        $section->appendChild($title);

        $descripcionContent = array_map(function ($procedimiento) {
            return $procedimiento->getProcedimiento();
        }, $descripcion);
        $text = $DOM->createElement('text', implode("\n", $descripcionContent));
        $section->appendChild($text);

        $entry = $DOM->createElement('entry', '');
        $entry->setAttribute('typeCode', 'DRIV');
        $section->appendChild($entry);

        $procedure = $DOM->createElement('procedure', '');
        $procedure->setAttribute('classCode', 'PROC');
        $procedure->setAttribute('moodCode', 'EVN');
        $entry->appendChild($procedure);

        $code1 = $DOM->createElement('code', '');
        $code1->setAttribute('codeSystem', '2.16.840.1.113883.6.2');
        $code1->setAttribute('codeSystemName', 'ICD-9CM');
        $code1->setAttribute('code', '--Valor del identificador del procedimiento de acuerdo a catálogo--');
        $code1->setAttribute('displayName', '--Nombre del procedimiento de acuerdo a catálogo--');
        $procedure->appendChild($code1);

        $originalText = $DOM->createElement('originalText', '--Procedimiento en texto libre introducido por el medico--');
        $code1->appendChild($originalText);

        $statusCode = $DOM->createElement('statusCode', '');
        $statusCode->setAttribute('code', 'completed');
        $procedure->appendChild($statusCode);

        $effectiveTime = $DOM->createElement('effectiveTime', '');
        $effectiveTime->setAttribute('value', '--aaaammddhhiiss--');
        $procedure->appendChild($effectiveTime);

        $performer = $DOM->createElement('performer', '');
        $procedure->appendChild($performer);

        $assignedEntity = $DOM->createElement('assignedEntity', '');
        $performer->appendChild($assignedEntity);

        $id = $DOM->createElement('id', '');
        $id->setAttribute('root', '2.16.840.1.113883.3.215.12.18');
        $id->setAttribute('extension', '--Número de cédula profesional del médico responsable del procedimiento--');
        $assignedEntity->appendChild($id);

        $assingnedPerson = $DOM->createElement('assingnedPerson', '');
        $assignedEntity->appendChild($assingnedPerson);

        $name = $DOM->createElement('name', '');
        $assingnedPerson->appendChild($name);

        $given = $DOM->createElement('given', '--Nombre(s) del médico responsable del procedimiento--');
        $name->appendChild($given);

        $family = $DOM->createElement('family', '--Primer apellido del médico responsable del procedimiento--');
        $name->appendChild($family);

        $family1 = $DOM->createElement('family', '--Segundo apellido del médico responsable del procedimiento--');
        $name->appendChild($family1);

        $participant = $DOM->createElement('participant', '');
        $participant->setAttribute('typeCode', 'LOC');
        $procedure->appendChild($participant);

        $participantRole = $DOM->createElement('participantRole', '');
        $participantRole->setAttribute('classCode', 'SDLOC');
        $participant->appendChild($participantRole);

        $code2 = $DOM->createElement('code', '');
        $code2->setAttribute('codeSystem', '2.16.840.1.113883.6.259');
        $code2->setAttribute('codeSystemName', 'HealthcareServiceLocation');
        $code2->setAttribute('code', '--Clave de la ubicación (serivicio) donde se realizó el procedimiento--');
        $code2->setAttribute('displayName', '--ubicación (serivicio) donde se realizó el procedimiento--');
        $participantRole->appendChild($code2);

        return $DOM;
    }
}