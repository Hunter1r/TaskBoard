<?php
session_start();
class C_index extends C_Base{

    static $sort;

    function __construct()
    {
        $this->title = '';
        $this->content = '';
        $this->alertSuccess = 0;
    }

    public function action_index(){

        $this->title = 'Task board';
        $task = new Task();

        $classUser = new User();
        $isAdmin = $classUser->isAdmin();


        if (isset($_GET['sort'])){
            $_SESSION['sort'] = strip_tags($_GET['sort']);
        }


        if (isset($_GET['taskId'])){

            $taskId = (int)$_GET['taskId'];

            if (isset($_POST['taskDescription'])){
                $text = strip_tags($_POST['taskDescription']);
                if ($isAdmin){
                    $task->updateTaskDesc($taskId,$text,1);
                }else {
                    header("location:index.php?c=page&act=authorize");
                }
            }
        }

        if (isset($_POST['task_id']) && isset($_POST['checked'])){
            $t_id = $_POST['task_id'];
            $t_done = $_POST['checked'];
            $task->updateDoneTask($t_id,$t_done);
        }

        if (isset($_GET['pageId'])){
            $currentPage = (int)$_GET['pageId'];
        }else $currentPage = 1;

        $taskPerPage = 3;
        $totalTasks = $task->getCountTasks();
        $totalPages = ceil($totalTasks / $taskPerPage);
        $offset = (int)(($currentPage - 1) * $taskPerPage);


        if (isset($_SESSION['sort'])){
            $sort = strip_tags($_SESSION['sort']);
        }else $sort = "user_name asc";

        $taskArr = $task->getTasksWithParam($offset,$sort,$taskPerPage);
        $paramArray = array('content'=>$taskArr,'param'=>['totalPages'=>$totalPages,'currentPage'=>$currentPage,'isAdmin'=>$isAdmin]);
        $this->content = $this->Template('views/v_taskBoard.php', array('title'=>$this->title,'content' => $paramArray));
    }

    public function action_addTask(){
        $this->title = 'New Task';
        $this->content = $this->Template("views/v_newTask.php",array('title'=>$this->title));

    }
    public function action_newTask(){
        if ($this->IsPost()){
                if (isset($_POST['task'])){
                    $name = strip_tags($_POST['task']['name']);
                    $mail = $_POST['task']['mail'];
                    $text = strip_tags($_POST['task']['text']);
                    $classUser = new User();
                    $user = $classUser->findUser($name,$mail);
                    if (empty($user)) {
                        $newUser = $classUser->createUser($name, $mail);
                        if ($newUser){
                            $user = $classUser->findUser($name,$mail);
                        }
                    }
                    if ($user){
                        $classTask = new Task();

                        $newTask = $classTask->createTask($user['id'],$text);
                        if ($newTask){
                            //обновить список задач
                            //показать сообщение об успешном создании задачи
                            $this->alertSuccess = 1;
                            $this->action_index();
                        }else {
                            //показать сообщение об неуспешном создании задачи
                            $this->alertSuccess = 2;
                            $this->action_index();
                        }
                    }

                }
        }
    }



    public function action_authorize(){
        $this->title = 'Authorization';
        $this->content = $this->Template("views/v_authorize.php",array('title'=>$this->title));
    }

    public function action_logout(){
        $usr = new User();
        $usr->logout();
        //$this->title = 'Task board';
        //$this->content = $this->Template("views/v_authorize.php",array('title'=>$this->title));
        header("location:index.php");
    }


}