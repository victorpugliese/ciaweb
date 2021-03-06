<?php

require("../common.php");
require("../lib/SQLCombo.php"); 

?>
<html>
<head>
<script language="JavaScript">
function buscaProfessor()
{
  tipo_busca = 1;

  var url = "../generico/post/lista_pessoas.php" +
            "?pnome=" + escape(document.myform.professor.value);

  var wnd = window.open(url,'busca','toolbar=no,width=530,height=350,scrollbars=yes');
}

function buscaDepartamento()
{
  tipo_busca = 2;
  url = '../generico/post/lista_departamentos.php' +
         '?id=' + escape(document.myform.ref_departamento.value) +
         '&desc=' + escape(document.myform.nome_departamento.value);

  window.open(url,"busca","toolbar=no,width=530,height=320,top=80,left=55,directories=no,menubar=no,scrollbars=yes");
}

function setResult(arg1,arg2)
{
    if (tipo_busca == '1')
    {
        document.myform.ref_professor.value = arg1;
        document.myform.professor.value = arg2;
    }
    else if (tipo_busca == '2')
    {
        document.myform.ref_departamento.value = arg1;
        document.myform.nome_departamento.value = arg2;
    }
}

function _init()
{
  document.myform.ref_professor.focus();
}

</script>
</head>
<body bgcolor="#FFFFFF" marginwidth="20" marginheight="20" onload="_init()">
<form method="post" action="post/professores_inclui.php" name="myform">
<table width="90%" align="center">
  <tr bgcolor="#000099"> 
    <td height="35" colspan="2"> 
      <div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#CCCCFF">Inclusão de Professores</font></b></font></div>
    </td>
  </tr>
  <tr>
    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="00009C">&nbsp;Professor</font></td>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><font color="#000000">
            <input name="ref_professor" type=text size="6" value="<?=$ref_professor?>">
            </font></td>
          <td><font color="#000000">
            <input type="text" name="professor" size="35" value="<?=$professor?>">
            </font></td>
          <td>
            <div align="right">
              <input type="button" value="..." onClick="buscaProfessor()" name="button2">
            </div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Departamento</font></td>
    <td> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> 
            <input name="ref_departamento" type=text size="6" onChange="ChangeCode('ref_departamento','op1')">
          </td>
          <td> 
            <input type="text" name="nome_departamento" size="35">
          </td>
          <td> 
            <div align="right"> 
              <input type="button" name="Submit3" value="..." onClick="buscaDepartamento()">
            </div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Data de Ingresso na Instituição<br>&nbsp;(dd-mm-aaaa)</font></td>
    <td>
      <input type="text" name="dt_ingresso" size="10" maxlength="10">
    </td>
  </tr>
  <tr> 
    <td colspan="2"> 
      <hr size="1">
    </td>
  </tr>
  <tr> 
    <td height="33" colspan="2"> 
      <div align="center"> 
        <input type="submit" name="Submit"  value="  Incluir  ">
        <input type="button" name="Button2" value="   Sair   " onClick="javascript:history.go(-1)">
      </div>
    </td>
  </tr>
</table>
</form>
</body>
</html>
