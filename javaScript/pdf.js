document.addEventListener('DOMContentLoaded', function() {
    const pdfButtons = document.querySelectorAll('.generate-pdf');

    pdfButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');

            // Aqui você pode fazer uma requisição para pegar os dados da ordem específica, se necessário.
            // Para simplificar, vou gerar um PDF da tabela atual.

            const element = document.getElementById('tabela-ordens');

            const opt = {
                margin: 1,
                filename: `ordem_${id}.pdf`,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            // Gerando o PDF
            html2pdf().from(element).set(opt).save();

            // Aqui você pode duplicar as páginas ou adicionar conteúdo extra ao PDF, se necessário.
        });
    });
});