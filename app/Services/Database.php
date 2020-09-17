<?php

namespace App\Services;

use Aura\SqlQuery\QueryFactory;
use PDO;

class Database
{

    private $queryFactory;

    private $pdo;


    public function __construct(QueryFactory $queryFactory, PDO $pdo)
    {
        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;

    }//end __construct()


    // вывод списка всех задач из таблицы "tasks"
    public function all($table): array
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])->from($table);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $sth->fetchAll(PDO::FETCH_ASSOC);

    }//end all()


    // вывод списка задач пользователя постранично
    public function getPaginatedFrom($table, $row, $id, $page = 1, $rows = 1): array
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])->from($table)->where("$row = :row")->bindValue(':row', $id)->page($page)->setPaging($rows);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);

    }//end getPaginatedFrom()


    // подсчет количества задач у пользователя
    public function getCount($table, $row, $value): int
    {
        $select = $this->queryFactory->newSelect();
        ($select->cols(['*'])->from($table)->where("$row=:$row")->bindValue($row, $value));
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return count($sth->fetchAll(PDO::FETCH_ASSOC));

    }//end getCount()


    // объединение двух таблиц и вывод массива данных
    public function joinTables($data, $table, $tablePlus, $cond, $limit = null): array
    {
        $select = $this->queryFactory->newSelect();
        $select->cols($data)->from($table)->limit($limit)->join(
            'LEFT',
            $tablePlus,
            $cond
        );
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $sth->fetchAll(PDO::FETCH_ASSOC);

    }//end joinTables()


    // вывод одной задачи
    public function getOne($table, $id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])->from($table)->where('id = :id')->bindValues(['id' => $id]);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $sth->fetch(PDO::FETCH_ASSOC);

    }//end getOne()


    // сохранение новой задачи
    public function store($table, $data): void
    {
        $insert = $this->queryFactory->newInsert();
        $insert->into($table)->cols($data);
        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());

    }//end store()


    // изменение\обновление существующей задачи
    public function update($table, $id, $data): void
    {
        $update = $this->queryFactory->newUpdate();
        $update->table($table)->cols($data)->where('id=:id')->bindValue('id', $id);
        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());

    }//end update()


    // удаление задачи
    public function delete($table, $id): void
    {
        $delete = $this->queryFactory->newDelete();
        $delete->from($table)->where('id=:id')->bindValue('id', $id);
        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());

    }//end delete()


}//end class
