// Função para atualizar o valor total de uma linha
function updateTotal(element) {
    const row = element.closest('tr'); // Obtém a linha pai do elemento de entrada

    // Obtém a quantidade e o preço unitário convertidos para números
    const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
    const unitPrice = parseFloat(row.querySelector('.unitPrice').value.replace("R$ ", "").replace(/\./g, "").replace(",", ".")) || 0;

    // Encontra o elemento onde será exibido o valor total da linha
    const totalValue = row.querySelector('.totalValue');

    // Calcula o valor total da linha e o exibe formatado
    const total = (quantity * unitPrice).toFixed(2);
    totalValue.textContent = isNaN(total) ? '0.00' : total;

    // Atualiza o valor total geral
    updateGrandTotal();

    // Atualiza o contador de linhas adicionadas
    updateRowCount();
}

// Função para atualizar o valor total geral de todas as linhas
function updateGrandTotal() {
    const totalCells = document.querySelectorAll('.totalValue');
    let grandTotal = 0;

    // Calcula o valor total somando os valores de todas as células
    totalCells.forEach(cell => {
        grandTotal += parseFloat(cell.textContent) || 0;
    });

    // Exibe o valor total geral formatado no campo específico
    document.getElementById('valor-Total').value = grandTotal.toFixed(2);
}

// Função para adicionar uma nova linha na tabela
function addRow() {
    const tableBody = document.getElementById('tableBody');
    const rowCount = tableBody.querySelectorAll('tr').length;

    // Verifica se o número atual de linhas na tabela é menor que o máximo permitido
    if (rowCount < maxRows) {
        // Cria uma nova linha para a tabela
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="text" class="unit" name="unit"></td>
            <td><input type="number" class="quantity" oninput="updateTotal(this)"></td>
            <td><input type="text" class="description"></td>
            <td>
                <select class="span12" name="dis">
                    <option value="Selecionar">Selecionar</option>
                    <option value="Cef">Cef</option>
                    <option value="Cozinha">Cozinha</option>
                    <option value="Administração">Administração</option>
                    <option value="Cep">Cep</option>
                </select>
            </td>
            <td><input type="text" class="unitPrice" step="0.01" oninput="updateTotal(this)"></td>
            <td class="totalValue">0.00</td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">-</button></td>
        `;

        // Adiciona a nova linha à tabela
        tableBody.appendChild(newRow);

        // Atualiza o contador de linhas adicionadas
        updateRowCount();
    } else {
        // Exibe uma mensagem de aviso quando o limite é atingido
        alert('Limite máximo de 20 linhas alcançado.');
    }
}

// Função para remover uma linha da tabela
function removeRow(button) {
    // Remove a linha pai do botão clicado
    button.closest( 'tr').remove();

    // Atualiza o valor total geral após a remoção
    updateGrandTotal();

    // Atualiza o contador de linhas adicionadas
    updateRowCount();
}

// Função para atualizar o contador de linhas adicionadas
function updateRowCount() {
    const rowCount = document.querySelectorAll('#tableBody tr').length;
    document.getElementById('linhaCount').textContent = `${rowCount} ${(rowCount === 1) ? 'linha adicionada' : 'linhas adicionadas'}`;
}

// Variável para armazenar o número máximo de linhas
const maxRows = 20;

// Evento de clique no botão de adicionar nova linha na tabela
document.getElementById('addInput').addEventListener('click', addRow);


// Função para preencher a data atual
function preencherData() {
    const dataInput = document.getElementById('data');
    const dataAtual = new Date().toLocaleDateString('pt-BR'); // Formato DD/MM/YYYY
    dataInput.value = dataAtual;
}

// Executa a função para preencher a data atual ao carregar a página
preencherData();
