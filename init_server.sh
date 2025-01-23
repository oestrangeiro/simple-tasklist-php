#!/bin/bash

# Script que incializa o servidor embutido do PHP em uma porta tal
# Caso você esteja utilizando o XAMPP ou APACHE, ignore esse script

porta=9000

# -t public diz ao php que ele busque pelo arquivo index.php na pasta public
php -S localhost:$porta -t public