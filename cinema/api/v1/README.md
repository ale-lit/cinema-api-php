**************************************
# ИНФОРМАЦИЯ О КИНОТЕАТРАХ СЕТИ
**************************************

[GET]
/cinema/api/v1/cinemas - информация по всем кинотеатрам

Пример ответа сервера:
```
[
    {
        "ID": "1",
        "name": "СИНЕМА ПАРК ТРК Гранд Каньон",
        "address": "пр. Энгельса, д.154, ТРК \"Гранд Каньон\""
    },
    {
        "ID": "2",
        "name": "СИНЕМА ПАРК DELUXE в ТРК «Питер Радуга»",
        "address": "проспект Космонавтов, д. 14, ТЦ «Питер Радуга» "
    }
]
```

==============

[GET]
/cinema/api/v1/cinemas/[id кинотеатра] - полная информация по конкретному кинотеатру

Пример ответа сервера:
```
{
    "name": "СИНЕМА ПАРК ТРК Гранд Каньон",
    "address": "пр. Энгельса, д.154, ТРК \"Гранд Каньон\"",
    "halls": "1 4DX,2 Real D,3 Real D,4 Real D,5 Relax"
}
```


**************************************
# ИНФОРМАЦИЯ О ЗАЛАХ
**************************************

[GET]
/cinema/api/v1/halls - все залы по всей сети

Пример ответа сервера:
```
[
    {
        "id": "1",
        "name": "1 4DX",
        "cinema id": "1",
        "cinema name": "СИНЕМА ПАРК ТРК Гранд Каньон",
        "address": "пр. Энгельса, д.154, ТРК \"Гранд Каньон\""
    },
    {
        "id": "2",
        "name": "2 Real D",
        "cinema id": "1",
        "cinema name": "СИНЕМА ПАРК ТРК Гранд Каньон",
        "address": "пр. Энгельса, д.154, ТРК \"Гранд Каньон\""
    },
    {
        "id": "3",
        "name": "3 Real D",
        "cinema id": "1",
        "cinema name": "СИНЕМА ПАРК ТРК Гранд Каньон",
        "address": "пр. Энгельса, д.154, ТРК \"Гранд Каньон\""
    },
    ...
]
```

==============

[GET]
/cinema/api/v1/halls/[id зала] - информация по конкретному залу

Пример ответа сервера: [/cinema/api/v1/halls/4]
```
{
    "name": "4 Real D",
    "cinema name": "СИНЕМА ПАРК ТРК Гранд Каньон",
    "address": "пр. Энгельса, д.154, ТРК \"Гранд Каньон\""
}
```


**************************************
# ИНФОРМАЦИЯ О СЕАНСАХ
**************************************

[GET]
/cinema/api/v1/seances - все доступные сеансы в сети (по всем залам, по всем кинотеатрам). Упорядочены по возрастанию.

Пример ответа сервера:
```
[
    {
        "id": "21",
        "datetime": "2017-02-01 11:30:00",
        "price": "100.00",
        "hall name": "2 Real D",
        "cinema id": "2",
        "cinema name": "СИНЕМА ПАРК DELUXE в ТРК «Питер Радуга»",
        "address": "проспект Космонавтов, д. 14, ТЦ «Питер Радуга» ",
        "name": "Доктор Стрэндж",
        "census": "16",
        "desc": "Страшная автокатастрофа поставила крест на карьере успешного нейрохирурга Доктора Стрэнджа. Отчаявшись, он отправляется в путешествие в поисках исцеления и открывает в себе невероятные способности к трансформации пространства и времени. Теперь он - связующее звено между параллельными измерениями, а его миссия - защищать жителей Земли и противодействовать Злу, какое бы обличие оно ни принимало. Мистические миры, невиданного размаха магические сражения, знаменитый юмор MARVEL – на экранах кинотеатров с 28 октября 2016 года!",
        "genre": "Приключения",
        "directed": "Скотт Дерриксон",
        "actors": "Бенедикт Камбербэтч, Рэйчел МакАдамс, Тильда Суинтон, Чиветель Эджиофор, Бенедикт Вонг"
    },
    {
        "id": "18",
        "datetime": "2017-02-01 13:05:00",
        "price": "320.00",
        "hall name": "3 Real D",
        "cinema id": "1",
        "cinema name": "СИНЕМА ПАРК ТРК Гранд Каньон",
        "address": "пр. Энгельса, д.154, ТРК \"Гранд Каньон\"",
        "name": "Доктор Стрэндж",
        "census": "16",
        "desc": "Страшная автокатастрофа поставила крест на карьере успешного нейрохирурга Доктора Стрэнджа. Отчаявшись, он отправляется в путешествие в поисках исцеления и открывает в себе невероятные способности к трансформации пространства и времени. Теперь он - связующее звено между параллельными измерениями, а его миссия - защищать жителей Земли и противодействовать Злу, какое бы обличие оно ни принимало. Мистические миры, невиданного размаха магические сражения, знаменитый юмор MARVEL – на экранах кинотеатров с 28 октября 2016 года!",
        "genre": "Приключения",
        "directed": "Скотт Дерриксон",
        "actors": "Бенедикт Камбербэтч, Рэйчел МакАдамс, Тильда Суинтон, Чиветель Эджиофор, Бенедикт Вонг"
    },
    ...
]
```

