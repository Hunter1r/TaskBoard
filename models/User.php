<?php
	include_once 'DB.php';

	class User {

        public function getUser ($login,$pass) {
            $res = DB::GetRow('SELECT id,pass FROM users WHERE name = :name', ['name' => $login]);
            if ($res){
                if ($res['pass']==$pass){
                    return $res;
                }else return false;
            }else return false;
        }

        public function findUser($name,$mail){
            $res = DB::GetRow('SELECT * FROM users WHERE name = :name and mail = :mail', ['name' => $name,'mail'=>$mail]);
            if ($res){
                return $res;
            }else return false;
        }
        public function createUser($name,$mail){
            $res = DB::Insert('INSERT INTO users (`name`, `mail`)  VALUES (:name, :mail)', ['name' => $name, 'mail' => $mail]);
            if ($res){
                return $res;
            }else return false;
        }

        public function getUserWithoutPass ($name) {
            return DB::GetRow('SELECT * FROM users WHERE name = :name', ['name' => $name]);
        }

		public function isLogIn(){
		    if(isset($_COOKIE['name'])){
		        return $this->getUserWithoutPass($_COOKIE['name']);
            }else {
                return false;
            }
        }

        public function isAdmin(){
		    $usr = $this->isLogIn();
		    if($usr){
                return DB::GetRow('SELECT * FROM users WHERE name = :name', ['name' => $usr['name']]);
            }else{
		        return 0;
            }
        }

		public function logout () {
            setcookie('name','',time()-3600);
            setcookie('pass','',time()-3600);
		}
	}
?>