<script setup>
    import axios from 'axios';
    import { ref } from 'vue';
    import { Link, useForm, usePage, router } from '@inertiajs/vue3';
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import ModalBtn from '@/Components/Shared/ModalBtn.vue';
    import Modal from '@/Components/Shared/Modal.vue';
    import CustomeInput from '@/Components/Shared/CustomeInput.vue';

    /* =====================================================
                        PROPS
     ======================================================== */
    const props = defineProps({
        ethylAcetatesProp: {
            required: true
        },
        errors: Object,
    });

    const page = usePage();
    let ethylAcetates = ref(props.ethylAcetatesProp.data);
    const createForm = useForm({
            lote: null,
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
        const createEthylModal =  bootstrap.Modal.getInstance(document.getElementById('create-ethyl-modal'));
        createEthylModal.show();
    };

    // Forms Methods
    const createEthyl = async() => {
        try {
            await createForm.post('/ethyl-acetates');
            if (!createForm.errors) {
                closeCreateModal();
                const res = await axios.get('get-ethyl-acetates');
                ethylAcetates.value = res.data.data;
            } else {
                console.log(createForm.errors);
            }
        } catch (error) {
            console.log(error)
        }
    };


</script>
<template>
    <GuestLayout>
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" v-if="page.props.flash.message">
                {{ page.props.flash.message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-danger alert-dismissible fade show" v-if="page.props.flash.error">
                {{ page.props.flash.error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
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
            :close-button-function="closeCreateModal"
            target="create-ethyl-modal">
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
