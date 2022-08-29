<?php

namespace Medicplus\HL7;

use DOMDocument;
use Medicplus\HL7\Segments\Alergias;
use Medicplus\HL7\Segments\AntecedentesHeredofamiliares;
use Medicplus\HL7\Segments\AntecedentesNoPatologicos;
use Medicplus\HL7\Segments\AntecedentesPatologicos;
use Medicplus\HL7\Segments\DatosDestinarios;
use Medicplus\HL7\Segments\Diagnosticos;
use Medicplus\HL7\Segments\Discapacidades;
use Medicplus\HL7\Segments\Evolucion;
use Medicplus\HL7\Segments\ImpresionDiagnostica;
use Medicplus\HL7\Segments\Medicamentos;
use Medicplus\HL7\Segments\MedicamentosAdministrados;
use Medicplus\HL7\Segments\MotivoReferencia;
use Medicplus\HL7\Segments\PlanTratamiento;
use Medicplus\HL7\Segments\Procedimientos;
use Medicplus\HL7\Segments\PronosticosSalud;
use Medicplus\HL7\Segments\ResultadosEstudios;
use Medicplus\HL7\Segments\SignosVitales;
use Medicplus\HL7\Segments\Sintomatologia;

/**
 * Documento HL7
 *
 * @author  Ivan Vasquez  <ivanvasquezp@outlook.com>
 * @author  Omar Acuña
 */
class DocumentParser {

    private Documento $documento;
    private DOMDocument $DOM;
    private \Medicplus\HL7\Config $config;

    /**
     * DocumentParser constructor
     *
     * @param \Medicplus\HL7\Config $config
     */
    public function __construct(?Config $config, ?Documento $documento) {
        $this->documento = $documento ?? new Documento();
        $this->config = $config ?? new Config();
        $this->resetDOM();
    }

    public function resetDOM() {
        $this->DOM = new DOMDocument('1.0', 'UTF-8');
        $this->DOM->preserveWhiteSpace = false;
        $this->DOM->formatOutput = true;
        $clinicalDocument = $this->DOM->createElement('ClinicalDocument', '');
        $clinicalDocument->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $clinicalDocument->setAttribute('xsi:schemaLocation', 'urn:hl7-org:v3 cda/CDA.xsd');
        $clinicalDocument->setAttribute('xmlns:mif', 'urn:hl7-org:v3/mif');
        $clinicalDocument->setAttribute('xmlns', 'urn:hl7-org:v3');
        $this->DOM->appendChild($clinicalDocument);
    }

    public function getDOM(): DOMDocument {
        return $this->DOM;
    }

    public function getDocumento(): Documento {
        return $this->documento;
    }

    public function setDocumento(Documento $documento) {
        $this->documento = $documento;
        $this->resetDOM();
    }

    public function parseAlergias() {
        if (sizeof($this->documento->getAlergias()) > 0) {
            $this->DOM = Alergias::parseXML($this->DOM, $this->documento->getAlergias());
        }
    }

    public function parseAntecedentesHeredofamiliares() {
        if (sizeof($this->documento->getAntecedentesHeredofamiliares()) > 0) {
            $this->DOM = AntecedentesHeredofamiliares::parseXML($this->DOM, $this->documento->getAntecedentesHeredofamiliares());
        }
    }

    public function parseAntecedentesNoPatologicos() {
        if (sizeof($this->documento->getAntecedentesPersonales()) > 0) {
            $this->DOM = AntecedentesNoPatologicos::parseXML($this->DOM, $this->documento->getAntecedentesPersonales());
        }
    }

    public function parseAntecedentesPatologicos() {
        if (sizeof($this->documento->getAntecedentesPatologicos()) > 0) {
            $this->DOM = AntecedentesPatologicos::parseXML($this->DOM, $this->documento->getAntecedentesPatologicos());
        }
    }

    public function parseDatosDestinarios() {
        if (sizeof($this->documento->getDatosDestinarios()) > 0) {
            $this->DOM = DatosDestinarios::parseXML($this->DOM, $this->documento->getDatosDestinarios());
        }
    }

