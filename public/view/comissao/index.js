$(document).ready(function() {
    loadMenu('comissao');

    var params = getUrlParameters();
    if (params.sucess) {
        $('#msg-sucesso').show().fadeOut(3000);
    }
    if (params.delete) {
        $('#msg-delete').show().fadeOut(3000);
    }

    // 1. Tela de Cadastro de Comissão
    if ($('#formCriarComissao').length) {
        $('#formCriarComissao').submit(function(e) {
            e.preventDefault();
            var formData = getFormData(this);
            var resp = apiPost('/comissao', formData);
            if (resp && resp.access !== false) {
                alert("Comissão cadastrada com sucesso!");
                window.location.assign('/comissao/editar');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao cadastrar comissão.");
            }
        });
    }

    // 2. Tela de Edição de Comissão
    if ($('#selectComissao').length) {
        loadComissoes('#selectComissao', params.comissao);

        $('#btnBuscarComissao').click(function() {
            var selectedId = $('#selectComissao').val();
            if (selectedId) {
                carregarDetalhesComissao(selectedId);
            }
        });

        $('#formSalvarComissao').submit(function(e) {
            e.preventDefault();
            var formData = getFormData(this);
            var resp = apiPost('/comissao/salvar', formData);
            if (resp && resp.access !== false) {
                alert("Comissão atualizada com sucesso!");
                window.location.assign('/comissao/editar?sucess=true&comissao=' + formData.id);
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao atualizar comissão.");
            }
        });

        $('#formExcluirComissao').submit(function(e) {
            e.preventDefault();
            if (!confirm('Tem certeza que deseja excluir?')) {
                return false;
            }
            var formData = getFormData(this);
            var resp = apiPost('/comissao/excluir', formData);
            if (resp && resp.access !== false) {
                alert("Comissão excluída com sucesso!");
                window.location.assign('/comissao/editar?delete=true');
            } else {
                alert(resp && resp.message ? resp.message : "Erro ao excluir comissão.");
            }
        });
    }
});

function loadComissoes(selector, selectedId) {
    var comissoes = apiGet('/comissoes');
    if (comissoes && Array.isArray(comissoes)) {
        var options = '<option value="">Selecione uma comissão</option>';
        comissoes.forEach(function(c) {
            var isSel = (selectedId && String(c.id) === String(selectedId)) ? 'selected' : '';
            options += `<option value="${c.id}" ${isSel}>${c.nome}</option>`;
        });
        $(selector).html(options);

        if (selectedId && selector === '#selectComissao') {
            carregarDetalhesComissao(selectedId);
        }
    }
}

function carregarDetalhesComissao(id) {
    var comissao = apiGet('/comissao?id=' + id);
    if (comissao) {
        $('#comissaoId').val(comissao.id || id);
        $('#excluirId').val(comissao.id || id);
        $('#comissaoNome').val(comissao.nome || '');
        $('#comissaoUsuario').val(comissao.usuario || '');
        $('#comissaoSenha').val('');
        $('#blocoEditar').show();
    }
}
