// Открыть модальное окно контактов
var btnopen_contact = document.querySelector("#open_contact");

btnopen_contact.onclick = function () {
	var contactsModal = document.querySelector("#contacts-modal");
	contactsModal.style.display = "block";

}
// Закрыть модальное окно контактов
var contactsModalCloseBtn = document.querySelector("#contacts-modal .close");
	contactsModalCloseBtn.onclick = function()
	{
		var contactsModal = document.querySelector("#contacts-modal");
		contactsModal.style.display = "none";
	};





// Открыть модальное окно авторизации
var btnopen_entry = document.querySelector("#open_entry");

btnopen_entry.onclick = function()
{
	var entryModal = document.querySelector("#entry-modal");
	entryModal.style.display = "block";
}

// Закрыть модальное окно авторизации
var entryModalCloseBtn = document.querySelector("#entry-modal .close2");
	entryModalCloseBtn.onclick = function()
	{
		var entryModal = document.querySelector("#entry-modal");
		entryModal.style.display = "none";
	};


/*
1. Вынести вывод всех контактов в отдельный файл - готово
2. JS - Добавить события на кнопку добавить в друзья
3. JS - Отправить запрос на сервер
4. Если запрос выполнен успешно вывести контакты
*/

// Добавить в друзья
function add(element)
{
	var friend_list = document.querySelector("#friend_list");
	console.dir(element);
	var link = element.dataset.link;
	var ajax = new XMLHttpRequest
	ajax.open("GET", link, false);
	ajax.send();
	console.dir(ajax);
	friend_list.innerHTML = ajax.response;
}
// Удалить из друзей
function del(element2)
{
	var friend_list2 = document.querySelector("#friend_list");
	console.dir(element2);
	var link2 = element2.dataset.link2;
	var ajax2 = new XMLHttpRequest
	ajax2.open("GET", link2, false);
	ajax2.send();
	console.dir(ajax2);
	friend_list2.innerHTML = ajax2.response;
}


// Отправить сообщение без перезагрузки
var form = document.querySelector("#form");
console.dir(form );
form.onsubmit = function(event)
{
	event.preventDefault();
	var komu = form.querySelector("input[name = 'user_id_to']");
	var ot_kogo = form.querySelector("input[name = 'ot_user_to']");
	var text = form.querySelector("textarea");


	var dannie = "submit=1" +
					"&user_id_to=" + komu.value +
					"&ot_user_to=" + ot_kogo.value +
					"&text=" + text.value;

	var ajax = new XMLHttpRequest();
		ajax.open("POST", form.action, false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send(dannie);

	console.dir(ajax);

	var spispokMessage = document.querySelector("#spispok-message");
		spispokMessage.innerHTML = ajax.response;
}

// Поиск без перезагрузки
