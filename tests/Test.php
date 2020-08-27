<?php

namespace Tests;
include_once dirname(__FILE__) . '/../config/config.php';
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testTrue(){
        $this->assertEquals(true,true);
    }
    public function testPreu(){
        $this->assertEquals(preu(array('metal' => 'Gold' , 'format' => 'Coin' ,  'quantity' => 2)),3600);
        $this->assertEquals(preu(array('metal' => 'Silver' , 'format' => 'Bar' ,  'quantity' => 2000)), 26*2000/31.1);
    }
}
