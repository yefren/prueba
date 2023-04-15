<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BreezeLabel from '@/Components/InputLabel.vue';
import BreezeInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
const form = useForm({

    nombre: '',
    fecha_publicacion  : '',
    imagen: ''

});
const submit = () => {
    form.post(route('pelicula.store'));
};
</script>
<template>
    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create pelicula
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                :href="route('pelicula.index')"
                            >
                                Back
                            </Link>
                        </div>
                        <form name="createForm" @submit.prevent="submit">
                                <div className="flex flex-col">
                                    <div className="mb-4">
                                        <BreezeLabel for="name" value="Nombres" />

                                        <BreezeInput
                                            id="name"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.nombre"
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.nombre">
                                            {{ form.errors.nombre }}
                                        </span>
                                    </div>
                                    <div className="mb-4">
                                        <BreezeLabel for="datepublic" value="Fecha de Publicacion" />

                                        <BreezeInput
                                            id="datepublic"
                                            type="date"
                                            class="mt-1 block w-full"
                                            v-model="form.fecha_publicacion"
                                            autofocus />
                                        <span className="text-red-600" v-if="form.errors.fecha_publicacion">
                                            {{ form.errors.fecha_publicacion }}
                                        </span>
                                    </div>


                                    <div className="mb-4">
                                        <BreezeLabel for="img" value="Imagen" />

                                        <input type="file" ref="fileInput" @change="onFileSelected">
                                    </div>
                                </div>

                                <div className="mt-4">
                                    <button
                                        type="submit"
                                        className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                                    >
                                        Save
                                    </button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
