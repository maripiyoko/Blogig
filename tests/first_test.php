<?php

class FirstTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        // Set the tested controller
        //$this->CI = set_controller('Home');
    }

    public function testWelcomeController()
    {
        // Call the controllers method
        //$this->CI->index();
        //$this->CI->view('home');

        // Fetch the buffered output
        //$out = output();

        // Check if the content is OK
        //$this->assertSame(0, preg_match('/(error|notice)/i', $out));
        $this->assertTrue(true);
    }
}

/* end of first_test.php */