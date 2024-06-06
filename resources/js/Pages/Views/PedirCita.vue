<template>
  <div class="flex flex-col h-screen">
    <!-- Barra superior -->
    <div class="flex items-center justify-between bg-green-500 p-3 pl-4">
      <!-- Flecha de regreso -->
      <Link :href="route('home')">
      <button class="text-white text-3xl"><i class="fa-solid fa-arrow-left"></i></button>
      </Link>
    </div>
    <!-- Contenido principal - Formulario de Pedir Cita -->
    <div class="flex-grow p-4">
      <h2 class="text-xl font-semibold mb-4">{{ appointment ? 'Editar Cita' : 'Pedir Cita' }}</h2>
      <!-- Formulario -->
      <form @submit.prevent="submit" class="space-y-4">
        <div>
          <label class="leading-loose mr-2" id="petSelection">
            Selecciona tu mascota
          </label>
            <select v-model="form.pet_id" id="petSelection">
              <option v-for="pet in pets" :value="pet.id">{{ pet.name }}</option>
            </select>
        </div>
        <!-- Checkboxes -->
        <div>
          <label class="leading-loose">
            <input type="radio" name="appointType" v-model="form.type" value="haircut"> Corte de Pelo
          </label><br>
          <label class="leading-loose">
            <input type="radio" name="appointType" v-model="form.type" value="ask"> Consulta
          </label><br>
          <label class="leading-loose">
            <input type="radio" name="appointType" v-model="form.type" value="vaccine"> Vacunas
          </label><br>
          <label class="leading-loose">
            <input type="radio" name="appointType" v-model="form.type" value="deworming"> Desparacitación
          </label><br>
          <label class="leading-loose">
            <input type="radio" name="appointType" v-model="form.type" value="wash"> Baño
          </label>
        </div>
        <!-- Calendario -->
        <div class="border border-gray-300 rounded-md p-4 text-center">
          <input class="cursor-pointer" type="datetime-local" v-model="form.date" :min="minDate"
            onfocus="this.showPicker()" />
        </div>
        <!-- Botón para pedir cita -->
        <div class="text-end">
          <button type="submit"
            class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition-colors duration-300">
            {{ appointment ? 'Actualizar Cita' : 'Pedir Cita' }}
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Link, useForm } from '@inertiajs/vue3';
export default {
  props: ['appointment', 'pets'],
  components: {
    Link
  },
  data() {
    return {
      citaServicios: {
        cortePelo: false,
        consulta: false,
        vacunas: false,
        desparacitacion: false,
        bano: false
      },
      form: {
        type: '',
        date: this.appointment ? this.appointment.date : '',
        pet_id: this.appointment ? this.appointment.pet_id : ''
      },
      minDate: '',
      defaultDate: ''
    };
  },
  mounted() {
    const today = new Date();
    const nextMonth = new Date();
    nextMonth.setMonth(today.getMonth() + 1);

    if (!this.appointment) {
      this.form.date = this.getTomorrowAtMidnight();
    }
    this.minDate = this.getTomorrowAtMidnight();

    if (pets) {
      this.form.pet_id = this.pets[0].id
    }
  },
  methods: {
    formatDate(date) {
      const year = date.getFullYear();
      const month = String(date.getMonth() + 1).padStart(2, '0');
      const day = String(date.getDate()).padStart(2, '0');
      const hours = String(date.getHours()).padStart(2, '0');
      const minutes = String(date.getMinutes()).padStart(2, '0');

      return `${year}-${month}-${day}T${hours}:${minutes}`;
    },
    getTomorrowAtMidnight() {
      // Crear un objeto Date con la fecha actual
      let today = new Date();

      // Incrementar un día
      let tomorrow = new Date(today);
      tomorrow.setDate(today.getDate() + 1);

      // Establecer horas, minutos, segundos y milisegundos a 0
      tomorrow.setHours(0, 0, 0, 0);

      // Formatear la fecha al formato YYYY-MM-DDTHH:MM
      let year = tomorrow.getFullYear();
      let month = String(tomorrow.getMonth() + 1).padStart(2, '0'); // Los meses son base 0
      let day = String(tomorrow.getDate()).padStart(2, '0');
      let hours = String(tomorrow.getHours()).padStart(2, '0');
      let minutes = String(tomorrow.getMinutes()).padStart(2, '0');

      // Combinar en el formato deseado
      let formattedDate = `${year}-${month}-${day}T${hours}:${minutes}`;

      return formattedDate;
    },
    goBack() {
      // Lógica para regresar a la página anterior

    },
    submitForm() {
      console.log('Entro');
      // this.form.type = this.getCitaType();
      if (this.$page.props.auth.user) {
        console.log('logueado');
        if (this.appointment) {
        } else {
          console.log('aaa');
          this.$inertia.post(this.route('pet.create'), this.formData)
        }
      }
  },
  getCitaType() {
    let tipos = [];
    if (this.citaServicios.cortePelo) tipos.push('Corte de Pelo');
    if (this.citaServicios.consulta) tipos.push('Consulta');
    if (this.citaServicios.vacunas) tipos.push('Vacunas');
    if (this.citaServicios.desparacitacion) tipos.push('Desparacitación');
    if (this.citaServicios.bano) tipos.push('Baño');
    return tipos.join(', ');
  },
  submit() {
      console.log('entro');
      const form = useForm({ ...this.form })
      form.post(this.route('cita.create'))
    }
}
};
</script>
