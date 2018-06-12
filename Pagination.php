<?php
namespace Vagatec\util;

use Vagatec\interfaces\DatabaseInterface;

class Pagination
{
    private $conn;
    private $table;
    private $itemsAmount;
    private $itemsPerPage;
    private $pagesAmount;
    private $startSearching;
    private $sql;
    private $where;

    public function __construct(DatabaseInterface $conn, string $table, int $itemsPerPage, string $where = "")
    {
        $this->conn = $conn;
        $this->table = $table;
        $this->itemsPerPage = $itemsPerPage;
        $this->where = $where;
        $this->buildSQL();
        $this->itemsAmount = $this->getItemsAmount();
        $this->pagesAmount = $this->getPagesAmount();
        $this->currentPage = $this->getCurrentPage();
        $this->startSearching = $this->offsetRule();
        $this->setSQLLimit();
    }

    private function getItemsAmount() : int
    {
        $this->conn->query($this->sql);

        return $this->conn->resultNumber();
    }

    public function getPagesAmount() : int
    {
        return ceil($this->itemsAmount / $this->itemsPerPage);
    }

    private function buildSQL()
    {
        if(!empty($this->where)) {
            $this->sql = "SELECT * FROM " . $this->table . " WHERE " . $this->where;
            return;
        } 
        $this->sql = "SELECT * FROM " . $this->table;
    }

    public function getCurrentPage() : int
    {
        if(!isset($_GET['page']) || empty($_GET['page'])) {
            return 1;
        } 
        return $_GET['page'];
    }

    private function offsetRule() : int
    {
        return ($this->getCurrentPage() - 1) * $this->itemsPerPage;
    }

    private function setSQLLimit()
    {
        $this->sql .= " LIMIT " . $this->startSearching . ", " . $this->itemsPerPage;
    }

    public function getSQL() : string
    {
	    return $this->sql;
    }
}
