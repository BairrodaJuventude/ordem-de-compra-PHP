const btnGenerate = document.querySelector("#generate-pdf");

btnGenerate.addEventListener("click", async() => {
    // HTML original
    const content = document.querySelector("#content").innerHTML;

    // Cria o HTML para as três vias
    const tripleContent = `
        <div>${content}</div>
        <div style="page-break-before: always;">${content}</div>
        <div style="page-break-before: always;">${content}</div>
    `;

    // Cria uma "url" temporaria para o blob.
    const blob = new Blob([tripleContent], { type: 'text/html' });
    const url = URL.createObjectURL(blob);

    // Cria um iframe para criar um HTML fora de vista
    const iframe = document.createElement('iframe');
    iframe.style.position = 'absolute';
    iframe.style.width = '0';
    iframe.style.height = '0';
    iframe.src = url;
    document.body.appendChild(iframe);

    // espera o iframe carregar pra gerar o PDF
    iframe.onload = () => {
        html2pdf().from(iframe.contentDocument.body).set({
            margin: [-30, -3, -40, 20], // superiores, esquerda, inferior e direita
            filename: "Ordem-de-Compra.pdf",
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, logging: true, letterRendering: true },
            jsPDF: { unit: "mm", format: "a4", orientation: "landscape" },
            pagebreak: { mode: ['css', 'legacy'] } // Adiciona quebra de página automatica
        }).save().then(() => {
            // Remove o iframe depois do download
            document.body.removeChild(iframe);
            URL.revokeObjectURL(url);
        });
    };
});