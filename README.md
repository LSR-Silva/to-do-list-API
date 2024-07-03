Classes:

Database
  - Responsável pela conexão com o banco MySQL.

Tasks
  - Responsável pelo tratamento dos dados das requests que vira do frontend da aplicação.
  - Responsável pelo tratamento dos dados do model que irá como response para o frontend da aplicação.

Tasks_model
  - Responsável pelas operações no banco, requisitando e alterando dados da tabela tasks.


Banco de Dados:

Tabela: Tasks
Campos:
    - id INTEGER PRIMARY KEY AUTO_INCREMENT,    // Identificador de cada registro.
    - description VARCHAR(100) NOT NULL,        // Nome da tarefa.
    - completed VARCHAR(1) DEFAULT "T"          // Campo de verificação, se a tarefa já foi realizada ou não.