==============

[GET]
/cinema/api/v1/seances/date/[нужная дата] - все сеансы на указанную дату (упорядочены по возрастанию)

Пример ответа сервера: [/cinema/api/v1/seances/date/2017-02-01]
```
[
    {
        "id": "21",
        "datetime": "2017-02-01 11:30:00",
        "price": "100.00",
        "hall name": "2 Real D",
        "cinema id": "2",
        "cinema name": "СИНЕМА ПАРК DELUXE в ТРК «Питер Радуга»",
        "address": "проспект Космонавтов, д. 14, ТЦ «Питер Радуга» ",
        "name": "Доктор Стрэндж",
        "census": "16",
        "desc": "Страшная автокатастрофа поставила крест на карьере успешного нейрохирурга Доктора Стрэнджа. Отчаявшись, он отправляется в путешествие в поисках исцеления и открывает в себе невероятные способности к трансформации пространства и времени. Теперь он - связующее звено между параллельными измерениями, а его миссия - защищать жителей Земли и противодействовать Злу, какое бы обличие оно ни принимало. Мистические миры, невиданного размаха магические сражения, знаменитый юмор MARVEL – на экранах кинотеатров с 28 октября 2016 года!",
        "genre": "Приключения",
        "directed": "Скотт Дерриксон",
        "actors": "Бенедикт Камбербэтч, Рэйчел МакАдамс, Тильда Суинтон, Чиветель Эджиофор, Бенедикт Вонг"
    },
    {
        "id": "18",
        "datetime": "2017-02-01 13:05:00",
        "price": "320.00",
        "hall name": "3 Real D",
        "cinema id": "1",
        "cinema name": "СИНЕМА ПАРК ТРК Гранд Каньон",
        "address": "пр. Энгельса, д.154, ТРК \"Гранд Каньон\"",
        "name": "Доктор Стрэндж",
        "census": "16",
        "desc": "Страшная автокатастрофа поставила крест на карьере успешного нейрохирурга Доктора Стрэнджа. Отчаявшись, он отправляется в путешествие в поисках исцеления и открывает в себе невероятные способности к трансформации пространства и времени. Теперь он - связующее звено между параллельными измерениями, а его миссия - защищать жителей Земли и противодействовать Злу, какое бы обличие оно ни принимало. Мистические миры, невиданного размаха магические сражения, знаменитый юмор MARVEL – на экранах кинотеатров с 28 октября 2016 года!",
        "genre": "Приключения",
        "directed": "Скотт Дерриксон",
        "actors": "Бенедикт Камбербэтч, Рэйчел МакАдамс, Тильда Суинтон, Чиветель Эджиофор, Бенедикт Вонг"
    },
    ...
]
```

==============

[GET]
/cinema/api/v1/seances/[id сеанса] - информация по конкретному сеансу

