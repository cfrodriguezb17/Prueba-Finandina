<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

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
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <InputLabel for="email" value="Correo Electrónico" />
                            <TextInput id="email" type="email"
                                class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:border-green-500"
                                v-model="form.email" required autofocus autocomplete="username"
                                placeholder="Correo Electrónico" />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="password" value="Contraseña" />
                            <TextInput id="password" type="password"
                                class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:border-green-500"
                                v-model="form.password" required autocomplete="current-password"
                                placeholder="Contraseña" />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="block mb-4">
                            <label class="flex items-center">
                                <Checkbox name="remember" v-model:checked="form.remember" />
                                <span class="ms-2 text-sm text-gray-600">Recordarme</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end">
                            <Link v-if="canResetPassword" :href="route('password.request')"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            ¿Olvidaste tu contraseña?
                            </Link>

                            <PrimaryButton
                                class="ms-4 bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition-colors duration-300"
                                :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Iniciar Sesión
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
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