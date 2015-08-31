<?php

class PDOAdapter
{
    /**
     * @var \PDO $pdo
     */
    protected $pdo;

    /**
     * @var string
     */
    const COMA_SEPARATOR = ', ';

    /**
     * @var string
     */
    const VALUE_BIND_PARAM = '?';

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=;dbname=pwss', '', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param string $sql
     * @param array $params
     *
     * @return null|PDOStatement
     */
    protected function executeStatement($sql, array $params = null)
    {
        try {
            $query = $this->pdo->prepare($sql);
            $query->execute($params);
        } catch (PDOException $e) {
            $query = null;
        }

        return $query;
    }

    /**
     * @param array $array
     *
     * @return string
     */
    protected function implode(array $array = null)
    {
        return implode(self::COMA_SEPARATOR, $array);
    }

    /**
     * @param int $length
     *
     * @return string
     */
    protected function generateBindParams($length)
    {
        $binds = array_fill(0, $length, self::VALUE_BIND_PARAM);

        return $this->implode($binds);
    }

    /**
     * @param array $where
     *
     * @return string
     */
    protected function buildWhereSql(array $where = null)
    {
        $sql   = '';
        $count = 0;

        if (empty($where)) {
            return '1';
        }

        foreach ($where as $key => $value) {
            if ($count > 0) {
                $sql .= ' AND ';
            }

            $sql .= sprintf('%s = "%s"', $key, $value);

            $count++;
        }

        return $sql;
    }

    /**
     * @param string $table
     * @param array $params
     * @param array $where
     *
     * @return string
     */
    protected function buildSelectSql($table, array $params = null, array $where = null)
    {
        $cols  = empty($params) ? '*' : $this->implode($params);
        $where = $this->buildWhereSql($where);

        return sprintf('SELECT %s FROM %s WHERE %s', $cols, $table, $where);
    }

    /**
     * @param string $table
     * @param array $params
     *
     * @return string
     */
    protected function buildInsertSql($table, array $params = null)
    {
        $cols = $this->implode(array_keys($params));
        $bindParams = $this->generateBindParams(count($params));

        return sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, $cols, $bindParams);
    }

    /**
     * @param string $table
     * @param array $params
     * @param array $where
     *
     * @return string
     */
    protected function buildUpdateSql($table, array $params = null, array $where = null)
    {
        $set   = array();
        $where = $this->buildWhereSql($where);

        foreach ($params as $key => $value) {
            $set[] = sprintf('%s = "%s"', $key, $value);
        }

        return sprintf('UPDATE %s SET %s WHERE %s', $table, $this->implode($set), $where);
    }

    /**
     * @param string $table
     * @param array $where
     *
     * @return string
     */
    protected function buildDeleteSql($table, array $where = null)
    {
        return sprintf('DELETE FROM %s WHERE %s', $table, $this->buildWhereSql($where));
    }

    /**
     * @param sting $table
     * @param array $params
     * @param array $where
     *
     * @return array
     */
    public function select($table, array $params = null, array $where = null)
    {
        $sql   = $this->buildSelectSql($table, $params, $where);
        $query = $this->executeStatement($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $table
     * @param array $params
     *
     * @return PDOStatement
     */
    public function insert($table, array $params = null)
    {
        $sql = $this->buildInsertSql($table, $params);

        return $this->executeStatement($sql, array_values($params));
    }

    /**
     * @param $table
     * @param array $params
     * @param array $where
     *
     * @return PDOStatement
     */
    public function update($table, array $params = null, array $where = null)
    {
        $sql = $this->buildUpdateSql($table, $params, $where);

        return $this->executeStatement($sql, array_values($params));
    }

    /**
     * @param $table
     * @param array $where
     *
     * @return PDOStatement
     */
    public function delete($table, array $where = null)
    {
        $sql = $this->buildDeleteSql($table, $where);

        return $this->executeStatement($sql);
    }
}