Пример ответа сервера: [/cinema/api/v1/seances/18]
```
{
    "datetime": "2017-02-01 13:05:00",
    "cinema id": "1",
    "cinema name": "СИНЕМА ПАРК ТРК Гранд Каньон",
    "address": "пр. Энгельса, д.154, ТРК \"Гранд Каньон\"",
    "hall name": "3 Real D",
    "name": "Доктор Стрэндж",
    "price": "320.00",
    "census": "16",
    "desc": "Страшная автокатастрофа поставила крест на карьере успешного нейрохирурга Доктора Стрэнджа. Отчаявшись, он отправляется в путешествие в поисках исцеления и открывает в себе невероятные способности к трансформации пространства и времени. Теперь он - связующее звено между параллельными измерениями, а его миссия - защищать жителей Земли и противодействовать Злу, какое бы обличие оно ни принимало. Мистические миры, невиданного размаха магические сражения, знаменитый юмор MARVEL – на экранах кинотеатров с 28 октября 2016 года!",
    "genre": "Приключения",
    "directed": "Скотт Дерриксон",
    "actors": "Бенедикт Камбербэтч, Рэйчел МакАдамс, Тильда Суинтон, Чиветель Эджиофор, Бенедикт Вонг"
}
```


**************************************
# ИНФОРМАЦИЯ О СВОБОДНЫХ И ЗАНЯТЫХ МЕСТАХ
**************************************

[GET]
/cinema/api/v1/tickets - информация обо всех проданных на текущий момент билетах

Пример ответа сервера:
```
[
    {
        "id": "50",
        "row": "1",
        "number": "8",
        "seance id": "2",
        "status": "Забронирован"
    },
    {
        "id": "51",
        "row": "1",
        "number": "8",
        "seance id": "2",
        "status": "Забронирован"
    },
    {
        "id": "14",
        "row": "4",
        "number": "8",
        "seance id": "34",
        "status": "Забронирован"
    },
    ...
]
```

==============

[GET]
/cinema/api/v1/places/[id сеанса] - информация обо всех местах на конкретный сеанс (результаты упорядочены по ряду, месту)

Пример ответа сервера: [/cinema/api/v1/places/2]
```
[
    {
        "row": "1",
        "number": "8",
        "status": "Забронирован"
    },
    {
        "row": "1",
        "number": "9",
        "status": "Свободен"
    },
    {
        "row": "1",
        "number": "10",
        "status": "Свободен"
    },
    ...
]
```

==============

[GET]
/cinema/api/v1/places/check/?seance=[id сеанса]&row=[ряд места]&number=[номер места] - проверка на занятость конкртеного места на конкретный сеанс

Пример ответа сервера: [/cinema/api/v1/places/check/?seance=34&row=9&number=19]
```
{
    "status": "Забронирован"
}
```

или 

```
null - если место свободно
```

==============

[GET]
/cinema/api/v1/tickets/[id билета] - информация по конкретному билету

Пример ответа сервера: [/cinema/api/v1/tickets/56]
```
{
    "row": "9",
    "number": "19",
    "seance id": "34",
    "status": "Забронирован"
}
```

==============

[POST]
/cinema/api/v1/tickets - добавление (продажа) нового билета

```
{
    "seance": [id сеанса],
    "row": [ряд места],
    "number": [номер места],
    "status": [статус билета]
}
```

Пример запроса к серверу:
```
{
    "seance": 34,
    "row": 11,
    "number": 12,
    "status": 1
}
```

Пример ответа сервера:
```
true - в случае успеха
```

или

```
405 Not Allowed - в случае если билет на данное место указанного сеанса уже продан
```

==============

[PATCH]
/cinema/api/v1/tickets/[id билета] - обновление статуса для уже существующего билета (полное редактирование осуществляется ТОЛЬКО через удаление, и новое добавление билета)

```
{
    "status": [новый статус билета] // 1 - "Забронирован", 2 - "Выкуплен"
}
```

Пример запроса к серверу:
```
{
    "status": 2
}
```

Пример ответа сервера:
```
true - в случае успеха
```

==============

[DELETE]
/cinema/api/v1/tickets/[id билета] - удаление существующего билета из базы

Пример запроса к серверу:
/cinema/api/v1/tickets/57

Пример ответа сервера:
```
true - в случае успеха
```
