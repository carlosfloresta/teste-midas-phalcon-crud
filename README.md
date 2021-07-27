# teste-midas-phalcon-crud

Avaliação
Nessa tarefa será avaliado seu conhecimento de programação na prática,
utilizando framework phalcon com banco de dados MySQL.
Será dado o HTML do sistema já com a parte de login e senha
desenvolvida.
Login no sistema: teste1@brasilbigdata.com.br
Senha no sistema: 123456
Abaixo as questões pedidas.
QUESTÃO 1
Funcionamento do módulo de cadastro de noticias.
A partir do banco de dados, o programa deverá gravar e recuperar os
dados na tabela "noticia".
Será necessário implementação do Model "Noticia", implementação do
Controller e programação das Views.
Todas as rotas foram devidamente já cadastradas e já estarão em
funcionamento.
Abaixo as regras de negócio:
1. O campo título é obrigatório.
a. A crítica deve ser feita no Phalcon utilizando Forms do
phalcon.
b. Fazer crítica também de quantidade máxima de caracteres
(255 caracteres).

2. O campo data_cadastro deverá ser registrado somente na
inserção do notícia.
3. O campo data_ultima_atualizacao deverá ser registrado sempre.
Tanto na inserção quanto na edição de uma noticia e deverá
conter a última data que a notícia foi alterada.
4. Ao fazer uma ação de cadastrar, editar e/ou excluir, deverá ser
mostrado um feedback na tela dizendo se a ação foi um sucesso
ou não utilizando o "Flashing Messages" do Phalcon.

QUESTÃO 2 - Desafio
Para essas alterações, será necessário alterar o banco de dados para que
guarde novas informações.
Também será necessários criar novos Models.
1. Adicionar seleção de categorias utilizando tag select.
a. Uma notícia poderá ter uma ou mais categorias.
2. Adicionar campo de publicado utilizando input checkbox.
a. É somente uma marcação para gravar se a notícia está marcada
para ser publicada.

3. Adicionar campo de data_publicacao.
a. A principio o campo data_publicacao deverá ficar escondido.
b. O input de data_publicacao deverá aparecer somente quando o
checkbox "publicado" estiver marcado. Ou seja, o usuário só
poderá escolher uma data de publicação quando a notícia estiver
marcada como publicada.
c. Utilizar Javascript puro ou Jquery para fazer essa interação.

QUESTÃO 3 - Desafio
Implementar listagem de notícias utilizando Angular 1.
Na tela principal, está mostrando uma lista com todas as notícias cadastradas. O
desafio é fazer com que essa lista seja mostrada programada com Angular 1.
 
