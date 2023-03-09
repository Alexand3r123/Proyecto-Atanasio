<?php
class Consultar_Salones{
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM salones WHERE id='$codigo'");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
class Consultar_Alumnos{
	
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM alumnos WHERE id=$codigo or nit='$codigo' or nombre='$codigo' or apellido='$codigo'");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}

class Proceso_Salones{
	var $nombre;	var $curso;	var $id;
	
	function __construct($nombre, $curso, $id){
		$this->nombre = $nombre; 		$this->curso = $curso;		$this->id = $id;
	}
	
	function crear(){
		$nombre=$this->nombre;	$curso=$this->curso;
		mysql_query("INSERT INTO salones (nombre, curso, estado) VALUES ('$nombre','$curso','s')");
	}
	
	function actualizar(){
		$nombre=$this->nombre;	$curso=$this->curso;	$id=$this->id;
		mysql_query("Update salones Set	nombre='$nombre', curso='$curso' Where id=$id");
	}
	function eliminar(){
		$nombre=$this->nombre;	$curso=$this->curso;	$id=$this->id;
		mysql_query("Delete FROM salones where id=$id");
	}
	
	
}

class Proceso_Alumnos{
	var $id;			var $folio;			var $nombre;		var $curso;
	var $apellido;		var $director;		var $nit;			var $pension;
	var $telefono;		var $barrio;		var $fechan;		var $sangre;		var $grado;
		
	function __construct($id,$nombre,$apellido,$nit,$telefono,$fechan,$folio,$curso,$director,$pension,$barrio,$sangre,$grado){
		$this->id=$id;						$this->folio=$folio;
		$this->nombre=$nombre;				$this->curso=$curso;
		$this->apellido=$apellido;			$this->director=$director;
		$this->nit=$nit;					$this->pension=$pension;
		$this->telefono=$telefono;			$this->barrio=$barrio;
		$this->fechan=$fechan;				$this->sangre=$sangre;
		$this->grado=$grado;	
							
	}
		
	function crear(){
		$id=$this->id;						$folio=$this->folio;
		$nombre=$this->nombre;				$curso=$this->curso;		
		$apellido=$this->apellido;			$director=$this->director;
		$nit=$this->nit;					$pension=$this->pension;
		$telefono=$this->telefono;			$barrio=$this->barrio;
		$fechan=$this->fechan;				$sangre=$this->sangre;
		$grado=$this->grado;
			
		mysql_query("INSERT INTO alumnos (nombre, apellido, nit, telefono, fechan, folio, curso, estado, director, pension, barrio, sangre) 
				VALUES ('$nombre','$apellido','$nit','$telefono','$fechan','$folio','$curso','s','$director','$pension','$barrio','$sangre')");
	}
	
	function actualizar(){
		$id=$this->id;						$folio=$this->folio;
		$nombre=$this->nombre;				$curso=$this->curso;		
		$apellido=$this->apellido;			$director=$this->director;
		$nit=$this->nit;					$pension=$this->pension;
		$telefono=$this->telefono;			$barrio=$this->barrio;
		$fechan=$this->fechan;				$sangre=$this->sangre;
		$grado=$this->grado;
		
		mysql_query("Update alumnos Set	nombre='$nombre',
										apellido='$apellido',
										nit='$nit',
										telefono='$telefono',
										fechan='$fechan',
										folio='$folio',
										curso='$curso',
										director='$director',
										pension='$pension',
										barrio='$barrio',
										sangre='$sangre',
										grado='$grado'
									Where id=$id");
	}	
}
?>