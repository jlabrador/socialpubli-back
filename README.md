Prueba Técnica SocialPubli Backend
========================

La prueba técnica del backend de "SocialPubli" consiste en un EP que devuelve un listado de
los personajes de Star Wars.

La prueba se ha desarrollado en symfony 6.3.4 siguiendo un modelo de arquitectura
hexagonal.

Requerimientos
------------

* Docker;
* y los requerimientos [de una aplicación symfony 6].

Instalación
------------

* Ejecutar en el directorio raíz de la aplicación el siguiente comando para
instalar los contenedores dockers necesarios para correr la aplicación:

```bash
$ make install
```

**Importante:** Editar el archivo /etc/hosts y añadir la siguiente linea

```bash
127.0.0.1	api.socialpubli.local
```

**Nota:** Nuestra aplicación será expuesta a través del puerto 8888.

Uso
-----

La aplicación expone un EP que muestra el listado de los personajes de star wars
que a su vez se alimenta de la api externa https://pipedream.com/apps/swapi

Un ejemplo de llamada a nuestra api sería:

http://api.socialpubli.local:8888/api/doc

**Nota** También está disponible la documentación en json ;)

http://api.socialpubli.local:8888/api/doc.json

Cache
-----

La aplicación tiene una cache programada con la propia cache de symfony. Por defecto
el valor de expiración de datos de la cache es de 300 segundos y se podrá modificar
dentro de las variables de entorno del proyecto con el siguiente valor:

```bash
CACHE_TIME_EXPIRE=300
```

http://api.socialpubli.local:8888/api/doc

**Nota** También está disponible la documentación en json ;)

http://api.socialpubli.local:8888/api/doc.json

Documentación de la api
-----

Se ha creado una documentación de uso de la api accesible desde la url:

http://api.socialpubli.local:8888/api/people

Tests
-----

Se ha creado un test de aplicación que llama al ep expuesto pero devuelve
un 500 por la cache que se ha implementado. Habría que crear un mock de la
cache que evitara este error.

Para ejecutar los test se hace con el siguiente comando:

```bash
make api-tests
```

Contacto
-----

Cualquier duda de instalación o uso de la aplicación la puedes consultar en
los siguientes contactos:

* Télefono: 655727029
* Correo: jose.labrador.gonzalez@gmail.com
