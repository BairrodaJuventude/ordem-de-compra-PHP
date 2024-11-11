function generatePDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  // Adicionar título
  doc.setFontSize(20); // Tamanho da fonte do título
  doc.text("Ordem de Compra", 10, 10);

  // Configurar tamanho da fonte para o corpo
  doc.setFontSize(12); // Tamanho do texto normal

  // Adicionar informações do formulário
  let yPos = 20; // Posição Y inicial

  // Captura os dados do formulário
  const urgencia = document.querySelector("select[name='Urg']").value;
  const fornecedor = document.querySelector("input[name='fornece']").value;
  const setor = document.querySelector("select[name='setor']").value;

  // Encontrar todas as linhas da tabela e adicionar ao PDF
  const rows = document.querySelectorAll("table.table tr");

  rows.forEach((row, index) => {
    const cells = row.querySelectorAll("th, td");
    let rowData = Array.from(cells)
      .map((cell) => cell.innerText)
      .join(" | ");

    if (index === 0) {
      // Configurar tamanho da fonte para o cabeçalho
      doc.setFontSize(10); // Tamanho da fonte do cabeçalho
      doc.text(rowData, 8, yPos); // Adiciona o cabeçalho ao PDF
      doc.setFontSize(10); // Restaura o tamanho da fonte
    } else {
      doc.text(rowData, 10, yPos); // Adiciona dados ao PDF
    }
    yPos += 10; // Posição Y para a próxima linha
  });

  // Salvar o PDF
  doc.save("ordem_de_compra.pdf");
}
