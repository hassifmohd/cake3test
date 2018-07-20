<?php
namespace App\Controller;

use Cake\Utility\Text;

class StudytextsController extends AppController
{
    public function index()
    {
        //Transliterate
        if (0) {
            $result = Text::transliterate('apple purée');
            pr($result);

            $result = Text::transliterate('apple purée', 'Latin-ASCII;');
            pr($result);
        }

        //URL Safe Strings
        if (0) {
            $result = Text::slug('apple purée'); //default is dash
            pr($result);

            //can change replacement is underscore, got 2 way of doing it
            $result = Text::slug('apple purée', '_');
            pr($result);

            $result = Text::slug('apple purée', [
                'replacement' => '_',
            ]);
            pr($result);

            //prserve a dot .
            $result = Text::slug('apple purée aur.pérfume', [
                'preserve' => '.',
                'replacement' => '|',
            ]);
            pr($result);
        }

        //Generating UUID
        if (0) {
            $result = Text::uuid();
            pr($result);
        }

        //Simple String Parsing - tokenize
        if (0) {

            //as per tutorial
            $data = "cakephp 'great framework' php";
            $result = Text::tokenize($data, ' ', "'", "'");
            pr($result);

            //CSV data eg: table users
            $data = "1,Mr Wong,wong@gmail.com,admin";
            $result = Text::tokenize($data, ',');
			pr($result);
			
			//CSV bracket data eg: articles tags
			$data = "(cat),(funny),(top-page),(sponsored content)";
            $result = Text::tokenize($data, ',');
			pr($result);
			
			//CSV bracket data using bound. Without bound 'top' and 'page' will be separated
			$data = "(cat),(funny),,(top,page),(sponsored,content)";
            $result = Text::tokenize($data, ',', '(', ')');
			pr($result);
		}
		
		//Simple String Parsing - parseFileSize
		if (1) {
			$result = Text::parseFileSize('2GB');
            pr($result);
		}
    }
}
