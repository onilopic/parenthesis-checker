# Проверка что все открытые скобки корректно открыты и закрыты.

## Условия

И возвращать true, если строка корректна – все открытые скобки корректно открыты
и закрыты, или же false в противном случае.
Строка может включать символы “(“, “)”, “ ” (пробел), “\n” (перенос строки), “\t” (символ
табуляции), “\r” (перенос каретки). Если же строка содержит что-то кроме
перечисленных символов, то ваша библиотека должна выбрасывать исключение
InvalidArgumentException.

## Алгоритм (общий)

Не должно быть закрывающихся скобок больше чем открывающихся в любой момент времени.

Для каждого символа в тексте 
    проверить является ли он открывающей скобкой
        если является, то добавить в стэк тип этой скобки (угловая/круглая/итд)
    если нет, то проверить является ли символ закрывающей скобкой
        если является и последняя добавленная открывающая скобка совпадает,
            то убрать её из стэка (найдена совпавшая пара скобок)
        иначе завершить алгоритм—найдена неправильно вложенная скобка.

Продолжать до конца текста и если стэк пустой, то текст содержит
только правильно вложенные скобки.

### Php - Docker

```sh
docker build -t php-composer:1.0 . 
// нужно указать права пользотвателя, чтобы файлы создались не от root
docker run --user 1000:1000 -ti --volume $(pwd)/:/app php-composer:1.0 composer install
```


