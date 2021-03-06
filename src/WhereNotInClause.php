<?php
namespace WPQueryBuilder;

class WhereNotInClause implements WhereClause {

    private $column;
    private $value1;
    private $value2;

    public function __construct($column, $values){
        $this->column = $column;
        $this->bindings = $values;
    }

    public function buildSql() {
        $inList = '(' . implode(', ', array_fill(0, count($this->bindings), '%s')) . ')';
        return implode(' ', [$this->column, "NOT IN", $inList]);
    }

    public function getBindings(){
        return $this->bindings;
    }

}
