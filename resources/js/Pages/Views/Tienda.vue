<template>
  <div class="flex flex-col h-screen">
    <!-- Barra superior -->
    <div class="flex items-center justify-between bg-green-500 p-4">
      <!-- Logo -->
      <img src="../../../images/rewow-logo.png" alt="Logo" class="h-8">
      <!-- Barra de navegación -->
      <div class="text-white text-xl cursor-pointer">
        <i class="fa-solid fa-cart-shopping"></i>
      </div>
    </div>

    <!-- Contenido principal - Lista de citas -->
    <div class="flex-grow overflow-y-auto p-4">
      <div class="grid grid-cols-2 gap-4 p-4">
        <!-- Elemento de la grilla -->
        <div v-for="producto in productos" :key="producto.id" class="bg-white p-4 shadow-md rounded-md">
          <!-- Imagen del producto -->
          <img :src="producto.imagen" :alt="producto.nombre" class="w-full h-40 object-cover rounded-md mb-2">
          <!-- Precio -->
          <p class="text-green-500 font-semibold">{{ producto.precio }}</p>
          <!-- Nombre del producto -->
          <p class="text-lg font-bold">{{ producto.nombre }}</p>
        </div>
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
      productos: [
        { id: 1, nombre: 'Producto 1', precio: '$10.00', imagen: '/path/to/image1.jpg' },
        { id: 2, nombre: 'Producto 2', precio: '$20.00', imagen: '/path/to/image2.jpg' },
        // Agrega más productos según sea necesario
      ]
    };
  }
};
</script>
