<?php

require("../common.php");

$conn = new connection_factory($param_conn);

// Verifica as permissoes de acesso do usuario quanto ao arquivo
$ACL_FILE = __FILE__;
require_once($BASE_DIR .'core/login/acesso.php');
// ^ Verifica as permissoes de acesso do usuario quanto ao arquivo ^ //

$ref_disciplina = $_POST['ref_disciplina'];
$nome = $_POST['nome'];


function ListaDisciplinas()
{
	global $id,   $ref_disciplina, $desc;
	global $like, $ref_disc;

	$desc = strtoupper($desc);

	// cores fundo
	$bg0 = "#000000";
	$bg1 = "#EEEEFF";
	$bg2 = "#FFFFEE";

	// cores fonte
	$fg0 = "#FFFFFF";
	$fg1 = "#000099";
	$fg2 = "#000099";

	echo("<table width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">");

	echo("  <tr bgcolor=\"$bg0\">\n");
	echo("    <td width=\"50%\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"$fg0\">Nome da Disciplina</font></b></td>\n");
	echo("    <td width=\"40%\" align=\"center\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"$fg0\">Curso</font></b></td>\n");
	echo("    <td width=\"5%\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"$fg0\">&nbsp;</font></b></td>\n");
	echo("    <td width=\"5%\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"$fg0\">&nbsp;</font></b></td>\n");
	echo("  </tr>\n");

	$ctrl = 0;
	if ( $ref_disciplina )
	{
		$conn = new Connection;
		$conn->Open();

		// note the parantheses in the where clause !!!
		$sql = " select id, " .
              "        ref_disciplina_pre, " .
              "        descricao_disciplina(ref_disciplina_pre), " .
              "        ref_curso, " .
              "        ref_area, " .
              "        horas_area, " .
              "        ref_disciplina, " .
              "        tipo " .
              " from pre_requisitos " .
              " where ref_disciplina = '$ref_disciplina' " .
              " order by ref_curso, ref_disciplina_pre";

		$query = @$conn->CreateQuery($sql);

		for ( $i=0; $query->MoveNext(); $i++ )
		{

			list ( $id,
			$ref_disciplina_pre,
			$nome,
			$ref_curso,
			$ref_area,
			$horas_area,
			$ref_disciplina,
			$tipo) = $query->GetRowValues();

			$ctrl = 1;

			if ( $i % 2 )
			{
				$bg = $bg1;
				$fg = $fg1;
			}
			else
			{
				$bg = $bg2;
				$fg = $fg2;
			}

			if ( empty($campo) )
			$campo = '';

			$href  = "<a href=\"edita_pre_requisito.php?id=$id\"><img src=\"../images/update.gif\" title='Alterar' align='absmiddle' border=0></a>";
			$href1 = "<a href=\"javascript:Confirma_Exclui('$id','$ref_disciplina','$ref_disciplina_pre','$ref_curso')\"><img src=\"../images/delete.gif\" title='Excluir' align='absmiddle' border=0></a>";

			echo("<tr bgcolor=\"$bg\">\n");
			echo(" <td width=\"50%\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"$fg\">$ref_disciplina_pre - $nome</font></b></td>\n");
			/*         echo(" <td width=\"6%\" align=\"center\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"$fg\">$tipo&nbsp;</font></b></td>\n");
			 echo(" <td width=\"12%\" align=\"center\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"$fg\">$ref_area&nbsp;</font></b></td>\n");
			 echo(" <td width=\"13%\" align=\"center\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"$fg\">$horas_area&nbsp;</font></b></td>\n");
			 */
			echo(" <td width=\"40%\" align=\"center\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"$fg\">$ref_curso</font></b></td>\n");
			echo(" <td width=\"5%\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"$fg\">$href</font></b></td>\n");
			echo(" <td width=\"5%\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"$fg\">$href1</font></b></td>\n");
			echo("</tr>\n");

		}
	}

	if ($ctrl == 0)
	{
		echo(" <tr>\n");
		echo("    <td width=\"100%\" colspan=\"9\" align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"red\"><b>Nenhuma disciplina pré requisito!!!</b></font></td>\n");
		echo("  </tr>\n");
	}

	echo("</table>");

	@$query->Close();
	@$conn->Close();

}
?>
<html>
<head>
<title>Inclusão de Pré-Requisitos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="JavaScript">
 function _init()
 {
   document.selecao.id.focus();
 }

 function Confirma_Exclui(arg1, arg2, arg3, arg4)
 {
   url = 'post/exclui_pre_requisito.php?id=' + arg1 + '&ref_disciplina=' + arg2 + '&ref_disciplia_pre=' + arg3 + '&ref_curso=' + arg4;

   if (confirm("Você tem certeza que deseja EXCLUIR a Disciplina "+arg3+" do Curso "+arg4))
     location=(url)
   else
     alert("Exclusão Cancelada.");
 }
</script>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#FFFFFF" marginwidth="20" marginheight="20"
	onload="_init()">
<div class="titulo" align="center">
<h2>Pr&eacute;-requisitos</h2>
</div>
<form method="post" action="lista_pre_requisitos.php"
	name="prerequisitos">
<table width="90%" border="0" cellspacing="0" cellpadding="2"
	align="center">
	<tr bgcolor="#FFFFFF">
		<td align="center"><input type="button" value=" Incluir "
			onClick="location='inclui_pre_requisito.php'" name="button"></td>
	</tr>
	<tr>
		<td>
		<hr align="center">
		</td>
	</tr>
	<tr bgcolor="#FFFFFF">
		<td colspan="5" align="center" height="50"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF0000"><b>CUIDADO
		PARA NÃO DUPLICAR CADASTROS !</font></b>
		</p>
		</td>
	</tr>
	<tr bgcolor="#0066CC">
		<td colspan="5" height="28" align="center"><font size="2"
			color="#FFFFFF"><b><font face="Verdana, Arial, Helvetica, sans-serif">Consulta/Altera&ccedil;&atilde;o
		Pré-Requisitos por Curso</font></b></font></td>
	</tr>
	<tr bgcolor="#FFFFFF">
		<td align="center"><font face="Verdana, Arial, Helvetica, sans-serif"
			size="2">Código do Curso:&nbsp;&nbsp;</font> <input type="text"
			name="ref_curso" size="10"> <input type="submit" value="Consultar"
			name="button"><br>
		</td>
	</tr>
	<tr bgcolor="#FFFFFF">
		<td align="center"><font face="Verdana, Arial, Helvetica, sans-serif"
			size="2">(Deixe em branco para listar todos os cursos)</font></td>
	</tr>
</table>
</form>
<form method="post" action="consulta_inclui_pre_requisito.php"
	name="selecao">
<table width="90%" border="0" cellspacing="0" cellpadding="2"
	align="center">
	<tr bgcolor="#0066CC">
		<td colspan="5" height="28" align="center"><font size="2"
			color="#FFFFFF"><b><font face="Verdana, Arial, Helvetica, sans-serif">Consulta/Altera&ccedil;&atilde;o
		Pré Requisitos por Disciplina</font></b></font></td>
	</tr>
	<tr>
		<td width="10%"><font face="Verdana, Arial, Helvetica, sans-serif"
			size="2">Disciplina:&nbsp;&nbsp;</font></td>
		<td width="10%"><input type="text" name="ref_disciplina" size="10"
			value=""></td>
		<td width="10%"><font face="Verdana, Arial, Helvetica, sans-serif"
			size="2">Descrição:&nbsp;&nbsp;</font></td>
		<td width="60%"><input type="text" name="nome" size="30" value="">&nbsp;&nbsp;
		</td>
		<td width="10%" align="right"><input type="submit" name="botao"
			value="Localizar"></td>
	</tr>
	<tr>
		<td colspan="5" align="center">
		<hr size="1">
		</td>
	</tr>
</table>

<? ListaDisciplinas(); ?>

<table width="90%" border="0" cellspacing="0" cellpadding="2"
	align="center">
	<tr align="center">
		<td colspan="5">
		<hr size="1" width="90%">
		</td>
	</tr>
</table>
</form>
</body>
</html>
