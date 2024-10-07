<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="icon" href="../img/logobranca.jpg">


            <script src="../javaScript/enviar.js"></script>
            <script src="../javaScript/lateral.js" defer></script>
            
            <title>Encaminhar Ordem</title>
            
        </head>

        <body>
        <nav class="main-menu">

        <?php 

            include '../php/menu.php';
            echo $top;
        
        ?>

        </nav>

        <main style="height: 84vh;">
            <div class="container-fluid p-5 text-center">
                <h1>ORDEM DE COMPRA</h1>
            </div>
              
            <div class="container mt-3">
                <section id="c">
                    <table class="table">
                        <thead>
                        <tr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <tr>
                                    <th for="Urg"><b>Urgência:</b>
                                        <select class="urgencia" name="Urg" id="a">
                                            <option value="">Selecionar</option>
                                            <option value="Baixa">Baixa (Até 2 semanas)</option>
                                            <option value="Media">Média (Até 1 semana)</option>
                                            <option value="Alta">Alta (Até 3 dias)</option>
                                            <option value="Urgente">Urgente (Hoje)</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th><b>Fornecedor:</b><input id="a" name="fornece" type="text" required></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th><b>Setor:</b> <select class="span12" name="setor" id="a" required>
                                            <option value="">Selecionar</option>
                                            <option value="INFANTIL">INFANTIL</option>
                                            <option value="ESCOLA">ESCOLA</option>
                                            <option value="ESP_CULTURAL">ESP_CULTURAL</option>
                                            <option value=" OFICINAS_ESPORTIVAS"> OFICINAS_ESPORTIVAS</option>
                                            <option value="OFICINAS_CULTURAIS">OFICINAS_CULTURAIS</option>
                                            <option value="LABORATORIOS">LABORATORIOS</option>
                                            <option value="PSICOSSOCIAL">PSICOSSOCIAL</option>
                                            <option value="RECURSOS">RECURSOS</option>
                                            <option value="RELACIONAMENTO">RELACIONAMENTO</option>
                                            <option value="COZINHA">COZINHA</option>
                                            <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                            <option value="TRANSPORTE">TRANSPORTE</option>
                                            <option value="ALMOXARIFADO">ALMOXARIFADO</option>
                                            <option value="RH">RH</option>
                                        </select></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                               
                        </thead>
                    </table>
                    <table method="post" border="1" class="table table-hover">
                        <thead>
                        <tr>
                            <th>Unidade:</th>
                            <th>Quantidade:</th>
                            <th>Descrição De Produto</th>
                            <th>Tipo De Despesa</th>
                            <th>Preço Da Unidade</th>
                            <th>Valor Total:</th>
                        </tr>
                        </thead>
                        <tbody id="tableBody">
                        <tr>
                            <td>
                                <select class="span12" name="uni1" id="a" required>
                                    <option value="">Selecionar</option>
                                    <option value="Duzia">Duzia</option>
                                    <option value="Cartela">Cartela</option>
                                    <option value="Litro">Litro</option>
                                    <option value="Saco">Saco</option>
                                    <option value="Caixa">Caixa</option>
                                    <option value="Unidade">Unidade</option>
                                    <option value="Metro">Metro</option>
                                    <option value="Par">Par</option>
                                    <option value="Pacote">Pacote</option>
                                    <option value="Rolo">Rolo</option>
                                    <option value="Kilograma">Kilograma</option>
                                    <option value="Grama">Grama</option>
                                    <option value="Mililitro">Mililitro</option>
                                </select>
                            </td>
                            <td><input type="number" step="0.01" class="quantity" id="v1" oninput="updateTotal(this)" name="quant1"required></td>
                            <td><textarea class="description" name="desc1" required></textarea></td>
                            <td>
                                <select class="span12" name="setor1" id="a" required>
                                    <option value="">Selecionar</option>
                                    <option value="ALIMENTACAO">ALIMENTACAO</option>
                                    <option value="VESTUARIO">VESTUARIO</option>
                                    <option value="ASSISTENCIA_SOCIAL">ESP_CULTURAL</option>
                                    <option value=" BRINDES"> BRINDES</option>
                                    <option value="COMBUSTIVEIS">COMBUSTIVEIS</option>
                                    <option value="COMPUTADORES_PERIFERICOS">COMPUTADORES_PERIFERICOS</option>
                                    <option value="CONSERTO_VEICULO">CONSERTO_VEICULO</option>
                                    <option value="CONSERTOS_REPAROS_PREDIAL">CONSERTOS_REPAROS_PREDIAL</option>
                                    <option value="CORREIO">CORREIO</option>
                                    <option value="CURSOS_TREINAMENTOS">CURSOS_TREINAMENTOS</option>
                                    <option value="DESPESAS_COM_VIAGENS">DESPESAS_COM_VIAGENS</option>
                                    <option value="FESTAS_PROMOCOES">FESTAS_PROMOCOES</option>
                                    <option value="FRETES_CARRETOS">FRETES_CARRETOS</option>
                                    <option value="INFORMATICA">INFORMATICA</option>
                                    <option value="INSTRUMENTOS_MUSICAIS">INSTRUMENTOS_MUSICAIS</option>
                                    <option value="LICENCIAMENTOS">LICENCIAMENTOS</option>
                                    <option value="LIMPEZA">LIMPEZA</option>
                                    <option value="MAQUINAS_APARELHOS_EQUIPAMENTOS">MAQUINAS_APARELHOS_EQUIPAMENTOS</option>
                                    <option value="MATERIAL_CONSUMO">MATERIAL_CONSUMO</option>
                                    <option value="MATERIAL_DIDATICO_CEP">MATERIAL_DIDATICO_CEP</option>
                                    <option value="MATERIAL_DIDATICO_ESCOLAR">MATERIAL_DIDATICO_ESCOLAR</option>
                                    <option value="MATERIAL_EXPEDIENTE">MATERIAL_EXPEDIENTE</option>
                                    <option value="MULTAS_DETRAN">MULTAS_DETRAN</option>
                                    <option value="PROMOCOES_EVENTOS">PROMOCOES_EVENTOS</option>
                                    <option value="PROPAGANDA_PUBLICIDADE">PROPAGANDA_PUBLICIDADE</option>
                                    <option value="REMEDIOS_MEDICAMENTOS">REMEDIOS_MEDICAMENTOS</option>
                                    <option value="REPRODUCOES_GRAFICAS">REPRODUCOES_GRAFICAS</option>
                                    <option value="SEGURO_ADOLESCENTES">SEGURO_ADOLESCENTES</option>
                                    <option value="SEGURO_VEICULOS_PREDIAL">SEGURO_VEICULOS_PREDIAL</option>
                                </select>
                            </td>
                            <td><input type="number" class="unitPrice" id="v2" step="0.01" oninput="updateTotal(this)" name="precUni1" required></td>
                            <td class="totalValue" id="valor">0.00</td>
                        </tr>
                        <tr>
                            <td>
                                <select class="span12" name="uni2" id="a" >
                                    <option value="">Selecionar</option>
                                    <option value="Duzia">Duzia</option>
                                    <option value="Cartela">Cartela</option>
                                    <option value="Litro">Litro</option>
                                    <option value="Saco">Saco</option>
                                    <option value="Caixa">Caixa</option>
                                    <option value="Unidade">Unidade</option>
                                    <option value="Metro">Metro</option>
                                    <option value="Par">Par</option>
                                    <option value="Parcote">Pacote</option>
                                    <option value="Rolo">Rolo</option>
                                    <option value="Kilograma">Kilograma</option>
                                    <option value="Grama">Grama</option>
                                    <option value="Mililitro">Mililitro</option>
                                </select>
                            </td>
                            <td><input type="number" step="0.01" class="quantity"  oninput="updateTotal(this)" name="quant2" ></td>
                            <td><input type="text" class="description" name="desc2" ></td>
                            <td>
                                <select class="span12"  id="a"name="setor2">
                                    <option value="">Selecionar</option>
                                    <option value="ALIMENTACAO">ALIMENTACAO</option>
                                    <option value="VESTUARIO">VESTUARIO</option>
                                    <option value="ASSISTENCIA_SOCIAL">ESP_CULTURAL</option>
                                    <option value=" BRINDES"> BRINDES</option>
                                    <option value="COMBUSTIVEIS">COMBUSTIVEIS</option>
                                    <option value="COMPUTADORES_PERIFERICOS">COMPUTADORES_PERIFERICOS</option>
                                    <option value="CONSERTO_VEICULO">CONSERTO_VEICULO</option>
                                    <option value="CONSERTOS_REPAROS_PREDIAL">CONSERTOS_REPAROS_PREDIAL</option>
                                    <option value="CORREIO">CORREIO</option>
                                    <option value="CURSOS_TREINAMENTOS">CURSOS_TREINAMENTOS</option>
                                    <option value="DESPESAS_COM_VIAGENS">DESPESAS_COM_VIAGENS</option>
                                    <option value="FESTAS_PROMOCOES">FESTAS_PROMOCOES</option>
                                    <option value="FRETES_CARRETOS">FRETES_CARRETOS</option>
                                    <option value="INFORMATICA">INFORMATICA</option>
                                    <option value="INSTRUMENTOS_MUSICAIS">INSTRUMENTOS_MUSICAIS</option>
                                    <option value="LICENCIAMENTOS">LICENCIAMENTOS</option>
                                    <option value="LIMPEZA">LIMPEZA</option>
                                    <option value="MAQUINAS_APARELHOS_EQUIPAMENTOS">MAQUINAS_APARELHOS_EQUIPAMENTOS</option>
                                    <option value="MATERIAL_CONSUMO">MATERIAL_CONSUMO</option>
                                    <option value="MATERIAL_DIDATICO_CEP">MATERIAL_DIDATICO_CEP</option>
                                    <option value="MATERIAL_DIDATICO_ESCOLAR">MATERIAL_DIDATICO_ESCOLAR</option>
                                    <option value="MATERIAL_EXPEDIENTE">MATERIAL_EXPEDIENTE</option>
                                    <option value="MULTAS_DETRAN">MULTAS_DETRAN</option>
                                    <option value="PROMOCOES_EVENTOS">PROMOCOES_EVENTOS</option>
                                    <option value="PROPAGANDA_PUBLICIDADE">PROPAGANDA_PUBLICIDADE</option>
                                    <option value="REMEDIOS_MEDICAMENTOS">REMEDIOS_MEDICAMENTOS</option>
                                    <option value="REPRODUCOES_GRAFICAS">REPRODUCOES_GRAFICAS</option>
                                    <option value="SEGURO_ADOLESCENTES">SEGURO_ADOLESCENTES</option>
                                    <option value="SEGURO_VEICULOS_PREDIAL">SEGURO_VEICULOS_PREDIAL</option>
                                </select>
                            </td>
                            <td><input type="number" class="unitPrice" step="0.01"  oninput="updateTotal(this)"name="precUni2" ></td>
                            <td class="totalValue"  id="valor" name="vt2">0.00</td>
                        </tr>

                        <tr>
                            <td>
                                <select class="span12" name="uni3" id="a" >
                                    <option value="">Selecionar</option>
                                    <option value="Duzia">Duzia</option>
                                    <option value="Cartela">Cartela</option>
                                    <option value="Litro">Litro</option>
                                    <option value="Saco">Saco</option>
                                    <option value="Caixa">Caixa</option>
                                    <option value="Unidade">Unidade</option>
                                    <option value="Metro">Metro</option>
                                    <option value="Par">Par</option>
                                    <option value="Pacote">Pacote</option>
                                    <option value="Rolo">Rolo</option>
                                    <option value="Kilograma">Kilograma</option>
                                    <option value="Grama">Grama</option>
                                    <option value="Mililitro">Mililitro</option>
                                </select>
                            </td>
                            <td><input type="number" step="0.01" class="quantity" oninput="updateTotal(this)"name="quant3" ></td>
                            <td><input type="text" class="description" name="desc3"></td>
                            <td>
                                <select class="span12"  id="a"name="setor3">
                                    <option value="">Selecionar</option>
                                    <option value="ALIMENTACAO">ALIMENTACAO</option>
                                    <option value="VESTUARIO">VESTUARIO</option>
                                    <option value="ASSISTENCIA_SOCIAL">ESP_CULTURAL</option>
                                    <option value=" BRINDES"> BRINDES</option>
                                    <option value="COMBUSTIVEIS">COMBUSTIVEIS</option>
                                    <option value="COMPUTADORES_PERIFERICOS">COMPUTADORES_PERIFERICOS</option>
                                    <option value="CONSERTO_VEICULO">CONSERTO_VEICULO</option>
                                    <option value="CONSERTOS_REPAROS_PREDIAL">CONSERTOS_REPAROS_PREDIAL</option>
                                    <option value="CORREIO">CORREIO</option>
                                    <option value="CURSOS_TREINAMENTOS">CURSOS_TREINAMENTOS</option>
                                    <option value="DESPESAS_COM_VIAGENS">DESPESAS_COM_VIAGENS</option>
                                    <option value="FESTAS_PROMOCOES">FESTAS_PROMOCOES</option>
                                    <option value="FRETES_CARRETOS">FRETES_CARRETOS</option>
                                    <option value="INFORMATICA">INFORMATICA</option>
                                    <option value="INSTRUMENTOS_MUSICAIS">INSTRUMENTOS_MUSICAIS</option>
                                    <option value="LICENCIAMENTOS">LICENCIAMENTOS</option>
                                    <option value="LIMPEZA">LIMPEZA</option>
                                    <option value="MAQUINAS_APARELHOS_EQUIPAMENTOS">MAQUINAS_APARELHOS_EQUIPAMENTOS</option>
                                    <option value="MATERIAL_CONSUMO">MATERIAL_CONSUMO</option>
                                    <option value="MATERIAL_DIDATICO_CEP">MATERIAL_DIDATICO_CEP</option>
                                    <option value="MATERIAL_DIDATICO_ESCOLAR">MATERIAL_DIDATICO_ESCOLAR</option>
                                    <option value="MATERIAL_EXPEDIENTE">MATERIAL_EXPEDIENTE</option>
                                    <option value="MULTAS_DETRAN">MULTAS_DETRAN</option>
                                    <option value="PROMOCOES_EVENTOS">PROMOCOES_EVENTOS</option>
                                    <option value="PROPAGANDA_PUBLICIDADE">PROPAGANDA_PUBLICIDADE</option>
                                    <option value="REMEDIOS_MEDICAMENTOS">REMEDIOS_MEDICAMENTOS</option>
                                    <option value="REPRODUCOES_GRAFICAS">REPRODUCOES_GRAFICAS</option>
                                    <option value="SEGURO_ADOLESCENTES">SEGURO_ADOLESCENTES</option>
                                    <option value="SEGURO_VEICULOS_PREDIAL">SEGURO_VEICULOS_PREDIAL</option>
                                </select>
                            </td>
                            <td><input type="number" class="unitPrice" step="0.01" oninput="updateTotal(this)" name="precUni3" ></td>
                            <td class="totalValue" name="vt3">0.00</td>
                        </tr>

                        <tr>
                            <td>
                                <select class="span12" name="uni4" id="a" >
                                    <option value="">Selecionar</option>
                                    <option value="Duzia">Duzia</option>
                                    <option value="Cartela">Cartela</option>
                                    <option value="Litro">Litro</option>
                                    <option value="Saco">Saco</option>
                                    <option value="Caixa">Caixa</option>
                                    <option value="Unidade">Unidade</option>
                                    <option value="Metro">Metro</option>
                                    <option value="Par">Par</option>
                                    <option value="Pacote">Pacote</option>
                                    <option value="Rolo">Rolo</option>
                                    <option value="Kilograma">Kilograma</option>
                                    <option value="Grama">Grama</option>
                                    <option value="Mililitro">Mililitro</option>
                                </select>
                            </td>
                            <td><input type="number" step="0.01" class="quantity" oninput="updateTotal(this)" name="quant4" ></td>
                            <td><input type="text" class="description" name="desc4" ></td>
                            <td>
                                <select class="span12" id="a" name="setor4">
                                    <option value="">Selecionar</option>
                                    <option value="ALIMENTACAO">ALIMENTACAO</option>
                                    <option value="VESTUARIO">VESTUARIO</option>
                                    <option value="ASSISTENCIA_SOCIAL">ESP_CULTURAL</option>
                                    <option value=" BRINDES"> BRINDES</option>
                                    <option value="COMBUSTIVEIS">COMBUSTIVEIS</option>
                                    <option value="COMPUTADORES_PERIFERICOS">COMPUTADORES_PERIFERICOS</option>
                                    <option value="CONSERTO_VEICULO">CONSERTO_VEICULO</option>
                                    <option value="CONSERTOS_REPAROS_PREDIAL">CONSERTOS_REPAROS_PREDIAL</option>
                                    <option value="CORREIO">CORREIO</option>
                                    <option value="CURSOS_TREINAMENTOS">CURSOS_TREINAMENTOS</option>
                                    <option value="DESPESAS_COM_VIAGENS">DESPESAS_COM_VIAGENS</option>
                                    <option value="FESTAS_PROMOCOES">FESTAS_PROMOCOES</option>
                                    <option value="FRETES_CARRETOS">FRETES_CARRETOS</option>
                                    <option value="INFORMATICA">INFORMATICA</option>
                                    <option value="INSTRUMENTOS_MUSICAIS">INSTRUMENTOS_MUSICAIS</option>
                                    <option value="LICENCIAMENTOS">LICENCIAMENTOS</option>
                                    <option value="LIMPEZA">LIMPEZA</option>
                                    <option value="MAQUINAS_APARELHOS_EQUIPAMENTOS">MAQUINAS_APARELHOS_EQUIPAMENTOS</option>
                                    <option value="MATERIAL_CONSUMO">MATERIAL_CONSUMO</option>
                                    <option value="MATERIAL_DIDATICO_CEP">MATERIAL_DIDATICO_CEP</option>
                                    <option value="MATERIAL_DIDATICO_ESCOLAR">MATERIAL_DIDATICO_ESCOLAR</option>
                                    <option value="MATERIAL_EXPEDIENTE">MATERIAL_EXPEDIENTE</option>
                                    <option value="MULTAS_DETRAN">MULTAS_DETRAN</option>
                                    <option value="PROMOCOES_EVENTOS">PROMOCOES_EVENTOS</option>
                                    <option value="PROPAGANDA_PUBLICIDADE">PROPAGANDA_PUBLICIDADE</option>
                                    <option value="REMEDIOS_MEDICAMENTOS">REMEDIOS_MEDICAMENTOS</option>
                                    <option value="REPRODUCOES_GRAFICAS">REPRODUCOES_GRAFICAS</option>
                                    <option value="SEGURO_ADOLESCENTES">SEGURO_ADOLESCENTES</option>
                                    <option value="SEGURO_VEICULOS_PREDIAL">SEGURO_VEICULOS_PREDIAL</option>
                                </select>
                            </td>
                            <td>
                                    <input type="number" class="unitPrice" step="0.01"oninput="updateTotal(this)"   name="precUni4">

                            </td>
                            <td class="totalValue" >0.00</td>


                        </tr>
                        </tbody>
                    </table>

                    <th><b>Valor Geral</b></th>
                    <th>
                        <input placeholder="00,00" type="number" name="valorTotal" value="" class="Value" id="valor-Total" readonly>
                          <td>
                            <input  name="arquivos1[]" multiple  type="file">
                        </td>
                    </th>
                    <table class="table" >

                        <thead>
                        <tr>
                            <th><b>Requisitante:</b></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th><b>Coordenador:</b>
                                <select id="a" name="assiCoord" required>
                                    <option value="">Selecionar</option>
                                </select>
                            </th>
                        </tr>

                        <tr>
                            <th><b>Aprovador:</b>

                            </th>
                        </tr>
                        </thead>


                        <button onclick="alerta" id="button" type="submit">Enviar</button>
                        <span></span>
                        </form>
                    </table>
                </section>
            </div>
        </main>



        </body>
        <script src="../../javaScript/mobile-navbar.js"></script>



        </html>