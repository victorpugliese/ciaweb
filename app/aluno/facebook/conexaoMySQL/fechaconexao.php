//fecha a conexao e limpa o resultado

mysql_close($conexao);
mysql_free_result($resultado);

}else{
mysql_close($conexao) or die ("N�o foi poss�vel fechar a conex�o");
}