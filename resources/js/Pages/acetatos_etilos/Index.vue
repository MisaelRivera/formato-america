<script setup>
    import axios from 'axios';
    import { ref } from 'vue';
    import { Link, useForm, usePage, router } from '@inertiajs/vue3';
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import ModalBtn from '@/Components/Shared/ModalBtn.vue';
    import Modal from '@/Components/Shared/Modal.vue';
    import CustomeInput from '@/Components/Shared/CustomeInput.vue';
    import Alert from '@/Components/Shared/Alert.vue';

    /* =====================================================
                        PROPS
     ======================================================== */
    const props = defineProps({
        ethylAcetatesProp: {
            required: true
        },
    });

    const page = usePage();
    const showMessage = ref(false),
          loteObsoleto = ref(null),
          idObsoleto = ref(null);
    let ethylAcetates = ref(props.ethylAcetatesProp.data);
    const createForm = useForm({
            lote: null,
            marca: null,
          }),
          editForm = useForm({
            id: null,
            lote:null,
            marca: null,
          });

    /* =====================================================
                        METHODS
     ======================================================== */

    // Opening and closing modal methods

    const closeCreateModal = () => {
        createForm.reset();
        const createEthylModal = bootstrap.Modal.getInstance(document.getElementById('create-ethyl-modal'));
        createEthylModal.hide();
    };

    const openCreateModal = () => {
        const createEthylModal =  new bootstrap.Modal(document.getElementById('create-ethyl-modal'));
        createEthylModal.show();
    };

    const closeEditModal = () => {
        editForm.reset();
        const editEthylModal = bootstrap.Modal.getInstance(document.getElementById('edit-ethyl-modal'));
        editEthylModal.hide();
    };

    const openObsoleteModal = async(id) => {
        const ethylAcetate = (await axios.get(`/get-ethyl-acetate-by-id/${id}`)).data;
        loteObsoleto.value = ethylAcetate.lote;
        idObsoleto.value = ethylAcetate.id;
        const obsoleteEthylModal = new bootstrap.Modal(document.getElementById('obsolete-ethyl-modal'));
        obsoleteEthylModal.show();
    };

    const closeObsoleteModal = () => {
        const obsoleteEthylModal = bootstrap.Modal.getInstance(document.getElementById('obsolete-ethyl-modal'));
        obsoleteEthylModal.hide();
    };

    const openEditModal = async (id) => {
        try {
            const ethylAcetate = (await axios.get(`/get-ethyl-acetate-by-id/${id}`)).data;
            editForm.lote = ethylAcetate.lote;
            editForm.marca = ethylAcetate.marca;
            editForm.id = ethylAcetate.id;
            const editEthylModal = new bootstrap.Modal(document.getElementById('edit-ethyl-modal'));
            editEthylModal.show();

        } catch(error) {
            console.log(error);
        }
    };

    // Forms Methods
    const createEthyl = async() => {
        try {
             createForm.post('/ethyl-acetates', {
                onSuccess: async(page) => {
                    closeCreateModal();
                    const res = await axios.get('/get-ethyl-acetates');
                    ethylAcetates.value = res.data.data;
                    showMessage.value = true;
                }
             });
        } catch (error) {
            console.log(error);
        }
    };

    const editEthyl = async () => {
        try {
            editForm.put(`/ethyl-acetates/${editForm.id}`, {
                onSuccess: async (page) => {
                    closeEditModal();
                    const res = await axios.get('/get-ethyl-acetates');
                    ethylAcetates.value = res.data.data;
                    showMessage.value = true;
                }
            });
        } catch (error) {
            console.log(error);
        }
    };

    const setEthylObsolete = async() => {
        try {
            await axios.patch(`/ethyl-acetates/set-obsolete/${idObsoleto.value}`);
            closeObsoleteModal();
            const res = await axios.get('/get-ethyl-acetates');
            ethylAcetates.value = res.data.data;
            showMessage.value = true;
        } catch (error) {
            console.log(error);
        }
    };


