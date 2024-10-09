//1 para inserir motivo, abre modal SweetAlert em aplica��o grid do scriptcase
//2 atribui esse motivo em vari�vel PHP
//3 altera o estado do bot�o
//4 clica no bot�o para invocar processamento PHP

async function openModalMotivo(btnName, row, fieldParamName, newState, placeholder) {
	const motivo = await Swal.fire(
		{
			title: 'Confirma a prescri��o da rela��o entre o contrato e este equipamento?',
			input: "textarea",
			inputPlaceholder: placeholder,
			confirmButtonText: 'Enviar',
			showCancelButton: true,
			cancelButtonText: 'Cancelar',
			inputValidator: (value) => {
				return new Promise((resolve) => { //A promise aguarda a invoca��o da fun��o 'resolve'
					if ((value.trim() !== '') && (value !== null) && (value !== undefined) && (value.length <= 1000)) {
						resolve();
					} else if (value.lenght > 1000) {
						resolve("O tamanho m�ximo do motivo � de 1000 caracteres.");
					} else {
						resolve("� obrigat�rio informar o motivo para prescrever a rela��o entre equipamento e contrato!");
					}
				});
			}
		}
	);

	if (motivo.value == '' || motivo.value == null) {
		return;
	}

	const motivoEncoded = encodeURIComponent(motivo.value); //codifica em uma string de URI

	const fieldParam = document.querySelector('#id_sc_field_' + fieldParamName + '_' + row); //campo virtual scriptcase
	const btnSend = document.querySelector('#sc-actionbar-actbtn_' + btnName + '_' + row); //bot�o 'Enviar'

	if (fieldParam && btnSend) {
		fieldParam.innerHTML = motivoEncoded; //atribui o motivo codificado ao campo virtual scriptcase
		btnSend.dataset.actionbarState = newState; //altera o valor do atributo do objeto HTML element
		$('#sc-actionbar-actbtn_' + btnName + '_' + row).data('actionbarState', newState); //altera o valor do atributo do objeto JQuery... contido no objeto HTML element acima
		btnSend.click();
	}
}

document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('[id^=sc-actionbar-actbtn_prescrever]').forEach(
		(btn) => {
			const numRow = btn.getAttribute('data-actionbar-row').replace('_', '');

			btn.addEventListener('click', function () {
				if (btn.dataset.actionbarState == 'pendente') {
					openModalMotivo('prescrever', numRow, 'param_motivo_prescricao', 'prescrevendo', 'Insira o motivo da prescri��o');
				}
			});
		}
	);
});