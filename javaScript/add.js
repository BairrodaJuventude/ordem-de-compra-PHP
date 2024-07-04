$(function () {
    var scntDiv = $('#dynamicDiv');
    $(document).on('click', '#addInput', function () {
        for (var i = 0; i < 1; i++){
            $('<a class="btn btn-danger" href="javascript:void(0)" id="remInput">'+
                '<span class="glyphicon glyphicon-minus" aria-hidden="true">Remover</span> '+
                '</a>'+
                '<tr>\n' +
                '        <td><input type="text" class="unit" ></td>\n' +
                '        <td><input type="number" class="quantity" oninput="updateTotal(this)" ></td>\n' +
                '        <td><input type="text" class="description" ></td>\n' +
                '          <td>\n' +
                '              <select class="span12" name="dis4" id="a" >\n' +
                '                  <option value="Selecionar">Selecionar</option>\n' +
                '                  <option value="Cef">Cef</option>\n' +
                '                  <option value="Cozinha">Cozinha</option>\n' +
                '                  <option value="Administração">Administração</option>\n' +
                '                  <option value="Cep">Cep</option>\n' +
                '              </select>\n' +
                '          </td>    \n' +
                '          <td><input type="text" class="unitPrice" step="0.01"  oninput="updateTotal(this)" ></td>\n' +
                '          <td class="totalValue">0.00</td> \n' +
                '      </tr>').appendTo(scntDiv);
        }
        return false;
    });
    $(document).on('click', '#remInput', function () {
        $(this).parents('p').remove();
        return false;
    });
});