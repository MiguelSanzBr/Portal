# Portal De Noticias 

## tema: tendo como foco abuso das autoridades , policia que a direita defende 

> Banco de dados:
User: id,icon-perfil,nome, email, password(padrao laravel)
Video: id, title,describe,video_file ,Check default= No, user_id

> Telas:
Login ( create )
 campo de cadastro e login
 mandando : nome ,email, password
 
> Deletar (delete)
  deleta todos os anuncios feito por um user
  pedindo email e senha 
  
> Portal (home)(read)
 Read da tabela Video que estão com check = Yes.
 
> Criar anúncio(create)
  user precisa estar logado
  o user manda então title,describe,video 
  
> controle dos anuncios ( aceita ou não )(update and delete)
  antes de ir pro portal o video passa aqui 
  adm pode escolher , editando o Check para Yes ou No
  

> Algoritmo:
Permitir que um usuário logado crie um anúncio
Para que o anúncio seja enviado para o portal, um administrador precisa aceitá-lo = grupos do facebook
