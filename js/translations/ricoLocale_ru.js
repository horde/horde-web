/*****************************************************************
 Page : ricoLocale_ru.js
 Description : russian localization strings
 Version 0.1 (revisions by Alexey Uvarov,Illiya Gannitskiy)
 If you would like to include translations for another language, 
 please send them to dowdybrown@yahoo.com
******************************************************************/
RicoTranslate.langCode='ru';

// used in ricoLiveGrid.js

RicoTranslate.addPhraseId('bookmarkExact',"Просмотр записей $1 - $2 из $3");
RicoTranslate.addPhraseId('bookmarkAbout',"Просмотр записей $1 - $2 из более чем $3");
RicoTranslate.addPhraseId('bookmarkNoRec',"Нет записей");
RicoTranslate.addPhraseId('bookmarkNoMatch',"Нет совпадений");
RicoTranslate.addPhraseId('bookmarkLoading',"Загрузка...");
RicoTranslate.addPhraseId('sorting',"Сортировка...");
RicoTranslate.addPhraseId('exportStatus',"Экспортируется запись $1");
RicoTranslate.addPhraseId('filterAll',"(все)");
RicoTranslate.addPhraseId('filterBlank',"(чистый)");
RicoTranslate.addPhraseId('filterEmpty',"(пустой)");
RicoTranslate.addPhraseId('filterNotEmpty',"(не пустой)");
RicoTranslate.addPhraseId('filterLike',"как: $1");
RicoTranslate.addPhraseId('filterNot',"не: $1");
RicoTranslate.addPhraseId('requestError',"Запрос данных возвратил ошибку:\n$1");
RicoTranslate.addPhraseId('keywordPrompt',"Искать по ключу (Используйте * для всех записей):");

// used in ricoLiveGridMenu.js

RicoTranslate.addPhraseId('gridmenuSortBy',"Сортировка по: $1");
RicoTranslate.addPhraseId('gridmenuSortAsc',"Возрастающая");
RicoTranslate.addPhraseId('gridmenuSortDesc',"Убывающая");
RicoTranslate.addPhraseId('gridmenuFilterBy',"Фильтрация по: $1");
RicoTranslate.addPhraseId('gridmenuRefresh',"Обновить");
RicoTranslate.addPhraseId('gridmenuChgKeyword',"Изменить ключевое слово...");
RicoTranslate.addPhraseId('gridmenuExcludeAlso',"Исключить также это значение");
RicoTranslate.addPhraseId('gridmenuInclude',"Включить только это значение");
RicoTranslate.addPhraseId('gridmenuGreaterThan',"Больше либо равно данному значению");
RicoTranslate.addPhraseId('gridmenuLessThan',"Меньше либо равно данному значению");
RicoTranslate.addPhraseId('gridmenuContains',"Содержит значение...");
RicoTranslate.addPhraseId('gridmenuExclude',"Исключить это значение");
RicoTranslate.addPhraseId('gridmenuRemoveFilter',"Удалить фильтр");
RicoTranslate.addPhraseId('gridmenuRemoveAll',"Удалить все фильтры");

RicoTranslate.addPhraseId('gridmenuExport',"Печать/Экспорт");
RicoTranslate.addPhraseId('gridmenuExportVis2Web',"Видимые записи на вэб-страницу");
RicoTranslate.addPhraseId('gridmenuExportAll2Web',"Все записи на вэб-страницу");
RicoTranslate.addPhraseId('gridmenuExportVis2SS',"Видимые записи в лист excel");
RicoTranslate.addPhraseId('gridmenuExportAll2SS',"Все записи в лист excel");

RicoTranslate.addPhraseId('gridmenuHideShow',"Скрыть/Показать");
RicoTranslate.addPhraseId('gridmenuChooseCols',"Выберите столбец...");
RicoTranslate.addPhraseId('gridmenuHide',"Скрыть: $1");
RicoTranslate.addPhraseId('gridmenuShow',"Показать: $1");
RicoTranslate.addPhraseId('gridmenuShowAll',"Показать все");

