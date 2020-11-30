# Avaliação Desenvolvedor Web - [ENGEPLUS](http://www.engeplus.com.br/)

Para esta avaliação será necessário o desenvolvimento de um sistema para atender o cenário proposto e suas regras de negócio.

Além disso, para o desenvolvimento da solução é obrigatória a utilização de:
- PHP
- Banco de dados MySQL

# Cenário
Uma empresa de tecnologia possui a necessidade de controlar as vendas e comissões de seus vendedores. Esta empresa comercializa produtos e serviços, para produtos a comissão é de 10% e serviços 25%. Mas para vendedores contratados há mais de 5 anos a porcentagem de comissão é de 30%.

## Regras de negócio
- Apenas usuários autenticados podem acessar o sistema.
- Ao realizar uma venda deve ser calculada a comissão.
- Uma venda pode conter mais de um produto ou serviço.

## Diferenciais
- Programação orientada a objetos.
- Testes automatizados.
- Layout responsivo.
- Uso de frameworks e bibliotecas.

# Entrega da avaliação
1. O código deve ser publicado em um repositório Git, como o GitHub ou Bitbucket.
2. Deve ser enviado um e-mail para rhengeplus@engeplus.com.br contendo:

    a. Link do repositório Git.

    b. SQL para criação das tabelas do banco de dados.

3. Se desejar, informe suas observações a respeito do desenvolvimento do projeto, justificando suas escolhas tecnológicas.





# Como Instalar

Após ter todo o ambiente pronto para rodar aplicações PHP/MySQL e ter o Composer instalado, crie um base de dados no MySQL chamada **engeplus_system**, com charset **utf8mb4** e collation **utf8mb4_unicode_ci**.

Agora, abra um terminal na pasta raiz do projeto e digite os seguintes comandos:

```composer install```

```php artisan key:generate```

```php artisan migrate --seed```

```php artisan serve```

Agora acesse a [página local](http://localhost:8000) do projeto.

