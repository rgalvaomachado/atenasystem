$(document).ready(function() {
    loadMenu('representante');

    var params = getUrlParameters();
    if (params.sucess) {
        $('#msg-sucesso').show().fadeOut(3000);
    }
    if (params.delete) {
        $('#msg-delete').show().fadeOut(3000);
    }

    // 1. Tela de Cadastro de Representante
    if ($('#formCriarRepresentante').length) {
        $('#formCriarRepresentante').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var resp = apiPost('/representante', formData);
            if (resp && resp.access !== false) {
                alert("Representante cadastrade com sucesso!");
                window.location.assign('/representante/editar');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao cadastrar representante.");
            }
        });
    }

    // 2. Tela de Edição de Representante
    if ($('#selectRepresentante').length) {
        loadRepresentantes('#selectRepresentante', params.representante);

        $('#btnBuscarRepresentante').click(function() {
            var selectedId = $('#selectRepresentante').val();
            if (selectedId) {
                carregarDetalhesRepresentante(selectedId);
            }
        });

        $('#formSalvarRepresentante').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id = $('#representanteId').val();
            var resp = apiPost('/representante/salvar', formData);
            if (resp && resp.access !== false) {
                alert("Representante atualizade com sucesso!");
                window.location.assign('/representante/editar?sucess=true&representante=' + id);
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao atualizar representante.");
            }
        });

        $('#formExcluirRepresentante').submit(function(e) {
            e.preventDefault();
            if (!confirm('Tem certeza que deseja excluir?')) {
                return false;
            }
            var formData = getFormData(this);
            var resp = apiPost('/representante/excluir', formData);
            if (resp && resp.access !== false) {
                alert("Representante excluíde com sucesso!");
                window.location.assign('/representante/editar?delete=true');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao excluir representante.");
            }
        });
    }
});

function loadRepresentantes(selector, selectedId) {
    var representantes = apiGet('/representantes');
    if (representantes && Array.isArray(representantes)) {
        var options = '<option value="">Selecione um representante</option>';
        representantes.forEach(function(r) {
            var isSel = (selectedId && String(r.id) === String(selectedId)) ? 'selected' : '';
            options += `<option value="${r.id}" ${isSel}>${r.nome}</option>`;
        });
        $(selector).html(options);

        if (selectedId && selector === '#selectRepresentante') {
            carregarDetalhesRepresentante(selectedId);
        }
    }
}

function carregarDetalhesRepresentante(id) {
    var representante = apiGet('/representante?id=' + id);
    if (representante) {
        $('#representanteId').val(representante.id || id);
        $('#excluirId').val(representante.id || id);
        $('#representanteNome').val(representante.nome || '');
        $('#representanteUsuario').val(representante.usuario || '');
        $('#representanteSenha').val('');

        var imgUrl = '/public/assinatura/' + id + '.png?t=' + new Date().getTime();
        var imgTester = new Image();
        imgTester.onload = function() {
            $('#imgAssinaturaAtual').attr('src', imgUrl);
            $('#blocoAssinaturaAtual').show();
        };
        imgTester.onerror = function() {
            $('#blocoAssinaturaAtual').hide();
        };
        imgTester.src = imgUrl;

        $('#blocoEditar').show();
    }
}
