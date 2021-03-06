<?php

require("../common.php");
require_once '../../../core/login/acl.php';

$conn = new connection_factory($param_conn);

// Verifica as permissoes de acesso do usuario quanto ao arquivo
$ACL_FILE = __FILE__;
require_once($BASE_DIR .'core/login/acesso.php');
// ^ Verifica as permissoes de acesso do usuario quanto ao arquivo ^ //

require("../lib/SQLCombo.php");

$op1_opcoes = SQLArray("select descricao,id from cursos order by descricao");
$op2_opcoes = SQLArray("select nome_campus, id from campus order by nome_campus");

?>
<html>
<head>
<link rel="stylesheet" href="<?=$BASE_URL .'public/styles/required.css'?>" type="text/css">
<script language="JavaScript">
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
  ChangeOption(document.myform.op1,document.myform.ref_curso);
}

function ChangeOp2()
{
  ChangeOption(document.myform.op2,document.myform.ref_campus);
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

  //alert(code + ' n&atilde;o &aacute; um c&oacute;;digo v&aacute;lido!');

  field.focus();

  return true;
}

var tipo_busca;

function buscaOpcao(pf_opcao)
{
  var url;
  tipo_busca=pf_opcao;

 if (tipo_busca == 1)
   url = "../generico/post/lista_disciplinas_todas.php" + 
         "?desc=" + escape(document.myform.ref_disciplina_nome.value);

 else if (tipo_busca == 2)
   url = "../generico/post/lista_disciplinas_todas.php" + 
         "?desc=" + escape(document.myform.equivalencia_disciplina_nome.value);

 else if (tipo_busca == 3)
   url = "../generico/post/lista_cursos_nome.php" + 
         "?id=" + escape(document.myform.ref_curso.value) + 
         "&curso=" + escape(document.myform.curso.value);

 else if (tipo_busca == 4)
   url = "../generico/post/lista_areas_ensino.php" +
         "?desc=" + escape(document.myform.ref_area.value);

  var wnd = window.open(url,'busca','toolbar=no,width=550,height=350,scrollbars=yes');
}

function setResult(arg1,arg2)
{
  if (tipo_busca == 1)
  {
    document.myform.ref_disciplina.value = arg1;
    document.myform.ref_disciplina_nome.value = arg2;
  }
  else if  (tipo_busca == 2)
  {
    document.myform.equivalencia_disciplina.value = arg1;
    document.myform.equivalencia_disciplina_nome.value = arg2;
  }
  else if  (tipo_busca == 3)
  {
    document.myform.ref_curso.value = arg1;
    document.myform.curso.value = arg2;
  }
  else if  (tipo_busca == 4)
  {
    document.myform.ref_area.value = arg1;
    document.myform.area.value = arg2;
  }
}
</script>
</head>
<body bgcolor="#FFFFFF" marginwidth="20" marginheight="20">
<form method="post" action="post/cursos_disciplinas.php" name="myform">
  <table width="90%" align="center">
    <tr bgcolor="#000099"> 
      <td height="35" colspan="2"> 
        <div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#CCCCFF">Inclus&atilde;o de Disciplinas nos Cursos</font></b></font><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><b> 
        </b></font></div>
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Curso&nbsp;<span class="required">*</span> </font></td>
      <td> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10%">
              <input name="ref_curso" type=text size="5" onChange="ChangeCode('ref_curso','op1')">
            </td>
            <td width="100%">
              <input type="text" name="curso" size="30">
            </td>
            <td> 
              <div align="right">
                <input type="button" value="..." onClick="buscaOpcao(3)" name="button22">
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Campus&nbsp;<span class="required">*</span> </font></td>
      <td> 
        <input name="ref_campus" type=text value="1" size="5">
        <?php ComboArray("op2",$op2_opcoes,"0","ChangeOp2()");?>
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Disciplina&nbsp;<span class="required">*</span> </font></td>
      <td> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="9%"> 
              <input name="ref_disciplina" type=text size="5" onChange="ChangeCode('ref_disciplina','op2')">
            </td>
            <td width="100%"><font color="#000000"><font color="#000000"> 
              <input name="ref_disciplina_nome" type=text size="30">
              </font></font></td>
            <td width="0%"> 
              <div align="right"><font color="#000000"><font color="#000000"> 
                <input type="button" value="..." onClick="buscaOpcao(1)" name="button">
                <font color="#000000"> </font> </font></font></div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Semestre 
        no Curso&nbsp;<span class="required">*</span> </font></td>
      <td> 
        <input name="semestre_curso" type=text size="5">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Curr&iacute;culo MCOPA&nbsp;<span class="required">*</span> </font></td>
      <td> 
        <select name="curriculo_mco">
          <option value="" selected>----- Selecione -----</option>
          <option value="M">M&iacute;nimo</option>
          <option value="C">Complementar</option>
          <option value="O">Optativa</option>
          <option value="P">Profici&ecirc;ncia</option>
          <option value="A">Atividade Complementar</option>
        </select>
      </td>
    </tr>
<!--
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Disciplina Equivalente </font></td>
      <td> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10%"> 
              <input name="equivalencia_disciplina" type=text size="5">
            </td>
            <td width="100%"><font color="#000000"><font color="#000000"> 
              <input name="equivalencia_disciplina_nome" type=text size="30">
              </font></font></td>
            <td width="0%"> 
              <div align="right"><font color="#000000"><font color="#000000"> 
                <input type="button" value="..." onClick="buscaOpcao(2)" name="button2">
                </font></font></div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
-->
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Data In&iacute;cio Curr&iacute;culo<br>&nbsp;(dd-mm-aaaa)</font></td>
      <td> 
        <input name="dt_inicio_curriculo" type=text size="10" maxlength="10">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Data Final Curr&iacute;culo<br>&nbsp;(dd-mm-aaaa)</font></td>
      <td> 
        <input name="dt_final_curriculo" type=text size="10" maxlength="10">
      </td>
    </tr>
<!--
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Curso 
        Substitu&iacute;do </font></td>
      <td> 
        <input name="curso_substituido" type=text size="5">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Disciplina 
        Substitu&iacute;da </font></td>
      <td> 
        <input name="disciplina_substituida" type=text size="5">
      </td>
    </tr>-->
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Pr&eacute;-Requisito Hora-Aula</font></td>
      <td> 
        <input name="pre_requisito_hora" type=text size="5">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;&Aacute;rea de Ensino</font></td>
      <td> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="9%"> 
              <input name="ref_area" type=text size="5">
            </td>
            <td width="100%"><font color="#000000"><font color="#000000"> 
              <input name="area" type=text size="30">
              </font></font></td>
            <td width="0%"> 
              <div align="right"><font color="#000000"><font color="#000000"> 
                <input type="button" value="..." onClick="buscaOpcao(4)" name="button">
                <font color="#000000"> </font> </font></font></div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Exibir no Hist�rico</font></td>
      <td>
        <select name="exibe_historico">
          <option value="S" selected="selected"> Sim</option>
          <option value="N"> N&atilde;o</option>
        </select>
      </td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <hr size="1">
      </td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <div align="center"> 
            <input type="submit" name="Submit"  value=" Salvar ">
            <input type="reset"  name="Submit2" value=" Limpar ">
            <input type="button" name="Button2" value=" Voltar " onClick="location='consulta_inclui_cursos_disciplinas.php'">
        </div>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
