<p align="center">Blog</p>

## Versión de paquetes
- Laravel 10
- php 8.1
- NodeJs 18.14
- tailwind 3.2.7

## Necesario para ejecutar la prueba
- Clonar el proyecto
- composer install
- npm install
- php artisan serve
- npm run dev
- Entrar en la página "http://localhost:8000/"

## Rutas
### Web
- http://localhost:8000/
- http://localhost:8000/posts/{id} *Id del post*
### Api
- http://localhost:8000/api/posts *Method GET y POST*


## Campos para la creación de un post
- title (*requerido y longitud máxima de 255 carácteres*)
- body (*required*)
- username (*required*)
- name
- email (*Tipo email*)
- phone
- website
- address (*array*)
  - street
  - suite
  - city
  - zipcode
  - geo (*array*)
    - lat
    - lng
- company (*array*)
  - name
  - catchPhrase
  - bs

## Comentarios
- Se ha tenido que usar php 8.1 ya que la úlitma versión estable de laravel no soporta php 8.0
- Para el diseño del front se ha usado **tailwindcss**
- Cree un servicio para las llamadas a la api que usé como sustituto de base de datos (https://jsonplaceholder.typicode.com/)
- Usé los modelos de "Post" y "Author" para hacer las llamadas porque creí que si en un futuro se cambia y se utiliza una base de datos el cambio sería más rápido
- En la creación de un nuevo post obligué a que fuera necesario al menos el autor además de los propios campos del post.
- Se ha utilizado **sanctum** para la api
- Se ha utlizado **vite** para la parte del front
- Para la parte del store del post me hubiera gustado utilizar en la validación una clase para el **Request**, por ejemplo **PostStoreRequest**, pero no sabía como controlar la respuesta por lo que obté por crear la validación manualmente.
- Con los test he tenido un montón de dudas, porque no tenía claro en que zonas poner tests, y al final solo los hice de los propios métodos. Me hubiera gustado hacerlos de solo la validación o de la creación de un post pero no supe como.
- Para el control de errores use un bloques **trycatch** pero no se si hubiera sido mejor dejárselo al **Handle de excepciones** que tiene laravel y así en los tests utilizar el *status code* 500 o 404, pero me gusta tener más control sobre los errores y que se devuelve.