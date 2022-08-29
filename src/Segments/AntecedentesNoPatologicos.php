<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\TipoSangre;

class AntecedentesNoPatologicos {
    private string $antecedentesPersonales;
    private ?DateTime $fechaTipoSangre;
    private ?TipoSangre $tipoSangre;
    private bool $identificadorTabaquismo;
    private ?DateTime $fechaIniTabaquismo;
    private ?DateTime $fechaFinTabaquismo;
    private int $cajetillasDia;
    private bool $identificadorAlcoholisnmo;
    private ?DateTime $fechaIniAlcoholismo;
    private ?DateTime $fechaFinAlcoholismo;
    private string $consumoAlcoholDia;
    private bool $identificadorConsumoDrogras;
    private ?DateTime $fechaIniConsumoDrogas;
    private ?DateTime $fechaFinConsumoDrogas;
    private string $consumoDrogasDia;

    public function __construct(string $antecedentesPersonales, bool $identificadorTabaquismo, int $cajetillasDia, bool $identificadorAlcoholisnmo, string $consumoAlcoholDia, bool $identificadorConsumoDrogras, string $consumoDrogasDia, DateTime $fechaTipoSangre = null, TipoSangre $tipoSangre = null, DateTime $fechaIniTabaquismo = null, DateTime $fechaFinTabaquismo = null,  DateTime $fechaIniAlcoholismo = null, DateTime $fechaFinAlcoholismo = null,  DateTime $fechaIniConsumoDrogas = null, DateTime $fechaFinConsumoDrogas = null) {
        $this->antecedentesPersonales = $antecedentesPersonales;
        $this->identificadorTabaquismo = $identificadorTabaquismo;
        $this->cajetillasDia = $cajetillasDia;
        $this->identificadorAlcoholisnmo = $identificadorAlcoholisnmo;
        $this->consumoAlcoholDia = $consumoAlcoholDia;
        $this->identificadorConsumoDrogras = $identificadorConsumoDrogras;
        $this->consumoDrogasDia = $consumoDrogasDia;
        $this->fechaTipoSangre = $fechaTipoSangre;
        $this->tipoSangre = $tipoSangre;
        $this->fechaIniTabaquismo = $fechaIniTabaquismo;
        $this->fechaFinTabaquismo = $fechaFinTabaquismo;
        $this->fechaIniAlcoholismo = $fechaIniAlcoholismo;
        $this->fechaFinAlcoholismo = $fechaFinAlcoholismo;
        $this->fechaIniConsumoDrogas = $fechaIniConsumoDrogas;
        $this->fechaFinConsumoDrogas = $fechaFinConsumoDrogas;
    }

    public function getAntecendetesPersonales() {
        return $this->antecedentesPersonales;
    }

    public function setAntecedentesPersonales(string $antecedentesPersonales) {
        $this->antecedentesPersonales = $antecedentesPersonales;
    }

    public function getFechaTipoSangre() {
        return $this->fechaTipoSangre;
    }

    public function setFechaTipoSangre(DateTime $fechaTipoSangre) {
        $this->fechaTipoSangre = $fechaTipoSangre;
    }

    public function gettipoSangre() {
        return $this->tipoSangre;
    }

    public function settipoSangre(TipoSangre $tipoSangre) {
        $this->tipoSangre = $tipoSangre;
    }

    public function getIdentificadorTabaquismo() {
        return $this->identificadorTabaquismo;
    }

    public function setIdentificadorTabaquismo(bool $identificadorTabaquismo) {
        $this->identificadorTabaquismo = $identificadorTabaquismo;
    }

    public function getFechaIniTabaquismo() {
        return $this->fechaIniTabaquismo;
    }

    public function setFechaIniTabaquismo(DateTime $fechaIniTabaquismo) {
        $this->fechaIniTabaquismo = $fechaIniTabaquismo;
    }

    public function getFechaFinTabaquismo() {
        return $this->fechaFinTabaquismo;
    }

    public function setFechaFinTabaquismo(DateTime $fechaFinTabaquismo) {
        $this->fechaFinTabaquismo = $fechaFinTabaquismo;
    }

    public function getCajetillasDia() {
        return $this->cajetillasDia;
    }

    public function setCajetillasDia(DateTime $cajetillasDia) {
        $this->cajetillasDia = $cajetillasDia;
    }

    public function getIdentificadorAlcoholismo() {
        return $this->identificadorAlcoholisnmo;
    }

