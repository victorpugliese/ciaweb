--
-- PostgreSQL database dump
--

SET client_encoding = 'UTF8';
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Name: url_url_id_seq; Type: SEQUENCE SET; Schema: public; Owner: usrsa
--

SELECT pg_catalog.setval(pg_catalog.pg_get_serial_sequence('url', 'url_id'), 73, true);


--
-- Data for Name: url; Type: TABLE DATA; Schema: public; Owner: usrsa
--

INSERT INTO url VALUES (1, '/index.php', 'Pagina de autenticação');
INSERT INTO url VALUES (2, '/app/index.php', 'Página inicial do sistema');
INSERT INTO url VALUES (3, '/app/diagrama.php', 'Página com o diagrama de acesso do sistema');
INSERT INTO url VALUES (4, '/app/setup.php', 'Arquivo com as ações iniciais das páginas do sistema (bootstrap).');
INSERT INTO url VALUES (5, '/', 'Raiz do sistema');
INSERT INTO url VALUES (6, '/app/usuarios/', 'Pasta de controle de usuarios');
INSERT INTO url VALUES (7, '/app/usuarios/alterar_senha.php', 'Alterar senha de usuario');
INSERT INTO url VALUES (8, '/app/sagu/academico/curso_ins.php', 'Formulário inserir curso');
INSERT INTO url VALUES (10, '/app/sagu/academico/post/cursos_exclui.php', 'Ação excluir curso');
INSERT INTO url VALUES (11, '/app/sagu/academico/post/confirm_curso_ins.php', 'Confirmar inserir curso');
INSERT INTO url VALUES (12, '/app/sagu/academico/post/curso_altera.php', 'Ação alterar curso');
INSERT INTO url VALUES (13, '/app/sagu/academico/post/curso_ins.php', 'Ação inserir curso');
INSERT INTO url VALUES (14, '/app/sagu/academico/disciplinas.php', 'Formulário inserir disciplina');
INSERT INTO url VALUES (15, '/app/sagu/academico/post/disciplinas.php', 'Ação inserir disciplina');
INSERT INTO url VALUES (16, '/app/sagu/academico/post/disciplinas_altera.php', 'Ação alterar disciplina');
INSERT INTO url VALUES (17, '/app/sagu/academico/post/disciplinas_exclui.php', 'Ação excluir disciplina');
INSERT INTO url VALUES (18, '/app/sagu/academico/cursos_disciplinas.php', 'Formulário inserir matriz');
INSERT INTO url VALUES (19, '/app/sagu/academico/post/cursos_disciplinas.php', 'Ação inserir matriz');
INSERT INTO url VALUES (20, '/app/sagu/academico/post/cursos_disciplinas_edita.php', 'Ação alterar matriz');
INSERT INTO url VALUES (21, '/app/sagu/academico/post/cursos_disciplinas_exclui.php', 'Ação excluir matriz');
INSERT INTO url VALUES (22, '/app/sagu/academico/inclui_pre_requisito.php', 'Formulário inserir pre-requisito');
INSERT INTO url VALUES (23, '/app/sagu/academico/post/inclui_pre_requisito.php', 'Ação inserir pre-requisito');
INSERT INTO url VALUES (24, '/app/sagu/academico/post/edita_pre_requisito.php', 'Ação alterar pre-requisito');
INSERT INTO url VALUES (25, '/app/sagu/academico/post/pre_requisito_exclui.php', 'Ação excluir pre-requisito');
INSERT INTO url VALUES (26, '/app/sagu/academico/inclui_disciplinas_equivalentes.php', 'Formulário disciplinas equivalentes');
INSERT INTO url VALUES (27, '/app/sagu/academico/post/altera_disciplinas_equivalentes.php', 'Ação alterar disciplinas equivalentes');
INSERT INTO url VALUES (28, '/app/sagu/academico/post/disciplinas_equivalentes_exclui.php', 'Ação excluir disciplinas equivalentes');
INSERT INTO url VALUES (29, '/app/sagu/academico/post/inclui_disciplinas_equivalentes.php', 'Ação inserir disciplinas equivalentes');
INSERT INTO url VALUES (30, '/app/aluno/config_area_aluno.php');
INSERT INTO url VALUES (31, '/app/cargo/index.php');
INSERT INTO url VALUES (32, '/app/colacao_grau/index.php');
INSERT INTO url VALUES (33, '/app/dispensa_disciplina/dispensa_aluno.php');
INSERT INTO url VALUES (34, '/app/exportar/exportar_sistec.php');
INSERT INTO url VALUES (35, '/app/matricula/matricula_aluno.php');
INSERT INTO url VALUES (36, '/app/matricula/remover_matricula/filtro.php');
INSERT INTO url VALUES (37, '/app/motivos/index.php');
INSERT INTO url VALUES (38, '/app/professores/index.php');
INSERT INTO url VALUES (39, '/app/relatorios/aprovados_reprovados/aprovados_reprovados.php');
INSERT INTO url VALUES (40, '/app/relatorios/declaracao_matricula/pesquisa_declaracao_matricula.php');
INSERT INTO url VALUES (41, '/app/relatorios/egressos/pesquisa_egressos.php');
INSERT INTO url VALUES (42, '/app/relatorios/matriculados_pessoas/pesquisa_todos_alunos_periodo.php');
INSERT INTO url VALUES (43, '/app/sagu/academico/alterar_contrato.php');
INSERT INTO url VALUES (44, '/app/sagu/academico/areas_ensino.php');
INSERT INTO url VALUES (45, '/app/sagu/academico/carimbos.php');
INSERT INTO url VALUES (46, '/app/sagu/academico/consulta_disciplinas.php');
INSERT INTO url VALUES (47, '/app/sagu/academico/consulta_disciplinas_equivalentes.php');
INSERT INTO url VALUES (48, '/app/sagu/academico/consulta_inclui_departamentos.php');
INSERT INTO url VALUES (49, '/app/sagu/academico/consulta_inclui_pre_requisito.php');
INSERT INTO url VALUES (50, '/app/sagu/academico/consulta_periodos.php');
INSERT INTO url VALUES (51, '/app/sagu/academico/coordenadores.php');
INSERT INTO url VALUES (52, '/app/sagu/academico/curso_altera.php');
INSERT INTO url VALUES (53, '/app/sagu/academico/curso_ins.php');
INSERT INTO url VALUES (54, '/app/sagu/academico/cursos_disciplinas.php');
INSERT INTO url VALUES (55, '/app/sagu/academico/cursos_disciplinas_edita.php');
INSERT INTO url VALUES (56, '/app/sagu/academico/disciplina_ofer.php');
INSERT INTO url VALUES (57, '/app/sagu/academico/documentos_edita.php');
INSERT INTO url VALUES (58, '/app/sagu/academico/novo_contrato.php');
INSERT INTO url VALUES (59, '/app/sagu/academico/pessoaf_edita.php');
INSERT INTO url VALUES (60, '/app/sagu/academico/pessoaf_inclui.php');
INSERT INTO url VALUES (61, '/app/sagu/academico/post/cursos_disciplinas.php');
INSERT INTO url VALUES (62, '/app/sagu/academico/post/cursos_disciplinas_exclui.php');
INSERT INTO url VALUES (63, '/app/sagu/academico/post/cursos_exclui.php');
INSERT INTO url VALUES (64, '/app/sagu/generico/altera_campus.php');
INSERT INTO url VALUES (65, '/app/sagu/generico/altera_cidade.php');
INSERT INTO url VALUES (66, '/app/sagu/generico/configuracao_empresa.php');
INSERT INTO url VALUES (67, '/app/sagu/generico/consulta_cidades.php');
INSERT INTO url VALUES (68, '/app/sagu/generico/consulta_inclui_estados.php');
INSERT INTO url VALUES (69, '/app/sagu/generico/consulta_inclui_instituicoes.php');
INSERT INTO url VALUES (70, '/app/sagu/generico/paises_inclui.php');
INSERT INTO url VALUES (71, '/app/sagu/generico/post/cidades_inclui.php');
INSERT INTO url VALUES (72, '/app/salas/index.php');
INSERT INTO url VALUES (73, '/app/setor/index.php');


--
-- PostgreSQL database dump complete
--

