<?php require_once("../common.php"); ?>

<html>
<head>
<link rel="stylesheet" href="<?=$BASE_URL .'public/styles/required.css'?>" type="text/css">
<script language="JavaScript">
function _init()
{
   document.myform.id.focus();
}

function buscaPais()
{
  var wnd = window.open("post/lista_paises.php",'buscaPais','toolbar=no,width=550,height=350,scrollbars=yes');
}

function setResult(id,nome)
{
   document.myform.ref_pais.value = id;
   document.myform.pais.value = nome;
}

</script>

</head>
<body bgcolor="#FFFFFF" marginwidth="20" marginheight="20" onload="_init()">
<form method="post" action="post/confirm_estados_inclui.php" name="myform">
  <table width="90%" align="center">
    <tr bgcolor="#000099">
      <td height="35" colspan="2">
        <div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#CCCCFF">Inclus&atilde;o de Estados</font></b></font></div>
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Sigla&nbsp;<span class="required">*</span>&nbsp;</font></td>
      <td> 
        <input name="id" type=text size="2" maxlength="2">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Nome&nbsp;<span class="required">*</span>&nbsp;</font></td>
      <td> 
        <input name="nome" type=text size="50">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Pa&iacute;s&nbsp;<span class="required">*</span>&nbsp;</font></td>
      <td> 
        <input name="ref_pais" type=text size="5">
        <input type="text" name="pais" size="40">
        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b><a href="javascript:buscaPais()"><img src="../images/find.gif" width="16" height="16" border="0"></a></b></font> 
      </td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <hr size="1">
      </td>
    </tr>
    <tr> 
      <td align="center" colspan="2"> 
        <input type="submit" name="Submit"  value=" Prosseguir ">
        <input type="reset"  name="Submit2" value="   Limpar   ">
    	<input type="button" name="Button2" value="   Voltar   " onClick="location='consulta_inclui_estados.php'">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