    public function setIdentificadorAlcoholismo(bool $identificadorAlcoholisnmo) {
        $this->identificadorAlcoholisnmo = $identificadorAlcoholisnmo;
    }

    public function getFechaIniAlcoholismo() {
        return $this->fechaIniAlcoholismo;
    }

    public function setFechaIniAlcoholismo(DateTime $fechaIniAlcoholismo) {
        $this->fechaIniAlcoholismo = $fechaIniAlcoholismo;
    }

    public function getFechaFinAlcoholismo() {
        return $this->fechaFinAlcoholismo;
    }

    public function setFechaFinAlcoholismo(DateTime $fechaFinAlcoholismo) {
        $this->fechaFinAlcoholismo = $fechaFinAlcoholismo;
    }

    public function getConsumoAlcoholDia() {
        return $this->consumoAlcoholDia;
    }

    public function setConsumoAlcoholDia(string $consumoAlcoholDia) {
        $this->consumoAlcoholDia = $consumoAlcoholDia;
    }

    public function getIdentificadorConsumoDrogas() {
        return $this->identificadorConsumoDrogras;
    }

    public function setIdentificadorConsumoDrogas(bool $identificadorConsumoDrogras) {
        $this->identificadorConsumoDrogras = $identificadorConsumoDrogras;
    }

    public function getFechaIniConsumoDrogas() {
        return $this->fechaIniConsumoDrogas;
    }

    public function setFechaIniConsumoDrogas(DateTime $fechaIniConsumoDrogas) {
        $this->fechaIniConsumoDrogas = $fechaIniConsumoDrogas;
    }

    public function getFechaFinConsumoDrogas() {
        return $this->fechaFinConsumoDrogas;
    }

    public function setFechaFinConsumoDrogas(DateTime $fechaFinConsumoDrogas) {
        $this->fechaFinConsumoDrogas = $fechaFinConsumoDrogas;
    }

    public function getConsumoDrogasDia() {
        return $this->consumoDrogasDia;
    }

    public function setConsumoDrogasDia(string $consumoDrogasDia) {
        $this->consumoDrogasDia = $consumoDrogasDia;
    }

    public function toXML(DOMDocument $documento) {
        $segmento = $documento->createElement("Antecedentes", $this->antecedentesPersonales);
        $documento->appendChild($segmento);
    }

