Equipe Mugiwaras
Funcionalidades Implementadas:
Mapa (Leaftletjs)
Login (Php, MySQL)
Cadastro (Php, MySQL)
Tela do usuário (Php)

Funcionalidades ainda não aplicadas:
Sugestão de locais feitas por usuários (php, MySQL)
Marcadores dos locais no mapa (leafletjs)
Filtragem de categorias de locais no mapa (leafletjs)
Informações dos locais ao clicar nos marcadores (leafletjs)
Obs: Também falta aprimorar os requisitos já aplicados para que fiquem iguais aos aplicados no protótipo de alta fidelidade.

Link para acesso:
mapa3878.000webhostapp.com/home.php
(Podem ocorrer problemas ao carregar a página, aparentemente algumas redes não permitem o acesso a esse link, o que pode ser contornado com o uso de outra rede, ou uso de proxy e vpn, infelizmente esse problema ocorre, estamos buscando uma solução para o próximo checkpoint)

Lista de arquivos e o que fazem:
conexão.php:
responsável pela conexão com o banco de dados sql

cadastro.php:
página responsável pelo cadastro do usuário

login.php:
página responsável pelo login do usuário

dashboard.php:
página q verifica se o usuário está logado e o redireciona para a página inicial caso não esteja

home.php:
página inicial para usuário não logado

sair.php:
arquivo q desloga o usuário e o redireciona para a página de login

mapa.html:
página do mapa com leaftletjs

styles2.css:
arquivo responsável pelo estilo visual das páginas

map.js:
arquivo responsável pela implementação do mapa

usuarios.sql
arquivo do banco de dados sql contendo as tabelas
