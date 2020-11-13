<?php


	class Task {

	    public function getTasks(){
	        return DB::Select("SELECT list.id as task_id, user_id,text, ok, edited, name as user_name, mail as user_mail FROM tasks.list
left join users on list.user_id = users.id");
        }

        public function getCountTasks(){
            return DB::Update ("SELECT id FROM list");
        }

        public function getTasksWithParam($offset,$sort, $taskPerPage){
            return DB::Select("SELECT list.id as task_id, user_id,text, ok, edited, name as user_name, mail as user_mail FROM tasks.list
left join users on list.user_id = users.id order by ". $sort ." LIMIT ". $offset . " , " .$taskPerPage);

//            return DB::Select("SELECT list.id as task_id, user_id,text, ok, edited, name as user_name, mail as user_mail FROM tasks.list
//left join users on list.user_id = users.id order by :sort LIMIT :paramOffset,:taskPerPage",['sort'=>$sort,'paramOffset'=>$offset,':taskPerPage'=>$taskPerPage]);

        }

        public function createTask ($userId,$text) {
            $res = DB::Insert("INSERT INTO list (user_id, text) VALUES (:user_id,:text)",['user_id'=>$userId,'text'=>$text]);
            if ($res){
                return $res;
            }else false;
        }

        public function updateTaskDesc ($taskId,$text,$edited) {
            $res = DB::Update("UPDATE list SET text = :text, edited = :edited WHERE id = :task_id",
                array('text'=>$text,'task_id'=>$taskId,'edited'=>$edited));
            if ($res){
                return $res;
            }else false;
        }

        public function updateDoneTask ($taskId,$done) {
            $res = DB::Update('UPDATE list SET ok = :checked WHERE id = :task_id ',['checked'=>$done,'task_id'=>$taskId]);
            if ($res){
                return $res;
            }else false;
        }

	}

?>