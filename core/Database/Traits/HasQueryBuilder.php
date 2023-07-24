<?php

namespace Core\Database\Traits;

use Core\Database\DBConnection\DBConnection;

trait HasQueryBuilder
{
    private $sql = '';
    private $where = [];
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

}
