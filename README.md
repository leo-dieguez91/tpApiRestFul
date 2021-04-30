Api RESTful

Instalacion:

- composer install

- cp .env.example .env

- php artisan key:generate

  Se tiene que configurar la base de datos local, usuario, contraseña y nombre de la db.
	DB_HOST=localhost
	DB_DATABASE=tu_base_de_datos
	DB_USERNAME=root
	DB_PASSWORD=tu_contraseña

- composer dump-autoload

- php artisan migrate --seed  (va a generar la tabla y 10 registros)

---------------------------------------------

Se puede probar por Postman 


GET|HEAD  | api/users        | users.index   | App\Http\Controllers\UserController@index   | api        |

POST      | api/users        | users.store   | App\Http\Controllers\UserController@store   | api        |

GET|HEAD  | api/users/{user} | users.show    | App\Http\Controllers\UserController@show    | api        |

PUT|PATCH | api/users/{user} | users.update  | App\Http\Controllers\UserController@update  | api        |

DELETE    | api/users/{user} | users.destroy | App\Http\Controllers\UserController@destroy | api        |


