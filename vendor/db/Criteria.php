<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 21-Apr-17
 * Time: 12:06 AM
 */
namespace vendor\db;
class Criteria
{
    protected $isStrict; // true/false - AND/OR
    protected $queryType; //SELECT/INSERT/UPDATE
    protected $query;
    protected $relations;
    public $one_result = false;
    protected $table;
    protected $currentModel; //Current model (using in save())
    protected $reqFields;
    protected $condition;
    protected $addCondition;
    protected $leftJoins;
    protected $innerJoins;
    protected $andwhere = false;
    protected $bind_param; //prevent sql injection
    public $orderBy;
    public $limit;
    public $offset;
    public $search = false;

    public function __construct($model, $queryType = 'SELECT', $isStrict = true, $reqFields = array())
    {
        if (is_object($model)) {
            $this->table = $model->tableName;
            $this->currentModel = $model;
            $this->relations = $model->tableRelations;
        } else {
            $this->table = $model;
            $this->currentModel = new $model;
        }
        $this->queryType = $queryType;
        $this->isStrict = $isStrict;
        foreach ($reqFields as $field) {
            $end = strpos($field, '.');
            if ($end === false) {
                $this->reqFields[] = $this->table . '.' . $field . ' AS ' . $this->table . '_' . $field;
            } else {
                $preffix = substr($field, 0, $end);
                $suffix = substr($field, $end + 1, strlen($field));
                $this->reqFields[] = $field . ' AS ' . $preffix . '_' . $suffix;
            }
        }
        if ($this->relations) {
            $this->innerJoins = $this->relations;
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * Điều kiện query
     * @param array <p>
     * The string to search in
     * </p>
     *
     **/

    //prevent sql injection
    public function condition($params,$operator=false)
    {

        if (!empty($params)) {
            if (array_key_exists($this->currentModel->tableKey, $params) && empty($this->relations)) {
                $this->one_result = true;
            }
            if($operator && $operator != '=')
                $this->one_result = false;
            foreach ($params as $key => $value) {
                $end = strpos($key, '.');
                if ($end === false) {
                    //$queryParams[$this->table . '.' . $key] = $value;
                    $queryParams = $params;
                } else {
                    $queryParams[$key] = $value;
                }
            }
            reset($queryParams); //Getting the first element of the array
            $firstKey = key($queryParams);

            //$this->condition = ' WHERE '.$firstKey.(isset($queryParams[$firstKey][1]) ? ' '.$queryParams[$firstKey][1].' ' : '=').'\''.$queryParams[$firstKey][0].'\'';
            if ($this->search && $this->andwhere == false){
                foreach ($queryParams as $key => $value){
                    if($value == '' || empty($value))
                        unset($queryParams[$key]);
                }
                reset($queryParams); //Getting the first element of the array
                $firstKey = key($queryParams);
                $this->bind_param = $queryParams;
                $this->condition = ' WHERE ' . $firstKey . ' LIKE ' . '% :' .$firstKey  . '%';

            }elseif ($operator && $this->andwhere == false){
                $this->bind_param = $queryParams;
                if($operator == 'IN'){
                    $this->condition = ' WHERE ' . $firstKey . ' '.$operator.' ' .  '(:'.$firstKey.')' ;
                }else
                $this->condition = ' WHERE ' . $firstKey . ' '.$operator.' ' . ':' . $firstKey;
            }
            elseif($this->andwhere == false){
                $this->bind_param = $queryParams;
                $this->condition = ' WHERE ' . $firstKey . ' = ' . ':' . $firstKey;
            }

            if(!$this->andwhere)
                unset($queryParams[$firstKey]); //Removing the first element of the array
            $this->andwhere = true;
            if ($this->search && !$operator) {
                $this->bind_param += $queryParams;
                foreach ($queryParams as $pkey => $pvalue) {

                    //$this->condition .= ' '.($this->isStrict ? 'AND ' : 'OR ').$pkey.(isset($pvalue[1]) ? ' '.$pvalue[1].' ' : '=\'').$pvalue[0].'\'';
                    $this->condition .= ' ' . ($this->isStrict ? 'AND ' : 'OR ') . $pkey . ' LIKE ' . '% :' . $pkey . '%';
                }
            }elseif ($operator && $this->andwhere){
                $this->bind_param += $queryParams;
                foreach ($queryParams as $pkey => $pvalue) {
                    //$this->condition .= ' '.($this->isStrict ? 'AND ' : 'OR ').$pkey.(isset($pvalue[1]) ? ' '.$pvalue[1].' ' : '=\'').$pvalue[0].'\'';
                    if($operator == 'IN'){
                        $this->condition .= ' ' . ($this->isStrict ? 'AND ' : 'OR ') . $pkey . ' '.$operator.'  :' . $pkey . ' ';
                    }else
                    $this->condition .= ' ' . ($this->isStrict ? 'AND ' : 'OR ') . $pkey . ' '.$operator.' :' . $pkey . '';
                }
            }
            else{
                $this->bind_param += $queryParams;
                foreach ($queryParams as $pkey => $pvalue) {
                    //$this->condition .= ' '.($this->isStrict ? 'AND ' : 'OR ').$pkey.(isset($pvalue[1]) ? ' '.$pvalue[1].' ' : '=\'').$pvalue[0].'\'';
                    $this->condition .= ' ' . ($this->isStrict ? 'AND ' : 'OR ') . $pkey . ' = :' . $pkey . '';
                }
            }

            // dd($this->condition);
        } else
            $this->condition = '';
    }
    public function condition_bk($params,$operator=false)
    {

        if (!empty($params)) {
            if (array_key_exists($this->currentModel->tableKey, $params) && empty($this->relations)) {
                $this->one_result = true;
            }
            if($operator && $operator != '=')
                $this->one_result = false;
            foreach ($params as $key => $value) {
                $end = strpos($key, '.');
                if ($end === false) {
                    $queryParams[$this->table . '.' . $key] = $value;
                } else {
                    $queryParams[$key] = $value;
                }
            }
            reset($queryParams); //Getting the first element of the array
            $firstKey = key($queryParams);
            $this->bind_param = $queryParams;
            //$this->condition = ' WHERE '.$firstKey.(isset($queryParams[$firstKey][1]) ? ' '.$queryParams[$firstKey][1].' ' : '=').'\''.$queryParams[$firstKey][0].'\'';
            if ($this->search && $this->andwhere == false){
                foreach ($queryParams as $key => $value){
                    if($value == '' || empty($value))
                        unset($queryParams[$key]);
                }
                reset($queryParams); //Getting the first element of the array
                $firstKey = key($queryParams);
                $this->condition = ' WHERE ' . $firstKey . ' LIKE ' . '"%' . $queryParams[$firstKey] . '%"';

            }elseif ($operator && $this->andwhere == false){
                if($operator == 'IN'){
                    $this->condition = ' WHERE ' . $firstKey . ' '.$operator.' ' .  $queryParams[$firstKey] ;
                }else
                    $this->condition = ' WHERE ' . $firstKey . ' '.$operator.' ' . '\'' . $queryParams[$firstKey] . '\'';
            }
            elseif($this->andwhere == false)
                $this->condition = ' WHERE ' . $firstKey . ' = ' . '\'' . $queryParams[$firstKey] . '\'';

            if(!$this->andwhere)
                unset($queryParams[$firstKey]); //Removing the first element of the array
            $this->andwhere = true;
            if ($this->search && !$operator)
                foreach ($queryParams as $pkey => $pvalue) {
                    //$this->condition .= ' '.($this->isStrict ? 'AND ' : 'OR ').$pkey.(isset($pvalue[1]) ? ' '.$pvalue[1].' ' : '=\'').$pvalue[0].'\'';
                    $this->condition .= ' ' . ($this->isStrict ? 'AND ' : 'OR ') . $pkey . ' LIKE ' .'"%' . $pvalue . '%"';
                }elseif ($operator && $this->andwhere){
                foreach ($queryParams as $pkey => $pvalue) {
                    //$this->condition .= ' '.($this->isStrict ? 'AND ' : 'OR ').$pkey.(isset($pvalue[1]) ? ' '.$pvalue[1].' ' : '=\'').$pvalue[0].'\'';
                    if($operator == 'IN'){
                        $this->condition .= ' ' . ($this->isStrict ? 'AND ' : 'OR ') . $pkey . ' '.$operator.'  ' . $pvalue . ' ';
                    }else
                        $this->condition .= ' ' . ($this->isStrict ? 'AND ' : 'OR ') . $pkey . ' '.$operator.'  \'' . $pvalue . '\'';
                }
            }
            else
                foreach ($queryParams as $pkey => $pvalue) {
                    //$this->condition .= ' '.($this->isStrict ? 'AND ' : 'OR ').$pkey.(isset($pvalue[1]) ? ' '.$pvalue[1].' ' : '=\'').$pvalue[0].'\'';
                    $this->condition .= ' ' . ($this->isStrict ? 'AND ' : 'OR ') . $pkey . ' = \'' . $pvalue . '\'';
                }
            // dd($this->condition);
        } else
            $this->condition = '';

    }
    public function addCondition($str = '')
    {
        $this->addCondition = $str;
    }

    public function leftJoins($relations = array())
    {
        if (!empty($relations)) {
            foreach ($relations as $key => $value) {
                $this->leftJoins[$key] = array($value[0], ucfirst($value[1]), $value[2]);
            }
        }
    }

    public function innerJoins($relations = array())
    {
        if (!empty($relations)) {
            foreach ($relations as $key => $value) {
                $this->innerJoins[$key] = array($value[0], ucfirst($value[1]), $value[2]);
            }
        }
    }

    private function buildJoins($relationArr, $relationType, $joinedQuery)
    {

        if (isset($relationArr[1])) {
            $obj = "application\models\\" . $relationArr[1];
            $joinedModel = new $obj();
            if (empty($this->reqFields)) {
                foreach ($joinedModel->tableFields as $fieldName => $fieldValue) {
                    $this->query .= ', ' . $joinedModel->tableName . '.' . $fieldName . ' AS ' . $joinedModel->tableName . '_' . $fieldName;
                }
            }
        }
        if ($relationArr[0] == 'HAS_ONE') {
            $joinedQuery .= ' ' . $relationType . ' JOIN ' . $joinedModel->tableName;
            $joinedQuery .= ' ON ' . $this->table . '.' . $this->currentModel->tableKey . '=' . $joinedModel->tableName . '.' . $relationArr[2];
        }
        if ($relationArr[0] == 'BELONGS_TO') {
            $joinedQuery .= ' ' . $relationType . ' JOIN ' . $joinedModel->tableName;
            $joinedQuery .= ' ON ' . $this->table . '.' . $relationArr[2] . '=' . $joinedModel->tableName . '.' . $joinedModel->tableKey;
        }
        if ($relationArr[0] == 'HAS_MANY') {
            $joinedQuery .= ' ' . $relationType . ' JOIN ' . $joinedModel->tableName;
            $joinedQuery .= ' ON ' . $this->table . '.' . $this->currentModel->tableKey . '=' . $joinedModel->tableName . '.' . $relationArr[2];
        }

        if ($relationArr[0] == 'MANY_MANY') {
            if (is_array($relationArr[2])) {
                $bundleTable = ucfirst($relationArr[2][0]);
                $currentTableKey = $relationArr[2][1];
                $joinedTableKey = $relationArr[2][2];

                $bundleModel = new $bundleTable();
                $joinedQuery .= ' ' . $relationType . ' JOIN ' . $bundleModel->tableName;
                $joinedQuery .= ' ON ' . $this->table . '.' . $this->currentModel->tableKey . '=' . $bundleModel->tableName . '.' . $currentTableKey;
                $joinedQuery .= ' ' . $relationType . ' JOIN ' . $joinedModel->tableName;
                $joinedQuery .= ' ON ' . $joinedModel->tableName . '.' . $joinedModel->tableKey . '=' . $bundleModel->tableName . '.' . $joinedTableKey;
            }
        }
        return $joinedQuery;
    }

    private function buildQuery()
    {
        if ($this->queryType == 'SELECT') {
            $this->query = $this->queryType;
            if (!empty($this->reqFields)) {
                if (!in_array($this->currentModel->tableKey, $this->reqFields)) {
                    $this->query .= ' ' . $this->table . '.' . $this->currentModel->tableKey . ' AS ' . $this->table . '_' . $this->currentModel->tableKey . ',';
                }
                $i = 1;
                foreach ($this->reqFields as $reqField) {
                    if ($i < count($this->reqFields)) {
                        $this->query .= ' ' . $reqField . ',';
                    } else {
                        $this->query .= ' ' . $reqField;
                    }
                    $i++;
                }
            } else {
                $i = 1;

                //foreach ($this->currentModel->tableFields as $key => $value) {
                /*if ($i<count($this->currentModel->tableFields)) {
                    $this->query .= ' '.$this->table.'.'.$key.' AS '.$this->table.'_'.$key.',';
                }
                else{
                    $this->query .= ' '.$this->table.'.'.$key.' AS '.$this->table.'_'.$key;
                }*/
                //$i++;
                // }
                $this->query .= ' *';
            }
            //JOIN's
            $joinedQuery = '';
            if (!empty($this->leftJoins)) {
                foreach ($this->leftJoins as $value) {
                    $joinedQuery = $this->buildJoins($value, 'LEFT', $joinedQuery);
                }
            }
            if (!empty($this->innerJoins)) {
                foreach ($this->innerJoins as $value) {
                    $joinedQuery = $this->buildJoins($value, 'INNER', $joinedQuery);
                }
            }

            $this->query .= ' FROM ' . $this->currentModel->tableName;
            $this->query .= $joinedQuery;
            $this->query .= $this->condition;
            //dd($this->query);
            $this->query .= ' ' . $this->addCondition;
            if (isset($this->orderBy))
                $this->query .= ' ' . 'ORDER BY ' . $this->orderBy;
            if (isset($this->limit)) {
                $this->query .= ' LIMIT ' . $this->limit;
            }

        } elseif ($this->queryType == 'SAVE') {
            //Removing the tied object's properties to avoid using it in INSERT/UPDATE commands
            // dd($this->currentModel);
            if ($this->currentModel->tableRelations) {
                foreach ($this->currentModel->tableRelations as $relName => $relValue) {
                    $relations[] = $relName;
                }
            } else
                $relations = [];
            //dd($this->currentModel->tableFields);
            foreach ($this->currentModel->tableFields as $field => $value) {
                if (!in_array($field, $relations)) {
                    $originalFields[$field] = $value;
                }
            }
            // dd($originalFields);
            if (isset($this->currentModel->tableFields[$this->currentModel->tableKey])) {
                $this->addCondition = ' WHERE ' . $this->currentModel->tableKey . '=\'' . $this->currentModel->tableFields[$this->currentModel->tableKey] . '\'';
                $this->query = 'UPDATE ' . $this->table . ' SET';
                $i = 1;
                foreach ($originalFields as $key => $value) {
                    if ($i < count($originalFields)) {
                        $this->query .= ' ' . $key . '=\'' . $value . '\',';
                    } else {
                        $this->query .= ' ' . $key . '=\'' . $value . '\'';
                    }
                    $i++;
                }
                $this->query .= $this->condition;
                $this->query .= ' ' . $this->addCondition;
            } else {
                $this->query = 'INSERT INTO ' . $this->table . ' (';
                // dd($originalFields);
                foreach ($originalFields as $key => $value) {
                    if ($key != $this->currentModel->tableKey && !empty($value)) {
                        $fieldsArr[] = $key;
                        $valuesArr[] = $value;
                    }
                }
                $i = 1;
                $value = '';
                foreach ($fieldsArr as $field) {
                    if ($i < count($fieldsArr)) {
                        $this->query .= ' `' . $field . '`,';
                        $value .= ' \'' . $valuesArr[$i - 1] . '\',';
                    } else {
                        $this->query .= ' `' . $field . '`';
                        $value .= ' \'' . $valuesArr[$i - 1] . '\'';
                    }
                    $i++;
                }
                $this->query .= ') VALUES (' . $value;
                $this->query .= ')';
            }
        } elseif ($this->queryType == 'DELETE') {
            $this->query = $this->queryType;
            $this->query .= ' FROM ';
            $this->query .= $this->table;
            $this->query .= $this->condition;

        }
    }

    public function execute()
    {
        $this->buildQuery();
       // $queryObj = \vendor\db\Connection::$dbInstance->prepare("SELECT * FROM tours WHERE total_residual >= :residual AND total_days >= :days AND total_days <= :days AND status = :status  ORDER BY  tours.id DESC");
        $queryObj = \vendor\db\Connection::$dbInstance->prepare($this->query);
       /* foreach ($this->bind_param as $key => $value){
            $queryObj->bindParam(':'.$key, $value);
        }*/
         //if ($this->search)
         //dd($this->query);
        //$this->query = 'SELECT * FROM users WHERE users.status LIKE \'%active%\'';
        if($this->currentModel->tableName == 'users'){
            //dd($this);
        }
        if($this->currentModel->tableName == 'tours'){

            //dd($this);
        }

        $result = $queryObj->execute($this->bind_param); // prevent sql injection
        // prevent sql injection
        //$result = $queryObj->execute();


        if ($this->queryType == 'SELECT') {
            if ($this->one_result) {
                $result = $queryObj->fetch(\PDO::FETCH_ASSOC);
            } else{
                $result = $queryObj->fetchAll(\PDO::FETCH_ASSOC);
            }

            // return $this->getResultObjects($result);

        } elseif ($this->queryType == 'SAVE') {
            // dd($this->query);
            if($this->currentModel->tableName == 'tours'){

               // dd($this);
            }
            $result = \vendor\db\Connection::$dbInstance->lastInsertId();
        }
        if($this->currentModel->tableName == 'tours'){
          //  dd($this);
           // dd($result);
        }
        return $result;
    }
}