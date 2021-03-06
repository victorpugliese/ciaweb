<?php

require("../common.php"); 

$id_periodo        = $_GET['id_periodo'];
$id_curso          = $_GET['id_curso'];
$id_campus         = $_GET['id_campus'];
$id_disciplina     = $_GET['id_disciplina'];
$turma             = $_GET['turma'];
$ref_periodo_turma = $_GET['ref_periodo_turma'];
$is_cancelada      = $_GET['is_cancelada'];

CheckFormParameters(array('id_periodo'));


function Lista_disciplinas_ofer($ref_periodo, $ref_curso, $ref_campus, $ref_disciplina, $is_cancelada, $turma, $ref_periodo_turma)
{
   $conn = new Connection;

   $conn->Open();

   $sql =  " select id, " .
           "        ref_campus, " .
           "        get_campus(ref_campus), " .
           "        ref_curso, " .
           "        curso_desc(ref_curso), " .
           "        descricao_disciplina(ref_disciplina), " .
           "        ref_disciplina, " .
           "        is_cancelada, " .
           "        get_num_matriculados(id) || '/' || num_alunos, " .
           "        turma, " .
           "        ref_periodo_turma " .
           " from disciplinas_ofer " .
           " where ref_periodo='$ref_periodo' ";
           
           if ($ref_curso)
           {
               $sql .= " and ref_curso='$ref_curso' ";
           }
           if ($ref_campus)
           {
               $sql .= " and ref_campus='$ref_campus' ";
           }
           if ($ref_disciplina)
           {
               $sql .= " and ref_disciplina='$ref_disciplina' ";
           }
           if ($turma)
           {
               $sql .= " and turma='$turma' ";
           }
           if ($ref_periodo_turma)
           {
               $sql .= " and ref_periodo_turma='$ref_periodo_turma' ";
           }
           if ($is_cancelada == 'true')
           {
               $sql .= " and is_cancelada='1' ";
           }
           
   $sql .= " order by curso_desc(ref_curso), descricao_disciplina(ref_disciplina); ";
   //echo $sql;
   //die;
   $query = $conn->CreateQuery($sql);

   echo("<center><table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">");
   echo ("<tr><td colspan=\"5\">&nbsp;</td></tr>");
   echo ("<tr><td bgcolor=\"#000099\" colspan=\"5\" height=\"28\"><font size=\"3\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#FFFFFF\"><center><b>Listagem das Disciplinas Oferecidas - $ref_periodo</b></center></font></td></tr>");
   echo ("<tr><td colspan=\"5\">&nbsp;</td></tr>");
   
   $i=1;
   $curso_aux = '';

   $status[0] = "<font color=\"blue\" size=\"2\"><b>Confirmada</b></font>";
   $status[1] = "<font color=\"red\" size=\"2\"><b>Cancelada</b></font>";

   // cores fundo
   $bg0 = "#000000";
   $bg1 = "#EEEEFF";
   $bg2 = "#FFFFEE";
 
   // cores fonte
   $fg0 = "#FFFFFF";
   $fg1 = "#000099";
   $fg2 = "#000099";

   $total_disciplinas = 0;
   $total_confirmadas = 0;
   $total_canceladas = 0;

   while( $query->MoveNext() )
   {
     list ($id,
           $ref_campus,
           $campus,
           $ref_curso,
           $curso,
           $disciplina, 
           $ref_disciplina,
           $is_cancelada,
           $matric_vagas,
           $turma,
           $ref_periodo_turma) = $query->GetRowValues();

     $total_disciplinas = $total_disciplinas + 1;

     if ($is_cancelada == '1')
     {
        $total_canceladas = $total_canceladas + 1;
     }
     else
     {
        $total_confirmadas = $total_confirmadas + 1;
     }
     

     $href  = "<a href=\"javascript:Select_Disciplina($id)\"> " . $id . "</a>";
     $href2 = "<a href=\"javascript:Select_Alunos($id)\">$ref_disciplina - $disciplina</a>";
   
     if ($curso_aux != $curso)
     {
         echo ("<tr><td bgcolor=\"#000099\" colspan=\"5\" height=\"28\"><font size=\"3\" face=\"Verdana, Arial, Helvetica, sans-serif\" color=\"#FFFFFF\"><center><b>$ref_curso: $curso - $campus</b></center></font></td></tr>");
         echo ("<tr bgcolor=\"#000000\">\n");
         echo ("<td width=\"5%\"><Font face=\"Verdana\" size=\"2\" color=\"#ffffff\"><b>Ofer</b></font></td>");
         echo ("<td width=\"35%\"><Font face=\"Verdana\" size=\"2\" color=\"#ffffff\"><b>Campus<br>Nome do Professor</b></font></td>");
         echo ("<td width=\"35%\"><Font face=\"Verdana\" size=\"2\" color=\"#ffffff\"><b>Disciplina<br> Dia da Semana</b></font></td>");
         echo ("<td width=\"15%\"><Font face=\"Verdana\" size=\"2\" color=\"#ffffff\"><b>Status<br>Turno</b></font></td>");
         echo ("<td width=\"10%\" align=right><Font face=\"Verdana\" size=\"2\" color=\"#ffffff\"><b>Matric/Vagas<br>Turma</b></font></td>");
         echo ("  </tr>"); 
         $curso_aux = $curso;
     }

     echo("<tr bgcolor=\"$bg1\">\n");
     echo ("<td width=\"5%\"><Font face=\"Verdana\" size=\"1\" color=\"$fg1\">$href</td>");
     echo ("<td width=\"35%\"><Font face=\"Verdana\" size=\"1\" color=\"$fg1\">$campus&nbsp;</td>");
     echo ("<td width=\"35%\"><Font face=\"Verdana\" size=\"1\" color=\"$fg1\">$href2</td>");
     echo ("<td width=\"15%\"><Font face=\"Verdana\" size=\"1\" color=\"$fg1\">$status[$is_cancelada]&nbsp;</td>");
     echo ("<td width=\"10%\" align=\"right\"><Font face=\"Verdana\" size=\"1\" color=\"$fg1\">$matric_vagas&nbsp;</td>");
     echo("  </tr>");
	 
     $sql = " select B.ref_professor, " .
	        "        pessoa_nome(B.ref_professor), " .
            "        get_dia_semana(A.dia_semana), " .
            "        get_turno(A.turno) " .
            " from disciplinas_ofer_compl A, disciplinas_ofer_prof B " .
            " where A.ref_disciplina_ofer = B.ref_disciplina_ofer and " .
	      	"       A.id = B.ref_disciplina_compl and " .
	        "       A.ref_disciplina_ofer = '$id' and " .
	        "       B.ref_disciplina_ofer = '$id';";
        
	 $query2 = $conn->CreateQuery($sql);
	 
	 while( $query2->MoveNext() )
   	 {
       list ($ref_professor,
          	  $professor_nome,
         	  $dia_semana,
         	  $turno) = $query2->GetRowValues();

          echo("<tr bgcolor=\"$bg2\">\n");
          echo ("<td width=\"5%\"><Font face=\"Verdana\" size=\"1\" color=\"$fg2\">&nbsp;</td>");
          echo ("<td width=\"35%\"><Font face=\"Verdana\" size=\"1\" color=\"$fg2\">$professor_nome&nbsp;</td>");
          echo ("<td width=\"35%\"><Font face=\"Verdana\" size=\"1\" color=\"$fg2\">$dia_semana</td>");
          echo ("<td width=\"15%\"><Font face=\"Verdana\" size=\"1\" color=\"$fg2\">$turno&nbsp;</td>");
          echo ("<td width=\"10%\" align=right><Font face=\"Verdana\" size=\"1\" color=\"$fg2\">$turma<i>($ref_periodo_turma)</i>&nbsp;</td>");
          echo("  </tr>\n");
     }
	 
     @$query2->Close();
     
     $i++;
   }

   echo("<tr><td colspan=\"5\"><hr></td></tr>");
   echo("<tr><td colspan=\"5\"><b>Total de Disciplinas: $total_disciplinas</b></td></tr>");
   echo("<tr><td colspan=\"5\"><b>Total de <font color=\"blue\">Confirmadas</font>: $total_confirmadas</b></td></tr>");
   echo("<tr><td colspan=\"5\"><b>Total de <font color=\"red\">Canceladas:</font> $total_canceladas</b></td></tr>");
   echo("<tr><td colspan=\"5\"><hr></td></tr>");
   
   echo("</table></center>");

   @$query->Close();

   @$conn->Close();

}
?>
<html>
<head>
<title>Lista de Disciplinas Oferecidas</title>
<script language="JavaScript">
function Select_Disciplina(id)
{
  var url = "atualiza_disciplina_ofer.php" +
            "?id=" + escape(id);

  location = url; 
}

function Select_Alunos(id)
{
  var url = "cons_numalu_oferta.php" +
            "?ref_disciplina_ofer=" + escape(id);

  location = url; 
}

</script>
</head>
<body bgcolor="#FFFFFF">
<form method="post" action="" name="myform">
<?php
    Lista_disciplinas_ofer($id_periodo, $id_curso, $id_campus, $id_disciplina, $is_cancelada, $turma, $ref_periodo_turma);
?>
<center>
    <input type="button"  name="Submit2" value=" Voltar " onClick="history.go(-1)">
</center>
</form>
</body>
</html>
