<?php

namespace Medicplus\HL7\Tests;

use Medicplus\HL7\Segments\Alergias;
use Medicplus\HL7\Config;
use Medicplus\HL7\Documento;
use Medicplus\HL7\DocumentParser;
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
 * Class SampleTest
 *
 * @category Test
 * @package  Medicplus\HL7\Tests
 * @author   Ivan Vasquez <ivanvasquezp@outlook.com>
 */
class DocumentoTest extends TestCase {

    static function exportDOM(?Documento $documento) {
        $config = new Config();
        $parser = new DocumentParser($config, $documento);
        return $parser->toXML();
    }

    public function testEmptyXML() {
        $documento = DocumentoTest::exportDOM(null);
        $expected = file_get_contents('./tests/files/empty.xml');
        $this->assertXmlStringEqualsXmlString($expected, $documento);
    }

    public function testAlergias() {
        $documento = new Documento();
        $alergia1 = new Alergias("Alergia prueba 1");
        $alergia2 = new Alergias("Alergia prueba 2");
        $documento->addAlergia($alergia1);
        $documento->addAlergia($alergia2);
        $expected = file_get_contents('./tests/files/segments/alergias.xml');
        $this->assertXmlStringEqualsXmlString($expected, DocumentoTest::exportDOM($documento));
    }

    // public function testAntecedentesHeredofamiliares() {
    //     $documento = new Documento();
    //     $AntecedenteHeredo = new AntecedentesHeredofamiliares("Prueba 1", 1, 1, 1);
    //     $documento->addAntecedenteHeredofamilia($AntecedenteHeredo);
    //     $expected = file_get_contents('./tests/files/segments/AntecedentesHeredofamiliares.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testAntecedentesNoPatologico() {
    //     $documento = new Documento();
    //     $noPatologico = new AntecedentesNoPatologicos("Prueba 1", "Prueba 2", 1000, "Prueba 4", "Prueba 5", "Prueba 6", "Prueba 7");
    //     $documento->addAntecedentesPersonal($noPatologico);
    //     $expected = file_get_contents('./tests/files/segments/antecedentesNoPatologicos.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testAntecedentesPatologicos() {
    //     $documento = new Documento();
    //     $Patologico = new AntecedentesPatologicos("Prueba 1", "Prueba 2");
    //     $documento->addAntecedentePatologico($Patologico);
    //     $expected = file_get_contents('./tests/files/segments/antecedentesPatologicos.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testDatosDestinarios() {
    //     $documento = new Documento();
    //     $datoDestinario = new DatosDestinarios("Prueba 1");
    //     $documento->addDatosAfiliacion($datoDestinario);
    //     $expected = file_get_contents('./tests/files/segments/afiliacionesPlanesAseguramiento.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testDiagnosticos() {
    //     $documento = new Documento();
    //     $diagnostico = new Diagnosticos("Prueba 1", 10, 1000, "Prueba 4", "Prueba 5");
    //     $documento->addDiagnosticos($diagnostico);
    //     $expected = file_get_contents('./tests/files/segments/diagnosticos.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testDiscapacidades() {
    //     $documento = new Documento();
    //     $discapacidad1 = new Discapacidades("Prueba 1", 123456);
    //     $documento->addDiscapacidades($discapacidad1);
    //     $expected = file_get_contents('./tests/files/segments/discapacidades.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testEvolucionPaciente() {
    //     $documento = new Documento();
    //     $evolucion = new Evolucion("Prueba 1");
    //     $documento->addEvolucionPaciente($evolucion);
    //     $expected = file_get_contents('./tests/files/segments/evolucion.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testImpresionDiagnostico() {
    //     $documento = new Documento();
    //     $impresion = new ImpresionDiagnostica("prueba 1");
    //     $documento->addImpresionDiagnostica($impresion);
    //     $expected = file_get_contents('./tests/files/segments/impresionDiagnostica.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testMedicamentos() {
    //     $documento = new Documento();
    //     $medicamentos = new Medicamentos("Prueba 1", "Prueba 2", "Prueba 3", "Prueba 4");
    //     $documento->addMedicamentoPrevio($medicamentos);
    //     $expected = file_get_contents('./tests/files/segments/medicamentos.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testMedicamentoAdministrativo() {
    //     $documento = new Documento();
    //     $medicamentoAdministrado = new MedicamentosAdministrados("prueba 1", "Prueba 2", "Prueba 3", "Prueba 4");
    //     $documento->addMedicamentoAdministrativo($medicamentoAdministrado);
    //     $expected = file_get_contents('./tests/files/segments/medicamentoAdministrado.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testMotivoReferencia() {
    //     $documento = new Documento();
    //     $motivoRefe = new MotivoReferencia("Prueba 1");
    //     $documento->addMotivoRerefencia($motivoRefe);
    //     $expected = file_get_contents('./tests/files/segments/motivoReferencia.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testPlanTratamiento() {
    //     $documento = new Documento();
    //     $PlanTratamiento1 = new PlanTratamiento("Prueba 1");
    //     $documento->addPlanTratamientoTerapeuticas($PlanTratamiento1);
    //     $expected = file_get_contents('./tests/files/segments/planTratamiento.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testProcedimientos() {
    //     $documento = new Documento();
    //     $Procedimiento1 = new Procedimientos("Prueba 1", "Prueba 2", 1234321, "Prueba 4", "Prueba 5", "Prueba 6", "Prueba 7");
    //     $documento->addProcedimientos($Procedimiento1);
    //     $expected = file_get_contents('./tests/files/segments/procedimientos.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testPronosticoSalud() {
    //     $documento = new Documento();
    //     $Pronostico1 = new PronosticosSalud("Prueba 1");
    //     $documento->addPronosticoSalud($Pronostico1);
    //     $expected = file_get_contents('./tests/files/segments/pronosticosSalud.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testResultadosEstudio() {
    //     $documento = new Documento();
    //     $Resultado1 = new ResultadosEstudios("Prueba 1", "Prueba 2", "Prueba 3", "Prueba 4", "Prueba 5", "Prueba 6", "Prueba 7", "Prueba 8");
    //     $documento->addResultadosEstudios($Resultado1);
    //     $expected = file_get_contents('./tests/files/segments/resultadosLaboratorio.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testSignosVitales() {
    //     $documento = new Documento();
    //     $SignoVital = new SignosVitales("Prueba 1", "Prueba 2", "Prueba 3");
    //     $documento->addSignosVitales($SignoVital);
    //     $expected = file_get_contents('./tests/files/segments/signosVitales.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }

    // public function testSintomatologia() {
    //     $documento = new Documento();
    //     $sintoma1 = new Sintomatologia("Prueba 1");
    //     $documento->addManifestacionInicial($sintoma1);
    //     $expected = file_get_contents('./tests/files/segments/sintomatologia.xml');
    //     $this->assertEquals($expected, DocumentoTest::exportDOM($documento));
    // }
}