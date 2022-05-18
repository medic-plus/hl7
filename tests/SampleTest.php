<?php

namespace Medicplus\HL7\Tests;

use Medicplus\HL7\Config;
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
}
