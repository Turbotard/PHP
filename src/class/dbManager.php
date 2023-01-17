<?php 

require_once __DIR__ . '/DbObject.php';

/**
 * La classe DbManager doit pouvoir gérer n'importe quelle table de votre base de donnée
 * 
 * Complétez les fonctions suivantes pour les faires fonctionner
 */

class DbManager {
    private $db;

    function __construct(PDO $db) {
        $this->db = $db;
    }

    // return l'id inseré
    function insert(string $sql, array $data) {
        $var = $this->db->prepare($sql);
        $var->execute($data);
        return $this->db->lastInsertId();
    }

    function insert_advanced(DbObject $dbObj) {

    }

    function select(string $sql, array $data, string $className) {
        $var = $this->db->prepare($sql);
        $var->execute($data);
        $var->setFetchMode(PDO::FETCH_CLASS, $className);
        $variable = $var->fetchAll();
        return $variable;
    }

    function getById(string $tableName, $id, string $className) {
        $var = $this->db->prepare('SELECT * FROM '.$tableName.' WHERE id = ?');
        $var->execute([$id]);
        $var->setFetchMode(PDO::FETCH_CLASS, $className);
        $variable = $var->fetchAll();
        return $variable;
    }

    function getById_advanced($id, string $className) {
    }

    function getBy(string $tableName, string $column, $value, string $className) {
        $var = $this->db->prepare('SELECT * FROM '.$tableName.' WHERE '.$column.' = ?');
        $var->execute([$value]);
        $var->setFetchMode(PDO::FETCH_CLASS, $className);
        $variable = $var->fetchAll();
        return $variable;
    }

    function getBy_advanced(string $column, $value, string $className) {

    }

    function removeById(string $tableName, $id) {
        $var = $this->db->prepare('DELETE FROM $tableName WHERE id = ?');
        $var->execute([$id]);
    }

    function update(string $tableName, array $data) {
        $sql = 'UPDATE '.$tableName.' SET ';
        foreach($data as $clef => $value){
            if ($clef != 'id'){
                $sql = $sql.$clef.'=:'.$clef.', ';
            }
        }
        $sql = substr($sql,0,-2);
        var_dump($sql);
        $req = $this->db->prepare($sql.' WHERE id=:id');
        $req->execute($data);
    }

    function update_advanced(DbObject $dbObj) {
        
    }

}