<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { route } from 'momentum-trail';

const props = defineProps({
    item: Object    
})
const form = useForm({
    nombre: props.item.nombre,
    email: props.item.nombre,
    telefono: props.item.nombre,
    mesas: props.item.nombre,
    colonia: props.item.nombre,
    calle: props.item.nombre,
    numero: props.item.nombre,
    estado: props.item.nombre,
    pais: props.item.nombre,
    cp: props.item.nombre
    

});



const submit = () => {
    form.post(route('panel.sucursales.store'), {
        
        
    });
};
</script>

<template>
   
            <div>
                <Link href="/">
                    <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                </Link>
            </div>
    
        <Head title="Alta Sucursal" />
        <v-container>
        <form @submit.prevent="submit">
        <v-row> 
            <v-col cols="12" md="4">        
            <v-text-field id="nombre" type="text" label="Nombre de la sucursal" v-model="form.nombre" required density="compact"
                        :error-messages="form.errors.nombre" />
            </v-col>  
             <v-col cols="12" md="4"> 
            <v-text-field id="email" type="email" label="email" v-model="form.email" required density="compact"
                            :error-messages="form.errors.email" />
             </v-col>
            <!-- telefono -->
             <v-col cols="12" md="4"> 
             <v-text-field id="telefono" type="text" label="telefono" v-model="form.telefono" required density="compact"
                            :error-messages="form.errors.telefono" />
             </v-col>
            <!-- mesas -->
             <v-col cols="12" md="4"> 
          <v-text-field id="mesas" type="number" label="mesas" v-model="form.mesas" required density="compact"
                                :error-messages="form.errors.mesas" />
                                </v-col>
            <v-col cols="12" md="4"> 
                <v-text-field id="cp" type="text" label="Código postal" v-model="form.cp" required density="compact"
                                    :error-messages="form.errors.cp" />
                                    </v-col>
            <!-- ciudad -->
             <v-col cols="12" md="4"> 
            <v-text-field id="colonia" type="text" label="Colonia" v-model="form.colonia" required density="compact"
                                :error-messages="form.errors.colonia" />
                                </v-col>
            <!-- calle -->
             <v-col cols="12" md="4"> 
            <v-text-field id="calle" type="text" label="calle" v-model="form.calle" required density="compact"
                                :error-messages="form.errors.calle" /></v-col>
            
            <!-- numero -->
             <v-col cols="12" md="4"> 
           <v-text-field id="numero" type="text" label="Número" v-model="form.numero" required density="compact"
                                :error-messages="form.errors.numero" />
                                </v-col>

             <v-col cols="12" md="4"> 
            <v-text-field id="estado" type="text" label="Estado" v-model="form.estado" required density="compact"
                                :error-messages="form.errors.estado" />
             </v-col>
             <v-col cols="12" md="4"> 
            <v-text-field id="pais" type="text" label="País" v-model="form.pais" required density="compact"
                                :error-messages="form.errors.pais" />
</v-col>            
        </v-row>
        <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Guardar
                    </PrimaryButton>
        </form>

        </v-container>
</template>
