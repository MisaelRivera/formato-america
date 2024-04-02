<script setup>
    import { ref } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import { Link } from '@inertiajs/vue3';
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import ModalBtn from '@/Components/Shared/ModalBtn.vue';
    import Modal from '@/Components/Shared/Modal.vue';
    import CustomInput from '@/Components/Shared/CustomInput.vue';
    const props = defineProps({
        ethylAcetatesProp: {
            required: true
        }
    });
    
    const ethylAcetates = props.ethylAcetatesProp.data;
    let createForm = useForm({
            lote: null,
            marca: null,
          }),
          lote = ref(null),
          marca = ref(null);
    const createEthyl = () => {
        console.log(createForm);
    },

    openCreateModal = () => {
        const createEthylModal =  bootstrap.Modal.getInstance(document.getElementById('create-ethyl-modal'));
        createEthylModal.show();
    },

    resetCreateForm = () => {
        createForm.reset();
        const createEthylModal = bootstrap.Modal.getInstance(document.getElementById('create-ethyl-modal'));
        createEthylModal.hide();
    },

    test = () => {
        lote.value = 'Juan';
        marca.value = 'Joe';
    };
</script>
<template>
    <GuestLayout>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2 class="create-title mt-3">
                        <Link href="/ethyl-acetates" class="create-title-link">
                            Crear Acetato etilo
                        </Link>
                        <ModalBtn 
                            :is-icon="true"
                            icon="fa-plus"
                            :classes="['add']"
                            :open-function="openCreateModal"
                            target="create-ethyl-modal"/>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Lote</th>
                                <th>Marca</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="acetate in ethylAcetates">
                                <td>{{ acetate.lote }}</td>
                                <td>{{ acetate.marca }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ createForm.lote }}
        <Modal
            :has-action-button="true"
            action-button-text="Crear"
            action-button-color="btn-success"
            :action-button-function="createEthyl"
            :close-button-function="resetCreateForm"
            target="create-ethyl-modal">
            <form>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="lote">Lote</label>
                                <input 
                                    type="text"
                                    v-model="createForm.lote"
                                    id="lote"
                                    class="form-control"
                                    placeholder="Lote">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="marca">Marca</label>
                                <input 
                                    type="text"
                                    v-model="createForm.marca"
                                    id="marca"
                                    class="form-control">
                            </div>
                        </div>
                        <!--<CustomInput 
                            name="lote"
                            text="Lote"
                            type="text"
                            v-model="createForm.lote"
                            size="col-md-6"/>
                        <CustomInput 
                            name="marca"
                            text="Marca"
                            type="text"
                            v-model="createForm.marca"
                            size="col-md-6"/>-->
                    </div>
                </div>
            </form>
        </Modal>
        <div class="row">
            <CustomInput 
                name="lote"
                text="Lote"
                type="text"
                v-model="lote"
                size="col-md-6"/>
            <CustomInput 
                name="marca"
                text="Marca"
                type="text"
                v-model="marca"
                size="col-md-6"/>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <button class="btn btn-primary" @click="test">Test</button>
            </div>
        </div>
    </GuestLayout>
</template>
<style>
    .add {
        background: rgb(125, 207, 125);
        border-radius: 50%;
        color: white;
        font-weight: bold;
        text-align: center;
        font-size: 2rem;
        height: 2.1rem;
        width: 2.25rem;
    }

    .create-title {
        font-size: 1.75rem;
        font-weight: bold;
        color: rgb(8, 70, 13);
    }

    .create-title-link {
        color: inherit;
        text-decoration: none;
    }
</style>
