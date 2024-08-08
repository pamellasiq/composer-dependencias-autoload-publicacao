# CURSO: PHP Composer: Dependências, Autoload e Publicação

# Índice
1. [Instalando o Composer](#instalando-o-composer)
    1. [Como Instalar o Composer e Criar o Arquivo composer.json](#como-instalar-o-composer-e-criar-o-arquivo-composerjson)
    2. [Nomes de Pacotes composer](#nomes-de-pacotes-composer)
    3. [Como criar seu pacote composer](#como-criar-seu-pacote-composer)
    4. [Resultado](#resultado)
2. [Gerenciando Dependências](#gerenciando-dependências)
    1. [Instalando Guzzle e DomCrawler](#instalando-guzzle-e-domcrawler)


# Instalando o Composer

Composer é uma ferramenta essencial para gerenciar dependências em projetos PHP.

Primeiro, precisamos ter o PHP instalado. Depois, acessamos o site do Composer e baixamos o instalador. No Linux e Mac, instalamos via linha de comando, enquanto no Windows, baixamos e executamos o instalador.

Após a instalação, o Composer estará disponível para uso. Podemos verificar a versão instalada com o comando `composer --version`.

Para facilitar o trabalho, recomenda o uso do PhpStorm, uma IDE que se integra bem com o Composer. Mas, se você preferir outra IDE, como Eclipse ou Netbeans, não tem problema!

## Como Instalar o Composer e Criar o Arquivo composer.json

O Composer é como um "faxineiro" que organiza todas as bibliotecas que você precisa para o seu projeto. Ele garante que você tenha as versões corretas de cada biblioteca e que elas funcionem juntas harmoniosamente.

### Instalação do Composer

Para começar a usar o Composer, siga os passos abaixo:

1. **Instalar o PHP**: Certifique-se de que o PHP está instalado no seu sistema.
2. **Baixar o Composer**: Acesse o site do Composer e baixe o instalador.
   - **Linux e Mac**: Instale via linha de comando.
   - **Windows**: Baixe e execute o instalador.

3. **Verificar a Instalação**: Após a instalação, verifique se o Composer está disponível executando o comando:

   ``` sh
   composer --version
   ```

### Criar o Arquivo composer.json

O arquivo `composer.json` é o coração do gerenciamento de dependências do seu projeto. Ele contém informações importantes sobre o seu projeto, como o nome, a descrição, o tipo e os autores.

### Criar Manualmente
Você pode criar o arquivo `composer.json` manualmente com o seguinte conteúdo básico:

   ```sh
#    composer.json
   {
    "name": "nome-do-projeto",
    "description": "Descrição do projeto",
    "type": "project",
    "authors": [
        {
            "name": "Seu Nome",
            "email": "seu.email@exemplo.com"
        }
    ],
    "require": {}
}

 ```

### Usar o Comando composer init
Você também pode usar o comando `composer init` para que o Composer te guie no processo de criação do arquivo composer.json:

``` sh
    composer init
```

Depois de criar o arquivo `composer.json`, você pode começar a adicionar as dependências que seu projeto precisa.

## Nomes de Pacotes composer

```
Package name (<nome_de_quem_distribui>/<nome do pacote>)
```

## Como criar seu pacote composer
```
Package name (<vendor>/<name>) [pâmella/composer-dependencias-autoload-publicacao]: pamellasiq/projeto_novo
Description []: descricao do projeto aqui
Author [Pamella Siqueira <contatopamellasiqueira@gmail.com>, n to skip]:
Minimum Stability []:
Package Type (e.g. library, project, metapackage, composer-plugin) []: tipo do pacote
License []: tipo de licenca
Would you like to define your dependencies (require) interactively [yes]? no #caso tenha dependencias composer, coloque aqui
Would you like to define your dev dependencies (require-dev) interactively [yes]? no #caso tenha dependencias composer, coloque aqui
Add PSR-4 autoload mapping? Maps namespace "Pamellasiq\BuscadorCursos" to the entered relative path. [src/, n to skip]: no
```

### Resultado

Se tudo der certo, irá gerar um arquivo assim:

``` sh
{
    "name": "pamellasiq/projeto_novo",
    "description": "descrição do projeto",
    "type": "tipo informado",
    "license": "linçensas informadas",
    "authors": [
        {
            "name": "Pamella Siqueira",
            "email": "contatopamellasiqueira@gmail.com"
        }
    ],
    "require": {}
}
```

# Gerenciando Dependências

O Composer é como um supermercado de pacotes de código, e o site [Packagist](https://packagist.org/) é o seu catálogo!

Para encontrar os pacotes que precisamos, podemos usar a busca do site. Por exemplo, para fazer requisições HTTP, podemos procurar por "http client" e para analisar o HTML, podemos procurar por "dom crawler".

O site nos mostra os pacotes disponíveis, com uma breve descrição e links para a documentação.

## Instalando Guzzle e DomCrawler
No terminal, navegue até o diretório do seu projeto e execute os seguintes comandos:

``` sh
composer require guzzlehttp/guzzle
composer require symfony/dom-crawler
```

Ou, adicione ao arquivo `composer.json` require as seguintes linhas:

``` sh
    "require": {
            "guzzlehttp/guzzle": "^7.9",
            "symfony/dom-crawler" : "^7.1"
    }
```
Depois no terminal:

``` sh
    composer install
```

E para atualizar os arquivos:

``` sh
    composer update
```

