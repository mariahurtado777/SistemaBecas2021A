
<?php
  class Persona
  {
    private $idPersona;
    private $ci;
    private $primerNombre;
    private $segundoNombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $usuario;
    private $contrasenia;
    private $fechaNacimiento;
    
    function __construct(){ 
    }
    public function setIdPersona($idPersona){  $this->idPersona = $idPersona;}
    public function setCi($ci){$this->ci = $ci;}
    public function setPrimerNombre($primerNombre){$this->primerNombre = $primerNombre;}
    public function setSegundoNombre($segundoNombre){$this->segundoNombre = $segundoNombre;}
    public function setApellidoPaterno($apellidoPaterno){$this->apellidoPaterno = $apellidoPaterno;}
    public function setApellidoMaterno($apellidoMaterno){$this->apellidoMaterno = $apellidoMaterno;}
    public function setFechaNacimiento($fechaNacimiento){$this->fechaNacimiento = $fechaNacimiento;}
    public function setUsuario($usuario){$this->usuario = $usuario;}
    public function setContrasenia($contrasenia){$this->contrasenia = $contrasenia;}

    public function getIdPersona(){return $this->idPersona;}
    public function getCi(){return $this->ci;}
    public function getPrimerNombre(){return $this->primerNombre;}
    public function getSegundoNombre(){return $this->segundoNombre;}
    public function getApellidoPaterno(){return $this->apellidoPaterno;}
    public function getApellidoMaterno(){return $this->apellidoMaterno;}
    public function getFechaNacimiento(){return $this->fechaNacimiento;}
    public function getUsuario(){return $this->usuario;}
    public function getContrasenia(){return $this->contrasenia;}
  }
 ?>