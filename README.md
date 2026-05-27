# Estudo de PHP com Laravel <img align="center" alt="Python" height="30" width="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-original.svg">

###### Este repositorio tem como objetivo documentar o que será estudado sobre Laravel

## Ambiente
### Laragon
- cria o ambiente de desenvolvimento
- controle do servirço e banco de dados
- **Apache**: servidor web
- **HeidiSQL** ou **PhpMyADMIN**: gerenciamento do banco de dados MySQL
- **Terminal**: para comandos linux no diretório www de onde o laragon está instalado
> [!IMPORTANT]
> Verificar versão do PHP

#### Pra atualizar a versão do PHP
- Vai no [site de download do php](https://www.php.net/downloads.php)
- Baixa a versão que deseja
- extrai 
- Move o arquivo extraído para dentro da pasta PHP dentro da pasta bin dentro da pasta do Laragon. **Caminho**: `C:laragon/bin/php`

#### **Composer**
Composer é um gerenciador de pacotes (estilo o npm pro node). Gerencia as dependencias. Está integrado ao **Laragon**. Faz instalação
- utiliza o repositorio packagist, é onde ficam as dependencias para poder instalar


### Virtual Host
Laragon trabalha com uma estrutura de **virtual Hosts**. Pra cada pasta ele cria um virtual Host que vai entregar uma estrutura de URL mais interessante.

O host possui url diferente no padrão: `{name}.test` de possível alteração através das preferencias no Laragon

## Instalação
Para criar com a versão `latest`, executa o comando dentro do terminal do **laragon**
```
composer create-project laravel/laravel nome-app
```
- assim ele cria uma pasta dentre da www no laragon


**Vscode**

## Referencia
- Esse estudo esta sendo feito acompanhando a seguinte playlist no youtube.
Playlist: [Curso de Laravel](https://www.youtube.com/watch?v=SnOlhaJTMTA&list=PLwXQLZ3FdTVH5Tb57_-ll_r0VhNz9RrXb)


---


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