    public function parseDiagnostico() {
        if (sizeof($this->documento->getDiagnosticos()) > 0) {
            $this->DOM = Diagnosticos::parseXML($this->DOM, $this->documento->getDiagnosticos());
        }
    }

    public function parseDiscapacidades() {
        if (sizeof($this->documento->getDiscapacidades()) > 0) {
            $this->DOM = Discapacidades::parseXML($this->DOM, $this->documento->getDiscapacidades());
        }
    }

    public function parseEvolucion() {
        if (sizeof($this->documento->getEvolucionPaciente()) > 0) {
            $this->DOM = Evolucion::parseXML($this->DOM, $this->documento->getEvolucionPaciente());
        }
    }

    public function parseImpresionDiagnostica() {
        if (sizeof($this->documento->getImpresionDiagnostica()) > 0) {
            $this->DOM = ImpresionDiagnostica::parseXML($this->DOM, $this->documento->getImpresionDiagnostica());
        }
    }

    public function parseMedicamentos() {
        if (sizeof($this->documento->getDescripcionMedicamentosPrevios()) > 0) {
            $this->DOM = Medicamentos::parseXML($this->DOM, $this->documento->getDescripcionMedicamentosPrevios());
        }
    }

    public function parseMedicamentosAdministrados() {
        if (sizeof($this->documento->getMedicamentoAdministrado()) > 0) {
            $this->DOM = MedicamentosAdministrados::parseXML($this->DOM, $this->documento->getMedicamentoAdministrado());
        }
    }

    public function parseMotivoReferencia() {
        if (sizeof($this->documento->getMotivoReferencia()) > 0) {
            $this->DOM = MotivoReferencia::parseXML($this->DOM, $this->documento->getMotivoReferencia());
        }
    }

    public function parsePlanTratamiento() {
        if (sizeof($this->documento->getPlanTratamientoTerapeuticas()) > 0) {
            $this->DOM = PlanTratamiento::parseXML($this->DOM, $this->documento->getPlanTratamientoTerapeuticas());
        }
    }

    public function parseProcedimientos() {
        if (sizeof($this->documento->getProcedimiento()) > 0) {
            $this->DOM = Procedimientos::parseXML($this->DOM, $this->documento->getProcedimiento());
        }
    }

    public function parsePronosticosSalud() {
        if (sizeof($this->documento->getPronosticoSalud()) > 0) {
            $this->DOM = PronosticosSalud::parseXML($this->DOM, $this->documento->getPronosticoSalud());
        }
    }

    public function parseResultadosEstudios() {
        if (sizeof($this->documento->getResultados()) > 0) {
            $this->DOM = ResultadosEstudios::parseXML($this->DOM, $this->documento->getResultados());
        }
    }

    public function parseSignosVitales() {
        if (sizeof($this->documento->getSignosVitales()) > 0) {
            $this->DOM = SignosVitales::parseXML($this->DOM, $this->documento->getSignosVitales());
        }
    }

    public function parseSintomatologia() {
        if (sizeof($this->documento->getManifestacionIniciales()) > 0) {
            $this->DOM = Sintomatologia::parseXML($this->DOM, $this->documento->getManifestacionIniciales());
        }
    }

    public function toXML() {
        $this->parseAlergias();
        $this->parseAntecedentesHeredofamiliares();
        $this->parseAntecedentesNoPatologicos();
        $this->parseAntecedentesPatologicos();
        $this->parseDatosDestinarios();
        $this->parseDiagnostico();
        $this->parseDiscapacidades();
        $this->parseEvolucion();
        $this->parseImpresionDiagnostica();
        $this->parseMedicamentos();
        $this->parseMedicamentosAdministrados();
        $this->parseMotivoReferencia();
        $this->parsePlanTratamiento();
        $this->parseProcedimientos();
        $this->parsePronosticosSalud();
        $this->parseResultadosEstudios();
        $this->parseSignosVitales();
        $this->parseSintomatologia();
        return $this->DOM->saveXML();
    }
}