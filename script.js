//Hide/Show button control

let btn = document.querySelector('.btn');

btn.addEventListener('click', () => {
	
	let form = document.querySelector('.form').classList.toggle('hidden');
	
	if (btn.textContent === 'Hide add form') {
		btn.textContent = 'Show add form';
	} else {
		btn.textContent = 'Hide add form';
	}
	
});

//Form validation


document.querySelector('#name').addEventListener('input', function () {
	this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
	this.value = this.value.trim();
	this.value = this.value.replace(/[^a-z\s]/gi, '');
});

document.querySelector('#code').addEventListener('input', function () {
	this.value = this.value.toUpperCase();
	this.value = this.value.trim();
	this.value = this.value.replace(/[^a-z\s]/gi, '');
});

document.querySelector('#population').addEventListener('input', function () {
	this.value = this.value.replace('/[0-9]/');
});

//Filter table by name

let options = {
	valueNames: ['name', 'population', 'code', 'id'],
};
let countriesList = new List('countries', options);


//Validate form with Jquery plugin

$(function () {
	$('#form').validate({
		messages: {
			name: {
				required: 'Field Country name is required!',
			},
			population: {
				required: 'Field Population is required!',
			},
			country_code: {
				required: 'Field Country code is required!',
			},
		},
	});
});

//Build chart

let table = document.querySelector('#table');
let json = [];
let headers = [];
for (let i = 0; i < table.rows[0].cells.length; i++) {
	headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi, '');
}

for (let i = 1; i < table.rows.length; i++) {
	let tableRow = table.rows[i];
	let rowData = {};
	for (let j = 0; j < tableRow.cells.length; j++) {
		rowData[headers[j]] = tableRow.cells[j].innerHTML;
	}
	
	json.push(rowData);
}

let labels = json.map(function (e) {
	return e.countryname;
});


let values = json.map(function (e) {
	return e.population;
});


const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: labels,
		datasets: [{
			label: '# of Votes',
			data: values,
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(255, 159, 64, 0.2)'
			],
			borderColor: [
				'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)',
				'rgba(255, 159, 64, 1)'
			],
			borderWidth: 1
		}]
	},
	options: {
		scales: {
			y: {
				beginAtZero: true
			}
		}
	}
});