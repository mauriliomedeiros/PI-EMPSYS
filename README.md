# PI: Sistema de monitoramento de empilhadeiras para Cristovão Empilhadeiras LTDA
Repositório do Projeto PI da Faculdade

Tecnologias que estão/serão utilizadas no desenvolvimento do projeto:
PHP 7.4 or > 8.1
Framework Symfony (full-installation)
Doctrine/ORM
Bootstrap
MVC para a arquitetura de software
Webpack
Yarn
Symfony Encore
twig
html
css
JS
SQL
SGBD > PostgreSQL or ...
IDE PhpStorm from JetBrains
WSL 2.0
Docker
Git/GitHub

Configuração do ambiente para desenvolvimento do projeto:
 - git clone do repositório no GitHub; //para clonar o repositório do GitHub numa pasta local do PC\WSL\Debian\Docker.
 - composer create-project symfony/website-skeleton:"^4.4" PI-Sistema_de_monitoramento_de_empilhadeiras; //para instalar o Symfony da forma tradicional (with web application).
 - "symfony/webpack-encore-bundle": "^1.7" //adicionar o pacote no projeto (não vem com a instalação padrão do Symfony
 - yarn install; //instalar o yarn v1.22.22
 - yarn add bootstrap; //adicionar o bootstrap 5.3.3 via yarn

Iniciar ambiente: php -S localhost:8080 -t public
