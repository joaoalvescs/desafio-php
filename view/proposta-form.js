document.addEventListener('DOMContentLoaded', function() {
    const planoEscolhidoSelect = document.getElementById('planoEscolhido');
    const beneficiariosContainer = document.getElementById('beneficiarios');
    const form = document.getElementById('propostaForm');

    function addBeneficiarioField() {
        const div = document.createElement('div');
        div.innerHTML = `
            <label for="nome">Nome:</label>
            <input type="text" name="nome[]" required>
            <label for="idade">Idade:</label>
            <input type="number" name="idade[]" required>
        `;
        beneficiariosContainer.appendChild(div);
    }

    fetch('/../data/plans.json')
        .then(response => response.json())
        .then(planos => {
            planos.forEach(plano => {
                const option = document.createElement('option');
                option.value = plano.codigo;
                option.textContent = plano.nome;
                planoEscolhidoSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Erro ao carregar os planos:', error);
        });

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(form);
        const beneficiarios = [];
        formData.getAll('nome[]').forEach((nome, index) => {
            beneficiarios.push({
                nome: nome,
                idade: formData.getAll('idade[]')[index],
                plano: formData.get('planoEscolhido')
            });
        });

        fetch('backend/gerar_proposta.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ beneficiarios: beneficiarios, planoEscolhido: formData.get('planoEscolhido') })
        })
        .then(response => response.json())
        .then(proposta => {
        })
        .catch(error => {
            console.error('Erro ao enviar os dados da proposta:', error);
        });
    });

    addBeneficiarioField();
});