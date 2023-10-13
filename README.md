Mini sistema para geração de Ordens de Serviço.

Para testar o projeto siga os seguintes passos:

1- Baixe o projeto para sua máquina instale o composer no diretório do projeto usando o comando composer install
2- Configure o acesso ao banco de dados no arquivo .env
3- Instale o bando de dados através do comando php artisan migrate:fresh --seed
4- para facilitar os testes todos os usuários no banco de dados terão a senha 123456
5- Usuários com qualificação gerente poderão acessar dados dos demais usuários e realizar edições, exceto alteração de senha de outros usuários, podrão ainda cadastrar novos usuários
6- Usuários qualificados como técnicos só poderão acessar seus próprios dados e realizar alterações
7- Alterações nas Ordens de Serviço poderão ser feitas por usuários com qualificação de gerente ou por técnicos que tenha gerado aquela ordem de serviço

