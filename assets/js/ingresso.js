// Definir o número de assentos ocupados como 10
const occupiedSeatsCount = 10;

// Selecionar as fileiras de assentos
let rows = {
  A: document.querySelector(".row-A"),
  B: document.querySelector(".row-B"),
  C: document.querySelector(".row-C"),
  D: document.querySelector(".row-D"),
  E: document.querySelector(".row-E"),
  F: document.querySelector(".row-F"),
};

// Gerar os números de assentos ocupados aleatoriamente
let occupiedSeats = new Set();
while (occupiedSeats.size < occupiedSeatsCount) {
  let randomSeat = Math.floor(Math.random() * 60);
  occupiedSeats.add(randomSeat);
}

// Adicionar assentos ao DOM
let seatIndex = 0;
Object.keys(rows).forEach((rowLabel, rowIndex) => {
  for (let i = 0; i < 10; i++) {
    let booked = occupiedSeats.has(seatIndex) ? "booked" : "";
    let seatNumber = rowLabel + (i + 1);

    rows[rowLabel].insertAdjacentHTML(
      "beforeend",
      `<div class="seat-container">
         <div class="seat-number">${seatNumber}</div>
         <input type="checkbox" name="tickets" id="${seatNumber}" />
         <label for="${seatNumber}" class="seat ${booked}"></label>
       </div>`
    );

    seatIndex++;
  }
});
