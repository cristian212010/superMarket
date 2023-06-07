<?php
require_once("../config/Conectar.php");
require_once("LoginUser.php");

class RegistroUser extends Conectar{
    private $id;
    private $empleadoId;
    private $email;
    private $username;
    private $password;
    private $tipoUsuario;
    
    public function __construct($id=0, $empleadoId=0, $email='', $username='', $password='', $tipoUsuario='', $dbCnx=''){
        $this->id = $id;
        $this->empleadoId = $empleadoId;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->tipoUsuario = $tipoUsuario;
        parent::__construct($dbCnx);
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setempleadoId($empleadoId){
        $this->empleadoId = $empleadoId;
    }

    public function getempleadoId(){
        return $this->empleadoId;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getTipoUsuario(){
        return $this->tipoUsuario;
    }

    public function checkUser($email){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM usuarios WHERE email = '$email'");
            $stm -> execute();
            if ($stm->fetchColumn()) {
                return true;
            }else {
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx-> prepare("INSERT INTO usuarios(empleadoId, email, username, password, tipoUsuario) values (?,?,?,?,?)");
            $stm-> execute([$this->empleadoId,$this->email,$this->username, md5($this->password), $this->tipoUsuario]);
            $login = new LoginUser();
            $login->setEmail($_POST['email']);
            $login->setPassword($_POST['password']);
            $success = $login->login();
        } catch (Exepcion $e) {
            return getMessage($e);
        }
    }

    public function selectEmpleados(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT empleadoId, nombre FROM empleados");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>