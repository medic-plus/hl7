<?php

namespace Medicplus\HL7\Tests;

use Medicplus\HL7\Config;
use Medicplus\HL7\Documento;
use Medicplus\HL7\HL7;
use Medicplus\HL7\Sample;

/**
 * Class SampleTest
 *
 * @category Test
 * @package  Medicplus\HL7\Tests
 * @author   Ivan Vasquez <ivanvasquezp@outlook.com>
 */
class SampleTest extends TestCase {

    public function testSayHello() {
        $config = new Config();
        $sample = new Sample($config);
        $name = 'MedicPlus';
        $result = $sample->sayHello($name);
        $expected = $config->get('greeting') . ' ' . $name;
        $this->assertEquals($result, $expected);
    }

    public function testSayHello2() {
        $config = new Config();
        $sample = new HL7($config);
        $name = 'MedicPlus';
        $result = $sample->sayHello($name);
        $expected = $config->get('greeting') . ' ' . $name;
        $this->assertEquals($result, $expected);
    }

    public function testDocumento() {
        $doc = new Documento();
        $expected = file_get_contents("./tests/files/empty.xml");
        $this->assertEquals($expected, $doc->toXML());
    }
}