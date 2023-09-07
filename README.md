Prueba Técnica SocialPubli Backend
========================

La prueba técnica del backend de "SocialPubli" consiste en un EP que devuelve un listado de
los personajes de Star Wars.

La prueba se ha desarrollado en symfony 6.3.4 siguiendo un modelo de arquitectura 
hexagonal.

Requerimientos
------------

  * Docker;
  * y los requerimientos [de una aplicación symfony 6][2].

Instalación
------------

Ejecutar en el directorio raíz de la aplicación el siguiente comando:

```bash
$ make install
$ make up
```

**Importante** Editar el archivo /etc/hosts y añadir la siguiente linea

```bash
127.0.0.1	api.socialpubli.local
```

**Nota** Nuestra aplicación será expuesta a través del puerto 8888.

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

Contacto
-----

Cualquier duda de instalación o uso de la aplicación la puedes consultar en 
los siguientes contactos:

* Télefono: 655727029
* Correo: jose.labrador.gonzalez@gmail.com
