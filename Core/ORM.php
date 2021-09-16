<?php

namespace Core;

use \Core\Database;

class ORM
{

    //RECHERCHE FILM PAR NOM 
    public static function seekfilmall($col, $table, $join, $value1, $value2, $where, $name)
    {
        $query = "SELECT $col FROM $table LEFT JOIN $join ON $value1 = $value2 WHERE $where LIKE ?";
        $pdo = Database::getInstance();
        $statement = $pdo->prepare($query);
        $statement->execute(array("%".$name."%"));
        return $statement;
    }

    //RECHERCHE MEMBRE PAR NOM ET PRENOM
    public static function findmemberall($col, $table, $value, $name, $value2, $name2)
    {
        $query = "SELECT $col FROM $table WHERE $value LIKE ? AND $value2 LIKE ?";
        $pdo = Database::getInstance();
        $statement = $pdo->prepare($query);
        $statement->execute(array("%".$name."%","%".$name2."%"));
        return $statement;
    }
        
    //RECHERCHE MEMBRE PAR NOM OU PRENOM
    public static function findmember($col, $table, $value, $name)
    {
        $query = "SELECT $col FROM $table WHERE $value LIKE ?";
        $pdo = Database::getInstance();
        $statement = $pdo->prepare($query);
        $statement->execute(array("%".$name."%"));
        return $statement;
    }

    public static function create($table, $fields)
    {
        $valuesText  = implode(",", array_fill(0, count($fields), "?"));
        //crée un tableau de x elements et le rempli avec la valeur specifiée
        $columnText = implode(",", array_keys($fields));
        //crée une chaine de charactère avec les clés de notre tableauséparées par des virgules
        // INSERT INTRO users (email, password) VALUES (? , ?)
        $query = "INSERT INTO $table ($columnText) VALUES ($valuesText)";
        $pdo = Database::getInstance();
        $statement =$pdo->prepare($query);
        try {
            $statement->execute(array_values($fields));
        } catch (Exeption $e) {
        }
        return $statement;
    }

    public static function find($table, $params)
    {
        $column = "*";// La valeur par défault
        if (array_key_exists("column", $params)===true) {
            $column = $params['column'];
            //Si la clée pour "column" existe dans le tableau params la
            //valeur par défault est changée par la valeur de la clée column
        }
        $query = "SELECT $column FROM $table";
        if (array_key_exists("where", $params)===true) {
            //Remplace toute les clées du tableau where par des ?
            $arrCols = [];//colonne suivi de = et ?
            $arrVals = [];//valeur des colonnes
            foreach ($params["where"] as $key => $value) {
                array_push($arrCols, "$key=?");
                array_push($arrVals, $value);
            }
            $columnText = implode(" AND ", $arrCols);
            $query.= " WHERE $columnText";
        }
        
        $pdo = Database::getInstance();
        $statement = $pdo->prepare($query);
        $statement->execute($arrVals);
        return $statement;
    }

    public static function update($table, $params, $fields)
    {
        $columns = [];
        $values = [];
        foreach ($fields as $key => $value) {
            array_push($columns, "$key=?");
            array_push($values, $value);
        }
        $columnsText = implode(",", $columns);
        $query = "UPDATE $table set $columnsText";
        if (array_key_exists("where", $params) === true) {
            // Remplace toute les clees du tableau "where" par des "?"
            // ["email" => "tset", password => "test"]
            // "email = ? AND password = ?"
            $arrCols = []; // colonnes suivi de = et ?
            foreach ($params["where"] as $key => $value) {
                array_push($arrCols, "$key=?");
                array_push($values, $value);
            }
            $columnsText = implode(" AND ", $arrCols);
            $query .= " WHERE $columnsText";
        }
        $pdo = Database::getInstance();
        $statement = $pdo->prepare($query);
        $statement->execute($values);
        return $statement;
    }

    public static function delete($table, $params)
    {
        $query = "DELETE FROM $table";
        if (array_key_exists("where", $params)===true) {
            //Remplace toute les clées du tableau where par des ?
            $arrCols = [];//colonne suivi de = et ?
            $arrVals = [];//valeur des colonnes
            foreach ($params["where"] as $key => $value) {
                array_push($arrCols, "$key=?");
                array_push($arrVals, $value);
            }
            $columnText = implode(" AND ", $arrCols);
            $query.= " WHERE $columnText";
            $pdo = Database::getInstance();
            $statement =$pdo->prepare($query);
            $statement->execute($arrVals);
            return $statement;
        }
    }
}
