<?php

require("../common.php");
require("../lib/GetField.php");
require("../lib/SQLCombo.php");

$conn = new connection_factory($param_conn);

// Verifica as permissoes de acesso do usuario quanto ao arquivo
$ACL_FILE = __FILE__;
require_once($BASE_DIR .'core/login/acesso.php');
// ^ Verifica as permissoes de acesso do usuario quanto ao arquivo ^ //

$id = $_GET['id'];

$op_opcoes = SQLArray("select id||' - '||descricao, id from tipos_curso order by id");
$op_opcoes2 = SQLArray("select nome, id from turno order by nome");


CheckFormParameters(array("id"));

$conn = new Connection;

$conn->Open();

$sql = " select " .
        "    id," .
        "    descricao," .
        "    abreviatura," .
        "    sigla," .
        "    total_creditos," .
        "    total_carga_horaria," .
        "    total_semestres," .
        "    grau_academico," .
        "    exigencias," .
        "    agrupo_curso," .
        "    ref_area," .
        "    reconhecimento, " .
        "    autorizacao, " .
        "    turno, " .
        "    ref_tipo_curso, " .
        "    historico " .
        " from cursos where id = '$id'";

$query = $conn->CreateQuery($sql);

SaguAssert($query && $query->MoveNext(),"Registro n&atilde;o encontrado!");

list ( $id,
        $descricao,
        $abreviatura,
        $sigla,
        $total_creditos,
        $total_carga_horaria,
        $total_semestres,
        $grau_academico,
        $exigencias,
        $agrupo_curso,
        $ref_area,
        $reconhecimento,
        $autorizacao,
        $turno,
        $ref_tipo_curso,
        $historico) = $query->GetRowValues();

$query->Close();

$conn->Close();

$area = GetField($ref_area, "area", "areas_ensino", true);

?>
<html>
    <head>
    <link rel="stylesheet" href="<?=$BASE_URL .'public/styles/required.css'?>" type="text/css">
        <script language="JavaScript">
            function _init()
            {
                document.myform.descricao.focus();
            }

            function ChangeOption(opt,fld)
            {
                var i = opt.selectedIndex;

                if ( i != -1 )
                    fld.value = opt.options[i].value;
                else
                    fld.value = '';
            }

            function ChangeOp()
            {
                ChangeOption(document.myform.op,document.myform.ref_tipo_curso);
            }
            function ChangeOp2()
            {
                ChangeOption(document.myform.op2,document.myform.turno);
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

            function buscaOpcao()
            {
                var url = "../generico/post/lista_areas_ensino.php" +
                    "?id=" + escape(document.myform.ref_area.value) +
                    "&area=" + escape(document.myform.area.value);

                var wnd = window.open(url,'busca','toolbar=no,width=550,height=350,scrollbars=yes');
            }

            function setResult(arg1,arg2)
            {
                document.myform.ref_area.value = arg1;
                document.myform.area.value = arg2;
            }
        </script>
    </head>
    <body bgcolor="#FFFFFF" marginwidth="20" marginheight="20"
          onload="_init()">
        <form method="post" action="post/curso_altera.php" name="myform">
            <table width="90%" align="center">
                <tr bgcolor="#000099">
                    <td colspan="2" height="35">
                        <div align="center"><font size="3"
                                                  face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#CCCCFF">Altera&ccedil;&atilde;o
		de Curso</font></b></font></div>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;C&oacute;digo&nbsp;<span class="required">*</span> </font></td>
                    <td><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0033">
                            <input type="hidden" name="id" value="<? echo($id); ?>"> <?php echo($id); ?></font></td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Descri&ccedil;&atilde;o&nbsp;<span class="required">*</span> </font></td>
                    <td><input name="descricao" type=text value="<?echo($descricao);?>"
                               size="40"></td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Abreviatura&nbsp;<span class="required">*</span> </font></td>
                    <td><input name="abreviatura" type=text
                               value="<?echo($abreviatura);?>" size="20"></td>
                </tr>

                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Sigla</font></td>
                    <td><input name="sigla" type=text value="<?echo($sigla);?>" size="10"
                               maxlength="10"></td>
                </tr>

                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Total
		Cr&eacute;ditos&nbsp;</font></td>
                    <td><input name="total_creditos" type=text
                               value="<?echo($total_creditos);?>" size="10"></td>
                </tr>

                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Total
		Carga Hor&aacute;ria&nbsp;</font></td>
                    <td><input name="total_carga_horaria" type=text
                               value="<?echo($total_carga_horaria);?>" size="10"></td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Total
		Semestres</font></td>
                    <td><input name="total_semestres" type=text
                               value="<?echo($total_semestres);?>" size="10"></td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="00009C">&nbsp;Turno&nbsp;<span class="required">*</span> </font></td>
                    <td><font color="#000000"> <input name="turno" value="<?echo($turno);?>" type="text" size="2" onChange="ChangeCode('turno','op2')"> <? ComboArray("op2",$op_opcoes2,$turno,"ChangeOp2()"); ?>
                        </font></td>
                </tr>

                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="00009C">&nbsp;Tipo
		do Curso&nbsp;<span class="required">*</span> </font></td>
                    <td><font color="#000000"> <input name="ref_tipo_curso" type="text"
                                                      size="5" onChange="ChangeCode('ref_tipo_curso','op')"
                                                      value="<?echo($ref_tipo_curso);?>"> <? ComboArray("op",$op_opcoes,$ref_tipo_curso,"ChangeOp()"); ?>
                        </font></td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Grau
		Acad&ecirc;mico</font></td>
                    <td><input name="grau_academico" type=text
                               value="<?echo($grau_academico);?>" size="10"></td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Exig&ecirc;ncias&nbsp;</font></td>
                    <td><input name="exigencias" type=text value="<?echo($exigencias);?>"
                               size="40"></td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Agrupar
		Curso&nbsp;</font></td>
                    <td><select name="agrupo_curso">
                            <option value="<?echo($agrupo_curso)?>" selected><?echo($status[$agrupo_curso]); ?></option>
                            <?if ($agrupo_curso == '0') {
                                echo "<option value=\"1\">Sim</option>";
                            }
                            if ($agrupo_curso == '1') {
                                echo "<option value=\"0\">N&atilde;o</option>";
};
?>
                        </select></td>
                </tr>
                <!--
          <tr>
            <td bgcolor="#CCCCFF"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;&aacute;rea de Ensino</font></td>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="9%">
                    <input name="ref_area" type=text value="<?echo($ref_area);?>" size="5">
                  </td>
                  <td width="100%">
                    <input name="area" type=text value="<?echo($area);?>" size="35">
                  </td>
                  <td width="0%">
                    <div align="right">
                      <input type="button" value="..." onClick="buscaOpcao()" name="button">
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
                -->
                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Reconhecimento&nbsp;</font></td>
                    <td><textarea name="reconhecimento" cols="40" rows="2"><?echo($reconhecimento);?></textarea>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Autoriza&ccedil&atilde;o&nbsp;</font></td>
                    <td><textarea name="autorizacao" cols="40" rows="2"><?echo($autorizacao);?></textarea>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#CCCCFF"><font
                            face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#00009C">&nbsp;Cabe&ccedil;alho
		do Hist&oacute;rico&nbsp;</font></td>
                    <td><textarea name="historico" cols="40" rows="2"><?echo($historico);?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <hr size="1">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="Submit"
                                                          value=" Salvar "> <input type="button" name="Submit2"
                                                          value=" Voltar " onclick="javascript:history.go(-1)"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
