<?php

namespace Core\Database\Traits;

use Core\Database\DBConnection\DBConnection;

trait HasCRUD
{
    protected function setFillabels($array)
    {
        $fillables = [];
        foreach ($this->fillable as $attribute) {
            array_push($fillables, $attribute . " = ?");
            $this->setValue($attribute, $array[$attribute]);
        }
        return implode(', ', $fillables);
    }

    protected function insert($array)
    {
        $this->setSql("INSERT INTO {$this->table} SET " . $this->setFillabels($array) . "," . $this->createdAt . "=Now();");
        $this->executeQuery();
        $this->resetQuery();
    }

    public function update($array)
    {
        $this->setSql("UPDATE " . $this->table . " SET " . $this->setFillabels($array) . ", " . $this->updatedAt . "=Now()");
        $this->setWhere("AND ", $this->primaryKey . " = ?");
        $this->setValue($this->primaryKey, $this->{$this->primaryKey});
        $this->executeQuery();
        $this->resetQuery();
        return $this;
    }

    public function find($id){
        $this->setSql("SELECT * FROM ".$this->table);
        $this->setWhere("AND" , $this->primaryKey . " = ? ");
        $this->setValue($this->primaryKey, $id);
        $statement = $this->executeQuery();
        $data = $statement->fetch();
        if($data){
            return $this->setAttributes($data);
        }else{
            return null;
        }
    }
    
}
