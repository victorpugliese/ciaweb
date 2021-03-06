<?php

require("../common.php");
require("../lib/SQLCombo.php");

$ref_periodo         = $_POST['ref_periodo'];
$ref_curso           = $_POST['ref_curso'];
$curso               = $_POST['curso'];
$turma               = $_POST['turma'];
$ref_periodo_turma   = $_POST['ref_periodo_turma'];
$ref_campus          = $_POST['ref_campus'];
$ref_disciplina      = $_POST['ref_disciplina'];
$ref_disciplina_nome = $_POST['ref_disciplina_nome'];

CheckFormParameters(array("ref_campus",
               			     "ref_curso" ,
			                 "ref_periodo")); 

$conn = new Connection;

$conn->Open();
 
$sql = "select nome_campus from campus where id = $ref_campus;";
 
$query = $conn->CreateQuery($sql);
 
SaguAssert($query && $query->MoveNext(),"Campus não encontrado!");
 
list ($nome_campus) = $query->GetRowValues();

$query->Close();
 
$sql = "select descricao from cursos where id = $ref_curso;";
 
$query = $conn->CreateQuery($sql);

SaguAssert($query && $query->MoveNext(),"Curso não encontrado!");
 
list ($nome_curso) = $query->GetRowValues();

$sql = "select id,descricao_disciplina,num_creditos from disciplinas where id = '$ref_disciplina';";
 
$query = $conn->CreateQuery($sql);

if ( $query->MoveNext() )
list ($ref_disciplina,$ref_disciplina_nome,$num_creditos_desconto) = $query->GetRowValues();

$query->Close();
 
?>
<html>
<head>
<script language="Javascript">
function ChangeOption(opt,fld)
{
  var i = opt.selectedIndex;

  if ( i != -1 )
    fld.value = opt.options[i].value;
  else
    fld.value = '';
}

function ChangeOp1()
{
  ChangeOption(document.myform.op1,document.myform.dia_semana);
}

function ChangeOp2()
{
  ChangeOption(document.myform.op2,document.myform.ref_horario);
}

function ChangeOp3()
{
  ChangeOption(document.myform.op3,document.myform.ref_regime);
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

  field.focus();

  return true;
}
function buscaProfessor()
{
  cmp = '2';
  var url = '../generico/post/lista_professores.php' +
            '?pnome=' + escape(document.myform.ref_professor.value);

  var wnd = window.open(url,'busca','toolbar=no,width=550,height=350,scrollbars=yes');
}

var cmp;

function buscaDiscp()
{
  cmp = '1';

  var url = '../generico/post/lista_disciplinas_curso.php' + 
            '?ref_curso=' + escape(document.myform.ref_curso.value);

  var wnd = window.open(url,'busca','toolbar=no,width=550,height=350,scrollbars=yes');
}

function buscaPessoa()
{
  cmp = '2';

  var url = '../generico/post/lista_pessoas.php' +
            '?pnome=' + escape(document.myform.ref_professor_nome.value);

  var wnd = window.open(url,'busca','toolbar=no,width=550,height=350,scrollbars=yes');
}

function buscaSala()
{
  cmp = '3';

  var url = '../generico/post/lista_salas.php' +
            '?ref_campus=' + escape(document.myform.ref_campus.value);

  var wnd = window.open(url,'busca','toolbar=no,width=550,height=350,scrollbars=yes');
}

function buscaCapacidade()
{
  cmp = '3';

  var url = '../generico/post/lista_salas.php' +
            '?ref_campus=' + escape(document.myform.ref_campus.value) +
            '&num_sala=' + escape(document.myform.num_sala.value);

  var wnd = window.open(url,'busca','toolbar=no,width=10,height=10,scrollbars=no');
}

