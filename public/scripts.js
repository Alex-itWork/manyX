// public/scripts.js
document.addEventListener('DOMContentLoaded', () => {
	const mineButton = document.getElementById('mineButton');
	const miningSpeed = document.getElementById('miningSpeed');
	const earnings = document.getElementById('earnings');
	const hashRate = document.getElementById('hashRate');
	const userTable = document.getElementById('userTable');
  
	if (mineButton) {
	  mineButton.addEventListener('click', () => {
		const socket = new WebSocket('ws://' + window.location.host + '/ws');
  
		socket.onopen = () => {
		  socket.send(JSON.stringify({ type: 'start-mining', userId: localStorage.getItem('userId') }));
		};
  
		socket.onmessage = (event) => {
		  const data = JSON.parse(event.data);
		  if (data.type === 'update-user') {
			miningSpeed.textContent = `${data.user.hash_rate} MH/s`;
			earnings.textContent = `${data.user.earnings.toFixed(4)} BTC`;
			hashRate.textContent = `${data.user.hash_rate} TH/s`;
		  }
		};
  
		socket.onclose = () => {
		  console.log('WebSocket connection closed');
		};
	  });
	}
  
	if (userTable) {
	  fetch('/api/users')
		.then(response => response.json())
		.then(users => {
		  users.forEach(user => {
			const row = document.createElement('tr');
			row.innerHTML = `
			  <td>${user.username}</td>
			  <td>${user.hash_rate} MH/s</td>
			  <td>${user.earnings.toFixed(4)} BTC</td>
			`;
			userTable.appendChild(row);
		  });
		});
	}
  });