<template>
  <div class="flex flex-col h-screen">
    <!-- Sección verde con información de mascota -->
    <div class="bg-green-500 text-white text-center p-4">
      <h2 class="text-2xl font-semibold">Información de Mascota</h2>
      <div class="flex flex-col">
        <h3>Nombre</h3>
        <h3 class="text-xl font-semibold">Nombre</h3>
      </div>
      <div class="mt-4 flex justify-center">
        <div
          class="hover-brightness cursor-pointer border-4 border-white rounded-full overflow-hidden w-32 h-32 mb-8 bg-green-600">
          <img src="../../../images/placeholder-pet.png" alt="Imagen de mascota">
        </div>
      </div>
      <!-- Información de la mascota -->
      <div class="flex justify-evenly">
        <div>
          <p>Tipo</p>
          <p>Perro</p>
        </div>
        <div>
          <p>Raza</p>
          <p>Raza</p>
        </div>
        <div>
          <p>Edad</p>
          <p>3 Años</p>
        </div>
      </div>
    </div>

    <!-- Contenido principal - Lista de citas -->
    <div class="flex-grow overflow-y-auto p-4">
      <!-- Lista de citas -->
      <div v-for="cita in historias" :key="cita.id" class="flex items-center border-b border-gray-200 py-4">
        <!-- Imagen informativa -->
        <div class="w-16 h-16 mr-4">
          <img src="../../../images/cissors.png" alt="Informative Image">
        </div>
        <!-- Información de la cita -->
        <div class="flex-grow">
          <h2 class="font-semibold">{{ cita.titulo }}</h2>
          <p class="text-gray-600">{{ cita.fecha }}</p>
        </div>
        <!-- Hora del día -->
        <div class="text-gray-600">{{ cita.hora }}</div>
      </div>
    </div>

    <!-- Barra inferior -->
    <div class="flex items-center justify-center bg-green-500 p-4">
      <!-- Opciones de navegación -->
      <div class="flex space-x-4">
        <Link :href="route('pet.info')">
        <button class="text-white">Mascota</button>
        </Link>
        <Link :href="route('home')">
        <button class="text-white">Calendario</button>
        </Link>
        <Link :href="route('product.show')">
        <button class="text-white">Tienda</button>
        </Link>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';
export default {
  components: {
    Link
  },
  data() {
    return {
      historias: [
        { id: 1, titulo: 'Cita 1', fecha: '2024-06-05', hora: '10:00 AM' },
        { id: 2, titulo: 'Cita 2', fecha: '2024-06-06', hora: '11:00 AM' },
        { id: 3, titulo: 'Cita 3', fecha: '2024-06-07', hora: '12:00 PM' },
        // Agrega más historias según sea necesario
      ]
    };
  },
  methods: {
    navigateTo(page) {
      // Lógica para navegar a la página seleccionada
    }
  }
};
</script>