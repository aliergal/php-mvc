<?php

class Task_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function add() 
    {
        $task = $_POST['task'];
        
        $this->db->insert('tasks', array('task' => $task));
        
        $result = array('task' => $task, 'id' => $this->db->lastInsertId());
        echo json_encode($result);
    }
    
    public function getAll()
    {
        $result = $this->db->select("SELECT * FROM tasks");
        echo json_encode($result);
    }
    
    public function delete()
    {
        $id = (int) $_POST['id'];
        $this->db->delete('tasks', "id = '$id'");
    }

}