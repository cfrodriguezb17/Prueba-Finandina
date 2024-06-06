<template>
  <div class="bg-green-500 h-screen">
    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-bold mb-4">Medical Record</h1>

      <!-- Pet Owner Name -->
      <div class="mb-4">
        <label for="pet-owner-name" class="block text-sm font-medium text-gray-700">Pet Owner Name</label>
        <input type="text" id="pet-owner-name" v-model="petOwnerName" class="mt-1 p-2 border rounded-md w-full">
      </div>

      <!-- Pet Name -->
      <div class="mb-4">
        <label for="pet-name" class="block text-sm font-medium text-gray-700">Pet Name</label>
        <input type="text" id="pet-name" v-model="petName" class="mt-1 p-2 border rounded-md w-full">
      </div>

      <!-- Pet Type -->
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Pet Type</label>
        <div class="mt-1">
          <label class="inline-flex items-center">
            <input type="radio" v-model="petType" value="Cat" class="form-radio">
            <span class="ml-2">Cat</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input type="radio" v-model="petType" value="Dog" class="form-radio">
            <span class="ml-2">Dog</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input type="radio" v-model="petType" value="Fish" class="form-radio">
            <span class="ml-2">Fish</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input type="radio" v-model="petType" value="Other" class="form-radio">
            <span class="ml-2">Other</span>
          </label>
        </div>
      </div>

      <!-- Size -->
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Size</label>
        <div class="mt-1">
          <label class="inline-flex items-center">
            <input type="radio" v-model="size" value="Small" class="form-radio">
            <span class="ml-2">Small</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input type="radio" v-model="size" value="Medium" class="form-radio">
            <span class="ml-2">Medium</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input type="radio" v-model="size" value="Big" class="form-radio">
            <span class="ml-2">Big</span>
          </label>
        </div>
      </div>

      <!-- Description -->
      <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" v-model="description" rows="4" class="mt-1 p-2 border rounded-md w-full"></textarea>
      </div>

      <!-- List of Vaccinations -->
      <!-- Aquí puedes añadir la lógica para manejar la lista de vacunaciones según tus necesidades -->

      <!-- Botón de Guardar -->
      <div class="mt-4">
        <button @click="saveMedicalRecord" class="px-4 py-2 bg-blue-500 text-white rounded-md">Save</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      petOwnerName: '',
      petName: '',
      petType: '',
      size: '',
      description: ''
    };
  },
  methods: {
    saveMedicalRecord() {
      // Aquí puedes implementar la lógica para guardar el registro médico
      console.log('Guardando registro médico...');
    }
  }
}
</script>
