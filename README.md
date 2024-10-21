# Projeto Meeting Faces

## Introdução geral:

Primeiramente, o Meeting Faces é um trabalho de conclusão de curso (TCC) realizado no ano de 2024. Projetado e desenvolvido por [Vitor Fábio](https://www.linkedin.com/in/svitorz) e [Mariana Pires](https://www.linkedin.com/in/mariana-pires-b59376331/).

Meeting Faces foi desenvolvido em [Laravel](https://laravel.com), utilizando a biblioteca de [Livewire (versão 3.0)](https://livewire.laravel.com/]).

## Para clonar o projeto:

```bash
$ git clone git@github.com:svitorz/meetingfaces.git
```

Após isso, utilize docker para construir e subir a aplicação.

```bash
$ docker compose up -d --build
```

E por fim, para instalar as dependências e rodar as migrações, utilize:

```bash
$ docker compose exec app make install
```

E pronto, a aplicação está rodando.
