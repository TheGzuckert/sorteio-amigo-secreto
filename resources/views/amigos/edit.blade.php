<x-layout title="Editar amigo">
  <form action="/amigos/{{ $amigo->id }}" method="post" id="formulario">
    @csrf
    @method('PUT')
    <div class="mb-3">
       <label for="name" class="form-label">Nome:</label>
       <div class="col-3">
         <input type="text" name="name" id="name" class="form-control" value="{{ $amigo->name }}" placeholder="Insira o nome do seu amigo" oninput="checkInput()">
       </div>
       <label for="email" class="form-label mt-2">E-mail:</label>
       <div class="col-3 mt-2">
         <input type="text" name="email" id="email" class="form-control" value="{{ $amigo->email }}" placeholder="Insira o e-mail do seu amigo" oninput="checkInput()">
       </div>
    </div>
    <button type="submit" class="btn btn-dark" style="width: 320px;" id="submitButton" disabled>Adicionar</button>
  </form>
</x-layout>

<script>
  window.onload = checkInput;

  function checkInput() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (name !== "" && emailRegex.test(email)) {
      document.getElementById('submitButton').disabled = false;
    } else {
      document.getElementById('submitButton').disabled = true;
    }
  }
</script>