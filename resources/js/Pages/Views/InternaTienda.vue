<template>
  <div class="flex flex-col h-screen">
    <!-- Barra superior -->
    <div class="flex items-center justify-between bg-green-500 p-4">
      <!-- Logo -->
      <button @click="goBack" class="text-white text-3xl"><i class="fa-solid fa-arrow-left"></i></button>
      <div class="text-white text-xl cursor-pointer">
        <i class="fa-solid fa-cart-shopping"></i>
      </div>
      <!-- Barra de navegación -->
    </div>

    <!-- Contenido principal - Lista de citas -->
    <div class="flex-grow overflow-y-auto p-4">
      <div class="flex flex-col h-full">
        <!-- Imagen -->
        <div class="h-1/2">
          <img src="/path/to/image.jpg" alt="Imagen del Producto" class="w-full h-auto">
        </div>
        <!-- Detalles del Producto -->
        <div class="h-1/2 p-4">
          <!-- Título -->
          <h2 class="text-2xl font-bold mb-4">Título del Producto</h2>
          <!-- Precios -->
          <div class="flex justify-between items-center mb-4">
            <p class="text-xl font-semibold text-green-500">Descuento $1000</p>
            <p class="text-xl font-semibold">Precio $9000</p>
          </div>
          <!-- Select de cantidad -->
          <div class="mb-4">
            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad:</label>
            <select id="cantidad"
              class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <!-- Agrega más opciones según sea necesario -->
            </select>
          </div>
          <!-- Botón de comprar -->
          <button
            class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition-colors duration-300">Comprar</button>
        </div>
      </div>
    </div>

    <!-- Barra inferior -->
    <div class="flex items-center justify-center bg-green-500 p-4">
      <!-- Opciones de navegación -->
      <div class="flex space-x-4">
        <button @click="navigateTo('mascota')" class="text-white">Mascota</button>
        <button @click="navigateTo('calendario')" class="text-white">Calendario</button>
        <button @click="navigateTo('tienda')" class="text-white">Tienda</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  // Lógica del componente
};
</script>
