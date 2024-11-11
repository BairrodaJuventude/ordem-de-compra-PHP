function enviarordem(alerta) {
  if (alerta) {
    success();
  } else {
    error();
  }
}

function success() {
  swal({
    title: "Ordem Enviada!",
    text: "Ordem enviada com sucesso!",
    icon: "success",
  });
}

function error() {
  swal({
    title: "Erro!",
    text: "Não foi possível enviar a ordem.",
    icon: "error",
  });
}
