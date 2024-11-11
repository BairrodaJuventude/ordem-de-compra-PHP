function updateTotal(element) {
  const row = element.closest("tr");

  const quantity = parseFloat(row.querySelector(".quantity").value) || 0;
  const unitPrice =
    parseFloat(
      row
        .querySelector(".unitPrice")
        .value.replace("R$ ", ".")
        .replace(/\./g, ",")
        .replace(",", ".")
    ) || 0;

  const totalValue = row.querySelector(".totalValue");

  const total = (quantity * unitPrice).toFixed(2);
  totalValue.textContent = isNaN(total) ? "0.00" : total;

  updateGrandTotal();

  updateRowCount();
}

function updateGrandTotal() {
  const totalCells = document.querySelectorAll(".totalValue");
  let grandTotal = 0;

  totalCells.forEach((cell) => {
    grandTotal += parseFloat(cell.textContent) || 0;
  });

  document.getElementById("valor-Total").value = grandTotal.toFixed(2);
}

document.getElementById("addInput").addEventListener("click", addRow);

//Data

function preencherData() {
  const dataInput = document.getElementById("data");
  const dataAtual = new Date().toLocaleDateString("pt-BR");
  dataInput.value = dataAtual;
}

preencherData();

//Etiquetas de Urgencia

document.addEventListener("DOMContentLoaded", function () {
  var urgenciaSelect = document.querySelector(".urgencia");
  urgenciaSelect.addEventListener("change", function () {
    urgenciaSelect.classList.remove(
      "urgencia-baixa",
      "urgencia-media",
      "urgencia-alta",
      "urgencia-urgente"
    );

    var selectedValue = urgenciaSelect.value;
    if (selectedValue === "Baixa") {
      urgenciaSelect.classList.add("urgencia-baixa");
    } else if (selectedValue === "Media") {
      urgenciaSelect.classList.add("urgencia-media");
    } else if (selectedValue === "Alta") {
      urgenciaSelect.classList.add("urgencia-alta");
    } else if (selectedValue === "Urgente") {
      urgenciaSelect.classList.add("urgencia-urgente");
    }
  });
});
