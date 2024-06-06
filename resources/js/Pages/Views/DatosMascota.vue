<template>
  <div class="bg-green-500 h-screen flex flex-col items-center justify-center">
    <!-- Equis blanca en la parte superior izquierda -->
    <Link :href="route('home')">
    <div class="cursor-pointer absolute top-0 left-0 mt-4 ml-4 w-8 h-8 text-white text-3xl font-bold">✕</div>
    </Link>

    <!-- Contenedor de imagen -->
    <div
      class="hover-brightness cursor-pointer border-4 border-white rounded-full overflow-hidden w-32 h-32 mb-8 bg-green-600">
      <img src="../../../images/camera.png" alt="Imagen de mascota">
    </div>

    <!-- Formulario con los campos -->
    <form class="w-96 bg-white p-8 rounded-lg shadow-md" @submit.prevent="submit">
      <div class="mb-4">
        <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre de Mascota</label>
        <input v-model="form.name" type="text" id="nombre"
          class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:border-green-500"
          placeholder="Nombre de Mascota" required>
      </div>
      <div class="mb-4">
        <label for="tipo" class="block text-gray-700 font-bold mb-2">Tipo de Mascota</label>
        <select id="tipo" v-model="form.type"
          class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:border-green-500" required>
          <option value="" disabled selected>Tipo</option>
          <option value="perro">Perro</option>
          <option value="gato">Gato</option>
          <option value="otro">Otro</option>
        </select>
      </div>
      <div class="mb-4">
        <label for="edad" class="block text-gray-700 font-bold mb-2">Edad</label>
        <input v-model="form.age" type="number" id="edad"
          class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:border-green-500"
          placeholder="Edad" required>
      </div>
      <div class="mb-4">
        <label for="raza" class="block text-gray-700 font-bold mb-2">Raza</label>
        <input v-model="form.breed" type="text" id="raza"
          class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:border-green-500"
          placeholder="Raza" required>
      </div>
      <div class="text-center">
        <button type="submit"
          class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition-colors duration-300">Agregar</button>
      </div>

    </form>
  </div>
</template>

<script>
import { Link, useForm } from '@inertiajs/vue3';

export default {
  components: {
    Link
  },
  data() {
    return {
      form: {
        name: '',
        type: '',
        age: 0,
        breed: '',
      }
    }
  },
  methods: {
    submit() {
      console.log('entro');
      const form = useForm({ ...this.form })
      form.post(this.route('pet.create'))
    }
  }
  // Lógica del componente
}

</script>
<style>
.hover-brightness:hover {
  filter: brightness(0.8);
  transition: all 0.2s ease-out;
}
</style>