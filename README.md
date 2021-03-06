# Cadastro de Produtos e Tags



### 📋 Pré-requisitos
- PHP a partir da versão 7.3.
- MySQL 5.7
- Composer

## 🚀 Começando
1. Clonar o repositório na sua máquina, no terminal executar o comando git clone linkdorepositorio.
2. Após clonar o repositório, dentro da pasta projeto executa o comando.
- composer install

## ⚙️ Configurando .env
1. Fazer uma cópia do .env.example como .env
2. Após a cópia configurar banco de dados, conforme foto abaixo.

![image](https://user-images.githubusercontent.com/28792600/155243906-f4737caf-877a-459c-a9e5-7a0ce09bec90.png)

1. Configurar o nome do banco de dados.
2. Configurar o usuário para acesso ao banco de dados. 
3. Configurar a senha para acesso ao banco de dados.

## ⚙️ Gerando Chave da Aplicação
- php artisan key:generate

## ⚙️ Executando as migrações de banco de dados.
1. Para Executar as migrations de adição de data de criação de produtos e tags as respectivas tabelas basta executar o comando abaixo. 
- php artisan migrate

## ⚙️ Startando o Servidor
1. Para iniciar o servidor do Laravel basta executar o comando abaixo. 
- php artisan serve
## ⚙️ SQL Relatório de Relevância de Produtos
SELECT 
    COUNT(p.id) AS total, t.name
FROM
    product AS p
        LEFT JOIN
    product_tag AS pt ON (p.id = pt.product_id)
        LEFT JOIN
    tag AS t ON (t.id = pt.tag_id)
GROUP BY t.id
ORDER by total desc
## 🛠️ Construído com
- [PHP](https://www.php.net/) - A linguagem usada
- [MySQL](https://www.mysql.com/) - SGBD
- [Laravel](https://laravel.com/) - Framework PHP

## ✒️ Autores
- *Márcio Fernandes* - [marciofernandes12](https://github.com/marciofernandes12)
