<?php
session_start();
$lista_alumnos = [];
$alumno = [];
if (isset($_SESSION['estudianteData'])) {
  $lista_alumnos = $_SESSION['estudianteData'];

}
if (isset($_POST['delete'])) {
  session_destroy();
  header("Location: index.php");
}
class estudiante
{
  public $cedula_estudiante;
  public $nombre_estudiante;
  public $mate_estudiante;
  public $fisica_estudiante;
  public $progra_estudiante;
  public $approMath;
  public $approPhysics;
  public $approProg;
  public function __construct($cedula, $nombre, $nota_mate, $nota_fisi, $nota_progra)
  {
    $this->cedula_estudiante = $cedula;
    $this->nombre_estudiante = $nombre;
    $this->mate_estudiante = $nota_mate;
    $this->fisica_estudiante = $nota_fisi;
    $this->progra_estudiante = $nota_progra;
    
  }
  public function get_Cedula()
  {
    return $this->cedula_estudiante;
  }
  public function get_Nombre()
  {
    return $this->nombre_estudiante;
  }
  public function get_nota_mate()
  {
    return $this->mate_estudiante;
  }
  public function get_nota_fisica()
  {
    return $this->fisica_estudiante;
  }
  public function get_nota_progra()
  {
    return $this->progra_estudiante;
  }
  public function getApproMath()
  {
    return $this->approMath;
  }

  public function getApproPhysics()
  {
    return $this->approPhysics;
  }

  public function getApproProg()
  {
    return $this->approProg;
  }
  public function setApproMath()
  {
    $this->approMath = 1;
  }
  public function setApproPhysics()
  {
    $this->approPhysics = 1;
  }
  public function setApproProg()
  {
    $this->approProg = 1;
  }
}




