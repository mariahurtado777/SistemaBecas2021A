<?php
    require_once("../Modelo/PersonalBusqueda.php");

	//session_start();

	class LNPersonalBusqueda
	{
		
		
		private $objPersonalBusqueda;

		public function __construct()
		{
            $this->objPersonalBusqueda = new PersonalBusqueda();
		}

		public function verificarUsuarioEstudiante($usuario)
		{   
			$verificarUsuarioEstudiante = $this->objPersonalBusqueda->verificarUsuarioEstudiante($usuario);

			return $verificarUsuarioEstudiante;
		}
		
		public function verificarContraseniaEstudiante($contrasenia)
		{   
			
			$verificarContraseniaEstudiante = $this->objPersonalBusqueda->verificarContraseniaEstudiante($contrasenia);
			

			return $verificarContraseniaEstudiante;
		}

		public function rolEstudiante($usuario)
		{   
			$rolEstudiante = $this->objPersonalBusqueda->rolEstudiante($usuario);

			return $rolEstudiante;
		}

		public function verificarUsuarioPersonal($usuario)
		{   
			$verificarUsuarioPersonal = $this->objPersonalBusqueda->verificarUsuarioPersonal($usuario);

			return $verificarUsuarioPersonal;
		}
		
		public function verificarContraseniaPersonal($contrasenia)
		{   
			
			$verificarContraseniaPersonal = $this->objPersonalBusqueda->verificarContraseniaPersonal($contrasenia);
			

			return $verificarContraseniaPersonal;
		}

		public function rolPersonal($usuario)
		{   
			$rolPersonal = $this->objPersonalBusqueda->rolPersonal($usuario);

			return $rolPersonal;
		}
		
		public function listaEstudiantesBecasGestion($idGestion)
		{   $listaEstudiantes = $this->objPersonalBusqueda->listaEstudiantesBecasGestion($idGestion);
			return $listaEstudiantes;
		}//end function

		public function listaReporte2($idGestion)
		{   $listaReporte2 = $this->objPersonalBusqueda->listaReporte2($idGestion);
			return $listaReporte2;
		}//end function
		public  function LogicaListaArea(){
        $LogicaListaArea =$this->objPersonalBusqueda->listaAreas();
        return $LogicaListaArea;
        }
		public  function LogicaDatoPersonal($idPersonal){
		$LogicaDatoPersonal =$this->objPersonalBusqueda->datoPersonal($idPersonal);
		return $LogicaDatoPersonal;
		}

        public  function LogicaListaGestion(){
        $LogicaListaGestion =$this->objPersonalBusqueda->listaGestion();
        return $LogicaListaGestion;
        }
         public  function LogicaListaPrecio(){
        $LogicaListaPrecio =$this->objPersonalBusqueda->listaPrecio();
        return $LogicaListaPrecio;
        }
        public  function LogicaListaDia(){
        $LogicaListaDia =$this->objPersonalBusqueda->listaDia();
        return $LogicaListaDia;
        }
		public  function LogicaListaPersonalU(){
			$LogicaListaPersonalU =$this->objPersonalBusqueda->listaPersonalU();
			return $LogicaListaPersonalU;
			}
		public  function LogicaListaRol(){
		$LogicaListaRol =$this->objPersonalBusqueda->listaRol();
		return $LogicaListaRol;
		}
		public  function LogicaListaDepartamento(){
			$LogicaListaDepartamento =$this->objPersonalBusqueda->listaDepartamento();
			return $LogicaListaDepartamento;
			}
         public  function LogicaListaHorarioTrabajo(){
        $LogicaListaHorarioTrabajo =$this->objPersonalBusqueda->listaHorarioTrabajo();
        return $LogicaListaHorarioTrabajo;
        }
		public  function LogicaListaCarrera(){
			$LogicaListaCarrera =$this->objPersonalBusqueda->listaCarrera();
			return $LogicaListaCarrera;
			}
		public  function LogicaListaEstudiante(){
		$LogicaListaEstudiante =$this->objPersonalBusqueda->listaEstudiante();
		return $LogicaListaEstudiante;
		}
		public  function LogicaListaBecaInstitucional(){
		$LogicaListaBecaInstitucional =$this->objPersonalBusqueda->listaBecaInstitucional();
		return $LogicaListaBecaInstitucional;
		}

		public function entradaSalidaEstudiante($ci)
		{   $listaEstudiante = $this->objPersonalBusqueda->entradaSalidaEstudiante($ci);
			return $listaEstudiante;
		}//end function

		public function ParametrosFechas($Inicio,$Fin){
			$listaFechas=$this->objPersonalBusqueda->ParametrosFechas($Inicio,$Fin);
			return $listaFechas;
		}
		public function buscarCIEstudiante($ci){
			$datoEstudiante=$this->objPersonalBusqueda->buscarCI($ci);
			return $datoEstudiante;

		}

	}
?>