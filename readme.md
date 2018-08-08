# Sistema Imatec 
API do CRM responsavel pelo controle da produção, visualização de imagens dos clientes, solicitações (OS), faturamento e demais processos internos e externos da empresa.
 
## Instalação Desenvolvimento

1- Baixar fonte do Github
git clone git@github.com:camoloze/imatec-app.git
  
2- Instalar dependencias PHP pelo composer
composer update
 
3- Instalar dependencias CSS e JS pelo node.js
npm install
 
4- Arquivo .env (Configuração)
Renomear o arquivo .env.example para .env
 
5- Gerar chave da aplicação
php artisan key:generate
 
6- Gerar Banco de Dados básico
php artisan migrate:refresh --seed

7- Gerar oauth key
artisan passport:install

```

## Uso Desenvolvimento

Deve ser aberto duas abas da máquina virtual uma para executar o gulp e outra para o servidor local. 
Isso acontece porque usamos browserSync.   

```
1- Gerar servidor (Em outra aba do terminal da máquina virtual)
php artisan serve 

5- Acessar brownser local
127.0.0.1:8000
```

## Laravel
Laravel versão 5.6

### Artisan
```
//Comando padrão
php artisan migrate:refresh --seed

//Comandos com alias 
pa migrate:refresh --seed 
pam:rs
```
 
### ALIAS
OBS: Pode ser colocado na inicialização do sistema para não perder toda vez que é desligado

```
alias pa="php artisan"
alias par="php artisan routes"
alias pam="php artisan migrate"
alias pam:r="php artisan migrate:refresh"
alias pam:roll="php artisan migrate:rollback"
alias pam:rs="php artisan migrate:refresh --seed"
alias pda="php artisan dumpautoload"
alias cu="composer update"
alias ci="composer install"
alias cda="composer dump-autoload -o"
```

#### Comando Desenvolvimento:
  
  ##### Rodar Cron local
  Executar em uma aba separada do terminal dentro da pasta
  ```
    while true; do php artisan schedule:run; sleep 60; done
  ```

## Problemas encontrados

### Arquivo não encontrado ou reconhecido
Quando um arquivo por exemplo uma seed não é localizado pelo artisan execute o comando abaixo:
```
composer dump-autoload
```


## Melhorias
