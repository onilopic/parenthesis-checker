# Проверка на соответсвие закрывающим от крывающи скобкам в строке.

## Задача

И возвращать true, если строка корректна – все открытые скобки корректно открыты
и закрыты, или же false в противном случае.
Строка может включать символы “(“, “)”, “ ” (пробел), “\n” (перенос строки), “\t” (символ
табуляции), “\r” (перенос каретки). Если же строка содержит что-то кроме
перечисленных символов, то ваша библиотека должна выбрасывать исключение
InvalidArgumentException.

## Дано

Передаем строку 

Проверяем check(string )

Последовательно считываем строку


### Первым не должная идти закрывающая скобка

Не должно быть закрывающихся скобок больше чем открывающихся в любой момент времени.

### Валидация


### Php - Docker

```sh
docker build -t php-composer:1.0 . 
// нужно указать права пользотвателя, чтобы файлы создались не от root
docker run --user 1000:1000 -ti --volume $(pwd)/:/app php-composer:1.0 composer install
```


