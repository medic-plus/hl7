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
        $DOM->appendChild($component);

        $section = $DOM->createElement('section', '');
        $component->appendChild($section);

        $templateId = $DOM->createElement('templateId', '');
        $templateId->setAttribute('root', '2.16.840.1.113883.10.20.22.4.38');
        $section->appendChild($templateId);

        $code = $DOM->createElement('code', '');
        $code->setAttribute('codeSystem', '2.16.840.1.113883.6.1');
        $code->setAttribute('codeSystemName', 'LOINC');
        $code->setAttribute('code', '29762-2');
        $code->setAttribute('displayName', 'Antecedentes no patologicos');
        $section->appendChild($code);

        $title = $DOM->createElement('title', 'Antecedentes personales no patologicos');
        $section->appendChild($title);

        $antecedentesPersonalesContent = array_map(function ($antecedentesPersonal) {
            return $antecedentesPersonal->getAntecendetesPersonales();
        }, $antecedentesPersonales);

        $text = $DOM->createElement('text', implode("\n", $antecedentesPersonalesContent));
        $section->appendChild($text);
        return $DOM;
    }
}
