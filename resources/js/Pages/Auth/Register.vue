<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { route } from 'momentum-trail';

const form = useForm({
    name: '',
    email: '',
    telefono:'',
    nss:'',
    rfc:'',
    salario:'',
    puesto:'',
    password: '',
    password_confirmation: '',
    sucursales:''

});

const props = defineProps({
    sucursales: {
        type: Array
    }
})
const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset("name",
             "email",
             "telefono",
             "nss",
             "rfc",
             "salario",
             "puesto",
             "password",
             "password_confirmation",
             "sucursales");
        },
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Nombre" />

                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                    autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                    autocomplete="username" />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>
             <!-- telefono -->
            <div class="mt-4">
                <InputLabel for="teléfono" value="Telefono" />

                <TextInput id="telefono" class="block mt-1 w-full" type="text" v-model="form.telefono" required />

                 <InputError class="mt-2" :message="form.errors.telefono" />
            </div>
            <!-- nss -->
            <div class="mt-4">
                <InputLabel for="nss" value="Nss" />

                <TextInput id="nss" class="block mt-1 w-full" type="text" v-model="form.nss" required min:11 />

                 <InputError class="mt-2" :message="form.errors.nss" />
            </div>
            <!-- rfc -->
            <div class="mt-4">
                <InputLabel for="rfc" value="Rfc" />

                <TextInput id="rfc" class="block mt-1 w-full" type="text" v-model="form.rfc" required />

                 <InputError class="mt-2" :message="form.errors.rfc" />
            </div>
            <!-- salario -->
            <div class="mt-4">
                <InputLabel for="salario" value="Salario" />

                <TextInput id="salario" class="block mt-1 w-full" type="text" v-model="form.salario" required />

                 <InputError class="mt-2" :message="form.errors.salario" />
            </div>
            <!-- Puesto -->
            <div class="mt-4">
                <InputLabel for="puesto" value="Puesto" />

                <TextInput id="puesto" class="block mt-1 w-full" type="text" v-model="form.puesto" required />

                 <InputError class="mt-2" :message="form.errors.puesto" />
            </div>
            <!--Sucursale-->
            <div class="mt-4">
            <v-select label="Sucursal" :items="sucursales" density="compact" v-model="form.sucursales"
                :error-messages="form.errors.sucursales" item-title="nombre" item-value="id"></v-select>
            </div>
                <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="new-password" />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                    v-model="form.password_confirmation" required autocomplete="new-password" />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Ya se encuentra registrado?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registras
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
