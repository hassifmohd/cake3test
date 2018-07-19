<?php
namespace App\Controller;

use Cake\Validation\Validator;
use Cake\Validation\ValidationSet;

class StudyvalidationsController extends AppController
{
    var $validator;
    
    private function trysubmit( $data)
    {
        $errors = $this->validator->errors($data);
        pr($data);
        if (empty($errors)) {
            pr("No error");
        } else {
            pr($errors);
        }
    }
    
    public function index()
    {
        
        $this->validator = new Validator();
        $this->validator->requirePresence('title', true, 'content is required');
        $this->validator->requirePresence('content', true, 'content is required');
        
        //all OK
        if (0) {
            $data = [
                'title' => "HELLO WORLD",
                'content' => "This is a test"
            ];
            $this->trysubmit($data);
        }
        
        //content is missing V1
        if (0) {
            $data = [
                'title' => "HELLO WORLD"
            ];
            $this->trysubmit($data);
            
            //if requirePresence is set, then "notEmpty" validator applied by default
            $data = [
                'title' => "",
                'content' => ""
            ];
            $this->trysubmit($data);
        }
        
        //content is missing V2
        if (0) {
            
            //cannot by empty
            $this->validator->notEmpty('title', 'title cannot be empty', false);
            $data = [
                'title' => "",
                'content' => "TEST"
            ];
            $this->trysubmit($data);
            
            //allow empty
            $this->validator->notEmpty('title', null, true);
            $data = [
                'title' => "",
                'content' => "TEST"
            ];
            $this->trysubmit($data);
            
            //content cannot empty
            $this->validator->allowEmpty('content', false, 'content cannot be empty');
            $data = [
                'title' => "TEST",
                'content' => ""
            ];
            $this->trysubmit($data);
            
            //content can empty
            $this->validator->allowEmpty('content', true);
            $data = [
                'title' => "TEST",
                'content' => ""
            ];
            $this->trysubmit($data);
        }
        
        //utility
        if (0) {
            //check validation implemented
            pr($this->validator->field('content'));

            //adding new validation and see it
            $this->validator->alphaNumeric('content');
            pr($this->validator->field('content'));

            //this only remove "rule" such as alphaNumeric
            //allowEmpty and requirePresence is not rule so it will not be removed
            $this->validator->remove('content', 'alphaNumeric'); //remove specific rules
            $this->validator->offsetUnset('content'); //remove all rules
            pr($this->validator->field('content'));
            
            //TODO
            /* sameAs <-- check field1 and field2 is the same or not
             * greaterThanField
             * notSameAs
             * equalToField <-- ??
             * notEqualToField
             * greaterThanField
             * greaterThanOrEqualToField
             * lessThanField
             * lessThanOrEqualToField
             */

            //count total rules and see all rules
            pr("TOTAL RULES = " . $this->validator->count());
            pr($this->validator->getIterator());
        }
        
        //explore how many type of validation exists V1
        if (0) {
            $this->validator = new Validator();
            
            //study notBlank VS notEmpty
            $this->validator->notBlank('title', 'cannot be blank', 'create');
            $this->validator->notEmpty('content', 'cannot be empty', 'create'); //see in details at "getIterator()"
            
            //see the summary
            pr($this->validator->getIterator());
            
            //seems like notBlank and notEmpty is the same
            $data = [
                'title' => "",
                'content' => ""
            ];
            $this->trysubmit($data);
            
            //but actually not, see example below
            //notBlank is a RULE, notEmpty is a VALIDATION
            pr("Blank checking seems like will trim(...) first then evaluate");
            $data = [
                'title' => " ",
                'content' => " "
            ];
            $this->trysubmit($data);
            
            //1 thing to notice, if there is no content.requirePresence, then content.notEmpty will not be executed
            $data = [];
            $this->trysubmit($data);
            
            //using blank rule will automatically set notempty
            $data = [
                'title' => ""
            ];
            $this->trysubmit($data);
            
            //
            $data = [
                'content' => ""
            ];
            $this->trysubmit($data);
        }
        
        //explore how many type of validation exists V2
        if (0) {
            
            //from V1, lets make use of what we understand so far
            $this->validator = new Validator();
            $this->validator->requirePresence('password', true, 'please enter password');
            $this->validator->notEmpty('password', 'cannot be empty');
            $this->validator->notBlank('password', 'cannot be blank');
            $this->validator->alphaNumeric('password', 'must be alpha-numeric', 'create');
            
            $data = [];
            $this->trysubmit($data);
            
            $data = ['password' => ""];
            $this->trysubmit($data);
            
            //as you can see alphaNumeric rule not executed if they did not pass requirePresence & notEmpty
            //but after they pass, rule notBlank and alphaNumeric will excuted
            $data = ['password' => " "];
            $this->trysubmit($data);
            
            //Note that this is alphaNumeric checker, means ABC OR 123 is allowed. Else, NOPE
            //OK
            $data = ['password' => "HELLOWORLD"];
            $this->trysubmit($data);
            
            //OK
            $data = ['password' => "HELLO1234"];
            $this->trysubmit($data);
            
            //OK
            $data = ['password' => "1234"];
            $this->trysubmit($data);
            
            //NOPE because spacebar (special character are not allowed too)
            $data = ['password' => "HELLO 1234"];
            $this->trysubmit($data);
        }
        
        //explore how many type of validation exists V3
        if (0) {
            
            $this->validator = new Validator();
            $this->validator->lengthBetween('password', [4, 6], 'must be between 4 to 6');
            
            //this is why "requirePresence" is important
            $data = [];
            $this->trysubmit($data);
            
            $data = ['password' => ""];
            $this->trysubmit($data);
            
            $data = ['password' => " "];
            $this->trysubmit($data);
            
            //NOPE
            $data = ['password' => "123"];
            $this->trysubmit($data);
            
            //OK
            $data = ['password' => "123456"];
            $this->trysubmit($data);
            
            //NOPE
            $data = ['password' => "1234567"];
            $this->trysubmit($data);
            
            //Other validation that lazy to explore
            /*
             * 
             * 
             * 
             * uploadedFile
             * minLengthBytes
             * maxLengthBytes
             * 
             * alphaNumeric
             * containsNonAlphaNumeric
             * ascii
             * utf8
             * utf8Extended
             * regex
             * minLength
             * maxLength
             * 
             * date
             * dateTime
             * time
             * localizedTime
             * 
             * numeric
             * decimal
             * naturalNumber
             * nonNegativeInteger
             * integer
             * greaterThan
             * greaterThanOrEqual
             * lessThan
             * lessThanOrEqual
             * equals
             * notEquals
             * 
             * url
             * urlWithProtocol
             * 
             * 
             * latLong
             * latitude
             * longitude
             * 
             * 
             * DATA TYPE
             * uuid
             * isArray
             * scalar
             * hexColor
             * creditCard
             * email
             * boolean
             * ip
             * ipv4
             * ipv6
             * 
             * multipleOptions
             * hasAtLeast
             * hasAtMost
             * range
             * inList
             */
        }
        
        //Utility V2
        if (1) {
            
            /*
             * isEmptyAllowed
             * isPresenceRequired
             */
        }
    }
}
