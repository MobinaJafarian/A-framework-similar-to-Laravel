<?php 

namespace Core\Database\Traits;

use Core\Database\DBConnection\DBConnection;

trait HasQueryBuilder
{
    private $sql = '';

    public function getSql(): string{
        return $this->sql;
    }
    
    public function setSql(string $sql): void {
        $this->sql = $sql;
    }

    public function resetSql()
    {
        $this->sql = "";
    }
}