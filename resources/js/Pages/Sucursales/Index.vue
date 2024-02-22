<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { Icon } from "@iconify/vue";
import { route } from 'momentum-trail';
import {ref} from 'vue';
const props = defineProps({
    sucursales: Array,
    perPage: Number
})
const modelData= ref([
    
        { title: 'Id', value: 'id' },
        { title: 'Nombre', value: 'nombre' },
        { title: 'Teléfono', value: 'telefono' },
        { title: 'Email', value: 'email' },
        { title: 'Número de mesas', value: 'mesasCount' },
        { title: 'Acciones', value: 'actions' },

])
function destroy(item:any){

router.delete(route('panel.sucursales.destroy',{ 'sucursale':item.id }));
}
function edit(item: any) {

    router.put(route('panel.sucursales.update', { 'sucursale': item.id }));
}
</script>
<template>
    <Head title="Sucursales"></Head>
    <AuthenticatedLayout>
      <v-row>
                        <v-col md="1">
                            <h1>Sucursales</h1>
                        </v-col>
                        <v-spacer></v-spacer>
                        <v-col md="2">
                            <v-btn :href="route('panel.sucursales.create')">
                                <Icon icon="mdi:plus" width="24"/>
                                Agregar                              
                            </v-btn>
                        </v-col>
                    </v-row>
                    
         <v-data-table
                    :headers="modelData"
                    :items="sucursales"
                    density="compact"
                    loading-text="Cargando..."
                    no-data-text="No hay resultados"
                >
                    <template v-slot:item.actions="{item}">
                        <v-btn icon @click="() => edit(item)" 
                               variant="plain" density="compact">
                            <Icon icon="mdi:pencil" width="24"/>
                        </v-btn>
                        <v-btn @click="()=>destroy(item)"
                               variant="plain" density="compact">
                            <Icon icon="mdi:delete" width="24"/>
                        </v-btn>
                    </template>
                    <template v-slot:bottom>
                        <v-row justify="center">
                        
                            <v-col>
                                
                            </v-col>
                        </v-row>
                    </template>
                </v-data-table>
    </AuthenticatedLayout>
</template>
