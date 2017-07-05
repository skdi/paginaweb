
<?php

require_once "config.php";

class conectar
{
    protected $conexion;
    protected $db;
	private $hostname_db="localhost";
	private $database_db="internetdatabase";
	private $username_db="root";
	private $password_db="";
    public function Conectar(){	
    	//Conectar a la base de datos
        $this->conexion = mysql_connect($hostname_db, $username_db, $password_db) 
        or die("no se ha podido conectar con MySQL: " . mysql_error());
        //Seleccionar la base de datos
        $this->db = mysqli_select_db($conexion,$database_db) or die ("Ninguna DB seleccionada");
        echo "conexion establecida ";
        return true;

    }
    public function desconectar()
    {
        if ($this->conectar->conexion) {
            mysql_close($this->$conexion);
        }

    }

    public function pruebadb($table)
    {
        $tabla = $table;
        $query = mysql_query("SELECT * from $tabla ", $this->conexion);
        if (!$query ) echo "Error en la tabla seleccionada";
        else {
            $nregistrostotal = mysql_result($query, 0, 0);
            echo "Hay $nregistrostotal registros en la tabla: $tabla.";
            mysql_free_result($query);
        }
    }
}
class login{
	private $username_db='root';
	private $password_db='';
	private $database_db='internetdatabase';
	private $hostname_db='localhost';
	private $conx;
 
	function __construct(){
		$this->conx= new mysqli($this->hostname_db,$this->username_db,$this->password_db,$this->database_db);
	}
 
	public function login($root, $){
		$login= $this->conx->query("SELECT * FROM  usuarios  WHERE nombre='".$root."' AND clavee='".$."' ");
		return $login;
	}
}
?>
