Этапы развертки:
1. Склонировать репозиторий на локальную машину, иметь установленный docker и docker-compose на локальной машине.
2. В корневой папке репозитория выполнить <pre>docker-compose build</pre>
3. Запускаем контейнеры <pre>docker-compose up -d</pre> Если build прошел правильно, то все контейнеры должны без проблем запуститься.
4. Зайти в консоль контейнера с MYSQL <pre>docker exec -it bnovo_db bash</pre>
5. Оказавшись внутри контейнера, запустить mysql <pre>mysql -u ЛОГИН -p</pre> Введите пароль. Если не меняли логин и пароль, логин будет root и пароль secret. 
6. Внутри mysql необходимо создать базу данных <pre> CREATE DATABASE ИМЯ_БАЗЫ_ДАННЫХ; </pre>
7. Теперь выходим из mysql прописав <pre>exit;</pre>
8. Так же выходим из контейнера с mysql <pre>exit</pre>
9. Переходим в папку app, тут хранится сам проект, склонировать .env.example в .env, в .env в поле DB_DATABASE прописать имя созданной вами базы данных
10. После этого возвращаемся в корневую директорию и входим в консоль контейнера с проектом <pre>docker exec -it bnovo_app bash</pre>
11. Переходим в директорию app <pre>cd app</pre>
12. Устанавливаем зависимости <pre>composer install</pre>
13. После запускаем миграции php artisan migrate
14. На этом развертка завершена, можно выйти из консоли контейнера <pre>exit</pre>

По тестированию проекта:
Авторизацию не добавлял, все роуты работают по принципу REST API и являются stateless.

<table>
  <thead><tr></tr><th>Маршрут</th><th>Метод</th><th>Параметры</th><th>Описание</th></thead>
  <tbody>
    <tr><td>/api/guests</td><td>GET</td><td>-</td><td>Получение гостей</td></tr>
    <tr><td>/api/guests</td><td>POST</td><td>name, second_name, phone_number, email, country</td><td>Создание гостя</td></tr>
    <tr><td>/api/guests/{id}</td><td>GET</td><td>-</td><td>Получение гостя по id</td></tr>
    <tr><td>/api/guests/{id}</td><td>PUT,PATCH</td><td>Любые из тех что и при создании</td><td>Обновление гостя по id</td></tr>
    <tr><td>/api/guests/{id}</td><td>DELETE</td><td>-</td><td>Удаление гостя по id</td></tr>
  </tbody>
</table>
