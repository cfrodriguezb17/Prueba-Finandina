<template>
  <div class="login-container bg-green-600 w-full">
    <div class="phone-container">
      <div class="flex flex-col h-screen">
        <!-- Parte de arriba con fondo 5cbb6d -->
        <div class="flex-grow bg-green-500">
          <div class="image-logo-container">
            <img src="../../../images/rewow-logo.png" class="image-logo" alt="Imagen de fondo">
          </div>
        </div>

        <!-- Parte de abajo en blanco con los campos de email y contraseña -->
        <div class="bg-white p-8">
          <h1 class="text-3xl font-semibold mb-4">Iniciar Sesión</h1>
          <form @submit.prevent="submitForm">
            <div class="mb-4">
              <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
              <input type="email" id="email" v-model="email"
                class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:border-green-500"
                placeholder="Correo Electrónico" required>
            </div>
            <div class="mb-4">
              <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
              <input type="password" id="password" v-model="password"
                class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:border-green-500"
                placeholder="Contraseña" required>
            </div>
            <button type="submit"
              class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition-colors duration-300">Iniciar
              Sesión</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: '',
      password: ''
    };
  },
  methods: {
    submitForm() {
      // Aquí puedes manejar la lógica para enviar los datos del formulario
      console.log('Email:', this.email);
      console.log('Password:', this.password);
    }
  }
};
</script>
<style>
.image-logo-container {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.image-logo {
  width: 50%;
}

.login-container {
  display: flex;
  justify-content: center;
  height: 100vh;
}

.phone-container {
  width: 100%;
  max-width: 390px;
  max-height: 844px;
}
</style>