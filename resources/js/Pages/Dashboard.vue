<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { Icon } from "@iconify/vue";
const data=reactive({
    status:false,
});
</script>

<template>
    <Head title="Principal" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sucursal: Fulanita</h2>
        </template>
            <v-container fluid ma-0 pa-0 fill-height>
            <v-row>
            <v-col v-for="n in 5">
            <v-card>
                    <h3 class="text-center pt 3">{{ data.status?"Ocupada":"Libre" }}</h3>       
                    <div class="p-6 text-gray-900 text-center">Mesa {{ n }}</div>
                     <Icon icon="ic:baseline-table-bar" :color="data.status ? '#EF4444' : '#22C55E'" width="234"/>              
            </v-card>
            </v-col>
            </v-row>
            </v-container>
    </AuthenticatedLayout>
</template>
