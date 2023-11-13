Necessário ter o Composer instalado na máquina.
Verificar se o Composer está instalado.
### composer -v

Criar o arquivo composer.json com a instrução básica.
### composer init

Instalar a biblioteca Phinx.
### composer require robmorgan/phinx

Criar o diretório para salvar as migrations seguindo a estrutura recomendada
### mkdir db/migrations

Criar o arquivo "phinx.php" com as configurações e alterar as mesmas.
Windows "\"
### vendor\bin\phinx init -f php

Testar as configurações.
### vendor\bin\phinx test

Cria a base de dados "dateduo", no my admin

Criar a migrations.
### vendor\bin\phinx create NomeDAMigration

Executar as migrations.
### vendor\bin\phinx migrate

Executar o rollback na última migration - reverter as alterações realizadas.
### vendor\bin\phinx rollback
Executar o rollback nas migrations - reverter todas.
### vendor/bin/phinx rollback -t 0

Criar o diretório para seed
### mkdir db\seeds\

Criar seed
### vendor\bin\phinx seed:create NomeSeed
### vendor\bin\phinx seed:create AddUser

Executar as seed
### vendor\bin\phinx seed:run