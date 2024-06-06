<template>
  <div class="flex flex-col h-screen">
    <!-- Barra superior -->
    <div class="flex items-center justify-between bg-green-500 p-4">
      <!-- Logo -->
      <img src="../../../images/rewow-logo.png" alt="Logo" class="h-8">
      <!-- Barra de navegación -->
      <Link :href="route('cita.render')">
      <button class="text-white text-3xl">
        <i class="fa-solid fa-plus"></i>
      </button>
      </Link>
    </div>

    <!-- Contenido principal - Lista de citas -->
    <div class="flex-grow overflow-y-auto p-4">
      <!-- Lista de citas -->
      <div v-for="cita in appointments" :key="cita.id" class="flex items-center border-b border-gray-200 py-4">
        <!-- Imagen informativa -->
        <div class="w-16 h-16 mr-4">
          <img src="../../../images/cissors.png" alt="Informative Image">
        </div>
        <!-- Información de la cita -->
        <div class="flex-grow">
          <h2 class="font-semibold">{{ type[cita.type] }}</h2>
          <p class="text-gray-600">{{ cita.date }}</p>
        </div>
        <!-- Hora del día -->
         <!-- Aca iria la hora pero ya ando muy cansado... -->
        <div class="text-gray-600">8:00</div> 
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
  props: ['appointments'],
  data() {
    return {
      citas: [
        { id: 1, titulo: 'Cita 1', fecha: '2024-06-05', hora: '10:00 AM' },
        { id: 2, titulo: 'Cita 2', fecha: '2024-06-06', hora: '11:00 AM' },
        { id: 3, titulo: 'Cita 3', fecha: '2024-06-07', hora: '12:00 PM' },
        // Agrega más citas según sea necesario
      ],
      type: {
        'haircut': 'Corte de Pelo',
        'ask': 'Consulta',
        'vaccine': 'Vacunas',
        'deworming': 'Desparacitación',
        'wash': 'Baño',
      },
    };
  },
  methods: {
    navigateTo(page) {
      // Lógica para navegar a la página seleccionada
      if (page == '') {

      }
    },
    getImg(type) {
      let path;
      if (type == 'haircut') {
        path = '../../../images/cissors.png'
      } else if (type == '') {
        path = '../../../images/clinic.png'
      } else if (type == 'vaccine') {
        path = '../../../images/pink.png'
      } else {
        path = '../../../images/cissors.png'
      }
      return path
    },
    deleteAppointment(id) {
      this.$inertia.delete(`/citas/${id}`);
    },
    editAppointment(id) {
      this.$inertia.get(`/citas/${id}/editar`);
    }
  }
};
</script>
