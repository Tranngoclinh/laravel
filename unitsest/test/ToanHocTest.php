<?php
namespace Test;
use PHPUnit\Framework\TestCase;
use App\ToanHoc;
class ToanHoctTest extends TestCase
{
    public function testToanHoc1()
    {
        $obj = new ToanHoc();
        $output =  $obj->sum(5,6);
        $Expected_output = 11;
        $this->assertEquals($output,$Expected_output);
    }
    public function testToanHoc2()
    {
        $obj = new ToanHoc();
        $output =  $obj->sum(10,6);
        $Expected_output = 16;
        $this->assertEquals($output,$Expected_output);

    }

    public function testToanHoc3()
    {
        $obj = new ToanHoc();
        $output =  $obj->minus(10,6);
        $Expected_output = 4;
        $this->assertEquals($output,$Expected_output);

    }

    public function testToanHoc4()
    {
        $obj = new ToanHoc();
        $output =  $obj->minus(1050,50);
        $Expected_output = 1000;
        $this->assertEquals($output,$Expected_output);
    }

    public function testToanHoc5()
    {
        $obj = new ToanHoc();
        $output =  $obj->core(2,4);
        $Expected_output = 8;
        $this->assertEquals($output,$Expected_output);
    } 
      public function testToanHoc6()
    {
        $obj = new ToanHoc();
        $output =  $obj->core(10,10);
        $Expected_output = 100;
        $this->assertEquals($output,$Expected_output);
    }
}