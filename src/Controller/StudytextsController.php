<?php

namespace App\Controller;

use Cake\Utility\Text;

class StudytextsController extends AppController {

    public function index() {
        
        //getTransliteratorId
        if (0) {
            $result = Text::getTransliteratorId();
            pr($result);
        }
        
        //Transliterate
        if (0) {
            $result = Text::transliterate('apple purée');
            pr($result);

            $result = Text::transliterate('apple purée', 'Latin-ASCII;');
            pr($result);
            
            $result = Text::transliterate('Übérmensch');
            pr($result);

            $result = Text::transliterate('Übérmensch', 'Latin-ASCII;');
            pr($result);

            $result = Text::transliterate('こんにちは', 'Latin-ASCII;');
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

            //preserve a dot .
            $result = Text::slug('apple purée aur.pérfume', [
                'preserve' => '.',
                'replacement' => '|',
            ]);
            pr($result);

            //preserve a dot .
//            $result = Text::slug('apple purée aur.pérfume', [
//                'preserve' => ['.'], <-- will not work. did not support multiple preserve
//                'replacement' => '+',
//            ]);
//            pr($result);
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
        if (0) {
            $result = Text::parseFileSize('2GB');
            pr($result);
        }

        //insert
        if (0) {
            $result = Text::insert(
                'My name is :name and I am :age years old.',
                ['name' => 'Bob', 'age' => '65']
            );
            pr($result);
            
            $result = Text::insert(
                'My name is |name| and I am |age| years old.',
                ['name' => 'Rob', 'age' => '40'],
                ['before' => '|', 'after' => '|'] //extra options
            );
            pr($result);
            
            //clean insert
            $options = [
                'clean' => [
//                    'method' => 'text',
                    'method' => 'html',
                ],
                'before' => ':',
                'after' => ''
            ];
            
            $result = Text::insert(
                'My name is :name and I am :age years old.',
                ['name' => 'Bob']
            );
            pr($result);
            
            $result = Text::insert(
                'My name is :name and I am :age years old.',
                ['name' => 'Red'],
                $options
            );
            pr($result);
            
            $result = Text::cleanInsert('My name is :name and I am :age years old.', $options);
            pr($result);
            
            $options = [
                'clean' => [
                    'method' => 'html',
                ],
                'before' => ':',
                'after' => ''
            ];
            
            $result = Text::cleanInsert('My <br/> name is <b>:name</b> and I am :age years old.', $options);
            pr($result);
            
            $result = Text::insert(
                '<b>Boom :name :age Room</b>',
                ['name' => 'Ted'],
                $options
            );
            pr($result);
        }
        
        //Wrapping Text
        //https://book.cakephp.org/3.0/en/core-libraries/text.html#wrapping-text
        if (1) {
            $text = 'This is a song that never ends.';
            
            $result = Text::wrap($text, 22);
            pr($result);
            
            $result = Text::wrap($text, [
                'width' => 10
            ]);
            pr($result);
            
            $result = Text::wrap($text, [
                'width' => 22,
                'wordWrap' => false
            ]);
            pr($result);
            
            $result = Text::wrap($text, [
                'width' => 22,
                'wordWrap' => true,
                'indent' => '+'
            ]);
            pr($result);
            
            $result = Text::wrap($text, [
                'width' => 22,
                'wordWrap' => true,
                'indent' => '+',
                'indentAt' => 1
            ]);
            pr($result);
            
            $result = Text::wrap($text, [
                'width' => 10,
                'wordWrap' => true,
                'indent' => '+',
                'indentAt' => 2
            ]);
            pr($result);
            
            $result = Text::wrap($text, [
                'width' => 10,
                'wordWrap' => true,
                'indent' => 'continue... ',
                'indentAt' => 1
            ]);
            pr($result);
            
            $result = Text::wrap('2019-03', [
                'width' => 4,
                'wordWrap' => '-'
            ]);
            pr($result);
            
            //some interesting example differences between tokenize & wordWrap
            $yearMonth = '2017-03';
//            $yearMonth = '201703';
//            $yearMonth = '2017Feb';
//            $yearMonth = '2017April';
            $result = Text::tokenize($yearMonth, '-');
            pr($result);
            
            $result = Text::wordWrap($yearMonth, 4, '-', true);
            pr($result);
        }
    }

}
