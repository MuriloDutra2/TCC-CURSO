// Definir o número de assentos ocupados como 10
const occupiedSeatsCount = 10;

// Selecionar a área dos assentos
let seatsContainer = document.querySelector(".all-seats");

// Gerar 60 assentos e distribuir aleatoriamente 10 ocupados
let occupiedSeats = new Set();
while (occupiedSeats.size < occupiedSeatsCount) {
  let randomSeat = Math.floor(Math.random() * 60);
  occupiedSeats.add(randomSeat);
}

// Adicionar assentos ao DOM
for (let seatIndex = 0; seatIndex < 60; seatIndex++) {
  let rowLabel = String.fromCharCode(65 + Math.floor(seatIndex / 10)); // Gera 'A', 'B', etc.
  let seatNumber = (seatIndex % 10) + 1; // Gera números de 1 a 10
  let booked = occupiedSeats.has(seatIndex) ? "booked" : "";

  // Inserir o assento na estrutura correta
  seatsContainer.insertAdjacentHTML(
    "beforeend",
    '<div class="seat-container">' +
      '<div class="seat-number">' + rowLabel + seatNumber + '</div>' +
      '<input type="checkbox" name="tickets" id="s' + (seatIndex + 1) + '" />' +
      '<label for="s' + (seatIndex + 1) + '" class="seat ' + booked + '"></label>' +
    '</div>'
  );
}
