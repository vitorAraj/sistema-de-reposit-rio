/* SCRIPT PARA CONTAGEM DE CARACTERES DO CAMPO TEXTAREA RESUMO
-Usado nas páginas noticia-insere.php e noticia-atualiza.php */

// Limite de caracteres (igual ao definido no maxlength do <textarea>)

  const MAX_CARACTERES = 400;

  const spanMaximo = document.querySelector("#maximo");
  const textResumo = document.querySelector("#resumo");

  spanMaximo.classList.remove("bg-danger");
  spanMaximo.classList.add("bg-success");

  let quantidadeDigitada = textResumo.value.length;

  atualizarContador(quantidadeDigitada);

  function atualizarContador(quantidade) {
    spanMaximo.textContent = quantidade;

    if (quantidade === 0 || quantidade === MAX_CARACTERES) {
      spanMaximo.classList.remove("bg-success");
      spanMaximo.classList.add("bg-danger");
    } else {
      spanMaximo.classList.remove("bg-danger");
      spanMaximo.classList.add("bg-success");
    }
  }

  textResumo.addEventListener("input", function () {
    quantidadeDigitada = textResumo.value.length;
    atualizarContador(quantidadeDigitada);
  });
