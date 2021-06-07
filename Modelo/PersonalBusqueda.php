<?php
	require_once("../Modelo/Conexion.php");
	class personalBusqueda
	{
		private $conexion;

		function __construct()
		{
			$this->conexion =  new Conexion();
		}

	
     public function verificarUsuarioEstudiante($usuario)
        {   
            $sqlverificarUsuarioEstudiante = "SELECT * FROM estudiante WHERE usuario=:usuario ;";
		            $cmd = $this->conexion->prepare($sqlverificarUsuarioEstudiante);
		            $cmd->bindParam(':usuario',$usuario);
		            $cmd->execute();
            $verificarUsuarioEstudiante= $cmd->fetch();
                        if($verificarUsuarioEstudiante){
               return $verificarUsuarioEstudiante;
            }else{
                return 0;
            }
        }
           public function verificarUsuarioPersonal($usuario)
        {   
            $sqlverificarUsuarioPersonal = "SELECT * FROM personal WHERE usuario=:usuario ;";
                    $cmd = $this->conexion->prepare($sqlverificarUsuarioPersonal);
                    $cmd->bindParam(':usuario',$usuario);
                    $cmd->execute();
            $verificarUsuarioPersonal= $cmd->fetch();
                        if($verificarUsuarioPersonal){
               return $verificarUsuarioPersonal;
            }else{
                return 0;
            }
        }
        public function verificarContraseniaPersonal($contrasenia)
        {  
            
            $sqlverificarContraseniaPersonal = "SELECT * FROM personal WHERE contrasenia=:contrasenia ;";
            $cmd = $this->conexion->prepare($sqlverificarContraseniaPersonal);
                
                $cmd->bindParam(':contrasenia',$contrasenia);
                $cmd->execute();
                $verificarContraseniaPersonal= $cmd->fetch();
            
            if($verificarContraseniaPersonal){
               return 1;
            }else{
                return 0;
            }
        }
                public function verificarContraseniaEstudiante($contrasenia)
        {  
            
            $sqlverificarContraseniaEstudiante = "SELECT * FROM estudiante WHERE contrasenia=:contrasenia ;";
            $cmd = $this->conexion->prepare($sqlverificarContraseniaEstudiante);
                
                $cmd->bindParam(':contrasenia',$contrasenia);
                $cmd->execute();
                $verificarContraseniaEstudiante= $cmd->fetch();
            
            if($verificarContraseniaEstudiante){
               return $verificarContraseniaEstudiante;
            }else{
                return 0;
            }
        }
    

       public function rolEstudiante($usuario)
        { 
            $sqlrolEstudiante = "SELECT *,CONCAT_WS(' ',primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) AS nombreUsuario FROM estudiante where usuario=:usuario;";
                    $cmd = $this->conexion->prepare($sqlrolEstudiante);
                    $cmd->bindParam(':usuario',$usuario);
                    $cmd->execute();
                    $rolEstudiante= $cmd->fetch();
            if($rolEstudiante){
               return $rolEstudiante;
            }else{
                return 0;
            }
        }
    public function rolPersonal($usuario)
        { 
            $sqlrolPersonal = "SELECT *,CONCAT_WS(' ',primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) AS nombreUsuario,idPersonal FROM personal where usuario=:usuario;";
                    $cmd = $this->conexion->prepare($sqlrolPersonal);
                    $cmd->bindParam(':usuario',$usuario);
                    $cmd->execute();
                    $rolPersonal= $cmd->fetch();
            if($rolPersonal){
               return $rolPersonal;
            }else{
                return 0;
            }
        }
    

       public function datosEstudiante($usuario)
        {   
            $sqlDatosEstudiante = "SELECT * FROM estudiante WHERE usuario=:usuario ;";
                    $cmd = $this->conexion->prepare($sqlDatosEstudiante);
                    $cmd->bindParam(':usuario',$usuario);
                    $cmd->execute();
            $DatosEstudiante= $cmd->fetch();
                        if($DatosEstudiante){
               return $DatosEstudiante;
            }else{
                return 0;
            }
        }
           public function datosPersonal($usuario)
        {   
            $sqlDatosPersonal = "SELECT * FROM personal WHERE usuario=:usuario ;";
                    $cmd = $this->conexion->prepare($sqlDatosPersonal);
                    $cmd->bindParam(':usuario',$usuario);
                    $cmd->execute();
            $DatosPersonal= $cmd->fetch();
                        if($DatosPersonal){
               return $DatosPersonal;
            }else{
                return 0;
            }
        }

        public function listaEstudiantesBecasGestion($idGestion)
        {   //realizando la consulta
            $sqlListaEstudianteBecasGestion = "
                SELECT g.nombre as gestion,count(e.idEstudiante) as cantEstudiantes
                from estudiante e inner join becaNoInstitucional bni
                on bni.idEstudiante= e.idEstudiante
                inner join gestion g
                on g.idGestion=bni.idGestion
                AND g.idGestion=:idGestion
                inner join tipoBeca tb
                on tb.idTipoBeca=bni.idTipoBeca
                group by g.nombre;

            ";
            $cmd = $this->conexion->prepare($sqlListaEstudianteBecasGestion);
            $cmd->bindParam(':idGestion', $idGestion);
            $cmd->execute();
            $listaEstudiantesConsulta = $cmd->fetchAll();
            return $listaEstudiantesConsulta;
        }

         public function listaReporte2($idGestion)
        {  
            $sqlListaReporte2 = "
                SELECT  g.nombre as gestion  ,tb.nombre as tipoBeca ,count(e.idEstudiante)   as  estudiante 
                from carrera c inner join estudiante e 
                on e.idCarrera =c.idCarrera
                inner JOIN  becaNoInstitucional bni 
                on e.idEstudiante=bni.idEstudiante
                inner join gestion g
                on g.idGestion =bni.idGestion
                AND g.idGestion=:idGestion
                inner join tipoBeca tb
                on tb.idTipoBeca=bni.idTipoBeca
                group by  g.idGestion
                having count(e.idEstudiante)>=2;

            ";
            $cmd = $this->conexion->prepare($sqlListaReporte2);
            $cmd->bindParam(':idGestion', $idGestion);
            $cmd->execute();
            $listaReporte1Consulta = $cmd->fetchAll();
            return $listaReporte1Consulta;
        }   

	 public function listaAreas()
    {
    $sqlListaArea ="SELECT  idArea,nombre from area order by nombre;";
     $cmd = $this->conexion->prepare($sqlListaArea);
     $cmd->execute();
     $listaConsulta = $cmd->fetchAll();
    return $listaConsulta;
    }

    public function datoPersonal($idPersonal)
    {
    $sqlDatoPersonal ="     SELECT  CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) AS nombreCompleto,d.nombre as departamento,a.nombre
                            FROM departamento d inner join personalDepartamento dp
                            on dp.idDepartamento = d.idDepartamento
                            INNER JOIN personal p
                            on dp.idPersonal=p.idPersonal
                            inner join area a
                            on a.idDepartamento=d.idDepartamento
                            and dp.idPersonal=:idPersonal;";
     $cmd = $this->conexion->prepare($sqlDatoPersonal);
     $cmd->bindParam(':idPersonal', $idPersonal);
     $cmd->execute();
     $listaConsulta = $cmd->fetch();
    return $listaConsulta;
    }
    
     public function listaGestion()
    {
    $sqlListaGestion ="SELECT  idGestion,nombre from Gestion where activo=1 ;";
     $cmd = $this->conexion->prepare($sqlListaGestion);
     $cmd->execute();
     $listaConsulta = $cmd->fetchAll();
    return $listaConsulta;
    }
     public function listaPrecio()
    {
    $sqlListaPrecio ="SELECT  idPrecio,precio from precio order by precio;";
     $cmd = $this->conexion->prepare($sqlListaPrecio);
     $cmd->execute();
     $listaConsulta = $cmd->fetchAll();
    return $listaConsulta;
    }
     public function listaDia()
    {
    $sqlListaDia ="SELECT  idDia,dia from dia ;";
     $cmd = $this->conexion->prepare($sqlListaDia);
     $cmd->execute();
     $listaConsulta = $cmd->fetchAll();
    return $listaConsulta;
    }
    public function listaRol()
    {
    $sqlListaRol ="SELECT  * from rol Where idRol !=3;";
     $cmd = $this->conexion->prepare($sqlListaRol);
     $cmd->execute();
     $listaConsulta = $cmd->fetchAll();
    return $listaConsulta;
    }
    public function listaDepartamento()
    {
    $sqlListaDepartamento ="SELECT  idDepartamento,nombre from departamento ;";
     $cmd = $this->conexion->prepare($sqlListaDepartamento);
     $cmd->execute();
     $listaConsulta = $cmd->fetchAll();
    return $listaConsulta;
    }

    public function listaPersonalU()
    {
    $sqlListaPersonalU =" SELECT CONCAT_WS(' ',primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) AS nombreCompleto,idPersonal
                            FROM personal
                            WHERE idPersonal = (SELECT MAX(idPersonal) as maxid FROM personal);";
     $cmd = $this->conexion->prepare($sqlListaPersonalU);
     $cmd->execute();
     $listaConsulta = $cmd->fetch();
    return $listaConsulta;
    }

    public function listaCarrera()
    {
    $sqlListaCarrera ="SELECT  * from carrera ;";
     $cmd = $this->conexion->prepare($sqlListaCarrera);
     $cmd->execute();
     $listaConsulta = $cmd->fetchAll();
    return $listaConsulta;
    $cmd = $this->conexion->prepare($sqlListaCarrera);
    $cmd->execute();
    $listaConsulta = $cmd->fetchAll();
   return $listaConsulta;
   }

   public function listaEstudiante()
   {
   $sqlListaEstudiante ="SELECT  idEstudiante,CONCAT_WS(' ',apellidoPaterno,apellidoMaterno,primerNombre,segundoNombre) AS nombreCompleto from estudiante ;";
    $cmd = $this->conexion->prepare($sqlListaEstudiante);
    $cmd->execute();
    $listaConsulta = $cmd->fetchAll();
   return $listaConsulta;
   }
   public function listaBecaInstitucional()
   {
   $sqlListaBecaInstitucional ="SELECT  bi.idBecaInstitucional,a.nombre as area, p.precio
   from area a INNER JOIN becaInstitucional bi
   ON a.idArea = bi.idArea
   INNER JOIN precio p
   ON p.idPrecio=bi.idPrecio
   WHERE bi.idBecaInstitucional NOT IN (SELECT idBecaInstitucional FROM asignacionBecaInstitucional);
                                ";
    $cmd = $this->conexion->prepare($sqlListaBecaInstitucional);
    $cmd->execute();
    $listaConsulta = $cmd->fetchAll();
   return $listaConsulta;
   }

     public function listaHorarioTrabajo()
    {
    $sqlListaHorarioTrabajo ="SELECT  a.nombre as nombreArea ,g.nombre as nombreGestion,p.precio as precio
                                FROM becainstitucional bi INNER JOIN area a 
                                 ON bi.idArea = a.idArea 
                                 INNER join gestion g 
                                 on bi.idGestion=g.idGestion
                                 INNER JOIN precio p
                                 on bi.idPrecio=p.idPrecio
                                 WHERE idBecaInstitucional = (SELECT MAX(idBecaInstitucional) as maxid FROM becainstitucional);";
     $cmd = $this->conexion->prepare($sqlListaHorarioTrabajo);
     $cmd->execute();
     $listaConsulta = $cmd->fetch();
    return $listaConsulta;
    }

    public function busquedaPersonal($primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$ci,$activo){
        $sqlBusquedaPersonal = "SELECT  CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) AS nombreCompleto,p.ci,
                            IF(p.activo=1,'Si','No') AS activo, p.idPersonal
                            FROM rol r INNER JOIN personal p
                            ON r.idRol = p.idrol
                            WHERE p.primerNombre LIKE '%".$primerNombre."%'
                            AND p.segundoNombre LIKE '%".$segundoNombre."%'
                            AND p.apellidoPaterno LIKE '%".$apellidoPaterno."%'
                            AND p.apellidoMaterno LIKE '%".$apellidoMaterno."%'
                            AND p.ci LIKE '%".$ci."%'
                            AND p.activo = ".$activo."
                            GROUP BY p.idPersonal
                            ORDER BY p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre;";
        $cmd = $this->conexion->prepare($sqlBusquedaPersonal);
        $cmd->execute();
        $BusquedaPersonal = $cmd->fetchAll();
        if($BusquedaPersonal){
            return $BusquedaPersonal;
        }else{
            return NULL;
        }
    }

    public function busquedaEstudiante($nombre,$primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$ci,$activo){
        $sqlBusquedaEstudiante = " SELECT  c.nombre,CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) AS nombreCompleto,e.ci,
                                            IF(e.activo=1,'Si','No') AS activo, e.idEstudiante
                                            FROM rol r INNER JOIN estudiante e
                                            ON r.idRol = e.idrol
                                            INNER JOIN carrera c
                                            ON c.idCarrera=e.idCarrera
                                            WHERE c.nombre LIKE '%".$nombre."%' 
                                            AND e.primerNombre LIKE '%".$primerNombre."%'
                                            AND e.segundoNombre LIKE '%".$segundoNombre."%'
                                            AND e.apellidoPaterno LIKE '%".$apellidoPaterno."%'
                                            AND e.apellidoMaterno LIKE '%".$apellidoMaterno."%'
                                            AND e.ci LIKE '%".$ci."%'
                                            AND e.activo = ".$activo."
                                            GROUP BY e.idEstudiante
                                            ORDER BY e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre;";
        $cmd = $this->conexion->prepare($sqlBusquedaEstudiante);
        $cmd->execute();
        $BusquedaEstudiante = $cmd->fetchAll();
        if($BusquedaEstudiante){
            return $BusquedaEstudiante;
        }else{
            return NULL;
        }
    }

    public function entradaSalidaEstudiante($ci)
        {   //realizando la consulta
            $sqlEntradaSalidaEstudiante = "
            SELECT  ab.idAsignacionBecaInstitucional as asignacion,a.nombre as area,CONCAT_WS(' ',e.primerNombre,e.segundoNombre,e.apellidoPaterno,e.apellidoMaterno) AS nombre
FROM estudiante e INNER JOIN  asignacionBecaInstitucional ab
ON e.idEstudiante = ab.idEstudiante
AND e.ci=:ci
INNER JOIN registroEntradaSalida re
ON ab.idAsignacionBecaInstitucional= re.idAsignacionBecaInstitucional
INNER JOIN becaInstitucional bi 
ON bi.idBecaInstitucional=ab.idBecaInstitucional
INNER JOIN area a
ON a.idArea=bi.idArea
group by ab.idAsignacionBecaInstitucional;


            ";
            $cmd = $this->conexion->prepare($sqlEntradaSalidaEstudiante);
            $cmd->bindParam(':ci', $ci);
            $cmd->execute();
            $entradaSalidaEstudiante = $cmd->fetchAll();
            return $entradaSalidaEstudiante;
        }

        public function consultarEntrada()
        {   //realizando la consulta
            $sqlConsultarEntradaEstudiante = "
            select horaInicio
            from registroEntradaSalida
            where fecha= '06/05/2021' ;
            ";
            $cmd = $this->conexion->prepare($sqlConsultarEntradaEstudiante);
     $cmd->execute();
     $consultaEntrada = $cmd->fetch();
     if($consultaEntrada){
        return 1;
    }else{
        return 0;
    }
        }

        public function ParametrosFechas($Inicio,$Fin){
            $sqlRangoFechas="
            select horaInicio 
            from registroEntradaSalida
            where fecha 
            between :Inicio and :Fin ;
            ";
            $cmd = $this->conexion->prepare($sqlRangoFechas);
     $cmd->bindParam(':Inicio', $Inicio);
     $cmd->bindParam(':Fin', $Fin);
     $cmd->execute();
     $listaFecha = $cmd->fetch();
    return $listaFecha;
        }
        //Buscar CI Estudiante
        public function buscarCI($ci)
        {   //realizando la consulta
            $datoEstudiante = "select * from estudiante where ci = :ci;";
            $cmd = $this->conexion->prepare($datoEstudiante);
            $cmd->bindParam(':ci', $ci);
            $cmd->execute();
            $estudiante = $cmd->fetch();
            return $estudiante;
        }
    }
?>