<?php 

namespace Example\Model;

use m4\m4mvc\core\Model;

class Todo extends Model 
{

  public function install ($path)
  {
    fopen($path, 'w');
    $sql = "CREATE TABLE todos (
      id INTEGER PRIMARY KEY,
      title TEXT,
      state TEXT
    );";
    $this->save($sql);
  }

  public function list ()
  {
    return $this->fetchAll("SELECT * from todos");
  }

  public function create ($todo)
  {
    $this->save(
      'INSERT INTO todos (title, state) VALUES (:title, :state)',
      ['title' => $todo, 'state' => 0]
    );
  }

  public function toggle ($id)
  {
    return $this->save(
      'UPDATE todos SET state = 1 - state WHERE id = :id',
      ['id' => $id]
    );
  }

  public function delete ($id)
  {
    return $this->save(
      'DELETE FROM todos WHERE id = :id',
      ['id' => $id]
    );
  }
}