<?php

require("../common.php");
require("../properties.php");
require("../lib/SQLCombo.php");

$conn = new connection_factory($param_conn);

// Verifica as permissoes de acesso do usuario quanto ao arquivo
$ACL_FILE = __FILE__;
require_once($BASE_DIR .'core/login/acesso.php');
// ^ Verifica as permissoes de acesso do usuario quanto ao arquivo ^ //

$ref_periodo = $properties->Get("ref_periodo");
$op2_opcoes = SQLArray("$sql_periodos_academico");
$op3_opcoes = SQLArray("select nome_campus, id from campus order by nome_campus");
$op4_opcoes = SQLArray($sql_periodos_academico);


?>
<html>
<head>
<script language="javascript">
var tipo_busca;

function ChangeOption(opt,fld)
{
  var i = opt.selectedIndex;

  if ( i != -1 )
    fld.value = opt.options[i].value;
  else
    fld.value = '';
}

function ChangeOp2()
{
  ChangeOption(document.myform.op2,document.myform.ref_periodo);
}

function ChangeOp3()
{
  ChangeOption(document.myform.op3,document.myform.ref_campus);
}

function ChangeOp4()
{
  ChangeOption(document.myform.op4,document.myform.ref_periodo_turma);
}

function ChangeCode(fld_name,op_name)
{ 
  var field = eval('document.myform.' + fld_name);
  var combo = eval('document.myform.' + op_name);
  var code  = field.value;
  var n     = combo.options.length;
  for ( var i=0; i<n; i++ )
  {
    if ( combo.options[i].value == code )
    {
      combo.selectedIndex = i;
      return;
    }
  }

  alert(code + ' não é um código válido!');

  field.focus();

  return true;
}

function buscaCurso()
{
  tipo_busca = 1;

  var url = "../generico/post/lista_cursos_nome.php" + 
            "?id=" + escape(document.myform.ref_curso.value) + 
            "&curso=" + escape(document.myform.curso.value);

  var wnd = window.open(url,'busca','toolbar=no,width=550,height=350,scrollbars=yes');
}

function buscaDiscp()
{
  tipo_busca = 2;

  var url = '../generico/post/lista_disciplinas_curso.php' + 
            '?ref_curso=' + escape(document.myform.ref_curso.value);

  var wnd = window.open(url,'busca','toolbar=no,width=550,height=350,scrollbars=yes');
}


function setResult(arg1,arg2)
{
  if (tipo_busca == 1)
  {
    document.myform.ref_curso.value = arg1;
    document.myform.curso.value = arg2;
  }

  if (tipo_busca == 2)
  {
    document.myform.ref_disciplina.value = arg1;
    document.myform.ref_disciplina_nome.value = arg2;
  }
}

function BuscaDisciplianasOfer()
{
  
  var url = "lista_disciplinas_ofer.php" + 
            "?id_periodo=" + escape(document.myform.ref_periodo.value) + 
            "&id_curso=" + escape(document.myform.ref_curso.value) +
            "&id_campus=" + escape(document.myform.ref_campus.value) +
            "&id_disciplina=" + escape(document.myform.ref_disciplina.value) +
            "&turma=" + escape(document.myform.turma.value) +
            "&ref_periodo_turma=" + escape(document.myform.ref_periodo_turma.value) +
            "&is_cancelada=" + document.myform.is_cancelada.checked;

 location = url;
}

function AlteraSala()
{
  var url = "altera_salas_ofer.php" + 
            "?ref_disciplina_ofer=" + escape(document.myform2.id.value);

 location = url;
}
</script>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#FFFFFF" marginwidth="20" marginheight="20">
<div class="titulo" align="center"><h2>Disciplinas oferecidas</h2></div>
<form method="post" action="disciplina_ofer_curso.php" name="myform">
<table cols=2 width="90%" align="center">
	<tr bgcolor="#000099">
		<td colspan="2" height="40">
		<div align="center"><font size="3"
			face="Verdana, Arial, Helvetica, sans-serif" color="#CCCCFF"><b>&nbsp;Inclusão
		de Disciplinas Oferecidas</b></font></div>
		</td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="20%"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Per&iacute;odo
		</font></td>
		<td width="80%"><input name="ref_periodo" type=text size="7"
			onChange="ChangeCode('ref_periodo','op2')"
			value="<?echo($ref_periodo)?>"> <font color="#000000"> <?php ComboArray("op2",$op2_opcoes,$ref_periodo,"ChangeOp2()");?>
		</font></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="20%"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Curso</font></td>
		<td width="80%">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td><font color="#000000"> <input name="ref_curso" type=text
					size="7" value="<?echo($ref_curso)?>"> <input type="text"
					name="curso" size="50"> </font></td>
				<td>
				<div align="right"><input type="button" value="..."
					onClick="buscaCurso()"></div>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="20%"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Turma</font>
		</td>
		<td width="80%"><input name="turma" type=text size="7"></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="20%"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Início
		da turma</font></td>
		<td width="80%"><input name="ref_periodo_turma" type=text size="7"
			onChange="ChangeCode('ref_periodo_turma','op4')"
			value="<?echo($ref_periodo_turma)?>"> <font color="#000000"> <?php ComboArray("op4",$op4_opcoes,$ref_periodo_turma,"ChangeOp4()");?>
		</font></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="20%"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Campus</font>
		</td>
		<td width="80%"><input name="ref_campus" type=text size="7" value=""
			onChange="ChangeCode('ref_campus','op3')"> <font color="#000000"> <?php ComboArray("op3",$op3_opcoes,$ref_campus,"ChangeOp3()");?>
		</font></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="20%"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Disciplina</font></td>
		<td width="80%">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td><font color="#000000"> <input name="ref_disciplina" type=text
					size="7" onChange="ChangeCode('ref_disciplina','op4')"> <input
					name="ref_disciplina_nome" type=text size="50"> </font></td>
				<td><font color="#000000"> <input type="button" value="..."
					onClick="buscaDiscp()"> </font></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="20%"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Somente
		Canceladas?</font></td>
		<td width="80%"><input type="checkbox" name="is_cancelada" unchecked>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<hr size="1">
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<div align="center"><input type="submit" name="Submit1"
			value=" Prosseguir "> <input type="button" name="button1"
			value="   Listar   " onClick="BuscaDisciplianasOfer()"></div>
		</td>
	</tr>
</table>
</form>
<form method="post" action="atualiza_disciplina_ofer.php"
	name="myform2">
<table cols=2 width="90%" align="center">
	<tr bgcolor="#000099">
		<td colspan="3" height="40">
		<div align="center"><font size="3"
			face="Verdana, Arial, Helvetica, sans-serif" color="#CCCCFF"><b>Alteração
		de Disciplinas Oferecidas</b></font></div>
		</td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="50%"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;C&oacute;digo
		da Disciplina Oferecida</font></td>
		<td width="40%"><input name="id" type=text size="7" value=""></td>
		<td width="10%">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">
		<hr size="1">
		</td>
	</tr>
	<tr>
		<td colspan="3">
		<div align="center"><input type="submit" name="submit2"
			value=" Prosseguir "> <input type="button" name="button4"
			value="   Salas   " onClick="AlteraSala()"></div>
		</td>
	</tr>
</table>
</form>
</body>
</html>