// used in ricoLiveGridAjax.js

RicoTranslate.addPhraseId('sessionExpireMinutes',"минут до истечения сессии");
RicoTranslate.addPhraseId('sessionExpired',"ИСТЕКЛА");
RicoTranslate.addPhraseId('requestTimedOut',"Превышен интервал ожидания данных!");
RicoTranslate.addPhraseId('waitForData',"Ожидание данных...");
RicoTranslate.addPhraseId('httpError',"Получена HTTP ошибка: $1");
RicoTranslate.addPhraseId('invalidResponse',"Сервер возвратил неправильный ответ");

// used in ricoLiveGridCommon.js

RicoTranslate.addPhraseId('gridChooseCols',"Выбрать столбец");
RicoTranslate.addPhraseId('exportComplete',"Экспорт завершен");
RicoTranslate.addPhraseId('exportInProgress',"Экспортирование...");
RicoTranslate.addPhraseId('showFilterRow',"Показать отфильтрованные записи");  // img alt text
RicoTranslate.addPhraseId('hideFilterRow',"Спрятать отфильтрованные записи");  // img alt text

// used in ricoLiveGridForms.js

RicoTranslate.addPhraseId('selectNone',"(ничего)");
RicoTranslate.addPhraseId('selectNewVal',"(новое значение)");
RicoTranslate.addPhraseId('record',"запись");
RicoTranslate.addPhraseId('thisRecord',"эта $1");
RicoTranslate.addPhraseId('confirmDelete',"Вы уверенны, что хотите удалить $1?");
RicoTranslate.addPhraseId('deleting',"Удаление...");
RicoTranslate.addPhraseId('formPleaseEnter',"Пожалуйста, введите значение для $1");
RicoTranslate.addPhraseId('formInvalidFmt',"Неправильный формат для $1");
RicoTranslate.addPhraseId('formOutOfRange',"Значение находится вне диапазона для $1");
RicoTranslate.addPhraseId('formNewValue',"новое значение:");
RicoTranslate.addPhraseId('saving',"Сохранение...");
RicoTranslate.addPhraseId('clear',"очистить");
RicoTranslate.addPhraseId('close',"Закрыть");
RicoTranslate.addPhraseId('saveRecord',"Сохранить $1");
RicoTranslate.addPhraseId('cancel',"Отмена");
RicoTranslate.addPhraseId('editRecord',"Редактировать эту $1");
RicoTranslate.addPhraseId('deleteRecord',"Удалить эту $1");
RicoTranslate.addPhraseId('cloneRecord',"Копировать эту $1");
RicoTranslate.addPhraseId('addRecord',"Добавить новую $1");
RicoTranslate.addPhraseId('addedSuccessfully',"$1 добавлена успешно");
RicoTranslate.addPhraseId('deletedSuccessfully',"$1 удалена успешно");
RicoTranslate.addPhraseId('updatedSuccessfully',"$1 обновлена успешно");

// used in ricoTree.js

RicoTranslate.addPhraseId('treeSave',"Сохранить выделение");
RicoTranslate.addPhraseId('treeClear',"Очистить все");

// used in ricoCalendar.js

RicoTranslate.addPhraseId('calToday',"Сегодня $1 $2 $3");  // $1=day, $2=monthabbr, $3=year, $4=month number
RicoTranslate.addPhraseId('calWeekHdg',"Нд");
RicoTranslate.addPhraseId('calYearRange',"Год ($1-$2)");
RicoTranslate.addPhraseId('calInvalidYear',"Неправильный год");

// Date & number formats

RicoTranslate.thouSep=","
RicoTranslate.decPoint="."
RicoTranslate.dateFmt="mm/dd/yyyy"

RicoTranslate.monthNames=['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь']
RicoTranslate.dayNames=['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота']
