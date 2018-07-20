<?php 
use Cake\Validation\Validator;

class Teval
{
    public $validator;
    
    public $Html;
    
    public $counterValdo = 1;
    
    function __construct( $htmlHelper)
    { 
        $this->validator = new Validator();
        $this->Html = $htmlHelper;
    }
    
    function reset()
    {
        $this->validator = new Validator();
        $this->counterValdo = 1;
    }
    
    function valdo($data)
    {
        //
        echo $this->Html->tag('div', "==Example " . $this->counterValdo . "==");
        $this->counterValdo++;
        
        //
        pr($data);
        $errors = $this->validator->errors($data);
        if (empty($errors)) {
            pr("No errors");
        }
        else {
            pr($errors);
        }
    }
}

$teval = new Teval($this->Html);
    
?>

<table border="1">
    <tr>
        <th style="width: 150px;"></th>
        <th style="width: 200px;"></th>
        <th>OUTPUT</th>
    </tr>
    
    <!-- DATE -->
    <tr>
        <td>DATE</td>
        <td>date</td>
        <td><?php 
            $teval->reset();
            $teval->validator->date('created', ['ymd'], 'date format must be ymd');
            $teval->valdo(['created' => "2018-10-25"]);
            $teval->valdo(['created' => "10-25-2018"]);
            $teval->valdo(['created' => "2018-25-10"]);
            $teval->valdo(['created' => "HELLO"]);
            $teval->valdo(['created' => "20181025"]);
            $teval->valdo(['created' => "2018.10.25"]);
            $teval->valdo(['created' => "2018-10.25"]);
            $teval->valdo(['created' => "181025"]);
            $teval->valdo(['created' => "18-October-25"]);
            $teval->valdo(['created' => "2018-October-25"]);
        ?></td>
    </tr>
    
    <!-- STRING -->
    <tr>
        <td>STRING</td>
        <td>containsNonAlphaNumeric</td>
        <td><?php 
            $teval->reset();
            $teval->validator->containsNonAlphaNumeric('title', 2, 'please insert at least 2 non-alpha-numeric characters');
            $teval->valdo(['title' => "HELLO-WORLD"]); //dash is not alpha-numeric
            $teval->valdo(['title' => "HELLO-WORLD-HI"]);
        ?></td>
    </tr>
    <tr>
        <td>STRING</td>
        <td>ascii</td>
        <td><?php 
            $teval->reset();
            $teval->validator->ascii('title', 'please enter only ascii');
            $teval->valdo(['title' => "HELLO 1234 %^&*"]);
            $teval->valdo(['title' => "apple purée"]);
        ?></td>
    </tr>
    <tr>
        <td>STRING</td>
        <td>regex</td>
        <td><?php 
            $teval->reset();
            $teval->validator->regex('title', '%^[A-Z ]+$%', 'only uppercase is allowed');
            $teval->valdo(['title' => "hello world"]);
            $teval->valdo(['title' => "HELLO WORLD"]);
        ?></td>
    </tr>
    <tr>
        <td>STRING</td>
        <td>minLength</td>
        <td><?php 
            $teval->reset();
            $teval->validator->minLength('title', 5, 'at least 5 characters');
            $teval->valdo(['title' => "hi"]);
            $teval->valdo(['title' => "hello"]);
        ?></td>
    </tr>
    <tr>
        <td>STRING</td>
        <td>maxLength</td>
        <td><?php 
            $teval->reset();
            $teval->validator->maxLength('title', 5, 'more than 5 characters is not allowed');
            $teval->valdo(['title' => "hello world"]);
            $teval->valdo(['title' => "hello"]);
        ?></td>
    </tr>
</table>
