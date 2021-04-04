<?php 
    class Dbh extends Database {
        // Query statement without preparation
        public function query($sql){
            $this->stmt = $this->pdo->query($sql);
        }

        // Prepare statement for execution
        public function prepare($sql){
            $this->stmt = $this->pdo->prepare($sql);
        }

        // Bind values
        public function bind($param, $value, $type = null) {
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = \PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = \PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = \PDO::PARAM_NULL;
                        break;
                    default:
                        $type = \PDO::PARAM_STR;
                }
            }

            $this->stmt->bindValue($param, $value, $type);
        }

        // Get single row result set as assoc array
        public function fetchRow() {
            $this->execute();
            return $this->stmt->fetch();
        }
        
        // Get all rows as assoc array
        public function fetchAllRows() {
            $this->execute();
            return $this->stmt->fetchAll();
        }
        
        // Get single column as assoc array
        public function fetchColumn() {
            $this->execute();
            return $this->stmt->fetchColumn();
        }
        
        // Get row count
        public function rowCount() {
            $this->execute();
            return $this->stmt->rowCount();
        }
        
        // Execute the prepared statement
        public function execute(){
            return $this->stmt->execute();
        }

        // Fetch assoc array without execution
        public function fetch() {
            return $this->stmt->fetch();
        }

        // Get ID of inserted post
        public function getInsertId() {
            return $this->pdo->lastInsertId();
        }
    }