document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal');
    const addModal = document.getElementById('add-modal');
    const empresaList = document.getElementById('empresa-list');
    const closeBtn = document.querySelector('.close');
    const closeAddBtn = document.querySelector('.close-add');
    const addCompanyForm = document.getElementById('add-company-form');

    // Array para almacenar las empresas
    let companies = [];

    // Cargar empresas desde el array
    const loadCompanies = () => {
        empresaList.innerHTML = '';
        companies.forEach((company, index) => {
            const div = document.createElement('div');
            div.textContent = company.rif; // Mostrar el RIF de la empresa
            div.addEventListener('click', () => openModal(index)); // Pasar el índice de la empresa
            empresaList.appendChild(div);
        });
    };

    // Abrir el modal para ver/modificar información de la empresa
    const openModal = (index) => {
        const company = companies[index];
        modal.querySelector('#modal-info').textContent = `RIF: ${company.rif}, Correo de la Empresa: ${company.email}, Correo del Encargado: ${company.managerEmail}, Teléfono: ${company.phone}, Declara en Alcaldía: ${company.declareAlcaldia ? 'Sí' : 'No'}, Declara en SENIAT: ${company.declareSeniat ? 'Sí' : 'No'}`;
        modal.classList.remove('hidden');
    };

    // Abrir el modal para agregar nueva empresa
    document.getElementById('add-empresa').onclick = (e) => {
        e.preventDefault();
        addModal.classList.remove('hidden');
    };

    // Cerrar el modal de agregar empresa
    closeAddBtn.onclick = () => {
        addModal.classList.add('hidden');
    };

    // Cerrar el modal de información de la empresa
    closeBtn.onclick = () => {
        modal.classList.add('hidden');
    };

    // Manejar el envío del formulario para agregar una nueva empresa
    addCompanyForm.onsubmit = (e) => {
        e.preventDefault();

        const rif = document.getElementById('rif').value;
        const companyEmail = document.getElementById('company-email').value;
        const managerEmail = document.getElementById('manager-email').value;
        const phone = document.getElementById('phone').value;
        const declareAlcaldia = document.getElementById('declare-alcaldia').checked;
        const declareSeniat = document.getElementById('declare-seniat').checked;

        // Agregar la nueva empresa al array
        companies.push({
            rif,
            email: companyEmail,
            managerEmail,
            phone,
            declareAlcaldia,
            declareSeniat
        });

        loadCompanies(); // Recargar la lista de empresas
        addModal.classList.add('hidden'); // Cerrar el modal
        addCompanyForm.reset(); // Reiniciar el formulario
    };

    // Cargar empresas al inicio
    loadCompanies();
});