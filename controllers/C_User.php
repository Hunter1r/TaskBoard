<?php


	class C_User extends C_Base {

        public function action_login() {
            if($this->isPost()) {

                $user = new User();
                $res = $user->getUser($_POST['login'],$_POST['pass']);
                if (!empty($res)){
                    setcookie("name",$_POST['login'],time()+3600);
                    setcookie("pass",$_POST['pass'],time()+3600);

                    //$this->content = $this->Template('views/v_authorize.php');
                    header("location:index.php");
                }else {
                    //пользователь не найден

                    $this->title = "Authorization";
                    $this->alertSuccess = 3;

                    $this->content = $this->Template('views/v_authorize.php',array('title'=>$this->title,'alertSuccess'=>$this->alertSuccess));
                }
            }
        }


		public function action_logout() {
            if(isset($_COOKIE['name'])){
                $name = $_COOKIE['name'];
            }
            if(isset($_COOKIE['pass'])){
                $pass = $_COOKIE['pass'];
            }

            if (!empty($name) && !empty($pass)){
                $logout = new User();
                $logout->logout();
                header("location:index.php");
            }



		}

	}
?>