function setResult(arg1,arg2,arg3)
{
  if (cmp=='1')
  {
    document.myform.ref_disciplina.value = arg1;
    document.myform.ref_disciplina_nome.value = arg2;
    document.myform.num_creditos_desconto.value = arg3;
  }

  else if (cmp=='2')
  {
    document.myform.ref_professor.value = arg1;
    document.myform.ref_professor_nome.value = arg2;
  }

  else if (cmp=='3')
  {
    document.myform.num_sala.value = arg1;
    document.myform.num_alunos.value = arg2;
  }
}
</script>
</head>
<body marginwidth="20" marginheight="20">
<form method="post" action="post/disciplina_ofer.php" name="myform">
<input type="hidden" name="dia_semana" value="-1">
<input type="hidden" name="ref_horario" value="0">
<input type="hidden" name="ref_regime" value="1">
<input type="hidden" name="num_creditos_desconto" value="">
<input type="hidden" name="desconto" value="">
<table width="90%" align="center">
	<tr bgcolor="#000099">
		<td colspan="2" height="40">
		<div align="center"><font size="3"
			face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#CCCCFF">Inclusão
		de Disciplinas Oferecidas</font></b></font></div>
		</td>
	</tr>
	<tr>
		<td colspan="2" height="28">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" height="28" bgcolor="#000099"><font size="2"
			face="Verdana, Arial, Helvetica, sans-serif" color="#CCCCFF"><b>&nbsp;Dados
		Gerais</b></font></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="109"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Campus</font></td>
		<td width="387"><font color="#000000"
			face="Verdana, Arial, Helvetica, sans-serif" size="2"><?echo($ref_campus)?>
		- <?echo($nome_campus)?> <input type="hidden" name="ref_campus"
			value="<?echo($ref_campus)?>"> <input type="hidden"
			name="nome_campus" value="<?echo($nome_campus)?>"> </font></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="109"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">
		&nbsp;Curso</font></td>
		<td width="387"><font color="#000000"
			face="Verdana, Arial, Helvetica, sans-serif" size="2"><?echo($ref_curso)?>
		- <?echo($nome_curso)?></font> <font color="#000000"
			face="Verdana, Arial, Helvetica, sans-serif" size="2"> <input
			type="hidden" name="ref_curso" value="<?echo($ref_curso)?>"> <input
			type="hidden" name="nome_curso" value="<?echo($nome_curso)?>"> </font>
		</td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="109"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Per&iacute;odo</font></td>
		<td width="387"><font color="#000000"
			face="Verdana, Arial, Helvetica, sans-serif" size="2"><?echo($ref_periodo)?>
			<?echo($nome_periodo)?></font> <font color="#000000"
			face="Verdana, Arial, Helvetica, sans-serif" size="2"> <input
			type="hidden" name="ref_periodo" value="<?echo($ref_periodo)?>"> </font>
		</td>
	</tr>

	<tr>
		<td bgcolor="#CCCCFF" width="109"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Turma:</font></td>
		<td width="387"><font color="#000000"
			face="Verdana, Arial, Helvetica, sans-serif" size="2"><?echo($turma)?><i>(<?echo($ref_periodo_turma)?>)</i></font>
		<font color="#000000" face="Verdana, Arial, Helvetica, sans-serif"
			size="2"> <input type="hidden" name="turma" value="<?echo($turma)?>">
		<input type="hidden" name="ref_periodo_turma"
			value="<?echo($ref_periodo_turma)?>"> </font></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" height="28" bgcolor="#000099"><font size="2"
			face="Verdana, Arial, Helvetica, sans-serif" color="#CCCCFF"><b>&nbsp;Dados
		da Disciplina</b></font></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="109"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Disciplina</font></td>
		<td width="387">
		<table width="387" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="9%">
				<div align="left"><font color="#000000"> <input
					name="ref_disciplina" value="<?=$ref_disciplina?>" type=text
					size="6" onChange="ChangeCode('ref_disciplina','op3')"> </font></div>
				</td>
				<td width="100%"><font color="#000000"><font color="#000000"> <input
					name="ref_disciplina_nome" value="<?=$ref_disciplina_nome?>"
					type=text size="30"> </font></font></td>
				<td><font color="#000000"><font color="#000000"> <input
					type="button" value="..." onClick="buscaDiscp()"> </font></font></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="109"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Professor</font></td>
		<td width="387" valign="middle" align="left">
		<table width="387" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="10%">
				<div align="left"><font color="#000000"> <input name="ref_professor"
					type=text size="6"> </font></div>
				</td>
				<td width="100%"><font color="#000000"><font color="#000000"><font
					color="#000000"> <input name="ref_professor_nome" type=text
					size="30"> </font> </font></font></td>
				<td><font color="#000000"><font color="#000000"> <font
					color="#000000"><font color="#000000"> <input type="button"
					value="..." onClick="buscaProfessor()" name="button"> <font
					color="#000000"><font color="#000000"> </font></font></font></font>
				</font></font></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="109"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;N&ordm;
		Sala </font></td>
		<td width="387">
		<table width="387" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="9%">
				<div align="left"><font color="#000000"> <input name="num_sala"
					type=text size="6" value="1" onChange="buscaCapacidade()"> </font></div>
				</td>
				<td width="100%"><font color="#000000"><font color="#000000"><font
					color="#000000">&nbsp; </font> </font></font></td>
				<td><font color="#000000"><font color="#000000"><font
					color="#000000"><font color="#000000"> <input type="button"
					value="..." onClick="buscaSala()" name="button2"> </font></font> </font></font></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="109"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;N&ordm;
		Alunos</font></td>
		<td width="387"><input name="num_alunos" type=text size="5"></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="109"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Conteúdo</font></td>
		<td width="387"><input name="conteudo" type=text size="38"></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="109"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Observação</font></td>
		<td width="387"><input name="observacao" type=text size="38"></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" width="30%"><font
			face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Data
		do Exame<br>
		&nbsp;(Campo Opcional)<br>
		&nbsp;(dd-mm-aaaa)</font></td>
		<td width="70%"><input name="dt_exame" type=text size="10"
			maxlength="10"></td>
	</tr>
	<tr>
		<td colspan="2">
		<hr size="1">
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<div align="center"><input type="submit" name="Submit"
			value=" Salvar "> <input type="reset" name="Submit2" value=" Limpar ">
		<input type="button" name="Submit2" value=" Voltar "
			onClick="history.go(-1)"></div>
		</td>
	</tr>
</table>
</form>
</body>
</html>
