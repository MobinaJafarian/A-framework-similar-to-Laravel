<?php

namespace Core\Database\Traits;

use Core\Database\DBConnection\DBConnection;

trait HasQueryBuilder
{
    private $sql = '';
    protected $where = [];
    private $orderBy = [];
    private $limit = [];
    private $values = [];
    private $bindValues = [];

    protected function getSql(): string
    {
        return $this->sql;
    }

    protected function setSql(string $sql): void
    {
        $this->sql = $sql;
    }

    protected function resetSql()
    {
        $this->sql = "";
    }

    protected function setWhere($operator, $condition)
    {

        $array = ['operator' => $operator, 'condition' => $condition];
        array_push($this->where, $array);

    }

    protected function resetWhere()
    {
        $this->where = [];
    }

    protected function setOrderBy($attribute, $expression)
    {
        array_push($this->orderBy, $attribute . ' ' . $expression);
    }

    protected function resetOrderBy()
    {
        $this->orderBy = [];
    }

    protected function setLimit($offset, $number)
    {
        $this->limit['offset'] = (int) $offset;
        $this->limit['number'] = (int) $number;
    }

    protected function resetLimit()
    {
        unset($this->limit['offset']);
        unset($this->limit['number']);
    }

    protected function setValue($attribute, $value)
    {
        $this->values[$attribute] = $value;
        array_push($this->bindValues, $value);

    }

    protected function resetValues()
    {
        $this->values = [];
        $this->bindValues = [];
    }

    protected function resetQuery()
    {
        $this->resetSql();
        $this->resetWhere();
        $this->resetValues();
        $this->resetLimit();
        $this->resetOrderBy();
    }

    protected function executeQuery()
    {
        $query = "";
        $query .= $this->sql;

        if (!empty($this->where)) {

            // WHERE id=10 AND cat_id=12
            // WHERE id=10
            $whereQuery = "";
            foreach ($this->where as $where) {
                $whereQuery == "" ? $whereQuery .= $where['condition'] : $whereQuery .= ' ' . $where['operator'] . " " . $where['condition'];
            }

            $query .= " WHERE " . $whereQuery;

        }

        // ORDER BY id , DESC
        if (!empty($this->orderBy)) {
            $query .= ' ORDER BY ' . implode(', ', $this->orderBy);
        }

        // LIMIT 10 OFFSET 4
        if (!empty($this->limit)) {
            $query .= ' LIMIT ' . $this->limit['number'] . ' OFFSET ' . $this->limit['offset'];
        }

        $query .= " ;";
        echo $query . '<hr>/';

        $pdoInstance = DBConnection::getDBConnectionInstance();
        $statement = $pdoInstance->prepare($query);

        // WHERE id>10 AND id=20 AND cat_id =2
        // $this->values = [id=>20 , cat_id=>2]
        // $this->bindValues = [ 0=>11 ,1=>20, 2=>2 ]

        if (sizeof($this->bindValues) > sizeof($this->values)) {
            sizeof($this->bindValues) > 0 ? $statement->execute($this->bindValues) : $statement->execute();
        } else {
            sizeof($this->values) > 0 ? $statement->execute(array_values($this->values)) : $statement->execute();
        }
        return $statement;

    }
}
