$(document).ready(function($) {
	// Обновление информации о лагере в Footer (Телефоны и Авторсие права)
	let _phones = document.getElementsByClassName('Contacts')[0].getElementsByTagName('h5')[0];
	_phones.innerHTML = Information['phones'][0] + '<br>' + Information['phones'][1];
	
	let _copyright = document.getElementsByClassName('Copyright')[0].getElementsByTagName('p')[0];
	_copyright.innerHTML = Information["copyright"];
	
	// Отображение Menu и Filter в мобильной версии
	$('#Menu').on('click', function(event) {
		event.preventDefault();

		$('.SideBar .Menu').slideToggle(300);		
		if ($('.SideBar .Filter').is(":hidden")) { }
		else { $('.SideBar .Filter').slideToggle(300); }
	});

	$('#Filter').on('click', function(event) {
		event.preventDefault();

		$('.SideBar .Filter').slideToggle(300);
        if ($('.SideBar .Menu').is(":hidden")) { }
		else { $('.SideBar .Menu').slideToggle(300); }
	});
	
});