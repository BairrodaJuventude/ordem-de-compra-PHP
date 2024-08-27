function updateTotal(element) {
    const row = element.closest('tr');


    const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
    const unitPrice = parseFloat(row.querySelector('.unitPrice').value.replace("R$ ", ".").replace(/\./g, ",").replace(",", ".")) || 0;

    const totalValue = row.querySelector('.totalValue');


    const total = (quantity * unitPrice).toFixed(2);
    totalValue.textContent = isNaN(total) ? '0.00' : total;


    updateGrandTotal();


    updateRowCount();
}


function updateGrandTotal() {
    const totalCells = document.querySelectorAll('.totalValue');
    let grandTotal = 0;


    totalCells.forEach(cell => {
        grandTotal += parseFloat(cell.textContent) || 0;
    });


    document.getElementById('valor-Total').value = grandTotal.toFixed(2);
}


function addRow() {
    const tableBody = document.getElementById('tableBody');
    const rowCount = tableBody.querySelectorAll('tr').length;


    if (rowCount < maxRows) {

        const newRow = document.createElement('tr');
        newRow.innerHTML = `
                       <td>
                           <select class="span12" name="unid" id="a" required>
                               <option value="Selecionar">Selecionar</option>
                               <option value="dz">Duzia</option>
                               <option value="cart">Cartela</option>
                               <option value="lt">Litro</option>
                               <option value="sc">Saco</option>
                               <option value="cx">Caixa</option>
                               <option value="unid">Unidade</option>
                               <option value="met">Metro</option>
                               <option value="par">Par</option>
                               <option value="pt">Pacote</option>
                               <option value="rl">Rolo</option>
                               <option value="kg">Kilograma</option>
                               <option value="g">Grama</option>
                               <option value="ml">Mililitro</option>
                           </select>
                       </td>
                        <td><input type="number" class="quantity" oninput="updateTotal(this)"></td>
                        <td><textarea class="description"></textarea></td>
                        <td>
                            <select class="span12" name="dis2" id="a">
                                <option value="Selecionar">Selecionar</option>
                                <option value="Cef">Cef</option>
                                <option value="Cozinha">Cozinha</option>
                                <option value="Administração">Administração</option>
                                <option value="Cep">Cep</option>
                            </select>
                        </td>
                        <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)"></td>
                        <td class="totalValue" id="valor">0.00</td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">-</button></td>
                        `;


        tableBody.appendChild(newRow);


        updateRowCount();
    } else {

        alert('Limite máximo de 20 linhas alcançado.');
    }
}


function removeRow(button) {

    button.closest('tr').remove();


    updateGrandTotal();


    updateRowCount();
}


function updateRowCount() {
    const rowCount = document.querySelectorAll('#tableBody tr').length;
    document.getElementById('linhaCount').textContent = `${rowCount} ${(rowCount === 1) ? 'linha adicionada' : 'linhas adicionadas'}`;
}


const maxRows = 20;


document.getElementById('addInput').addEventListener('click', addRow);



function preencherData() {
    const dataInput = document.getElementById('data');
    const dataAtual = new Date().toLocaleDateString('pt-BR');
    dataInput.value = dataAtual;
}


preencherData();



document.addEventListener("DOMContentLoaded", function() {
    var urgenciaSelect = document.querySelector('.urgencia');
    urgenciaSelect.addEventListener('change', function() {

        urgenciaSelect.classList.remove('urgencia-baixa', 'urgencia-media', 'urgencia-alta', 'urgencia-urgente');


        var selectedValue = urgenciaSelect.value;
        if (selectedValue === 'Baixa') {
            urgenciaSelect.classList.add('urgencia-baixa');
        } else if (selectedValue === 'Media') {
            urgenciaSelect.classList.add('urgencia-media');
        } else if (selectedValue === 'Alta') {
            urgenciaSelect.classList.add('urgencia-alta');
        } else if (selectedValue === 'Urgente') {
            urgenciaSelect.classList.add('urgencia-urgente');
        }
    });
});