# ateliedoboulanger


um template desenvolvido sobre medida usando PHP para plataforma **Wordpress**

## Dependencias 

esta usando o empacotador **Gulp** mais para ele funcionar é necessário tem instalado o **Node** na sua versão **8.11.1**

É necessário instalar o Glup globalmente no computador com o seguinte comando 
~~~
npm install --global gulp-cli
~~~

Apos instalação feita é necessário executar o NPM para instalar todas as dependências
~~~
npm install
~~~

Caso aja algum problema vc também pode iniciar um novo projeto com o comando 
~~~
npm inti
~~~

E depois estalar todos os plugins Gulp usados com o comando abaixo
~~~
npm install --save-dev gulp gulp-clean-css gulp-compass gulp-concat gulp-livereload gulp-plumber gulp-rename gulp-sourcemaps gulp-uglifyjs gulp-util gulp-watch
~~~

Para copilar ou inicial o auto copiamento basta abir o terminal e executar o segundo comando
~~~
gulp
~~~

Documentação no link abaixo
https://gulpjs.com

## hospedagem

o projeto esta hospedado no https://ac.mediatemple.net, é uma vps, existe ja criado uma conta ftp para o upload dos arquivos, basta entrar na pasta **/dominios/[site-dominio]/html/**


## OBS
Os arquivos .scss que **glup** esta gerando foram modificados manualmente, tambem o arquivo Bower config não foi localizado


npm install --save-dev gulp gulp-clean-css gulp-compass gulp-concat gulp-livereload gulp-plumber gulp-rename gulp-sourcemaps gulp-uglifyjs gulp-util gulp-watch