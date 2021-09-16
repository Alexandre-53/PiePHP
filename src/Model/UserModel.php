<?php
use \Core\ORM;

namespace Model {
    class UserModel extends Entity{
        public $bdd;
        public $id;
        public $user;
        public $password;

        public function __construct($user,$password){
            $this->user = $user;
            $this->password = $password;
        }
        public function add(){
            
        }
    }
}