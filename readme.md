<p>Мой алгоритм действий при выполнении тестового задания:</p>
<ul>
    <li>Создал свои шаблоны. Использовал встроенный шаблонизатор Blade.</li>
    <li>Создал маршрутизацию.</li>
    <li>В шаблоне testpage.blade создал форму для передачи введенного URL.<li>
    <li>Отправил URL с помощью ajax и принял его в контроллере. Файл public/assets/jstest.js и app/Http/Controllers/TestController.php.<li>
    <li>В файле TestController.php в методе execute переданный URL провел через валидацию. Если URL корректный, то дальше использую его в методе parserSite() класса TestParser (app/TestParser.php)<li>
    <li>В методе parserSite класса TestParser создаю каталог с помощью локального драйвера Storage. В этом каталоге создаю файл index.html и добавляю туда контент главной страницы. Чтобы дальше парсить веб-ресурс использовал библиотеку phpQuery (полный парсинг не реализовал). Далее этот каталог архивирую в архив .zip.<li>
    <li>Для того чтобы вывести загруженные веб-ресурсы создал контроллер FilesController (app/Http/Controllers/FilesController.php) и через него обращаюсь к методу getFiles класса TestParser (app/TestParser.php). В этом методе извлекаю информацию о файлах и передаю в шаблон ввиде массива. В шаблоне testpage.blade в таблице вывожу файлы.</li>
</ul>

<p>Написанный мною код лежит в следующих файлах:</p>
<ul>
    <li>resources/views/layoutstestpage.blade.php</li>
    <li>routes/web.php</li>
    <li>public/assets/js</li>
    <li>app/Http/Controllers/TestController.php</li>
    <li>app/Http/Controllers/FilesController.php</li>
    <li>app/TestParser.php</li>
</ul>

<p>Файлы веб-ресурсов хранятся в storage/app/public/</p>
