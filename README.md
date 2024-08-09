# CURSO: PHP Composer: Dependências, Autoload e Publicação

# Índice
1. [Instalando o Composer](#instalando-o-composer)
    1. 1 [Como Instalar o Composer e Criar o Arquivo composer.json](#como-instalar-o-composer-e-criar-o-arquivo-composerjson)
    2. 1 [Nomes de Pacotes composer](#nomes-de-pacotes-composer)
    3. 1 [Como criar seu pacote composer](#como-criar-seu-pacote-composer)
    4. 1 [Resultado](#resultado)
2. [Gerenciando Dependências](#gerenciando-dependências)
    2. 1 [Instalando Guzzle e DomCrawler](#instalando-guzzle-e-domcrawler)
3. [Entendendo autoload](#entendendo-autoload)
    3. 1 [Configurando a PSR-4](#configurando-a-psr-4)
    3. 2[Classmap](#classmap)


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

O pacote só foi buscado pelo composer ao executar `composer update`.

Isso se dá pelo seguinte fato: O comando `composer install` lê o arquivo `composer.lock` e instala as exatas dependências lá definidas. No nosso caso, nós já tinhamos o arquivo criado, então o `composer.lock` foi lido e se não houver alterações, nada será instalado.

Já o comando `composer update` lê o arquivo `composer.json`, instala as dependências mais atuais dentro das restrições definidas e atualiza o `composer.lock`.

Sendo assim, em um projeto em andamento (tendo o arquivo composer.lock), para instalar uma nova dependência, é preciso executar o `composer require` ou após adicionar a dependência no arquivo `composer.json` executar o comando `composer update`.

# Entendendo autoload

o PSR-4 é um padrão para autoload que define como o Composer deve encontrar suas classes.

Ele usa um mapeamento entre namespaces e pastas, garantindo que cada classe tenha um caminho único dentro do projeto.

Por exemplo, se o namespace da sua classe é `Alura\BuscadorDeCursos`, ela deve estar dentro da pasta src. Se você tiver um namespace mais específico, como `Alura\BuscadorDeCursos\Helper`, a classe estará dentro da pasta `src/helper`.

O Composer usa esse padrão para encontrar as classes que você precisa, sem precisar fazer require de cada arquivo manualmente. Isso torna o seu código mais organizado e fácil de gerenciar.

Para conhecer mais padrões, basta conferir no [PHP-FIG](https://www.php-fig.org/)

## Configurando a PSR-4

Para configurar o Composer para carregar as classes automaticamente usando a PSR-4.

Primeiro, modificamos o arquivo `composer.json` adicionando a configuração `autoload` com a PSR-4, que mapeia um namespace para uma pasta específica do nosso projeto.

``` sh
    "autoload": {
        "psr-4": {
            "Alura\\BuscadorDeCursos\\": "src/"
        }
    }
```

Depois, executamos o comando `composer dumpautoload` para atualizar o arquivo vendor/autoload.php com as novas configurações.

``` sh
composer dumpautoload
```

Com isso, o Composer consegue encontrar e carregar as classes automaticamente, sem precisarmos usar require para cada arquivo.

Essa configuração é essencial para organizar nosso código e facilitar a utilização de bibliotecas externas e classes próprias.

## Classmap

o Composer te ajuda a organizar seu código, mesmo quando ele não segue as PSRs. Você aprendeu sobre o classmap, que permite mapear classes para arquivos específicos, e o files, que inclui arquivos específicos no autoload.

Com essas ferramentas, você pode usar o Composer para carregar classes e funções de diferentes maneiras, sem precisar fazer require de cada arquivo individualmente. Isso facilita a organização do seu projeto e garante que todas as dependências sejam carregadas corretamente.

``` sh
    "autoload": {
        "classmap":
            "./Teste.php"
    },
```
