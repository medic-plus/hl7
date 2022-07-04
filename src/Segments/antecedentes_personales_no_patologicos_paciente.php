<?php

namespace Medicplus\HL7\Segments;

use DateTime;
use DOMDocument;
use Medicplus\HL7\Segments\Catalogos\TipoSangre;

class antecedentes_personales_no_patologicos_paciente {
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

    public function __construct(string $antecedentesPersonales, DateTime $fechaTipoSangre = null, TipoSangre $tipoSangre = null, bool $identificadorTabaquismo, DateTime $fechaIniTabaquismo = null, DateTime $fechaFinTabaquismo = null, int $cajetillasDia, bool $identificadorAlcoholisnmo, DateTime $fechaIniAlcoholismo = null, DateTime $fechaFinAlcoholismo = null, string $consumoAlcoholDia, bool $identificadorConsumoDrogras, DateTime $fechaIniConsumoDrogas = null, DateTime $fechaFinConsumoDrogas = null, string $consumoDrogasDia) {
        $this->antecedentesPersonales = $antecedentesPersonales;
        $this->fechaTipoSangre = $fechaTipoSangre;
        $this->tipoSangre = $tipoSangre;
        $this->identificadorTabaquismo = $identificadorTabaquismo;
        $this->fechaIniTabaquismo = $fechaIniTabaquismo;
        $this->fechaFinTabaquismo = $fechaFinTabaquismo;
        $this->cajetillasDia = $cajetillasDia;
        $this->identificadorAlcoholisnmo = $identificadorAlcoholisnmo;
        $this->fechaIniAlcoholismo = $fechaIniAlcoholismo;
        $this->fechaFinAlcoholismo = $fechaFinAlcoholismo;
        $this->consumoAlcoholDia = $consumoAlcoholDia;
        $this->identificadorConsumoDrogras = $identificadorConsumoDrogras;
        $this->fechaIniConsumoDrogas = $fechaIniConsumoDrogas;
        $this->fechaFinConsumoDrogas = $fechaFinConsumoDrogas;
        $this->consumoDrogasDia = $consumoDrogasDia;
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

    public static function noPatologicosXML() {
        $documento = new DOMDocument('1.0', 'UTF-8');
        $documento->formatOutput = true;
        $documento->preserveWhiteSpace = false;
        $documentoElement = $documento->createElement('component', '');
        $documentoElement1 = $documento->createElement('section', '');
        $documentoElement2 = $documento->createElement('title', '');
        $documentoElement3 = $documento->createElement('text', '');
        $documentoElement4 = $documento->createElement('paragraph', 'Tipo de sangre: --Tipo de sangre--');
        $documentoElement5 = $documento->createElement('table', '');
        $documentoElement6 = $documento->createElement('thead', '');
        $documentoElement7 = $documento->createElement('tr', '');
        $documentoElement8 = $documento->createElement('th', 'Tabaquismo');
        $documentoElement9 = $documento->createElement('tr', '');
        $documentoElement10 = $documento->createElement('th', 'Fecha de inicio');
        $documentoElement11 = $documento->createElement('th', 'Fecha de fin');
        $documentoElement12 = $documento->createElement('th', 'Cigarros por dia');
        $documentoElement13 = $documento->createElement('tbody', '');
        $documentoElement14 = $documento->createElement('tr', '');
        $documentoElement15 = $documento->createElement('td', 'Fecha de inicio del habito en formato "aaaammddhhiiss"');
        $documentoElement16 = $documento->createElement('td', 'Fecha de termino del habito en formato "aaaammddhhiiss"');
        $documentoElement17 = $documento->createElement('td', 'Cantidad de cigarros consumido por dia');
        $documentoElement18 = $documento->createElement('table', '');
        $documentoElement19 = $documento->createElement('thead', '');
        $documentoElement20 = $documento->createElement('tr', '');
        $documentoElement21 = $documento->createElement('th', 'Alcoholismo');
        $documentoElement22 = $documento->createElement('td', 'Cantidad de cigarros consumido por dia');
        $documentoElement23 = $documento->createElement('tr', '');
        $documentoElement24 = $documento->createElement('th', 'Fecha de inicio');
        $documentoElement25 = $documento->createElement('th', 'Fecha de fin');
        $documentoElement26 = $documento->createElement('th', 'Consumo');
        $documentoElement27 = $documento->createElement('tbody', '');
        $documentoElement28 = $documento->createElement('tr', '');
        $documentoElement29 = $documento->createElement('td', 'Fecha de inicio del habito en formato "aaaammddhhiiss"');
        $documentoElement30 = $documento->createElement('td', 'Fecha de termino del habito en formato "aaaammddhhiiss"');
        $documentoElement31 = $documento->createElement('td', 'Cantidad de alcohol consumido por dia');
        $documentoElement32 = $documento->createElement('table', '');
        $documentoElement33 = $documento->createElement('thead', '');
        $documentoElement34 = $documento->createElement('tr', '');
        $documentoElement35 = $documento->createElement('th', 'Consumo de otras sustancias');
        $documentoElement36 = $documento->createElement('tr', '');
        $documentoElement37 = $documento->createElement('th', 'Fecha de inicio');
        $documentoElement38 = $documento->createElement('th', 'Fecha de fin');
        $documentoElement39 = $documento->createElement('th', 'Consumo');
        $documentoElement40 = $documento->createElement('tbody', '');
        $documentoElement41 = $documento->createElement('tr', '');
        $documentoElement42 = $documento->createElement('td', 'Fecha de inicio del habito en formato "aaaammddhhiiss"');
        $documentoElement43 = $documento->createElement('td', 'Fecha de termino del habito en formato "aaaammddhhiiss"');
        $documentoElement44 = $documento->createElement('td', 'Cantidad de alcohol consumido por dia');
        $documentoElement45 = $documento->createElement('paragraph', 'Otros antecedentes personales no patologicos en texto libre');
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
        $documento->appendChild($documentoElement15);
        $documento->appendChild($documentoElement16);
        $documento->appendChild($documentoElement17);
        $documento->appendChild($documentoElement18);
        $documento->appendChild($documentoElement19);
        $documento->appendChild($documentoElement20);
        $documento->appendChild($documentoElement21);
        $documento->appendChild($documentoElement22);
        $documento->appendChild($documentoElement23);
        $documento->appendChild($documentoElement24);
        $documento->appendChild($documentoElement25);
        $documento->appendChild($documentoElement26);
        $documento->appendChild($documentoElement27);
        $documento->appendChild($documentoElement28);
        $documento->appendChild($documentoElement29);
        $documento->appendChild($documentoElement30);
        $documento->appendChild($documentoElement31);
        $documento->appendChild($documentoElement32);
        $documento->appendChild($documentoElement33);
        $documento->appendChild($documentoElement34);
        $documento->appendChild($documentoElement35);
        $documento->appendChild($documentoElement36);
        $documento->appendChild($documentoElement37);
        $documento->appendChild($documentoElement38);
        $documento->appendChild($documentoElement39);
        $documento->appendChild($documentoElement40);
        $documento->appendChild($documentoElement41);
        $documento->appendChild($documentoElement42);
        $documento->appendChild($documentoElement43);
        $documento->appendChild($documentoElement44);
        $documento->appendChild($documentoElement45);
    }
}

antecedentes_personales_no_patologicos_paciente::noPatologicosXML();
