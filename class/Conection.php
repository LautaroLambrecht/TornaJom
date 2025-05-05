<?php     

    class Conection {

        private $host;
        private $username;
        private $password;
        private $db;
        protected $conn;
        private $configFile = "conf.json";

        public function __construct(){
            $this->connect();
        }

        public function __destruct(){
            if ($this->conn){
                $this->conn = null;
            }
        }

        public function connect(){
            if (!file_exists($this->configFile)){
                die("Unable to open file!");
            }

            $configData = file_get_contents($this->configFile);
            $config = json_decode($configData, true);

            $this->host = $config['host'];
            $this->username = $config['username'];
            $this->password = $config['password'];
            $this->db = $config['db'];

            $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);

            if (!$this->conn){
                die('Conection failes');
            }
        }

        public function getConn(){
            return $this->conn;
        }
    }