    public static function parseXML(DOMDocument $DOM, array $antecedentesPersonales = []) {
        if (sizeof($antecedentesPersonales) == 0) {
            return $DOM;
        }

        $component = $DOM->createElement('component', '');
        $DOM->getElementsByTagName('ClinicalDocument')[0]->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.4.38');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '29762-2');
        $code->setAttribute('displayName', 'Antecedentes no patológicos');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Antecendentes personales no patologicos');
        $section->appendChild($title);

        $antecedentesPersonalesContent = array_map(function ($antecedentesPersonal) {
            return $antecedentesPersonal->getAntecendetesPersonales();
        }, $antecedentesPersonales);

        $text = $DOM->createElement('text', implode("\n", $antecedentesPersonalesContent));
        $section->appendChild($text);

        $entry = $DOM->createElement('entry', '');
        $section->appendChild($entry);

        $observation = $DOM->createElement('observation', '');
        $observation->setAttribute('classCode', 'OBS');
        $observation->setAttribute('moodCode', 'EVN');
        $entry->appendChild($observation);

        $code1 = $DOM->createElement('code', '');
        $code1->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code1->setAttribute('codeSystemName', 'LOINC');
        $code1->setAttribute('code', '882-1');
        $code1->setAttribute('displayName', 'GRUPO ABO+RH');
        $observation->appendChild($code1);

        $effectiveTime = $DOM->createElement('effectiveTime', '');
        $effectiveTime->setAttribute('value', '--aaaammddhhiiss--');
        $observation->appendChild($effectiveTime);

        $value = $DOM->createElement('value', '');
        $value->setAttribute('xsi:type', 'CS');
        $value->setAttribute('code', '--Tipo de sangre y factor RH--');
        $observation->appendChild($value);

        $entry1 = $DOM->createElement('entry', '');
        $entry1->setAttribute('typeCode', 'DRIV');
        $section->appendChild($entry1);

        $observation1 = $DOM->createElement('observation', '');
        $entry1->appendChild($observation1);

        $id = $DOM->createElement('id', '');
        $id->setAttribute('root', '--identificador único por cada periodo de consumo de tabaco--');
        $observation1->appendChild($id);

        $code2 = $DOM->createElement('code', '');
        $code2->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code2->setAttribute('codeSystemName', 'SNOMED CT');
        $code2->setAttribute('code', '229819007');
        $code2->setAttribute('displayName', 'Uso y exposición al tabaco');
        $observation1->appendChild($code2);

        $statusCode = $DOM->createElement('statusCode', '');
        $statusCode->setAttribute('code', 'completed');
        $observation1->appendChild($statusCode);

        $effectiveTime1 = $DOM->createElement('effectiveTime', '');
        $observation1->appendChild($effectiveTime1);

        $low = $DOM->createElement('low', '');
        $low->setAttribute('value', '--Año de inicio como fumador--');
        $effectiveTime1->appendChild($low);

        $high = $DOM->createElement('high', '');
        $high->setAttribute('value', '--Año de término como fumador--');
        $effectiveTime1->appendChild($high);

        $value1 = $DOM->createElement('value', '--Cantidad de cajetillas por día--');
        $value1->setAttribute('xsi:type', 'ST');
        $observation1->appendChild($value1);

        $entry2 = $DOM->createElement('entry', '');
        $entry2->setAttribute('typeCode', 'DRIV');
        $section->appendChild($entry2);

        $observation2 = $DOM->createElement('observation', '');
        $observation2->setAttribute('classCode', 'OBS');
        $observation2->setAttribute('moodCode', 'EVN');
        $entry2->appendChild($observation2);

        $id1 = $DOM->createElement('id', '');
        $id1->setAttribute('root', '--identificador único por cada periodo de consumo de alcohol--');
        $observation2->appendChild($id1);

        $code3 = $DOM->createElement('code', '');
        $code3->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code3->setAttribute('codeSystemName', 'SNOMED CT');
        $code3->setAttribute('code', '160573003');
        $code3->setAttribute('displayName', 'Ingesta de Alcohol');
        $observation2->appendChild($code3);

        $statusCode1 = $DOM->createElement('statusCode', '');
        $statusCode1->setAttribute('code', 'completed');
        $observation2->appendChild($statusCode1);

        $effectiveTime2 = $DOM->createElement('effectiveTime', '');
        $observation2->appendChild($effectiveTime2);

        $low1 = $DOM->createElement('low', '');
        $low1->setAttribute('value', '--Año de inicio en el consumo de alcohol--');
        $effectiveTime2->appendChild($low1);

        $high1 = $DOM->createElement('high', '');
        $high1->setAttribute('value', '--Año de término/cambio en el consumo de alcohol--');
        $effectiveTime2->appendChild($high1);

        $value2 = $DOM->createElement('value', '--Cantidad de consumo de alcohol por día--');
        $value2->setAttribute('xsi:type', 'ST');
        $observation2->appendChild($value2);

        $entry3 = $DOM->createElement('entry', '');
        $entry3->setAttribute('typeCode', 'DRIV');
        $section->appendChild($entry3);

        $observation3 = $DOM->createElement('observation', '');
        $observation3->setAttribute('classCode', 'OBS');
        $observation3->setAttribute('moodCode', 'EVN');
        $entry3->appendChild($observation3);

        $id2 = $DOM->createElement('id', '');
        $id2->setAttribute('root', '--identificador único por cada periodo de consumo de drogas--');
        $observation3->appendChild($id2);

        $code4 = $DOM->createElement('code', '');
        $code4->setAttribute('codeSystem', '2.16.840.1.113883.6.96');
        $code4->setAttribute('code', '363908000');
        $code4->setAttribute('displayName', 'Ingesta de Alcohol');
        $observation3->appendChild($code4);

        $statusCode2 = $DOM->createElement('statusCode', '');
        $statusCode2->setAttribute('code', 'completed');
        $observation3->appendChild($statusCode2);

        $effectiveTime3 = $DOM->createElement('effectiveTime', '');
        $observation3->appendChild($effectiveTime3);

        $low2 = $DOM->createElement('low', '');
        $low2->setAttribute('value', '--Año de inicio en el consumo de drogas--');
        $effectiveTime3->appendChild($low2);

        $high2 = $DOM->createElement('high', '');
        $high2->setAttribute('value', '--Año de término/cambio en el consumo de drogas--');
        $effectiveTime3->appendChild($high2);

        $value3 = $DOM->createElement('value', '--Descripción del consumo de la sustancia--');
        $value3->setAttribute('xsi:type', 'ST');
        $observation3->appendChild($value3);

        return $DOM;
    }
}
