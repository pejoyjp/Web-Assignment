const date_pick = document.querySelector('.date-picker');
const selected_date = document.querySelector('.date-picker .selected-date');
const dates_variable = document.querySelector('.date-picker .dates');
const mth_variable = document.querySelector('.date-picker .dates .month .mth');
const next_mth_variable = document.querySelector('.date-picker .dates .month .next');
const prev_mth_variable = document.querySelector('.date-picker .dates .month .previous');
const days_element = document.querySelector('.date-picker .dates .days');

const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

let date = new Date();
let day = date.getDate();
let month = date.getMonth();
let year = date.getFullYear();

let selectedDate = date;
let selectedDay = day;
let selectedMonth = month;
let selectedYear = year;

mth_variable.textContent = months[month] + ' ' + year;

selected_date.textContent = formatDate(date);
selected_date.dataset.value = selectedDate;

datePopulate();

// EVENT LISTENERS
date_pick.addEventListener('click', toggleDatePicker);
next_mth_variable.addEventListener('click', goToNextMnth);
prev_mth_variable.addEventListener('click', goToPrevMnth);

// FUNCTIONS

function toggleDatePicker (e) {
	if (!checkEventPathForClass(e.path, 'dates')) {
		dates_variable.classList.toggle('active');
	}
}

function goToNextMnth (e) {
	month++;
	if (month > 11) {
		month = 0;
		year++;
	}
	mth_variable.textContent = months[month] + ' ' + year;
	datePopulate();
}

function goToPrevMnth (e) {
	month--;
	if (month < 0) {
		month = 11;
		year--;
	}
	mth_variable.textContent = months[month] + ' ' + year;
	datePopulate();
}

function datePopulate (e) {
	days_element.innerHTML = '';
	let amount_days = 31;

	if (month == 1) {
		amount_days = 28;
	}

	for (let i = 0; i < amount_days; i++) {
		const day_element = document.createElement('div');
		day_element.classList.add('day');
		day_element.textContent = i + 1;

		if (selectedDay == (i + 1) && selectedYear == year && selectedMonth == month) {
			day_element.classList.add('selected');
		}

		day_element.addEventListener('click', function () {
			selectedDate = new Date(year + '-' + (month + 1) + '-' + (i + 1));
			selectedDay = (i + 1);
			selectedMonth = month;
			selectedYear = year;

			selected_date.textContent = formatDate(selectedDate);
			selected_date.dataset.value = selectedDate;

			datePopulate();
		});

		days_element.appendChild(day_element);
	}
}

// HELPER FUNCTIONS
function checkEventPathForClass (path, selector) {
	for (let i = 0; i < path.length; i++) {
		if (path[i].classList && path[i].classList.contains(selector)) {
			return true;
		}
	}

	return false;
}
function formatDate (d) {
	let day = d.getDate();
	if (day < 10) {
		day = '0' + day;
	}

	let month = d.getMonth() + 1;
	if (month < 10) {
		month = '0' + month;
	}

	let year = d.getFullYear();

	return day + ' / ' + month + ' / ' + year;
}
