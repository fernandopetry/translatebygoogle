<?php

namespace Petry\Translate;

use Petry\Translate\Locale\en_US;
use Petry\Translate\Locale\pt_BR;

class TranslateTest extends \PHPUnit_Framework_TestCase
{
    public function testTranslateEnglish()
    {
        $txtSource = "Eu te amo";
        $txtExpected = "I love you";

        $translate = new Translate($txtSource, new pt_BR, new en_US());

        $this->assertEquals($txtExpected, $translate->getTranslate());
    }
}