if ((isset($_POST['cedula']) && isset($_POST['nombre']) && isset($_POST['nota_mate'])) && (isset($_POST['nota_fisi']) && isset($_POST['nota_progra']))) {
  if ((!empty($_POST['cedula']) && !empty($_POST['nombre']) && !empty($_POST['nota_mate'])) && (!empty($_POST['nota_fisi']) && !empty($_POST['nota_progra']))) {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $nota_mate = $_POST['nota_mate'];
    $nota_fisi = $_POST['nota_fisi'];
    $nota_progra = $_POST['nota_progra'];

    $alumno = new estudiante($cedula, $nombre, $nota_mate, $nota_fisi, $nota_progra);
    array_push($lista_alumnos, $alumno);
    $_SESSION['estudianteData'] = $lista_alumnos;
  } else {
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act. 2</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tabla.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<br><h1>Segundo  Ejercicio: Notas de estudiantes </h1> <br><br>
    <form action="index.php" method="post" class="form-inline">

        <h2>Ingresa los siguientes datos</h2>
        <div class="form-group mb-2 ">

        <label for="edad">Cédula del estudiante</label>
        <input pattern="[0-9]+" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" / class="form-control" type="number" id="cedula" name="cedula">


        <label for="nombre">Nombre y Apellido</label>
        <input onkeyup="lettersOnly(this)" class="form-control" type="text" id="nombre" name="nombre">


        <label for="edad">Nota de matemáticas</label>
        <input type="text" onkeyup="agregarDecimal_1()" maxlength="5" class="form-control" id="nota_mate" name="nota_mate">

        <label for="edad">Nota de física</label>
        <input type="text" onkeyup="agregarDecimal_2()" maxlength="5" class="form-control" id="nota_fisi" name="nota_fisi">

        <label for="edad">Nota de programación</label>
        <input type="text" onkeyup="agregarDecimal_3()" maxlength="5" class="form-control" id="nota_progra" name="nota_progra">


        <input type="submit" value="Agregar" name="btn" class="btn btn-primary">
        <input type="submit" value="Reiniciar" name="delete" class="btn btn-danger">
        <a href="../index.php" class="btn btn-secondary">Regresar</a>


    </div>  

    </form>

    <div class="container">
                      
                                
                      <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body text-center">
                                  <h5 class="card-title m-b-0">Lista de Alumnos</h5>
                              </div>
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead class="thead-light">
                                              <tr>
                                              <th scope="col">Cedula</th>
                                              <th scope="col">Nombre</th>
                                              <th scope="col">Nota de Matematica</th>
                                              <th scope="col">Nota de Fisica</th>
                                              <th scope="col">Nota de Programacion</th>
                                              </tr>
                                          </thead>
                                          <tbody class="customtable">
                                          <?php
                                            foreach ($lista_alumnos as $estudiante) {
                                              echo "<tr>";
                                              echo "<td>", $estudiante->get_Cedula(), "</td>";
                                              echo "<td>", $estudiante->get_Nombre(), "</td>";
                                              echo "<td>", $estudiante->get_nota_fisica(), "</td>";
                                              echo "<td>", $estudiante->get_nota_mate(), "</td>";
                                              echo "<td>", $estudiante->get_nota_progra(), "</td>";
                                              echo "</tr>";

                                            }
  
                                          ?>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                          </div>
                      </div>
                  </div>
  
                     </div> 
<br><br>

<div>
      <h4>
        Datos Filtrados:
      </h4>
      <div class="tabla">
        <table class="table">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Nota Promedio</th>
              <th scope="col">Estudiantes Aprobados</th>
              <th scope="col">Estudiantes Aplazados</th>
              <th scope="col">Nota Máxima</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $SummMathGrade = 0;
            $AmountApproMath = 0;
            $AmountFailedMath = 0;
            $maxGradeMath = 0;

            $SummPhysicsGrade = 0;
            $AmountApproPhysics = 0;
            $AmountFailedPhysics = 0;
            $maxGradePhysics = 0;

            $SummProgGrade = 0;
            $AmountApproProg = 0;
            $AmountFailedProg = 0;
            $maxGradeProg = 0;

            foreach ($lista_alumnos as $student) {
              $SummMathGrade += $student->get_nota_mate();
              $SummPhysicsGrade += $student->get_nota_fisica();
              $SummProgGrade += $student->get_nota_progra();

              if ($student->get_nota_mate() > 9) {
                $AmountApproMath += 1;
                $student->setApproMath();

              } else {
                $AmountFailedMath += 1;
              }

              if ($student->get_nota_fisica() > 9) {
                $AmountApproPhysics += 1;
                $student->setApproPhysics();

              } else {
                $AmountFailedPhysics += 1;
              }

              if ($student->get_nota_progra() > 9) {
                $AmountApproProg += 1;
                $student->setApproProg();

              } else {
                $AmountFailedProg += 1;
              }

              if ($student->get_nota_mate() > $maxGradeMath) {
                $maxGradeMath = $student->get_nota_mate();
              }

              if ($student->get_nota_fisica() > $maxGradePhysics) {
                $maxGradePhysics = $student->get_nota_fisica();
              }

              if ($student->get_nota_progra() > $maxGradeProg) {
                $maxGradeProg = $student->get_nota_progra();
              }

            }
            ?>

            <tr>
              <th scope="row">Matemáticas</th>
              <?php
              //math
              echo "<td>";
              try {
                echo $averageMath = $SummMathGrade / sizeof($lista_alumnos);
              } catch (DivisionByZeroError) {
                echo "0";
              }
              echo "</td>";

              echo "<td>";
              echo $AmountApproMath;
              echo "</td>";

              echo "<td>";
              echo $AmountFailedMath;
              echo "</td>";

              echo "<td>";
              echo $maxGradeMath;
              echo "</td>";
              ?>
            </tr>

            <tr>
              <th scope="row">Física</th>
              <?php
              //physics
              echo "<td>";
              try {
                echo $averagePhysics = $SummPhysicsGrade / sizeof($lista_alumnos);
              } catch (DivisionByZeroError) {
                echo "0";
              }
              echo "</td>";

              echo "<td>";
              echo $AmountApproPhysics;
              echo "</td>";

              echo "<td>";
              echo $AmountFailedPhysics;
              echo "</td>";

              echo "<td>";
              echo $maxGradePhysics;
              echo "</td>";
              ?>
            </tr>

            <tr>
              <th scope="row">Programación</th>
              <?php
              //prog
              echo "<td>";
              try {
                echo $averageProg = $SummProgGrade / sizeof($lista_alumnos);
              } catch (DivisionByZeroError) {
                echo "0";
              }
              echo "</td>";

              echo "<td>";
              echo $AmountApproProg;
              echo "</td>";

              echo "<td>";
              echo $AmountFailedProg;
              echo "</td>";

              echo "<td>";
              echo $maxGradeProg;
              echo "</td>";
              ?>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="tabla">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Estudiantes que aprovaron todo</th>
              <th scope="col">Estudiantes que solo aprobaron una(1) materia</th>
              <th scope="col">Estudiantes que solo aprobaron dos(2) materias</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $AmountAll = 0;
            $AmountOne = 0;
            $AmountTwo = 0;

            foreach ($lista_alumnos as $student) {
              if (($student->getApproMath() + $student->getApproPhysics() + $student->getApproProg()) == 3) {
                $AmountAll += 1;
              }
              if (($student->getApproMath() + $student->getApproPhysics() + $student->getApproProg()) == 1) {
                $AmountOne += 1;
              }
              if (($student->getApproMath() + $student->getApproPhysics() + $student->getApproProg()) == 2) {
                $AmountTwo += 1;
              }
            }
            ?>
            <tr>
              <?php
              echo "<td>";
              echo $AmountAll;
              echo "</td>";

              echo "<td>";
              echo $AmountOne;
              echo "</td>";

              echo "<td>";
              echo $AmountTwo;
              echo "</td>";
              ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>    
</body>
<script>
    function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
}
var nota_mate = document.querySelector("#nota_mate");
var nota_fisi = document.querySelector("#nota_fisi");
var nota_progra = document.querySelector("#nota_progra");

function agregarDecimal_1() {
  var num = nota_mate.value.replace(/\./g,'');
  if(!isNaN(num)){
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{2})?/,'$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/,'');
    nota_mate.value = num;
  } else {
    alert('Solo se permiten números');
    nota_mate.value = nota_mate.value.replace(/[^\d\.]*/g,'');
  }
}

function agregarDecimal_2() {
  var num = nota_fisi.value.replace(/\./g,'');
  if(!isNaN(num)){
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{2})?/,'$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/,'');
    nota_fisi.value = num;
  } else {
    alert('Solo se permiten números');
    nota_fisi.value = nota_fisi.value.replace(/[^\d\.]*/g,'');
  }
}

function agregarDecimal_3() {
  var num = nota_progra.value.replace(/\./g,'');
  if(!isNaN(num)){
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{2})?/,'$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/,'');
    nota_progra.value = num;
  } else {
    alert('Solo se permiten números');
    nota_progra.value = nota_progra.value.replace(/[^\d\.]*/g,'');
  }
}
</script>
</html>