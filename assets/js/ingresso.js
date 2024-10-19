// Definir o número de assentos ocupados como 10
const occupiedSeatsCount = 10;

// Selecionar a área dos assentos
let seats = document.querySelector(".all-seats");

// Gerar 59 assentos e distribuir aleatoriamente 10 ocupados
let occupiedSeats = new Set();
while (occupiedSeats.size < occupiedSeatsCount) {
  let randomSeat = Math.floor(Math.random() * 59);
  occupiedSeats.add(randomSeat);
}

// Adicionar assentos ao DOM
for (var i = 0; i < 59; i++) {
  let booked = occupiedSeats.has(i) ? "booked" : "";
  seats.insertAdjacentHTML(
    "beforeend",
    '<input type="checkbox" name="tickets" id="s' +
      (i + 1) +
      '" /><label for="s' +
      (i + 1) +
      '" class="seat ' +
      booked +
      '"></label>'
  );
}

// Lógica para calcular o valor total com base em R$2,00 por ingresso
let tickets = seats.querySelectorAll("input");
tickets.forEach((ticket) => {
  ticket.addEventListener("change", () => {
    let amount = document.querySelector(".amount").innerHTML;
    let count = document.querySelector(".count").innerHTML;
    amount = Number(amount.replace('R$', '').replace(',', '.')); // Remover R$ para calcular
    count = Number(count);

    if (ticket.checked) {
      count += 1;
      amount += 2.00; // Adicionar R$2,00 por ingresso
    } else {
      count -= 1;
      amount -= 2.00; // Subtrair R$2,00 por ingresso
    }
    
    document.querySelector(".amount").innerHTML = `R$${amount.toFixed(2)}`;
    document.querySelector(".count").innerHTML = count;
  });
});
