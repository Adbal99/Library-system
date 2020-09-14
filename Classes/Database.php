 <?php
    class Database
    {
        private  $servername = "127.0.0.1:3307";
        private  $username = "root";
        private  $password = "admin";
        private  $dbname = "library";
        public $myConn;
        // Create connection
        public function connect()
        {

            $conn = new mysqli(
                $this->servername,
                $this->username,
                $this->password,
                $this->dbname
            );

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
                $this->myConn = $conn;
            }
            return $this->myConn;
        }

        //close connection
        public function close()
        {
            mysqli_close($this->myConn);
        }
    }

    ?> 