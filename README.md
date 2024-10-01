# Portal de Notícias
## Tema
**Abuso de autoridade, com foco na polícia defendida pela direita.**

## Estrutura do Banco de Dados
1. User
- id
- icon_perfil
- nome
- email
- password (padrão Laravel)

2. Video
- id
- title
- description
- video_file
- check (default = No)
- user_id

3. Imagem
- id
- title
- description
- video_file
- check (default = No)
- user_id

## Funcionalidades
1. Login e Cadastro
Campos para login e cadastro: nome, email e senha.
2. Deletar Anúncios
Permite ao usuário deletar todos os anúncios criados, após autenticação por email e senha.
3. Portal (Home)
Exibe vídeos com check = Yes.
4. Criar Anúncio
Usuário logado pode criar um anúncio, enviando título, descrição e arquivo de vídeo.
5. Controle dos Anúncios
Anúncios precisam de aprovação do administrador (alterando check para Yes ou No).
Algoritmo
Usuários logados podem criar anúncios, que são aprovados por um administrador antes da publicação.

## Instalação
- git clone https://github.com/MiguelSanzBr/Portal.git;
- cd Portal;
- cd database && touch database.sqlite && cd ..;
- composer install && npm install && npm run build;
- mv .env.example .env;
- php artisan key:generate;
- php artisan migrate;
- php artisan storage:link;
- php artisan serve;
