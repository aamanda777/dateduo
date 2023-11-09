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
Linux "/"
### vendor/bin/phinx init -f php
Windows "\"
### vendor\bin\phinx init -f php

Testar as configurações.
### vendor\bin\phinx test

Criar a migrations.
### vendor\bin\phinx create Users

Cria a base de dados "celke", conforme indicando no arquivo "phinx.php"

Executar as migrations.
### vendor\bin\phinx migrate

Criar a migrations.
### vendor\bin\phinx create AddColumnPasswordUsers

Executar o rollback na última migration - reverter as alterações realizadas.
### vendor\bin\phinx rollback

Criar o diretório para seed
### mkdir db\seeds\

Criar seed
### vendor\bin\phinx seed:create NomeSeed
### vendor\bin\phinx seed:create AddUser

Executar as seed
### vendor\bin\phinx seed:run