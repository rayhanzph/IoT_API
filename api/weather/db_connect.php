<?php

class DB_CONNECT {
 
    // Constructor
    function __construct() {
        // Coba konek DB
        $this->connect();
    }
 
    // Destructor
    function __destruct() {
        // Tutup Koneksi
        $this->close();
    }
 
   // Fungsi Konek DB
    function connect() {

        //import dbconfig.php (config) 
        $filepath = realpath (dirname(__FILE__));

        require_once($filepath."/dbconfig.php");
        
		// Connect mysql
        $con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
 
       // pilih db
        $db = mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());
 
        // return
        return $con;
    }
 
	// fungsi tutuk koneksi
    function close() {
        // tutuk koneksi
        mysql_close();
    }
 
}
 
?>