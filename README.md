# Tudo sobre Git a seguir

## Conceitos : 
**"rastreador as alterações feitas em arquivos"**
    <br> 
  > "Git não precisa de Github,
       Github precisa de Git"
 
1. Repositórios remotos: pode Salvar na Github e no Pendrive(Discos);

2. Commits: é um identificador único que o torna rastreável,Seu contador de historia do codigo;

3. Branches: versões alternativas de um projeto que podem ser criadas para testar novos recursos,Evitando erros na branch principal (Master=main=debian) "Literalmente o Subaru";

4. Merging: Combinar branches diferentes em uma única branch(master), chamada de merge;

5. Pull Requests:Chama o Produtudo final das junção das Branches no Repositório remoto;

6. features: Ferramentas novas no seu Projeto;

7. Fork: Comunismo , agora Seu codigo é meu junto com todos os commits,upstream é o master de um fork ;

## Arquivos Especiais:

<pre>
README.md Esse arquivo é usado pra descrever seu projeto para o Mundo

cria link [Oque voce quer falar](link).

# Cabeçalho 1.
## Cabeçalho 2.

*Texto em itálico*.
**Texto em negrito**.
~~Texto riscado~~.

- Item de lista não ordenada 1.
- Item de lista não ordenada 2.

1. Item de lista ordenada 1.
2. Item de lista ordenada 2.

> Isso é uma citação em bloco,no meio do site.

![ o texto que será exibido caso a imagem não possa ser carregada](link da imagem).


alem de todas as tags do html sem css.
</pre>


.gitignore Esse é Arquivos no qual você escolhe os arquivos que não deseja upar .

plaintext -> arquivo no diretorio raiz
*.txt -> define a extenção que vc não quer da push
/node_modules -> diretorios

## Comandos:
- git init - Inicia o Git na sua maquina;
- git add - Adiciona os Arquivos ( . = all ) Para o trabalho;
- git status - mostra quais arquivos foram modificados e podem ser commitados;
- git log - Lista seus commits( nome,codigo,autor,data )- "q" Fecha;
- git clone (url) - clona um Repositórios remoto;
- git commit -a[adciona aquivos] -m[mensagem] "sua desc" - conta a historia do seu codigo ;
- git push -u origin main - empurra pro Repositório Remoto;

- git branch - Ls nas suas braches 
- git branch [qulquer nome]-Cria uma branch nova
- git branch -D [nome] - apaga a branch;
- git checkout -b nome_da_branch - cria uma nova branch e muda para ela imediatamente;

- git checkout [nome branch] - Entra na branch digitada;
- git checkout nome_do_arquivo - Isso descarta as alterações não salvas no arquivo especificado;

- git merge [branch] - funde a sua branch no rota principal ( precisa estar na principal )

- git pull - Faz o Pull Request ;

- git remote add upstream <name> <url> - sincroniza a branch principal;
- git remote add origin git@github.com:MiguelSanzBr/repositorio

 - git fetch - é usado para buscar as alterações de um repositório remoto para o repositório local;
 
- git reset --soft HEAD~1 - desfaz o seu ultimo commit , porem os arquivos não mudam;

- git reset --hard HEAD~1 - tbm apaga seu ultimo commit , Voltando no tempo;
 