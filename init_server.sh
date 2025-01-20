#!/bin/bash

# Script que incializa o servidor embutido do PHP em uma porta tal

porta=9000

# -t public diz ao php que ele busque pelo arquivo index.php na pasta public
php -S localhost:$porta -t public