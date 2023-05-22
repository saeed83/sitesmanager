<?php

class Welcome_test extends TestCase{
    public function test_index(){
        $output = $this->request('GET','main/index');
        $this->assertContains('<title>Test done ah',$output);
    }
}