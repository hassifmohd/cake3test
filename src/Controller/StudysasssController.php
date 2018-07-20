<?php
namespace App\Controller;

class StudysasssController extends AppController
{
    public function index()
    {
        //set default layout into cake3test/src/Template/Layout/sass.ctp that 
        //using custom css at cake3test/webroot/css/hello_sass.css
        $this->layout = 'sass';
    }
}