</script>
<template>
    <GuestLayout>
        <div class="container">
            <Alert 
                v-if="showMessage"
                :message="page.props.flash.message"
                @close="showMessage = false"/>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2 class="create-title mt-3 text-center">
                        <Link href="/ethyl-acetates" class="create-title-link">
                            Acetatos etilo
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
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="acetate in ethylAcetates">
                                <td>{{ acetate.lote }}</td>
                                <td>{{ acetate.marca }}</td>
                                <td>
                                    <ModalBtn 
                                        :is-icon="true"
                                        icon="fa-edit"
                                        :classes="['edit-btn']"
                                        :open-function="() => openEditModal(acetate.id)"
                                        target="edit-ethyl-modal"/>
                                </td>
                                <td>
                                    <ModalBtn 
                                        :is-icon="true"
                                        icon="fa-trash"
                                        :classes="['obsolete-btn']"
                                        :open-function="() => openObsoleteModal(acetate.id)"
                                        target="obsolete-ethyl-modal"/>
                                </td>
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
            :close-button-function="closeCreateModal"
            title="Crear un acetato de etilo"
            target="create-ethyl-modal">
            <template #header>
                <h3 class="">Crear nuevo acetato de etilo</h3>
            </template>
            <form>
                <div class="container">
                    <div class="row">
                        <CustomeInput 
                            name="lote"
                            text="Lote"
                            type="text"
                            v-model="createForm.lote"
                            size="col-md-6"
                            :error="createForm.errors.lote"/>
                        <CustomeInput 
                            name="marca"
                            text="Marca"
                            type="text"
                            v-model="createForm.marca"
                            size="col-md-6"
                            :error="createForm.errors.marca"/>
                    </div>
                </div>
            </form>
        </Modal>
        <Modal
            :has-action-button="true"
            action-button-text="Editar"
            action-button-color="btn-primary"
            :action-button-function="editEthyl"
            :close-button-function="closeEditModal"
            target="edit-ethyl-modal">
            <template #header>
                <h3 class="">Editar acetato de etilo: {{ editForm.lote }}</h3>
            </template>
            <form>
                <div class="container">
                    <div class="row">
                        <CustomeInput 
                            name="lote"
                            text="Lote"
                            type="text"
                            v-model="editForm.lote"
                            size="col-md-6"
                            :error="editForm.errors.lote"/>
                        <CustomeInput 
                            name="marca"
                            text="Marca"
                            type="text"
                            v-model="editForm.marca"
                            size="col-md-6"
                            :error="editForm.errors.marca"/>
                    </div>
                    <div class="row">
                        <CustomeInput 
                            type="hidden"
                            name="id"
                            v-model="editForm.id"
                            size="col-md-4"/>
                    </div>
                </div>
            </form>
        </Modal>
        <Modal
            :has-action-button="true"
            action-button-text="Hacer obsoleto"
            action-button-color="btn-danger"
            :action-button-function="setEthylObsolete"
            :close-button-function="closeObsoleteModal"
            target="obsolete-ethyl-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <Alert 
                                :message="`Realmente deseas hacer obsoleto el acetato con el lote ${loteObsoleto}?`"
                                type="alert-danger"
                                :closable="false"/>
                        </div>
                    </div>
                </div>
        </Modal>
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

    .edit-btn {
        background-color: rgb(51, 122, 183);
        border-radius: 50%;
        color: white;
        text-align: center;
        font-size: 0.75rem;
        padding-top: 0.225rem;
        height: 1.25rem;
        width: 1.25rem;
    }

    .obsolete-btn {
        background-color: rgb(217, 83, 79);
        border-radius: 50%;
        color: white;
        text-align: center;
        font-size: 0.75rem;
        padding-top: 0.225rem;
        height: 1.25rem;
        width: 1.25rem;
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
