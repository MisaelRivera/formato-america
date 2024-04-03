<script setup>
    import { nextTick } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import CustomeInput from '@/Components/Shared/CustomeInput.vue';
    const createForm = useForm({
        lote: null,
        marca: null,
    });

    const submit = async () => {
        createForm.post('/ethyl-acetates', {
            onError: errors => {
                console.log(errors);
            }
        });
    };
</script>
<template>
    <GuestLayout>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form @submit.prevent="submit">
                        <div class="row">
                            <CustomeInput 
                                text="Lote"
                                name="lote"
                                type="text"
                                size="col-md-6"
                                v-model="createForm.lote"
                                :error="createForm.errors.lote"/>
                            <CustomeInput 
                                text="Marca"
                                name="marca"
                                type="text"
                                size="col-md-6"
                                v-model="createForm.marca"
                                :error="createForm.errors.marca"/>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-success">
                                    Crear
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>