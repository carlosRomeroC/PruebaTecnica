<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { Icon } from "@iconify/vue";
const props = defineProps({
    sucursales: Object,
})
const data=reactive({
    status:false,
});
function getColor(mesa:string){
    const colors={
        'activa': '#22C55E',
        'inactiva':'#E2E2E2',
        'ocupada':'#EF4444'
    }
    return colors[mesa]??colors['inactiva'];
}
</script>

<template>
    <Head title="Principal" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sucursal: {{sucursales.nombre}}</h2>
        </template>
            <v-container fluid ma-0 pa-0 fill-height>
            <v-row>
            <v-col v-for="mesa in sucursales.mesas">
            <v-card>
                   <v-card-text class="flex justify-center flex-col items-center" >
                     <h3 class="text-center pt 3">{{ mesa.estatus }}</h3>       
                        <div class="p-6 text-gray-900 text-center">{{ mesa.nombre }}</div>
                         <Icon icon="ic:baseline-table-bar" :color="getColor(mesa.estatus)" width="50%"/> 
                   </v-card-text>             
            </v-card>
            </v-col>
            </v-row>
            </v-container>
    </AuthenticatedLayout>
</template>
