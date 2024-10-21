// Definir o número de assentos ocupados como 10
const occupiedSeatsCount = 10;

// Selecionar a área dos assentos
let seats = document.querySelector(".all-seats");

// Gerar 60 assentos e distribuir aleatoriamente 10 ocupados
let occupiedSeats = new Set();
while (occupiedSeats.size < occupiedSeatsCount) {
  let randomSeat = Math.floor(Math.random() * 60); // Atualizado para 60 assentos
  occupiedSeats.add(randomSeat);
}

// Adicionar assentos ao DOM com letras e números ao lado
const rows = ['A', 'B', 'C', 'D', 'E', 'F'];

for (var i = 0; i < 60; i++) {
  let row = rows[Math.floor(i / 10)]; // Determina a letra da linha
  let number = (i % 10) + 1; // Determina o número da coluna
  let booked = occupiedSeats.has(i) ? "booked" : "";
  
  seats.insertAdjacentHTML(
    "beforeend",
    `<input type="checkbox" name="tickets" id="s${i + 1}" />
    <label for="s${i + 1}" class="seat ${booked}" data-row="${row}" data-seat="${number}">
      ${row}${number}
    </label>`
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
