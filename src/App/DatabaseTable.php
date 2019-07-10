<?php
namespace App;
/**
 *
 *  Create basic CRUD SQL statements and execute against table
 * 
 *  __construct(PDO, tableName, primaryKey)
 *
 *  Constructor Example: 
 *   
 *    $priceTable = new DatabaseTable($pdo, 'price', 'container');
 *
 *
 *  Public Methods:
 *      
 *  getAll() : returns all records in the table
 *
 *  findById($value) : returns record with primary key = $value
 *
 *  deleteById($value) : deletes record with primary key = $value
 *
 *  insert($fields) : inserts one record into the table
 *      
 *      $fields: associative array with column names => values
 *      example: 
 *          $fields = [ 
 *             'container' => 'hanging basket',
 *             'retail' => 18.00,
 *             'wholesale' => 12.00 
 *         ]
 *          
 *   update($fields) : updates record specified in array
 *  
 */


class DatabaseTable {
    private $pdo;           // mysql PDO connection
    private $table;         // name of mySql database table
    private $primaryKey;    // primary key for mySql table

    public function __construct(\PDO $pdo, string $table, string $primaryKey) 
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;

    }

    private function query($sql, $parameters = [])
    {
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);
        return $query;
    }
    public function getAll() {

        $sql = 'SELECT * FROM`' . $this->table . '`;';

        $result = $this->query($sql);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById($value) {
        $sql = 'SELECT * FROM `'
            . $this->table . '` WHERE `'
            . $this->primaryKey . '` = :value';
        $parameters = [ ':value' => $value];

        $result = $this->query($sql, $parameters);

        return $result->fetch();          
    }

    public function insert($fields) 
    {
        // build the sql inesrt query
        $sql = 'INSERT INTO `' . $this->table . '` (';

        // add column names 
        foreach ($fields as $key => $value) {
            $sql .= '`' . $key . '`,';
        }

        $sql = rtrim($sql, ',');

        // add values to insert
        $sql .= ') VALUES (';
  
        foreach ($fields as $key => $value) {
            $sql .= ':' . $key . ',';
        }
        $sql = rtrim($sql, ',');
        $sql .= ')';

        $result = $this->query($sql, $fields);

        return $result->rowCount();
    }
    public function update($fields) {

        $sql = 'UPDATE `' . $this->table . '` SET';

        foreach ($fields as $key => $value) {
            $sql .= '`' . $key . '` = :' . $key . ',';
        }
        $sql = rtrim($sql, ',');
        $sql .= ' WHERE `' . $this->primaryKey . '` = :primaryKey';

        // set 'primaryKey', 
        // placeholders must be unique
        // already used actual column name in SET clause

        $fields['primaryKey'] = $fields[$this->primaryKey];


        $result = $this->query($sql, $fields);

        return $result->rowCount();
    }

    public function deleteById($value) {
        $sql = 'DELETE FROM `'
            . $this->table . '` WHERE `'
            . $this->primaryKey . '` = :value';
        $parameters = [ ':value' => $value];
        $result = $this->query($sql, $parameters);
    }
}